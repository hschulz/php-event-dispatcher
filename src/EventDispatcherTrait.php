<?php

declare(strict_types=1);

namespace Hschulz\Dispatcher;

use Hschulz\Dispatcher\EventDispatcherInterface;

/**
 * Trait for the event dispatcher.
 */
trait EventDispatcherTrait
{
    /**
     * The event dispatcher.
     *
     * @return EventDispatcherInterface|null The event dispatcher
     */
    protected ?EventDispatcherInterface $dispatcher = null;

    /**
     * Returns the event dispatcher.
     *
     * @return EventDispatcherInterface|null The event dispatcher
     */
    public function getEventDispatcher(): ?EventDispatcherInterface
    {
        return $this->dispatcher;
    }

    /**
     * Sets the event dispatcher.
     *
     * @param EventDispatcherInterface $dispatcher The event dispatcher
     * @return void
     */
    public function setEventDispatcher(EventDispatcherInterface $dispatcher): void
    {
        $this->dispatcher = $dispatcher;
    }
}
