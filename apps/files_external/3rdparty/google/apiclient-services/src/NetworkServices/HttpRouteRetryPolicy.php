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

namespace Google\Service\NetworkServices;

class HttpRouteRetryPolicy extends \Google\Collection
{
  protected $collection_key = 'retryConditions';
  /**
   * @var int
   */
  public $numRetries;
  /**
   * @var string
   */
  public $perTryTimeout;
  /**
   * @var string[]
   */
  public $retryConditions;

  /**
   * @param int
   */
  public function setNumRetries($numRetries)
  {
    $this->numRetries = $numRetries;
  }
  /**
   * @return int
   */
  public function getNumRetries()
  {
    return $this->numRetries;
  }
  /**
   * @param string
   */
  public function setPerTryTimeout($perTryTimeout)
  {
    $this->perTryTimeout = $perTryTimeout;
  }
  /**
   * @return string
   */
  public function getPerTryTimeout()
  {
    return $this->perTryTimeout;
  }
  /**
   * @param string[]
   */
  public function setRetryConditions($retryConditions)
  {
    $this->retryConditions = $retryConditions;
  }
  /**
   * @return string[]
   */
  public function getRetryConditions()
  {
    return $this->retryConditions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HttpRouteRetryPolicy::class, 'Google_Service_NetworkServices_HttpRouteRetryPolicy');
