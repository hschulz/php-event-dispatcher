PHP Event Dispatcher
===

An implementation of the PSR-14 Event Dispatcher Interface.

## Installation

```bash
composer require hschulz/php-event-dispatcher
```

## Usage

```php
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Hschulz\EventDispatcher\EventDispatcher;

$dispatcher = new EventDispatcher();

$dispatcher->addListener('event.name', function ($event) {
    echo 'Event triggered: ' . $event->getName() . PHP_EOL;
});

$dispatcher->dispatch('event.name');
```

## License

This project is released under the [MIT](LICENSE) license.
