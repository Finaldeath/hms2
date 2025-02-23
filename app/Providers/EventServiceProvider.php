<?php

namespace App\Providers;

use App\Listeners\PrintLabelSubscriber;
use App\Listeners\RoleUpdateDiscordUpdater;
use App\Listeners\RoleUpdateLogger;
use App\Listeners\Tools\NotifyNhToolsSubscriber;
use App\Listeners\ViMbAdminSubscriber;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        ViMbAdminSubscriber::class,
        RoleUpdateLogger::class,
        PrintLabelSubscriber::class,
        NotifyNhToolsSubscriber::class,
        RoleUpdateDiscordUpdater::class,
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return true;
    }
}
