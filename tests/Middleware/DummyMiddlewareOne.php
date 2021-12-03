<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Middleware;

use Jorpo\Pipeline\Context;
use Jorpo\Pipeline\Interrupt;
use Jorpo\Pipeline\Middleware;

class DummyMiddlewareOne implements Middleware
{
    /**
     * @throws Interrupt
     */
    public function process(Context $context): Context
    {
        return new Context([
            'content' => $context->content .= 'one',
        ]);
    }
}
