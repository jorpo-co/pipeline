<?php declare(strict_types=1);

namespace Jorpo\Pipeline;

/**
 * @template TObject of object
 */
interface Processor
{
    /**
     * @param TObject $context
     * @return TObject
     * @throws PipelineInterrupted
     */
    public function process(object $context, Middleware ...$middlewares): object;
}
