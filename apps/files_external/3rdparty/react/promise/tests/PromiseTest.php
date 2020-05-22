<?php

namespace React\Promise;

use React\Promise\PromiseAdapter\CallbackPromiseAdapter;

class PromiseTest extends TestCase
{
    use PromiseTest\FullTestTrait;

    public function getPromiseTestAdapter(callable $canceller = null)
    {
        $resolveCallback = $rejectCallback = $progressCallback = null;

        $promise = new Promise(function ($resolve, $reject, $progress) use (&$resolveCallback, &$rejectCallback, &$progressCallback) {
            $resolveCallback  = $resolve;
            $rejectCallback   = $reject;
            $progressCallback = $progress;
        }, $canceller);

        return new CallbackPromiseAdapter([
            'promise' => function () use ($promise) {
                return $promise;
            },
            'resolve' => $resolveCallback,
            'reject'  => $rejectCallback,
            'notify'  => $progressCallback,
            'settle'  => $resolveCallback,
        ]);
    }

    /** @test */
    public function shouldRejectIfResolverThrowsException()
    {
        $exception = new \Exception('foo');

        $promise = new Promise(function () use ($exception) {
            throw $exception;
        });

        $mock = $this->createCallableMock();
        $mock
            ->expects($this->once())
            ->method('__invoke')
            ->with($this->identicalTo($exception));

        $promise
            ->then($this->expectCallableNever(), $mock);
    }

    /** @test */
    public function shouldResolveWithoutCreatingGarbageCyclesIfResolverResolvesWithException()
    {
        gc_collect_cycles();
        $promise = new Promise(function ($resolve) {
            $resolve(new \Exception('foo'));
        });
        unset($promise);

        $this->assertSame(0, gc_collect_cycles());
    }

    /** @test */
    public function shouldRejectWithoutCreatingGarbageCyclesIfResolverThrowsExceptionWithoutResolver()
    {
        gc_collect_cycles();
        $promise = new Promise(function () {
            throw new \Exception('foo');
        });
        unset($promise);

        $this->assertSame(0, gc_collect_cycles());
    }

    /** @test */
    public function shouldRejectWithoutCreatingGarbageCyclesIfResolverRejectsWithException()
    {
        gc_collect_cycles();
        $promise = new Promise(function ($resolve, $reject) {
            $reject(new \Exception('foo'));
        });
        unset($promise);

        $this->assertSame(0, gc_collect_cycles());
    }

    /** @test */
    public function shouldRejectWithoutCreatingGarbageCyclesIfCancellerRejectsWithException()
    {
        gc_collect_cycles();
        $promise = new Promise(function ($resolve, $reject) { }, function ($resolve, $reject) {
            $reject(new \Exception('foo'));
        });
        $promise->cancel();
        unset($promise);

        $this->assertSame(0, gc_collect_cycles());
    }

    /** @test */
    public function shouldRejectWithoutCreatingGarbageCyclesIfParentCancellerRejectsWithException()
    {
        gc_collect_cycles();
        $promise = new Promise(function ($resolve, $reject) { }, function ($resolve, $reject) {
            $reject(new \Exception('foo'));
        });
        $promise->then()->then()->then()->cancel();
        unset($promise);

        $this->assertSame(0, gc_collect_cycles());
    }

    /** @test */
    public function shouldRejectWithoutCreatingGarbageCyclesIfResolverThrowsException()
    {
        gc_collect_cycles();
        $promise = new Promise(function ($resolve, $reject) {
            throw new \Exception('foo');
        });
        unset($promise);

        $this->assertSame(0, gc_collect_cycles());
    }

    /**
     * Test that checks number of garbage cycles after throwing from a canceller
     * that explicitly uses a reference to the promise. This is rather synthetic,
     * actual use cases often have implicit (hidden) references which ought not
     * to be stored in the stack trace.
     *
     * Reassigned arguments only show up in the stack trace in PHP 7, so we can't
     * avoid this on legacy PHP. As an alternative, consider explicitly unsetting
     * any references before throwing.
     *
     * @test
     * @requires PHP 7
     */
    public function shouldRejectWithoutCreatingGarbageCyclesIfCancellerWithReferenceThrowsException()
    {
        gc_collect_cycles();
        $promise = new Promise(function () {}, function () use (&$promise) {
            throw new \Exception('foo');
        });
        $promise->cancel();
        unset($promise);

        $this->assertSame(0, gc_collect_cycles());
    }

    /**
     * @test
     * @requires PHP 7
     * @see self::shouldRejectWithoutCreatingGarbageCyclesIfCancellerWithReferenceThrowsException
     */
    public function shouldRejectWithoutCreatingGarbageCyclesIfResolverWithReferenceThrowsException()
    {
        gc_collect_cycles();
        $promise = new Promise(function () use (&$promise) {
            throw new \Exception('foo');
        });
        unset($promise);

        $this->assertSame(0, gc_collect_cycles());
    }

    /**
     * @test
     * @requires PHP 7
     * @see self::shouldRejectWithoutCreatingGarbageCyclesIfCancellerWithReferenceThrowsException
     */
    public function shouldRejectWithoutCreatingGarbageCyclesIfCancellerHoldsReferenceAndResolverThrowsException()
    {
        gc_collect_cycles();
        $promise = new Promise(function () {
            throw new \Exception('foo');
        }, function () use (&$promise) { });
        unset($promise);

        $this->assertSame(0, gc_collect_cycles());
    }

    /** @test */
    public function shouldIgnoreNotifyAfterReject()
    {
        $promise = new Promise(function () { }, function ($resolve, $reject, $notify) {
            $reject(new \Exception('foo'));
            $notify(42);
        });

        $promise->then(null, null, $this->expectCallableNever());
        $promise->cancel();
    }


    /** @test */
    public function shouldNotLeaveGarbageCyclesWhenRemovingLastReferenceToPendingPromise()
    {
        gc_collect_cycles();
        $promise = new Promise(function () { });
        unset($promise);

        $this->assertSame(0, gc_collect_cycles());
    }

    /** @test */
    public function shouldNotLeaveGarbageCyclesWhenRemovingLastReferenceToPendingPromiseWithThenFollowers()
    {
        gc_collect_cycles();
        $promise = new Promise(function () { });
        $promise->then()->then()->then();
        unset($promise);

        $this->assertSame(0, gc_collect_cycles());
    }

    /** @test */
    public function shouldNotLeaveGarbageCyclesWhenRemovingLastReferenceToPendingPromiseWithDoneFollowers()
    {
        gc_collect_cycles();
        $promise = new Promise(function () { });
        $promise->done();
        unset($promise);

        $this->assertSame(0, gc_collect_cycles());
    }

    /** @test */
    public function shouldNotLeaveGarbageCyclesWhenRemovingLastReferenceToPendingPromiseWithOtherwiseFollowers()
    {
        gc_collect_cycles();
        $promise = new Promise(function () { });
        $promise->otherwise(function () { });
        unset($promise);

        $this->assertSame(0, gc_collect_cycles());
    }

    /** @test */
    public function shouldNotLeaveGarbageCyclesWhenRemovingLastReferenceToPendingPromiseWithAlwaysFollowers()
    {
        gc_collect_cycles();
        $promise = new Promise(function () { });
        $promise->always(function () { });
        unset($promise);

        $this->assertSame(0, gc_collect_cycles());
    }

    /** @test */
    public function shouldNotLeaveGarbageCyclesWhenRemovingLastReferenceToPendingPromiseWithProgressFollowers()
    {
        gc_collect_cycles();
        $promise = new Promise(function () { });
        $promise->then(null, null, function () { });
        unset($promise);

        $this->assertSame(0, gc_collect_cycles());
    }

    /** @test */
    public function shouldFulfillIfFullfilledWithSimplePromise()
    {
        $adapter = $this->getPromiseTestAdapter();

        $mock = $this->createCallableMock();
        $mock
            ->expects($this->once())
            ->method('__invoke')
            ->with($this->identicalTo('foo'));

        $adapter->promise()
            ->then($mock);

        $adapter->resolve(new SimpleFulfilledTestPromise());
    }

    /** @test */
    public function shouldRejectIfRejectedWithSimplePromise()
    {
        $adapter = $this->getPromiseTestAdapter();

        $mock = $this->createCallableMock();
        $mock
            ->expects($this->once())
            ->method('__invoke')
            ->with($this->identicalTo('foo'));

        $adapter->promise()
            ->then($this->expectCallableNever(), $mock);

        $adapter->resolve(new SimpleRejectedTestPromise());
    }
}
