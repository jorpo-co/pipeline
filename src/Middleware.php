<?php declare(strict_types=1);

namespace Jorpo\Pipeline;

/**
 * @template TObject of object
 */
interface Middleware
{
    /**
     * @param TObject $context
     * @return TObject
     * @throws PipelineInterrupted
     */
    public function process(object $context): object;
}
