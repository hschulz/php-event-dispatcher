<?php

declare(strict_types=1);

namespace Hschulz\Dispatcher;

use Hschulz\Dispatcher\EventInterface;
use Hschulz\Dispatcher\EventDispatcherInterface;
use Hschulz\Dispatcher\ListenerProvider;
use Hschulz\Dispatcher\ListenerProviderInterface;
use Hschulz\Dispatcher\ListenerProviderTrait;

/**
 * Abstract event dispatcher class.
 */
abstract class AbstractEventDispatcher implements EventDispatcherInterface
{
    use ListenerProviderTrait;

    /**
     * Creates a new event dispatcher with an optional listener provider.
     * If no listener provider is provided a new one will be created.
     *
     * @param ListenerProviderInterface|null $listenerProvider The listener provider
     */
    public function __construct(?ListenerProviderInterface $listenerProvider = null) {
        $this->listenerProvider = $listenerProvider ?? new ListenerProvider();
    }

    /**
     * The dispatch method is used to dispatch an event.
     * The event is passed to all listeners and can be modified by them.
     * The modified event is then returned.
     *
     * @param EventInterface $event The event to dispatch
     * @return EventInterface The dispatched event , possibly modified
     */
    public abstract function dispatch(EventInterface $event): EventInterface;
}
