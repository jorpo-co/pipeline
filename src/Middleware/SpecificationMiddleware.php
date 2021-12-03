<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Middleware;

use Jorpo\Pipeline\Context;
use Jorpo\Pipeline\Middleware;
use Jorpo\Specification\Specification;

class SpecificationMiddleware implements Middleware
{
    private $middleware;
    private $specification;

    public function __construct(Specification $specification, Middleware $middleware)
    {
        $this->specification = $specification;
        $this->middleware = $middleware;
    }

    public function process(Context $context): Context
    {
        if (false === $this->specification->isSatisfiedBy($context)) {
            return $context;
        }

        return $this->middleware->process($context);
    }
}
