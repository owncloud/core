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

class CircuitBreakers extends \Google\Model
{
  /**
   * @var int
   */
  public $maxConnections;
  /**
   * @var int
   */
  public $maxPendingRequests;
  /**
   * @var int
   */
  public $maxRequests;
  /**
   * @var int
   */
  public $maxRequestsPerConnection;
  /**
   * @var int
   */
  public $maxRetries;

  /**
   * @param int
   */
  public function setMaxConnections($maxConnections)
  {
    $this->maxConnections = $maxConnections;
  }
  /**
   * @return int
   */
  public function getMaxConnections()
  {
    return $this->maxConnections;
  }
  /**
   * @param int
   */
  public function setMaxPendingRequests($maxPendingRequests)
  {
    $this->maxPendingRequests = $maxPendingRequests;
  }
  /**
   * @return int
   */
  public function getMaxPendingRequests()
  {
    return $this->maxPendingRequests;
  }
  /**
   * @param int
   */
  public function setMaxRequests($maxRequests)
  {
    $this->maxRequests = $maxRequests;
  }
  /**
   * @return int
   */
  public function getMaxRequests()
  {
    return $this->maxRequests;
  }
  /**
   * @param int
   */
  public function setMaxRequestsPerConnection($maxRequestsPerConnection)
  {
    $this->maxRequestsPerConnection = $maxRequestsPerConnection;
  }
  /**
   * @return int
   */
  public function getMaxRequestsPerConnection()
  {
    return $this->maxRequestsPerConnection;
  }
  /**
   * @param int
   */
  public function setMaxRetries($maxRetries)
  {
    $this->maxRetries = $maxRetries;
  }
  /**
   * @return int
   */
  public function getMaxRetries()
  {
    return $this->maxRetries;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CircuitBreakers::class, 'Google_Service_Compute_CircuitBreakers');
