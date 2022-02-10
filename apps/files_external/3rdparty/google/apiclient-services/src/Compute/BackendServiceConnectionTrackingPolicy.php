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

class BackendServiceConnectionTrackingPolicy extends \Google\Model
{
  /**
   * @var string
   */
  public $connectionPersistenceOnUnhealthyBackends;
  /**
   * @var int
   */
  public $idleTimeoutSec;
  /**
   * @var string
   */
  public $trackingMode;

  /**
   * @param string
   */
  public function setConnectionPersistenceOnUnhealthyBackends($connectionPersistenceOnUnhealthyBackends)
  {
    $this->connectionPersistenceOnUnhealthyBackends = $connectionPersistenceOnUnhealthyBackends;
  }
  /**
   * @return string
   */
  public function getConnectionPersistenceOnUnhealthyBackends()
  {
    return $this->connectionPersistenceOnUnhealthyBackends;
  }
  /**
   * @param int
   */
  public function setIdleTimeoutSec($idleTimeoutSec)
  {
    $this->idleTimeoutSec = $idleTimeoutSec;
  }
  /**
   * @return int
   */
  public function getIdleTimeoutSec()
  {
    return $this->idleTimeoutSec;
  }
  /**
   * @param string
   */
  public function setTrackingMode($trackingMode)
  {
    $this->trackingMode = $trackingMode;
  }
  /**
   * @return string
   */
  public function getTrackingMode()
  {
    return $this->trackingMode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BackendServiceConnectionTrackingPolicy::class, 'Google_Service_Compute_BackendServiceConnectionTrackingPolicy');
