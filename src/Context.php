<?php declare(strict_types=1);

namespace Jorpo\Pipeline;

use Ds\Map;
use IteratorAggregate;
use Traversable;

class Context implements IteratorAggregate
{
    private Map $context;

    public function __construct(array|Traversable $context = [])
    {
        $this->context = new Map($context);
    }

    public function merge(array|Traversable $incoming): Context
    {
        return new Context($this->context->merge($incoming));
    }

    public function isEmpty(): bool
    {
        return $this->context->isEmpty();
    }

    public function __get(string $name): mixed
    {
        return $this->context->get($name, null);
    }

    public function getIterator(): Traversable
    {
        return $this->context->getIterator();
    }
}
