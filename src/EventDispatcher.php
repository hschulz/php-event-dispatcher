<?php

declare(strict_types=1);

namespace Hschulz\Dispatcher;

use Hschulz\Dispatcher\AbstractEventDispatcher;
use Hschulz\Dispatcher\EventInterface;
use RuntimeException;

/**
 * Event dispatcher class.
 */
class EventDispatcher extends AbstractEventDispatcher
{
    /**
     * Dispatches the provided event.
     *
     * @throws RuntimeException If the event listener returns something else than an event
     * @param EventInterface $event The event to dispatch
     * @return EventInterface The dispatched event
     */
    public function dispatch(EventInterface $event): EventInterface
    {
        /*
         * Clone the event to prevent modification
         * and return the modified event later.
         */
        $temp = clone $event;

        $listeners = $this->listenerProvider->getListenersForEvent($event);

        foreach ($listeners as $listener) {
            $result = call_user_func($listener, $temp);

            /* In case the event listener doesn't return the event */
            if ($result === null) {
                continue;
            }

            /* In case the event listener returns something else */
            if (!($result instanceof EventInterface)) {
                throw new RuntimeException('Event listener must return an instance of ' . EventInterface::class);
            }

            /* The event propagation was stopped */
            if ($result->isPropagationStopped()) {
                $temp = $result;
                break;
            }
        }

        return $temp;
    }
}
