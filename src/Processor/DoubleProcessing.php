<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Processor;

use Jorpo\Pipeline\Context;
use Jorpo\Pipeline\Interrupt;

trait DoubleProcessing
{
    /**
     * @throws Interrupt
     */
    private function processForward(Context $context, array $middlewares): Context
    {
        return (new Forward())->process($context, ...$middlewares);
    }

    /**
     * @throws Interrupt
     */
    private function processReverse(Context $context, array $middlewares): Context
    {
        return (new Reverse())->process($context, ...$middlewares);
    }
}
