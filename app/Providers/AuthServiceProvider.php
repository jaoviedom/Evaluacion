<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('administrador', function($user) {
            return $user->hasRol('Administrador');
        });

        Gate::define('gestor', function($user) {
            return $user->hasRol('Gestor');
        });

        Gate::define('evaluador', function($user) {
            return $user->hasRol('Evaluador');
        });
    }
}
