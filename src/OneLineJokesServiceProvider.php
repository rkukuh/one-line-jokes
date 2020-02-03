<?php

namespace Rkukuh\OneLineJokes;

use Illuminate\Support\ServiceProvider;

class OneLineJokesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->bind('one-line-joke', function () {
            return new JokeFactory();
        });
    }
}
