<?php

namespace Rkukuh\OneLineJokes;

use GuzzleHttp\Client;

class JokeFactory
{
    const API_ENDPOINT = 'http://api.icndb.com/jokes/random';

    private $client;

    public function __construct(Client $client = null)
    {
        $this->client = $client ?: new Client();
    }

    public function getRandomJoke()
    {
        $response = $this->client->get(self::API_ENDPOINT);

        $contents = json_decode($response->getBody()->getContents());

        return $contents->value->joke;
    }
}
