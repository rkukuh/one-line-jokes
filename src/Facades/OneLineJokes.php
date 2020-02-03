<?php

namespace Rkukuh\OneLineJokes\Facades;

use Illuminate\Support\Facades\Facade;

class OneLineJokes extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'one-line-joke';
    }
}
