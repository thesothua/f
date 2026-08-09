<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;
use App\Services\Api\V1\NotificationRoutingService;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('notification.routing', NotificationRoutingService::getDefaultRouting());
    }
};
