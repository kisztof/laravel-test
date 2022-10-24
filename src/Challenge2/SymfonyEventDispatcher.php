<?php

namespace Interview\Challenge2;

/*
 * Implement interface methods and proxy them to Symfony event dispatcher
 */

use Closure;
use Symfony\Component\EventDispatcher\EventDispatcher;

class SymfonyEventDispatcher implements EventDispatcherInterface
{
    private EventDispatcher $eventDispatcher;

    public function __construct(EventDispatcher $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    public function dispatch(object $event)
    {
        $this->eventDispatcher->dispatch($event);
    }

    public function addListener(string $event, Closure $listener)
    {
        $this->eventDispatcher->addListener($event, $listener);
    }
}
