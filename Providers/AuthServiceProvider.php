<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Admin;
use App\Models\RoleList;
use App\Models\SuperAdmin;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        Gate::guessPolicyNamesUsing(function ($modelClass) {

            return 'App\\Policies\\' . class_basename($modelClass) . 'Policy';
        });

        Gate::before(function ($user) {
            if ($user->is_super_admin) {
                return true;
            }
        });
    }
}
