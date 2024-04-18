<?php

declare(strict_types=1);

namespace Hschulz\Dispatcher;

use Hschulz\Dispatcher\Event;
use Psr\EventDispatcher\ListenerProviderInterface as PsrListenerProviderInterface;

/**
 * Interface for listener providers.
 */
interface ListenerProviderInterface extends PsrListenerProviderInterface
{
    /**
     * Returns an iterable of listeners for the provided event.
     *
     * @param Event $event The event to get listeners for
     * @return iterable The listeners for the provided event
     */
    public function getListenersForEvent(Event $event): iterable;
}
