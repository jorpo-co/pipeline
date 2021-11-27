<?php declare(strict_types=1);

namespace Jorpo\Pipeline;

use Ds\Vector;
use UnderflowException;

use function array_merge;

class MiddlewarePipeline implements Pipeline, Middleware
{
    private Vector $processors;
    private Vector $middlewares;

    public function __construct(Processor ...$processors)
    {
        $this->processors = new Vector($processors);
        $this->middlewares = new Vector();
    }

    public function pipe(Middleware ...$middlewares): static
    {
        $this->middlewares = $this->middlewares->merge($middlewares);

        return $this;
    }

    public function process(object $context): object
    {
        $processors = clone $this->processors;

        try {
            while ($processor = $processors->shift()) {
                $context = $processor->process($context, ...$this->middlewares);
            }
        } catch (UnderflowException $error) {
        } catch (Interrupt $interrupt) {
            $context = $interrupt->context();
        }

        return $context;
    }
}
