<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Middleware;

use Jorpo\Pipeline\Context;
use Jorpo\Pipeline\Interrupt;
use Jorpo\Pipeline\Middleware;

class DummyMiddlewareTwo implements Middleware
{
    /**
     * @throws Interrupt
     */
    public function process(Context $context): Context
    {
        return new Context([
            'content' => $context->content .= 'two',
        ]);
    }
}
