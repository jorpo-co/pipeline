<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Middleware;

use Jorpo\Pipeline\Context;
use Jorpo\Pipeline\Interrupt;
use Jorpo\Pipeline\Middleware;

class DummyInterruptedMiddleware implements Middleware
{
    /**
     * @throws Interrupt
     */
    public function process(Context $context): Context
    {
        throw new Interrupt($context);
    }
}
