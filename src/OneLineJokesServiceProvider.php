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

        Route::get(config('one-line-jokes.route'), OneLineJokesController::class);

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'one-line-jokes');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/one-line-jokes'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../config/one-line-jokes.php' => base_path('config/one-line-jokes.php'),
        ], 'config');

        if (! class_exists('CreateJokesTable')) { // FIXME: Didn't works as expected
            $this->publishes([
                __DIR__.'/../database/migrations/create_jokes_table.php' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_jokes_table.php'),
            ], 'migrations');
        }
    }

    public function register()
    {
        $this->app->bind('one-line-jokes', function () {
            return new JokeFactory();
        });

        $this->mergeConfigFrom(__DIR__.'/../config/one-line-jokes.php', 'one-line-jokes');
    }
}
