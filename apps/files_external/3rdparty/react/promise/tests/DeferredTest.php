<?php

namespace React\Promise;

use React\Promise\PromiseAdapter\CallbackPromiseAdapter;

class DeferredTest extends TestCase
{
    use PromiseTest\FullTestTrait;

    public function getPromiseTestAdapter(callable $canceller = null)
    {
        $d = new Deferred($canceller);

        return new CallbackPromiseAdapter([
            'promise' => [$d, 'promise'],
            'resolve' => [$d, 'resolve'],
            'reject'  => [$d, 'reject'],
            'notify'  => [$d, 'progress'],
            'settle'  => [$d, 'resolve'],
        ]);
    }

    /** @test */
    public function progressIsAnAliasForNotify()
    {
        $deferred = new Deferred();

        $sentinel = new \stdClass();

        $mock = $this->createCallableMock();
        $mock
            ->expects($this->once())
            ->method('__invoke')
            ->with($sentinel);

        $deferred->promise()
            ->then($this->expectCallableNever(), $this->expectCallableNever(), $mock);

        $deferred->progress($sentinel);
    }

    /** @test */
    public function shouldRejectWithoutCreatingGarbageCyclesIfCancellerRejectsWithException()
    {
        gc_collect_cycles();
        $deferred = new Deferred(function ($resolve, $reject) {
            $reject(new \Exception('foo'));
        });
        $deferred->promise()->cancel();
        unset($deferred);

        $this->assertSame(0, gc_collect_cycles());
    }

    /** @test */
    public function shouldRejectWithoutCreatingGarbageCyclesIfParentCancellerRejectsWithException()
    {
        gc_collect_cycles();
        $deferred = new Deferred(function ($resolve, $reject) {
            $reject(new \Exception('foo'));
        });
        $deferred->promise()->then()->cancel();
        unset($deferred);

        $this->assertSame(0, gc_collect_cycles());
    }

    /** @test */
    public function shouldRejectWithoutCreatingGarbageCyclesIfCancellerHoldsReferenceAndExplicitlyRejectWithException()
    {
        gc_collect_cycles();
        $deferred = new Deferred(function () use (&$deferred) { });
        $deferred->reject(new \Exception('foo'));
        unset($deferred);

        $this->assertSame(0, gc_collect_cycles());
    }

    /** @test */
    public function shouldNotLeaveGarbageCyclesWhenRemovingLastReferenceToPendingDeferred()
    {
        gc_collect_cycles();
        $deferred = new Deferred();
        $deferred->promise();
        unset($deferred);

        $this->assertSame(0, gc_collect_cycles());
    }

    /** @test */
    public function shouldNotLeaveGarbageCyclesWhenRemovingLastReferenceToPendingDeferredWithUnusedCanceller()
    {
        gc_collect_cycles();
        $deferred = new Deferred(function () { });
        $deferred->promise();
        unset($deferred);

        $this->assertSame(0, gc_collect_cycles());
    }

    /** @test */
    public function shouldNotLeaveGarbageCyclesWhenRemovingLastReferenceToPendingDeferredWithNoopCanceller()
    {
        gc_collect_cycles();
        $deferred = new Deferred(function () { });
        $deferred->promise()->cancel();
        unset($deferred);

        $this->assertSame(0, gc_collect_cycles());
    }
}
