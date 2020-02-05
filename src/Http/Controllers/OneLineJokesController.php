<?php

namespace Rkukuh\OneLineJokes\Http\Controllers;

use Rkukuh\OneLineJokes\Facades\OneLineJokes;

class OneLineJokesController
{
    public function __invoke()
    {
        return OneLineJokes::getRandomJoke();
    }
}