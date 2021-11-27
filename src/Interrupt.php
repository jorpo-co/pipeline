<?php declare(strict_types=1);

namespace Jorpo\Pipeline;

use RuntimeException;
use Throwable;

class Interrupt extends RuntimeException
{
    private object $context;

    public function __construct(object $context, int $number = 0, Throwable $error = null)
    {
        $this->context = $context;

        parent::__construct("Pipeline run interrupted.", $number, $error);
    }

    public function context(): object
    {
        return $this->context;
    }
}
