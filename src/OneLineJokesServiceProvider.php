<?php

namespace Rkukuh\OneLineJokes;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Rkukuh\OneLineJokes\Console\OneLineJokes;
use Rkukuh\OneLineJokes\Http\Controllers\OneLineJokesController;

class OneLineJokesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                OneLineJokes::class,
            ]);
        }

        Route::get('/joke', OneLineJokesController::class);
    }

    public function register()
    {
        $this->app->bind('one-line-jokes', function () {
            return new JokeFactory();
        });
    }
}
