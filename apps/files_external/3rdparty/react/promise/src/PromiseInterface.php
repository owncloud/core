<?php

namespace React\Promise;

interface PromiseInterface
{
    /**
     *
     * The `$onProgress` argument is deprecated and should not be used anymore.
     *
     * @return PromiseInterface
     */
    public function then(callable $onFulfilled = null, callable $onRejected = null, callable $onProgress = null);
}
