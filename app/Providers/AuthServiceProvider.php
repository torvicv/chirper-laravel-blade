<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Member;
use App\Models\Post;
use App\Models\User;
use App\Policies\MemberPolicy;
use App\Policies\PostPolicy;
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
        'App\Models\Member' => 'App\Policies\MemberPolicy',
        'App\Models\Post' => 'App\Policies\PostPolicy',
        'App\Models\User' => 'App\Policies\UserPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        // los gates son necesarios para la barra de navegación
        Gate::define('view-members', function (User $user) {
            return $user->permisos->where('pizarra', 'members')->first()->ver;
        });
        Gate::define('view-posts', function (User $user) {
            return $user->permisos->where('pizarra', 'posts')->first()->ver;
        });
        Gate::define('view-users', function (User $user) {
            return $user->permisos->where('pizarra', 'users')->first()->ver;
        });
    }
}
