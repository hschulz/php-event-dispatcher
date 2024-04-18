<?php

declare(strict_types=1);

namespace Hschulz\Dispatcher;

use Hschulz\Dispatcher\AbstractListenerProvider;
use Hschulz\Dispatcher\EventInterface;

/**
 * Listener provider class.
 */
class ListenerProvider extends AbstractListenerProvider
{
    /**
     * The listeners array.
     */
    protected $listeners = [];

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->listeners = [];
    }

    /**
     * Adds a listener to the listener array.
     *
     * @param string $eventName The name of the event
     * @param callable $listener The listener to add
     * @return string The id of the listener
     */
    public function addListener(string $eventName, callable $listener): string
    {
        $id = uniqid('listener_');

        $this->listeners[$eventName][$id] = $listener;

        return $id;
    }

    /**
     * Removes a listener from the listener array.
     *
     * @param string $eventName The name of the event
     * @param string $listenerId The id of the listener
     * @return void
     */
    public function removeListener(string $eventName, string $listenerId): void
    {
        if (isset($this->listeners[$eventName][$listenerId])) {
            unset($this->listeners[$eventName][$listenerId]);
        }
    }

    /**
     * Returns all listeners for a given event.
     *
     * @param EventInterface $event The event to get listeners for
     * @return array The listeners for the given event
     */
    public function getListenersForEvent(EventInterface $event): array
    {
        $name = $event->getName();

        if (!isset($this->listeners[$name])) {
            return [];
        }

        $callables = [];

        foreach ($this->listeners[$name] as $id => $listener) {
            if (!is_callable($listener)) {
                unset($this->listeners[$name][$id]);
                continue;
            }

            $callables[] = $listener;
        }

        return $callables;
    }
}
