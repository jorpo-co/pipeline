<?php declare(strict_types=1);

namespace Jorpo\Pipeline;

interface Processor
{
    /**
     * @throws Interrupt
     */
    public function process(Context $context, Middleware ...$middlewares): Context;
}
