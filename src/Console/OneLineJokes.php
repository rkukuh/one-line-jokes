<?php

namespace Rkukuh\OneLineJokes\Console;

use Illuminate\Console\Command;
use Rkukuh\OneLineJokes\Facades\OneLineJokes as OneLineJokesFacade;

class OneLineJokes extends Command
{
    protected $signature = 'one-line-jokes';
    protected $description = 'A library to laugh at.';

    public function handle()
    {
        $this->info(OneLineJokesFacade::getRandomJoke());
    }
}
