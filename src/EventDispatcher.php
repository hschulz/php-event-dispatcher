<?php

declare(strict_types=1);

namespace Hschulz\Dispatcher;

use Hschulz\Dispatcher\AbstractEventDispatcher;
use Hschulz\Dispatcher\EventInterface;

/**
 * Event dispatcher class.
 */
class EventDispatcher extends AbstractEventDispatcher
{
    /**
     * Dispatches the provided event.
     *
     * @param EventInterface $event The event to dispatch
     * @return EventInterface The dispatched event
     */
    public function dispatch(EventInterface $event): EventInterface {

        /*
         * Clone the event to prevent modification
         * and return the modified event later.
         */
        $temp = clone $event;

        $listeners = $this->listenerProvider->getListenersForEvent($event);

        foreach ($listeners as $listener) {
            $temp = call_user_func($listener, $temp);

            if ($temp->isPropagationStopped()) {
                break;
            }
        }

        return $temp;
    }
}
