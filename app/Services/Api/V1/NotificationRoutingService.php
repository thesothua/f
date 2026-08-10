<?php

namespace App\Services\Api\V1;

use App\Models\Role;
use App\Settings\NotificationSettings;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class NotificationRoutingService
{
    /**
     * Get default routing configuration matrix for system notification events.
     */
    public static function getDefaultRouting(): array
    {
        return [
            'new_donation' => [
                'event_key' => 'new_donation',
                'title' => 'New Donation Received',
                'description' => 'Alert sent whenever a donor completes a financial contribution.',
                'enabled' => true,
                'roles' => ['Super Admin', 'Admin'],
                'custom_emails' => '',
            ],
            'campaign_goal' => [
                'event_key' => 'campaign_goal',
                'title' => 'Campaign Goal Reached',
                'description' => 'Alert sent when a fundraising campaign hits 100% of its target goal.',
                'enabled' => true,
                'roles' => ['Super Admin', 'Admin'],
                'custom_emails' => '',
            ],
            'animal_report' => [
                'event_key' => 'animal_report',
                'title' => 'New Animal Rescue Report',
                'description' => 'Alert sent when a citizen reports an injured or stray animal.',
                'enabled' => true,
                'roles' => ['Super Admin', 'Admin'],
                'custom_emails' => '',
            ],
            'volunteer_registered' => [
                'event_key' => 'volunteer_registered',
                'title' => 'New Volunteer Application',
                'description' => 'Alert sent when a new volunteer application is submitted.',
                'enabled' => true,
                'roles' => ['Super Admin', 'Admin'],
                'custom_emails' => '',
            ],
            'contact_inquiry' => [
                'event_key' => 'contact_inquiry',
                'title' => 'New Contact Form Inquiry',
                'description' => 'Alert sent when a public message is submitted via the Contact form.',
                'enabled' => true,
                'roles' => ['Super Admin', 'Admin'],
                'custom_emails' => '',
            ],
        ];
    }

    /**
     * Get active notification routing matrix merged with defaults.
     */
    public static function getRoutingSettings(): array
    {
        try {
            $settings = app(NotificationSettings::class);
            if (!empty($settings->routing) && is_array($settings->routing)) {
                $defaults = self::getDefaultRouting();
                foreach ($defaults as $key => $defaultData) {
                    if (isset($settings->routing[$key]) && is_array($settings->routing[$key])) {
                        $defaults[$key] = array_merge($defaultData, $settings->routing[$key]);
                    }
                }
                return $defaults;
            }
        } catch (\Throwable $e) {
            Log::warning('NotificationSettings read warning: ' . $e->getMessage());
        }

        return self::getDefaultRouting();
    }

    /**
     * Dispatch notification to configured roles and custom emails for an event type.
     */
    public static function send(string $eventKey, $notification): void
    {
        try {
            $routing = self::getRoutingSettings();
            $eventConfig = $routing[$eventKey] ?? null;

            if (!$eventConfig || empty($eventConfig['enabled'])) {
                // Event notification is disabled globally
                return;
            }

            $recipients = collect();

            // 1. Target Team Roles (excluding volunteer roles)
            $roleNames = $eventConfig['roles'] ?? [];
            if (!empty($roleNames) && is_array($roleNames)) {
                $roles = Role::whereIn('name', $roleNames)
                    ->where(function ($q) {
                        $q->where('is_volunteer', false)->orWhereNull('is_volunteer');
                    })
                    ->where('name', '!=', 'Visitor')
                    ->with('users')
                    ->get();

                foreach ($roles as $role) {
                    if ($role->users->isNotEmpty()) {
                        foreach ($role->users as $user) {
                            $recipients->push($user);
                        }
                    } else {
                        // Fallback to role model if no users assigned yet
                        $recipients->push($role);
                    }
                }
            }

            // 2. Custom Email Recipients
            $customEmailsRaw = $eventConfig['custom_emails'] ?? '';
            if (!empty($customEmailsRaw)) {
                $emails = array_filter(array_map('trim', explode(',', $customEmailsRaw)));
                foreach ($emails as $email) {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $recipients->push((new AnonymousNotifiable)->route('mail', $email));
                    }
                }
            }

            if ($recipients->isNotEmpty()) {
                Notification::send($recipients, $notification);
            }
        } catch (\Throwable $e) {
            Log::error("Failed to send notification for event [{$eventKey}]: " . $e->getMessage());
        }
    }
}
