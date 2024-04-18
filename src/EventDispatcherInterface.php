<?php

declare(strict_types=1);

namespace Hschulz\Dispatcher;

use Hschulz\Dispatcher\EventInterface;
use Hschulz\Dispatcher\ListenerProviderInterface;

/**
 * Interface for the event dispatcher.
 */
interface EventDispatcherInterface
{
    /**
     * Returns the listener provider.
     *
     * @return ListenerProviderInterface The listener provider
     */
    public function getListenerProvider(): ListenerProviderInterface;

    /**
     * Sets the listener provider.
     *
     * @param ListenerProviderInterface $listenerProvider The listener provider
     * @return void
     */
    public function setListenerProvider(ListenerProviderInterface $listenerProvider): void;

    /**
     * Dispatches the provided event.
     *
     * @param EventInterface $event The event to dispatch
     * @return EventInterface The dispatched and possibly modified event
     */
    public function dispatch(EventInterface $event): EventInterface;
}
