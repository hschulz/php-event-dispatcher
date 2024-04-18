<?php

declare(strict_types=1);

namespace Hschulz\Dispatcher;

use Hschulz\Dispatcher\Event;
use Hschulz\Dispatcher\ListenerProviderInterface;
use Psr\EventDispatcher\EventDispatcherInterface as PsrEventDispatcherInterface;

/**
 * Interface for the event dispatcher.
 */
interface EventDispatcherInterface extends PsrEventDispatcherInterface
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
     * @param Event $event The event to dispatch
     * @return Event The dispatched and possibly modified event
     */
    public function dispatch(Event $event): Event;
}
