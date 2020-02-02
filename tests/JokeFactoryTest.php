<?php

namespace Rkukuh\OneLineJokes\Tests;

use PHPUnit\Framework\TestCase;
use Rkukuh\OneLineJokes\JokeFactory;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_predefined_joke()
    {
        $jokes = new JokeFactory();

        $joke = $jokes->getRandomJoke();

        $this->assertContains($joke, [
            'I ate a clock yesterday, it was very time-consuming.',
            'A fire hydrant has H-2-O on the inside and K-9-P on the outside.',
        ]);
    }

    /** @test */
    // public function it_returns_random_joke()
    // {
    //     $jokes = new JokeFactory([
    //         'This is a joke',
    //         'This is also a joke',
    //     ]);

    //     $joke = $jokes->getRandomJoke();

    //     $this->assertContains($joke, [
    //         'This is a joke',
    //         'This is also a joke',
    //     ]);
    // }
}
