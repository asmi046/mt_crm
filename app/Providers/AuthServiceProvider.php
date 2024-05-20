<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('see_stat', function (User $user) {
            return ($user->role === "admin") || ($user->role === "worker");
        });

        Gate::define('see_stat_finance', function (User $user) {
            return $user->role === "admin";
        });

        Gate::define('see_log', function (User $user) {
            return $user->role === "admin";
        });

        Gate::define('get_all_orders', function (User $user) {
            return ($user->role === "admin") || ($user->role === "worker");
        });

        Gate::define('chenge_user', function (User $user) {
            return ($user->role === "admin") || ($user->role === "worker");
        });
    }
}
