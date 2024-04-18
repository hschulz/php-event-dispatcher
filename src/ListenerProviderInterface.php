<?php

declare(strict_types=1);

namespace Hschulz\Dispatcher;

use Hschulz\Dispatcher\EventInterface;

/**
 * Interface for listener providers.
 */
interface ListenerProviderInterface
{
    /**
     * Returns an iterable of listeners for the provided event.
     *
     * @param Event $event The event to get listeners for
     * @return iterable The listeners for the provided event
     */
    public function getListenersForEvent(EventInterface $event): iterable;
}
