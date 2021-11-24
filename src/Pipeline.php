<?php declare(strict_types=1);

namespace Jorpo\Pipeline;

interface Pipeline
{
    public function pipe(Middleware ...$middlewares): static;
}
