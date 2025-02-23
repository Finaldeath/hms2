<?php

namespace App\Providers;

use Doctrine\ORM\EntityManagerInterface;
use HMS\Auth\HmsUserProvider;
use HMS\Auth\PasswordStore;
use HMS\Entities\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(EntityManagerInterface $em, PasswordStore $passwordStore)
    {
        $this->registerPolicies();

        Auth::provider('hms', function ($app, array $config) use ($em, $passwordStore) {
            return new HmsUserProvider($app['hash'], $em, $config['model'], $passwordStore);
        });

        // Passport bits.
        Passport::routes();
        Passport::cookie(Str::slug(config('app.name'), '_') . '_passport');
        Passport::tokensExpireIn(
            now()->addDays(config('hms.passport_token_expire_days', 15))
        );
        Passport::refreshTokensExpireIn(
            now()->addDays(config('hms.passport_refresh_token_expire_days', 30))
        );
        Passport::personalAccessTokensExpireIn(
            now()->addDays(config('hms.passport_personal_access_token_expire_days', 20))
        );

        if (! $this->app->environment('local')) {
            Gate::define('viewLogViewer', function (?User $user) {
                return $user?->can('logViewer.view') ?? false;
            });
        }
    }
}
