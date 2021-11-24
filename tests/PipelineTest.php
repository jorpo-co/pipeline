<?php declare(strict_types=1);

namespace Jorpo\Pipeline;

use Jorpo\Pipeline\MiddlewarePipeline;
use Jorpo\Pipeline\Middleware\DummyInterruptedMiddleware;
use Jorpo\Pipeline\Middleware\DummyMiddlewareOne;
use Jorpo\Pipeline\Middleware\DummyMiddlewareTwo;
use Jorpo\Pipeline\Processor\Forward;
use Jorpo\Pipeline\Processor\ForwardThenReverse;
use Jorpo\Pipeline\Processor\Reverse;
use Jorpo\Pipeline\Processor\ReverseThenForward;
use PHPUnit\Framework\TestCase;

class PipelineTest extends TestCase
{
    public function testThatEmptyPipelineWillPassThroughMessage()
    {
        $subject = new MiddlewarePipeline;
        $context = (object) [
            'content' => '',
        ];

        $passedThrough = $subject->process($context);

        $this->assertSame('', $passedThrough->content);
    }

    /**
     * @dataProvider processWithMiddleware
     */
    public function testThatPipelineWillProcessProvidedMiddleware(string $expected, Processor ...$processors)
    {
        $subject = new MiddlewarePipeline(
            ...$processors
        );
        $context = (object) [
            'content' => '',
        ];

        $subject->pipe(
            new DummyMiddlewareOne,
            new DummyMiddlewareTwo
        );

        $processed = $subject->process($context);

        $this->assertSame($expected, $processed->content);
    }

    public function processWithMiddleware(): array
    {
        return [
            ['onetwo', new Forward],
            ['twoone', new Reverse],
            ['onetwotwoone', new Forward, new Reverse],
            ['onetwotwoone', new ForwardThenReverse],
            ['twooneonetwo', new Reverse, new Forward],
            ['twooneonetwo', new ReverseThenForward],
        ];
    }

    public function testThatInterruptedMiddlewareRunIsCaughtAndReturned()
    {
        $subject = new MiddlewarePipeline(
            new Forward
        );
        $context = (object) [
            'content' => '',
        ];

        $subject->pipe(
            new DummyMiddlewareOne,
            new DummyInterruptedMiddleware,
            new DummyMiddlewareTwo
        );

        $processed = $subject->process($context);

        $this->assertSame('one', $processed->content);
    }
}
