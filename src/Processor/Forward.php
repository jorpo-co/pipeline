<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Processor;

use Ds\Queue;
use Jorpo\Pipeline\Context;
use Jorpo\Pipeline\Middleware;
use Jorpo\Pipeline\Processor;

class Forward implements Processor
{
    public function process(Context $context, Middleware ...$middlewares): Context
    {
        $middlewares = new Queue($middlewares);

        while (!$middlewares->isEmpty() && $middleware = $middlewares->pop()) {
            $context = $middleware->process($context);
        }

        return $context;
    }
}
