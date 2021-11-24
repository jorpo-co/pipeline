<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Processor;

use Jorpo\Pipeline\PipelineInterrupted;

trait DoubleProcessing
{
    /**
     * @throws PipelineInterrupted
     */
    private function processForward(object $message, array $middlewares): object
    {
        return (new Forward)->process($message, ...$middlewares);
    }

    /**
     * @throws PipelineInterrupted
     */
    private function processReverse(object $message, array $middlewares): object
    {
        return (new Reverse)->process($message, ...$middlewares);
    }
}
