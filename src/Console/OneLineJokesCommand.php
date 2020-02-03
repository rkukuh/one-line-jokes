<?php

namespace Rkukuh\OneLineJokes\Console;

use Illuminate\Console\Command;
use Rkukuh\OneLineJokes\Facades\OneLineJokes;

class OneLineJokesCommand extends Command
{
    protected $signature = 'one-line-jokes';
    protected $description = 'A library to laugh at.';

    public function handle()
    {
        $this->info(OneLineJokes::getRandomJoke());
    }
}
