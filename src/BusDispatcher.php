<?php

namespace Jitendra\Lqext;

use Illuminate\Contracts\Bus\Dispatcher;

class BusDispatcher extends Decorated implements Dispatcher
{
    /**
     * {@inheritDoc}
     */
    public function dispatch($command)
    {
        return $this->transactionHandler->handler(
            $command,
            function () use ($command) {
                return $this->instance->dispatch($command);
            }
        );
    }

    /**
     * {@inheritDoc}
     */
    public function dispatchNow($command, $handler = null)
    {
        return $this->instance->dispatchNow($command, $handler);
    }

    /**
     * {@inheritDoc}
     */
    public function pipeThrough(array $pipes)
    {
        return $this->instance->pipeThrough($pipes);
    }

    /**
     * {@inheritDoc}
     */
    public function hasCommandHandler($command)
    {
        return $this->instance->hasCommandHandler($command);
    }

    /**
     * {@inheritDoc}
     */
    public function getCommandHandler($command)
    {
        return $this->instance->getCommandHandler($command);
    }

    /**
     * {@inheritDoc}
     */
    public function map(array $map)
    {
        return $this->instance->map($map);
    }

    public function dispatchSync($command, $handler = null)
    {
        // TODO: Implement dispatchSync() method.
    }
}
