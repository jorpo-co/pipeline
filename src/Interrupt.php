<?php declare(strict_types=1);

namespace Jorpo\Pipeline;

use RuntimeException;
use Throwable;

class Interrupt extends RuntimeException
{
    private Context $context;

    public function __construct(Context $context, int $number = 0, Throwable $error = null)
    {
        $this->context = $context;

        parent::__construct("Pipeline run interrupted.", $number, $error);
    }

    public function context(): Context
    {
        return $this->context;
    }
}
