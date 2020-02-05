<?php

namespace Rkukuh\OneLineJokes;

use Illuminate\Support\ServiceProvider;
use Rkukuh\OneLineJokes\Console\OneLineJokes;

class OneLineJokesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                OneLineJokes::class,
            ]);
        }
    }

    public function register()
    {
        $this->app->bind('one-line-jokes', function () {
            return new JokeFactory();
        });
    }
}
