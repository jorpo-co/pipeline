<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Middleware;

use Jorpo\Pipeline\Middleware;
use Jorpo\Pipeline\PipelineInterrupted;

class DummyInterruptedMiddleware implements Middleware
{
    /**
     * @throws PipelineInterrupted
     */
    public function process(object $context): object
    {
        throw new PipelineInterrupted($context);
    }
}
