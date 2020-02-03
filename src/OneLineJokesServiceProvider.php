<?php

namespace Rkukuh\OneLineJokes;

use Illuminate\Support\ServiceProvider;
use Rkukuh\OneLineJokes\Console\OneLineJokesCommand;

class OneLineJokesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                OneLineJokesCommand::class,
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
