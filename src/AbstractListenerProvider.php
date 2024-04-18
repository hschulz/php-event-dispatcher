<?php

declare(strict_types=1);

namespace Hschulz\Dispatcher;

use Hschulz\Dispatcher\EventInterface;
use Hschulz\Dispatcher\ListenerProviderInterface;

/**
 * Abstract listener provider class.
 * This class provides a basic implementation of the ListenerProviderInterface.
 */
abstract class AbstractListenerProvider implements ListenerProviderInterface
{
    /**
     * Creates a new listener provider.
     */
    public function __construct() {}

    /**
     * Returns an iterable of listeners for the provided event.
     *
     * @param EventInterface $event The event to get listeners for
     * @return iterable The listeners for the provided event
     */
    public abstract function getListenersForEvent(EventInterface $event): iterable;
}
