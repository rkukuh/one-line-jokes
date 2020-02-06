<?php

namespace Rkukuh\OneLineJokes\Tests;

use Orchestra\Testbench\TestCase;
use Rkukuh\OneLineJokes\Models\Joke;
use Illuminate\Support\Facades\Artisan;
use Rkukuh\OneLineJokes\Console\OneLineJokes;
use Rkukuh\OneLineJokes\OneLineJokesServiceProvider;
use Rkukuh\OneLineJokes\Facades\OneLineJokes as OneLineJokesFacade;

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

    protected function getEnvironmentSetUp($app)
    {
        include_once(__DIR__.'/../database/migrations/create_jokes_table.php');

        (new \CreateJokesTable)->up();
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
        OneLineJokesFacade::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn('some joke');

        $this->get('/joke')
            -> assertStatus(200)
            ->assertViewIs('one-line-jokes::joke')
            ->assertViewHas('joke', 'some joke');
    }

    /** @test */
    public function it_can_access_jokes_table()
    {
        $joke = new Joke();
        $joke->body = 'This is a new joke';
        $joke->save();

        $jokeFound = Joke::find($joke->id);

        $this->assertSame($jokeFound->body, 'This is a new joke');
    }
}