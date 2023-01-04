<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\Comment;


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

        Gate::define('delete-comment', function (User $user, Comment $comment) {
            return $user->hasRole('admin') || $user->id === $comment->user_id;
        });

        Gate::define('edit-comment', function (User $user, Comment $comment) {
            return $user->id === $comment->user_id;
        });         
        
        Gate::define('delete-post', function ($user, $post) {
            // check if the user is an admin or the owner of the comment
            return $user->hasRole('admin') || $user->id == $post->user_id;
        });
        //
    }
}
