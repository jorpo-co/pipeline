<?php declare(strict_types=1);

namespace Jorpo\Pipeline\Middleware;

use Jorpo\Pipeline\Context;
use PHPUnit\Framework\TestCase;

class SpecificationMiddlewareTest extends TestCase
{
    public function testThatMiddlewarePassesOriginalMessageIfSpecificationFails()
    {
        $middleware = new SpecificationMiddleware(
            new AlwaysFalseSpecification(),
            new DummyMiddlewareOne()
        );
        $context = new Context([
            'content' => '',
        ]);

        $processedRequest = $middleware->process($context);
        $this->assertEmpty($processedRequest->content);
    }

    public function testThatMiddlewareProcessesMessageIfSpecificationPasses()
    {
        $middleware = new SpecificationMiddleware(
            new AlwaysTrueSpecification(),
            new DummyMiddlewareOne()
        );
        $context = new Context([
            'content' => '',
        ]);

        $processedRequest = $middleware->process($context);
        $this->assertSame('one', $processedRequest->content);
    }
}
