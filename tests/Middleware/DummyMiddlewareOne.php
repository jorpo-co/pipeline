<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Middleware;

use Jorpo\Pipeline\Middleware;
use Jorpo\Pipeline\PipelineInterrupted;

class DummyMiddlewareOne implements Middleware
{
    /**
     * @throws PipelineInterrupted
     */
    public function process(object $context): object
    {
        $context->content .= 'one';

        return $context;
    }
}
