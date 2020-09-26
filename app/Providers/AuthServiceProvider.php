<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Thread' => 'App\Policies\ThreadPolicy',
        'App\Reply' => 'App\Policies\ReplyPolicy',
        'App\User' => 'App\Policies\UserPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}