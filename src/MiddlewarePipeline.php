<?php declare(strict_types=1);

namespace Jorpo\Pipeline;

use function array_merge;

class MiddlewarePipeline implements Pipeline, Middleware
{
    private array $processors = [];
    private array $middlewares = [];

    public function __construct(Processor ...$processors)
    {
        $this->processors = $processors;
    }

    public function pipe(Middleware ...$middlewares): static
    {
        $this->middlewares = array_merge($this->middlewares, $middlewares);

        return $this;
    }

    public function process(object $context): object
    {
        $processors = $this->processors;

        try {
            while ($processor = array_shift($processors)) {
                $context = $processor->process($context, ...$this->middlewares);
            }
        } catch (PipelineInterrupted $interrupt) {
            $context = $interrupt->context();
        }

        return $context;
    }
}
