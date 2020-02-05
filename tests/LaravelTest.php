<?php

namespace Rkukuh\OneLineJokes\Tests;

use Illuminate\Support\Facades\Artisan;
use Orchestra\Testbench\TestCase;
use Rkukuh\OneLineJokes\Console\OneLineJokes;
use Rkukuh\OneLineJokes\Facades\OneLineJokes as OneLineJokesFacade;
use Rkukuh\OneLineJokes\OneLineJokesServiceProvider;

class LaravelTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            OneLineJokesServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'OneLineJokes' => OneLineJokes::class,
        ];
    }

    /** @test */
    public function the_console_command_returns_a_joke()
    {
        $this->withoutMockingConsoleOutput();

        OneLineJokesFacade::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn('some joke');

        $this->artisan('one-line-jokes');

        $output = Artisan::output();

        $this->assertSame('some joke'.PHP_EOL, $output);
    }

    /** @test */
    public function the_route_can_be_accessed()
    {
        $this->get('/joke')
            -> assertStatus(200);
    }
}