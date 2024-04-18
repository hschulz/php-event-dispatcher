<?php

declare(strict_types=1);

namespace Hschulz\Dispatcher;

use Hschulz\Dispatcher\ListenerProviderInterface;

/**
 * Trait for using and providing a listener provider.
 */
trait ListenerProviderTrait
{
    /**
     * The listener provider.
     * @var ListenerProviderInterface
     */
    protected ListenerProviderInterface $listenerProvider;

    /**
     * Returns the listener provider.
     *
     * @return ListenerProviderInterface The listener provider
     */
    public function getListenerProvider(): ListenerProviderInterface {
        return $this->listenerProvider;
    }

    /**
     * Sets the listener provider.
     *
     * @param ListenerProviderInterface $listenerProvider The listener provider
     * @return void
     */
    public function setListenerProvider(ListenerProviderInterface $listenerProvider): void {
        $this->listenerProvider = $listenerProvider;
    }
}
