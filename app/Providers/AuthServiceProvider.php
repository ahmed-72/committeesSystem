<?php

namespace App\Providers;

use App\Models\User;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::before(function (User $user, $abilities) {
            if ($user->type == 'super-admin')
                return true;
        });

        foreach (config('abilities') as $key => $value) {
            Gate::define($key, function (User $user) use ($key) {
                foreach ($user->roles as $role) {
                    if (in_array($key, $role->abilities))
                        return true;
                }
                return false;
            });
        }
    }
}
