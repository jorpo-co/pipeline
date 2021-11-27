<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Processor;

use Jorpo\Pipeline\Interrupt;

trait DoubleProcessing
{
    /**
     * @throws Interrupt
     */
    private function processForward(object $message, array $middlewares): object
    {
        return (new Forward)->process($message, ...$middlewares);
    }

    /**
     * @throws Interrupt
     */
    private function processReverse(object $message, array $middlewares): object
    {
        return (new Reverse)->process($message, ...$middlewares);
    }
}
