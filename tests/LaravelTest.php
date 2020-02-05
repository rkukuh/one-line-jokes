<?php

namespace Rkukuh\OneLineJokes\Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Artisan;
use Rkukuh\OneLineJokes\Facades\OneLineJokes;
use Rkukuh\OneLineJokes\Console\OneLineJokesCommand;
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
            'OneLineJokes' => OneLineJokesCommand::class,
        ];
    }

    /** @test */
    public function the_console_command_returns_a_joke()
    {
        $this->withoutMockingConsoleOutput();

        OneLineJokes::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn('some joke');

        $this->artisan('one-line-jokes');

        $output = Artisan::output();

        $this->assertSame('some joke'.PHP_EOL, $output);
    }
}