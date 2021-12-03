<?php declare(strict_types=1);

namespace Jorpo\Pipeline;

use Ds\Vector;

class MiddlewarePipeline implements Pipeline, Middleware
{
    private Vector $processors;
    private Vector $middlewares;

    public function __construct(Processor ...$processors)
    {
        $this->processors = new Vector($processors);
        $this->middlewares = new Vector();
    }

    public function push(Middleware ...$middlewares): static
    {
        $this->middlewares = $this->middlewares->merge($middlewares);

        return $this;
    }

    public function unshift(Middleware ...$middlewares): static
    {
        $this->middlewares->unshift(...$middlewares);

        return $this;
    }

    public function insert(int $index, Middleware ...$middlewares): static
    {
        $this->middlewares->insert($index, ...$middlewares);

        return $this;
    }

    public function process(Context $context): Context
    {
        $processors = clone $this->processors;

        try {
            while (!$processors->isEmpty() && $processor = $processors->shift()) {
                $context = $processor->process($context, ...$this->middlewares);
            }
        } catch (Interrupt $interrupt) {
            $context = $interrupt->context();
        }

        return $context;
    }
}
