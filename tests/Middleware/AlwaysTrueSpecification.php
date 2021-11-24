<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Middleware;

use Jorpo\Specification\AbstractSpecification;

class AlwaysTrueSpecification extends AbstractSpecification
{
    public function isSatisfiedBy($object): bool
    {
        return true;
    }
}
