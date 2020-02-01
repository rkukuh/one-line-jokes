<?php

namespace Rkukuh\OneLineJokes;

class JokeFactory
{
    private $_jokes = [
        'I ate a clock yesterday, it was very time-consuming.',
        'A fire hydrant has H-2-O on the inside and K-9-P on the outside.',
    ];

    public function __construct(array $jokes = null)
    {
        if ($jokes) {
            $this->_jokes = $jokes;
        }
    }

    public function getRandomJoke()
    {
        $randomJoke = $this->_jokes[array_rand($this->_jokes)];

        return $randomJoke;
    }
}