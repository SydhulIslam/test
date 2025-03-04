<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\User;
use App\Policies\BlogPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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


        // Gate::define('update-blog', function (User $user, Blog $blog) {
        //     return $user->id === $blog->user_id;
        // });

        Gate::define("update-blog", [BlogPolicy::class, 'update']);
    }
}
