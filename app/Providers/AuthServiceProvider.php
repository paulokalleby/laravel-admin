<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        //
    ];

    public function boot(): void
    {
        //$this->registerPolicies();

        Gate::before( function (User $user, $permission) {
            if ( $user->permissions()->contains($permission) || $user->owner ) {
                return true;
            }
        });
    }
}
