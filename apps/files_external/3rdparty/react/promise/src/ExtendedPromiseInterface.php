<?php

namespace React\Promise;

interface ExtendedPromiseInterface extends PromiseInterface
{
    /**
     *
     * The `$onProgress` argument is deprecated and should not be used anymore.
     *
     * @return void
     */
    public function done(callable $onFulfilled = null, callable $onRejected = null, callable $onProgress = null);

    /**
     * @return ExtendedPromiseInterface
     */
    public function otherwise(callable $onRejected);

    /**
     * @return ExtendedPromiseInterface
     */
    public function always(callable $onFulfilledOrRejected);

    /**
     * @return ExtendedPromiseInterface
     * @deprecated 2.6.0 Progress support is deprecated and should not be used anymore.
     */
    public function progress(callable $onProgress);
}
