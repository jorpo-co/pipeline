<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Middleware;

use Jorpo\Pipeline\Middleware;
use Jorpo\Pipeline\Interrupt;

class DummyMiddlewareTwo implements Middleware
{
    /**
     * @throws Interrupt
     */
    public function process(object $context): object
    {
        $context->content .= 'two';

        return $context;
    }
}
