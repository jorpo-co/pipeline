<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Processor;

use Jorpo\Pipeline\Middleware;
use Jorpo\Pipeline\Processor;

class ForwardThenReverse implements Processor
{
    use DoubleProcessing;

    public function process(object $context, Middleware ...$middlewares): object
    {
        return $this->processReverse($this->processForward($context, $middlewares), $middlewares);
    }
}
