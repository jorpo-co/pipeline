<?php declare(strict_types=1);

namespace Jorpo\Pipeline;

/**
 * @template TContextObject of object
 * @template TReturnObject of object
 */
interface Middleware
{
    /**
     * @param TContextObject $context
     * @return TReturnObject
     * @throws PipelineInterrupted
     */
    public function process(object $context): object;
}
