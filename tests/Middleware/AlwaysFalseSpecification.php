<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Middleware;

use Jorpo\Pipeline\Context;
use Jorpo\Specification\AbstractSpecification;

/**
 * @extends AbstractSpecification<Context>
 */
class AlwaysFalseSpecification extends AbstractSpecification
{
    public function isSatisfiedBy(object $object): bool
    {
        return false;
    }
}
