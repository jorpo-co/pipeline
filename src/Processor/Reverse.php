<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Processor;

use Ds\Stack;
use Jorpo\Pipeline\Middleware;
use Jorpo\Pipeline\Processor;

class Reverse implements Processor
{
    public function process(object $context, Middleware ...$middlewares): object
    {
        $middlewares = new Stack($middlewares);

        while (!$middlewares->isEmpty() && $middleware = $middlewares->pop()) {
            $context = $middleware->process($context);
        }

        return $context;
    }
}
