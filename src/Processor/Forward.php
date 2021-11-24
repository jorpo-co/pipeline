<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Processor;

use Ds\Queue;
use Jorpo\Pipeline\Middleware;
use Jorpo\Pipeline\Processor;

class Forward implements Processor
{
    public function process(object $context, Middleware ...$middlewares): object
    {
        $middlewares = new Queue($middlewares);

        while (!$middlewares->isEmpty() && $middleware = $middlewares->pop()) {
            $context = $middleware->process($context);
        }

        return $context;
    }
}
