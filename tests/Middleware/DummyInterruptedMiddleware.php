<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Middleware;

use Jorpo\Pipeline\Middleware;
use Jorpo\Pipeline\Interrupt;

class DummyInterruptedMiddleware implements Middleware
{
    /**
     * @throws Interrupt
     */
    public function process(object $context): object
    {
        throw new Interrupt($context);
    }
}
