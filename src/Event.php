<?php

declare(strict_types=1);

namespace Hschulz\Dispatcher;

use Serializable;

/**
 * Interface for events.
 */
interface Event extends Serializable
{
    /**
     * Get the event name.
     *
     * @return string The event name
     */
    public function getName(): string;

    /**
     * Set the event name.
     *
     * @param  string $name The event name
     * @return void
     */
    public function setName(string $name): void;

    /**
     * Get a single parameter by name.
     *
     * @param  string $name The requiested parameter name
     * @return mixed The requested parameter value
     */
    public function getParam(string $name);

    /**
     * Get parameters passed to the event.
     *
     * @return array The parameters
     */
    public function getParams(): array;

    /**
     * Set event parameters.
     *
     * @param  array $params The event parameters
     * @return void
     */
    public function setParams(array $params): void;

    /**
     * Indicate whether or not to stop propagating this event.
     *
     * @param  bool $flag The flag to stop propagation
     * @return void
     */
    public function stopPropagation(bool $flag): void;

    /**
     * Returns whether further event listeners should be triggered.
     *
     * @return bool Whether propagation was already stopped
     */
    public function isPropagationStopped(): bool;
}
