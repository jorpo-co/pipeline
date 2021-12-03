<?php declare(strict_types=1);

namespace Jorpo\Pipeline;

interface Pipeline
{
    public function push(Middleware ...$middlewares): static;
    public function unshift(Middleware ...$middlewares): static;
    public function insert(int $index, Middleware ...$middlewares): static;
}
