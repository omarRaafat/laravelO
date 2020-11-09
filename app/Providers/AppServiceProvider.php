<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Set;
use App\Contact;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
//        $this->registerPolicies();
//        $this->registerPostPolicies();
//        $this->registerPolicies();
//
//        Gate::define('access-laravel-info', function ($user) {
//            return $user->isAdmin;
//        });
    }

    public function registerPostPolicies()
    {
        Gate::define('create-post', function ($user) {
            return $user->hasAccess(['create-post']);
        });
        Gate::define('update-post', function ($user, Post $post) {
            return $user->hasAccess(['update-post']) or $user->id == $post->user_id;
        });
        Gate::define('publish-post', function ($user) {
            return $user->hasAccess(['publish-post']);
        });
        Gate::define('see-all-drafts', function ($user) {
            return $user->inRole('editor');
        });
    }
}
