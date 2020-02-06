<?php

namespace Rkukuh\OneLineJokes\Http\Controllers;

use Rkukuh\OneLineJokes\Facades\OneLineJokes;

class OneLineJokesController
{
    public function __invoke()
    {
        return view('one-line-jokes::joke', [
            'joke' => OneLineJokes::getRandomJoke()
        ]);
    }
}