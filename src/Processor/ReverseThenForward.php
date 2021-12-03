<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Processor;

use Jorpo\Pipeline\Context;
use Jorpo\Pipeline\Middleware;
use Jorpo\Pipeline\Processor;

class ReverseThenForward implements Processor
{
    use DoubleProcessing;

    public function process(Context $context, Middleware ...$middlewares): Context
    {
        return $this->processForward($this->processReverse($context, $middlewares), $middlewares);
    }
}
