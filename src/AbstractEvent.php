<?php

declare(strict_types=1);

namespace Hschulz\Dispatcher;

use Hschulz\Dispatcher\EventInterface;

/**
 * Abstract event class.
 */
abstract class AbstractEvent implements EventInterface
{
    /**
     * The event name.
     *
     * @var string
     */
    protected string $name = '';

    /**
     * The event parameters.
     *
     * @var array
     */
    protected array $params = [];

    /**
     * Flag to stop event propagation.
     *
     * @var bool
     */
    protected bool $propagationStopped = false;

    /**
     * Constructor.
     *
     * @param string $name The event name
     * @param array $params The event parameters
     */
    public function __construct(string $name = '', array $params = [])
    {
        $this->name = $name;
        $this->params = $params;
        $this->propagationStopped = false;
    }

    /**
     * Serializes the event.
     *
     * @return array The serialized event
     */
    public function __serialize(): array
    {
        return [
            'name' => $this->name,
            'params' => $this->params,
            'propagationStopped' => $this->propagationStopped
        ];
    }

    /**
     * Unserializes the event.
     *
     * @param array $data The serialized event
     * @return void
     */
    public function __unserialize(array $data): void
    {
        $this->name = $data['name'];
        $this->params = $data['params'];
        $this->propagationStopped = $data['propagationStopped'];
    }

    /**
     * Returns the event name.
     *
     * @return string The event name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Sets the event name.
     *
     * @param string $name The event name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns the event parameters.
     *
     * @return array The event parameters
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * Returns a specific event parameter.
     *
     * @param string $name The parameter name
     * @return mixed The parameter value or null
     */
    public function getParam(string $name)
    {
        return $this->params[$name] ?? null;
    }

    /**
     * Sets the event parameters.
     *
     * @param array $params The event parameters
     * @return void
     */
    public function setParams(array $params): void
    {
        $this->params = $params;
    }

    /**
     * Stops event propagation.
     *
     * @param bool $flag The flag to stop event propagation
     * @return void
     */
    public function stopPropagation(bool $flag): void
    {
        $this->propagationStopped = $flag;
    }

    /**
     * Returns the event propagation stop flag.
     *
     * @return bool The event propagation stop flag
     */
    public function isPropagationStopped(): bool
    {
        return $this->propagationStopped;
    }
}
