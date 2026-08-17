<?php

namespace App\Services\Api\V1;

use App\Models\AutoFeeder;
use Illuminate\Support\Facades\Log;

class AutoFeederService
{
    /**
     * Get list of active auto feeders for public website visitors.
     */
    public function getPublicFeeders()
    {
        return AutoFeeder::where('status', 'active')
            ->orderByDesc('created_at')
            ->get();
    }

    /**
     * Get list of auto feeders for admin with search & status filters.
     */
    public function getAllAdminFeeders(array $params = [])
    {
        $query = AutoFeeder::query();

        if (!empty($params['search'])) {
            $search = $params['search'];
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%")
                  ->orWhere('sponsor_name', 'like', "%{$search}%");
            });
        }

        if (!empty($params['status'])) {
            $query->where('status', $params['status']);
        }

        $sortBy = $params['sortBy'] ?? 'created_at';
        $order = strtolower($params['order'] ?? 'desc') === 'asc' ? 'asc' : 'desc';
        $query->orderBy($sortBy, $order);

        if (!empty($params['page']) && !empty($params['limit'])) {
            return $query->with('activities.causer')->paginate((int) $params['limit']);
        }

        return $query->with('activities.causer')->get();
    }

    /**
     * Get a single auto feeder station by ID.
     */
    public function getFeederById($id)
    {
        return AutoFeeder::with('activities.causer')->find($id);
    }

    /**
     * Create a new auto feeder station.
     */
    public function createFeeder(array $data)
    {
        if (empty($data['google_map_url'])) {
            if (!empty($data['latitude']) && !empty($data['longitude'])) {
                $data['google_map_url'] = "https://www.google.com/maps/search/?api=1&query={$data['latitude']},{$data['longitude']}";
            } else if (!empty($data['address'])) {
                $data['google_map_url'] = "https://www.google.com/maps/search/?api=1&query=" . urlencode($data['address']);
            }
        }

        $feeder = AutoFeeder::create($data);

        return $feeder->fresh(['activities.causer']);
    }

    /**
     * Update an existing auto feeder station.
     */
    public function updateFeeder($id, array $data)
    {
        $feeder = AutoFeeder::find($id);
        if (!$feeder) {
            return null;
        }

        if (empty($data['google_map_url'])) {
            $lat = $data['latitude'] ?? $feeder->latitude;
            $lng = $data['longitude'] ?? $feeder->longitude;
            $addr = $data['address'] ?? $feeder->address;

            if ($lat && $lng) {
                $data['google_map_url'] = "https://www.google.com/maps/search/?api=1&query={$lat},{$lng}";
            } else if ($addr) {
                $data['google_map_url'] = "https://www.google.com/maps/search/?api=1&query=" . urlencode($addr);
            }
        }

        $feeder->update($data);

        return $feeder->fresh(['activities.causer']);
    }

    /**
     * Delete an auto feeder station.
     */
    public function deleteFeeder($id)
    {
        $feeder = AutoFeeder::find($id);
        if (!$feeder) {
            return false;
        }

        $feeder->delete();
        return true;
    }

    /**
     * Record donation sponsorship for an auto feeder station.
     * Creates a new station automatically if new_feeder_name and new_feeder_address are provided.
     */
    public function recordSponsorshipDonation($autoFeederIdOrDonation, float $amount = 0, ?string $donorName = null, ?string $donorEmail = null, $user = null, bool $anonymous = false)
    {
        $donation = null;
        if ($autoFeederIdOrDonation instanceof \App\Models\Donation) {
            $donation = $autoFeederIdOrDonation;
            $autoFeederId = $donation->auto_feeder_id;
            $amount = (float) $donation->amount;
            $donorName = $donation->donor_name;
            $donorEmail = $donation->donor_email;
            $user = $donation->user ?? null;
            $anonymous = (bool) $donation->anonymous;
        } else {
            $autoFeederId = $autoFeederIdOrDonation;
        }

        $displayName = $anonymous ? 'Generous Guardian' : ($donorName ?: 'Generous Donor');

        // Automatically create new station if donor sponsored a new installation
        if (!$autoFeederId && $donation && !empty($donation->new_feeder_name) && !empty($donation->new_feeder_address)) {
            $newFeeder = $this->createFeeder([
                'name' => $donation->new_feeder_name,
                'address' => $donation->new_feeder_address,
                'sponsor_name' => $displayName,
                'status' => 'active',
                'installed_date' => now()->toDateString(),
                'capacity_kg' => '15',
                'raised_amount' => 0,
            ]);

            if ($newFeeder) {
                $autoFeederId = $newFeeder->id;
                $donation->update(['auto_feeder_id' => $autoFeederId]);
            }
        }

        if (!$autoFeederId) {
            return null;
        }

        $autoFeeder = AutoFeeder::find($autoFeederId);
        if (!$autoFeeder) {
            return null;
        }

        $autoFeeder->increment('raised_amount', $amount);

        $days = max(1, (int) round(($amount / 2000) * 7));

        activity('auto_feeders')
            ->performedOn($autoFeeder)
            ->causedBy($user)
            ->withProperties([
                'donor_name' => $displayName,
                'donor_email' => $donorEmail,
                'amount' => $amount,
                'sponsorship_days' => $days,
            ])
            ->log("Station sponsored for {$days} days with ₹" . number_format($amount) . " by {$displayName}");

        return $autoFeeder->fresh();
    }
}
