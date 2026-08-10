<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\AnimalReport;
use App\Models\Blog;
use App\Models\Campaign;
use App\Models\Plan;
use App\Models\Contact;
use App\Models\Donation;
use App\Models\RescueCase;
use App\Models\RecurringSubscription;
use App\Models\User;
use App\Models\Volunteer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Get comprehensive dashboard statistics.
     */
    public function getStats(Request $request)
    {
        $user = $request->user() ?? auth('sanctum')->user() ?? auth()->user();

        if ($user) {
            $hasSuperAdmin = $user->hasRole('Super Admin');
            $roleNames = strtolower(implode(' ', $user->getRoleNames()->toArray()));
            $isVolunteerRole = \DB::table('roles')
                ->join('model_has_roles', 'roles.id', '=', 'model_has_roles.role_id')
                ->where('model_has_roles.model_id', $user->id)
                ->where('roles.is_volunteer', true)
                ->exists();

            $isVolunteer = !$hasSuperAdmin && ($isVolunteerRole || str_contains($roleNames, 'volunteer'));

            if ($isVolunteer) {
                $assignedQuery = RescueCase::where('rescuer_id', $user->id);

                $assignedCasesCount = (clone $assignedQuery)->count();
                $activeCasesCount   = (clone $assignedQuery)
                    ->whereIn('status', ['dispatched', 'admitted', 'in_treatment', 'Reported', 'In Progress', 'Medical Treatment'])
                    ->count();
                $resolvedCasesCount = (clone $assignedQuery)
                    ->whereIn('status', ['recovered', 'released', 'adopted', 'Rescued', 'Released', 'Adopted'])
                    ->count();

                $assignedCases = (clone $assignedQuery)
                    ->with('animalReport:id,animal_type,address,reporter_name,reporter_mobile')
                    ->orderByDesc('created_at')
                    ->take(10)
                    ->get(['id', 'case_number', 'animal_type', 'status', 'rescuer_id', 'created_at', 'animal_report_id']);

                $rescueStatusDistribution = (clone $assignedQuery)
                    ->select('status', \DB::raw('count(*) as count'))
                    ->groupBy('status')
                    ->pluck('count', 'status')
                    ->toArray();

                return response()->json([
                    'isVolunteer' => true,
                    'volunteerStats' => [
                        'assignedCasesCount' => $assignedCasesCount,
                        'activeCasesCount'   => $activeCasesCount,
                        'resolvedCasesCount' => $resolvedCasesCount,
                        'assignedCases'      => $assignedCases,
                        'rescueStatus'       => $rescueStatusDistribution,
                    ],
                ]);
            }
        }

        $now = Carbon::now();

        // ─── OVERVIEW TOTALS ─────────────────────────────────────
        // ─── OVERVIEW TOTALS ─────────────────────────────────────
        $successfulStatuses = ['succeeded', 'captured'];
        $totalDonationAmount = Donation::whereIn('status', $successfulStatuses)->sum('amount');
        $totalDonationCount  = Donation::whereIn('status', $successfulStatuses)->count();
        $thisMonthDonations  = Donation::whereIn('status', $successfulStatuses)
            ->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->sum('amount');
        $lastMonthDonations  = Donation::whereIn('status', $successfulStatuses)
            ->whereMonth('created_at', $now->copy()->subMonth()->month)
            ->whereYear('created_at', $now->copy()->subMonth()->year)
            ->sum('amount');
        $donationTrend = $lastMonthDonations > 0
            ? round((($thisMonthDonations - $lastMonthDonations) / $lastMonthDonations) * 100, 1)
            : ($thisMonthDonations > 0 ? 100 : 0);

        $totalRescueCases    = RescueCase::count();
        $resolvedCases       = RescueCase::whereIn('status', ['Rescued', 'Released', 'Adopted'])->count();
        $inProgressCases     = RescueCase::whereIn('status', ['In Progress', 'Medical Treatment'])->count();
        $resolutionRate      = $totalRescueCases > 0 ? round(($resolvedCases / $totalRescueCases) * 100, 1) : 0;

        $activeCampaigns     = Campaign::where('status', 'Active')->count();
        $totalCampaigns      = Campaign::count();
        $totalGoalAmount     = Campaign::sum('goal_amount');
        $totalRaisedAmount   = Campaign::sum('raised_amount');
        $campaignFundingPct  = $totalGoalAmount > 0 ? round(($totalRaisedAmount / $totalGoalAmount) * 100, 1) : 0;

        $totalVolunteers     = Volunteer::count();
        $approvedVolunteers  = Volunteer::where('status', 'Approved')->count();
        $pendingVolunteers   = Volunteer::where('status', 'Pending')->count();

        $totalUsers          = User::count();
        $totalAnimalReports  = AnimalReport::count();
        $pendingReports      = AnimalReport::where('status', 'Pending')->count();
        $totalBlogs          = Blog::count();
        $publishedBlogs      = Blog::where('status', 'Published')->count();
        $totalContacts       = Contact::count();
        $pendingContacts     = Contact::where('status', 'Pending')->count();
        $activeSubscriptions = RecurringSubscription::where('status', 'active')->count();

        // ─── MONTHLY TRENDS (Last 6 months) ─────────────────────
        $monthlyDonations = [];
        $monthlyRescueCases = [];
        $monthlyVolunteers = [];
        $monthLabels = [];

        for ($i = 5; $i >= 0; $i--) {
            $month = $now->copy()->subMonths($i);
            $monthLabels[] = $month->format('M Y');

            $monthlyDonations[] = (float) Donation::whereIn('status', $successfulStatuses)
                ->whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->sum('amount');

            $monthlyRescueCases[] = (int) RescueCase::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();

            $monthlyVolunteers[] = (int) Volunteer::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();
        }

        // ─── RESCUE CASE STATUS DISTRIBUTION ─────────────────────
        $rescueStatusDistribution = RescueCase::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        // ─── PAYMENT METHOD BREAKDOWN ────────────────────────────
        $paymentMethodBreakdown = Donation::whereIn('status', $successfulStatuses)
            ->select('payment_method', DB::raw('count(*) as count'), DB::raw('sum(amount) as total'))
            ->groupBy('payment_method')
            ->get()
            ->map(function ($item) {
                return [
                    'method' => $item->payment_method ?: 'Unknown',
                    'count'  => (int) $item->count,
                    'total'  => (float) $item->total,
                ];
            })
            ->values()
            ->toArray();

        // ─── DONATIONS BY PLAN ────────────────────────────────────
        $planGroup = Donation::whereIn('status', $successfulStatuses)
            ->whereNotNull('plan_id')
            ->select('plan_id', DB::raw('count(*) as count'), DB::raw('sum(amount) as total'))
            ->groupBy('plan_id')
            ->get();
        $planIds = $planGroup->pluck('plan_id')->filter()->unique();
        $plansMap = Plan::whereIn('id', $planIds)->pluck('title', 'id');

        $donationsByPlan = $planGroup
            ->map(function ($item) use ($plansMap) {
                return [
                    'name'  => $plansMap->get($item->plan_id) ?: 'Unknown Plan',
                    'count' => (int) $item->count,
                    'total' => (float) $item->total,
                ];
            })
            ->sortByDesc('total')
            ->values()
            ->toArray();

        // ─── DONATIONS BY CAMPAIGN ───────────────────────────────
        $campaignGroup = Donation::whereIn('status', $successfulStatuses)
            ->whereNotNull('campaign_id')
            ->select('campaign_id', DB::raw('count(*) as count'), DB::raw('sum(amount) as total'))
            ->groupBy('campaign_id')
            ->get();
        $campaignIds = $campaignGroup->pluck('campaign_id')->filter()->unique();
        $campaignsMap = Campaign::whereIn('id', $campaignIds)->pluck('title', 'id');

        $donationsByCampaign = $campaignGroup
            ->map(function ($item) use ($campaignsMap) {
                return [
                    'name'  => $campaignsMap->get($item->campaign_id) ?: 'Unknown Campaign',
                    'count' => (int) $item->count,
                    'total' => (float) $item->total,
                ];
            })
            ->sortByDesc('total')
            ->values()
            ->toArray();

        // ─── TOP CAMPAIGNS (Goal vs Raised) ─────────────────────
        $topCampaigns = Campaign::where('status', 'Active')
            ->orderByDesc('raised_amount')
            ->take(5)
            ->get(['title', 'goal_amount', 'raised_amount', 'status'])
            ->toArray();

        // ─── RECENT DONATIONS ────────────────────────────────────
        $recentDonations = Donation::with('campaign:id,title')
            ->orderByDesc('created_at')
            ->take(5)
            ->get(['id', 'donor_name', 'donor_email', 'amount', 'status', 'payment_method', 'campaign_id', 'created_at'])
            ->toArray();

        // ─── RECENT RESCUE CASES ─────────────────────────────────
        $recentRescueCases = RescueCase::with('rescuer:id,name')
            ->orderByDesc('created_at')
            ->take(5)
            ->get(['id', 'case_number', 'animal_type', 'status', 'rescuer_id', 'created_at'])
            ->toArray();

        // ─── DONATION SPARKLINE (last 7 days) ────────────────────
        $donationSparkline = [];
        for ($i = 6; $i >= 0; $i--) {
            $day = $now->copy()->subDays($i);
            $donationSparkline[] = (float) Donation::where('status', 'captured')
                ->whereDate('created_at', $day->toDateString())
                ->sum('amount');
        }

        // ─── RESCUE SPARKLINE (last 7 days) ─────────────────────
        $rescueSparkline = [];
        for ($i = 6; $i >= 0; $i--) {
            $day = $now->copy()->subDays($i);
            $rescueSparkline[] = (int) RescueCase::whereDate('created_at', $day->toDateString())->count();
        }

        return response()->json([
            'overview' => [
                'totalDonationAmount'  => $totalDonationAmount,
                'totalDonationCount'   => $totalDonationCount,
                'thisMonthDonations'   => $thisMonthDonations,
                'donationTrend'        => $donationTrend,
                'donationSparkline'    => $donationSparkline,

                'totalRescueCases'     => $totalRescueCases,
                'resolvedCases'        => $resolvedCases,
                'inProgressCases'      => $inProgressCases,
                'resolutionRate'       => $resolutionRate,
                'rescueSparkline'      => $rescueSparkline,

                'activeCampaigns'      => $activeCampaigns,
                'totalCampaigns'       => $totalCampaigns,
                'totalGoalAmount'      => $totalGoalAmount,
                'totalRaisedAmount'    => $totalRaisedAmount,
                'campaignFundingPct'   => $campaignFundingPct,

                'totalVolunteers'      => $totalVolunteers,
                'approvedVolunteers'   => $approvedVolunteers,
                'pendingVolunteers'    => $pendingVolunteers,

                'totalUsers'           => $totalUsers,
                'totalAnimalReports'   => $totalAnimalReports,
                'pendingReports'       => $pendingReports,
                'totalBlogs'           => $totalBlogs,
                'publishedBlogs'       => $publishedBlogs,
                'totalContacts'        => $totalContacts,
                'pendingContacts'      => $pendingContacts,
                'activeSubscriptions'  => $activeSubscriptions,
            ],
            'trends' => [
                'labels'              => $monthLabels,
                'monthlyDonations'    => $monthlyDonations,
                'monthlyRescueCases'  => $monthlyRescueCases,
                'monthlyVolunteers'   => $monthlyVolunteers,
            ],
            'distributions' => [
                'rescueStatus'        => $rescueStatusDistribution,
                'paymentMethods'      => $paymentMethodBreakdown,
                'donationsByPlan'     => $donationsByPlan,
                'donationsByCampaign' => $donationsByCampaign,
            ],
            'topCampaigns'   => $topCampaigns,
            'recentDonations'  => $recentDonations,
            'recentRescueCases' => $recentRescueCases,
        ]);
    }
}
