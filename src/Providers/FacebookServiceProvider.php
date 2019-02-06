<?php

namespace App\Providers;

use Facebook\Facebook;
use Illuminate\Support\ServiceProvider;


class FacebookServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {

    }

    public function register()
    {
        $config = [
            'app_id' => env('FACEBOOK_APP_ID', ''),
            'app_secret' => env('FACEBOOK_APP_SECRET',''),
            'default_access_token' => env('FACEBOOK_USER_TOKEN',''),
            'default_graph_version' => env('FACEBOOK_DEFAULT_GRAPH_VERSION', '')
        ];

        $this->app->singleton(Facebook::class, function () {
           return new Facebook($config);
        });
    }
}
