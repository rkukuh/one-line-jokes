# One Line Jokes

A library to laugh at.

## Installation

Require the package using [composer](https://getcomposer.org/download/)

```bash
composer require rkukuh/one-line-jokes
```

## Usage

```php
use Rkukuh\OneLineJokes\JokeFactory;

$jokes = new JokeFactory();

$joke = $jokes->getRandomJoke();
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](./LICENSE.md)
