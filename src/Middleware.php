<?php declare(strict_types=1);

namespace Jorpo\Pipeline;

interface Middleware
{
    /**
     * @throws Interrupt
     */
    public function process(Context $context): Context;
}
