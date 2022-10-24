<?php

namespace Interview\Challenge2;

/*
 * Implement interface methods and proxy them to Laravel event dispatcher
 */

use Closure;
use Illuminate\Events\Dispatcher;

class LaravelEventDispatcher implements EventDispatcherInterface
{
    /**
     * @var \Illuminate\Events\Dispatcher
     */
    private Dispatcher $eventDispatcher;

    public function __construct(Dispatcher $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    public function dispatch(object $event)
    {
        $this->eventDispatcher->dispatch($event);
    }

    public function addListener(string $event, Closure $listener)
    {
        $this->eventDispatcher->listen([$event], $listener);
    }
}
