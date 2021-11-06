<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Compute;

class HttpRetryPolicy extends \Google\Collection
{
  protected $collection_key = 'retryConditions';
  public $numRetries;
  protected $perTryTimeoutType = Duration::class;
  protected $perTryTimeoutDataType = '';
  public $retryConditions;

  public function setNumRetries($numRetries)
  {
    $this->numRetries = $numRetries;
  }
  public function getNumRetries()
  {
    return $this->numRetries;
  }
  /**
   * @param Duration
   */
  public function setPerTryTimeout(Duration $perTryTimeout)
  {
    $this->perTryTimeout = $perTryTimeout;
  }
  /**
   * @return Duration
   */
  public function getPerTryTimeout()
  {
    return $this->perTryTimeout;
  }
  public function setRetryConditions($retryConditions)
  {
    $this->retryConditions = $retryConditions;
  }
  public function getRetryConditions()
  {
    return $this->retryConditions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HttpRetryPolicy::class, 'Google_Service_Compute_HttpRetryPolicy');
