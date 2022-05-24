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

class InstanceGroupManagerActionsSummary extends \Google\Model
{
  /**
   * @var int
   */
  public $abandoning;
  /**
   * @var int
   */
  public $creating;
  /**
   * @var int
   */
  public $creatingWithoutRetries;
  /**
   * @var int
   */
  public $deleting;
  /**
   * @var int
   */
  public $none;
  /**
   * @var int
   */
  public $recreating;
  /**
   * @var int
   */
  public $refreshing;
  /**
   * @var int
   */
  public $restarting;
  /**
   * @var int
   */
  public $resuming;
  /**
   * @var int
   */
  public $starting;
  /**
   * @var int
   */
  public $stopping;
  /**
   * @var int
   */
  public $suspending;
  /**
   * @var int
   */
  public $verifying;

  /**
   * @param int
   */
  public function setAbandoning($abandoning)
  {
    $this->abandoning = $abandoning;
  }
  /**
   * @return int
   */
  public function getAbandoning()
  {
    return $this->abandoning;
  }
  /**
   * @param int
   */
  public function setCreating($creating)
  {
    $this->creating = $creating;
  }
  /**
   * @return int
   */
  public function getCreating()
  {
    return $this->creating;
  }
  /**
   * @param int
   */
  public function setCreatingWithoutRetries($creatingWithoutRetries)
  {
    $this->creatingWithoutRetries = $creatingWithoutRetries;
  }
  /**
   * @return int
   */
  public function getCreatingWithoutRetries()
  {
    return $this->creatingWithoutRetries;
  }
  /**
   * @param int
   */
  public function setDeleting($deleting)
  {
    $this->deleting = $deleting;
  }
  /**
   * @return int
   */
  public function getDeleting()
  {
    return $this->deleting;
  }
  /**
   * @param int
   */
  public function setNone($none)
  {
    $this->none = $none;
  }
  /**
   * @return int
   */
  public function getNone()
  {
    return $this->none;
  }
  /**
   * @param int
   */
  public function setRecreating($recreating)
  {
    $this->recreating = $recreating;
  }
  /**
   * @return int
   */
  public function getRecreating()
  {
    return $this->recreating;
  }
  /**
   * @param int
   */
  public function setRefreshing($refreshing)
  {
    $this->refreshing = $refreshing;
  }
  /**
   * @return int
   */
  public function getRefreshing()
  {
    return $this->refreshing;
  }
  /**
   * @param int
   */
  public function setRestarting($restarting)
  {
    $this->restarting = $restarting;
  }
  /**
   * @return int
   */
  public function getRestarting()
  {
    return $this->restarting;
  }
  /**
   * @param int
   */
  public function setResuming($resuming)
  {
    $this->resuming = $resuming;
  }
  /**
   * @return int
   */
  public function getResuming()
  {
    return $this->resuming;
  }
  /**
   * @param int
   */
  public function setStarting($starting)
  {
    $this->starting = $starting;
  }
  /**
   * @return int
   */
  public function getStarting()
  {
    return $this->starting;
  }
  /**
   * @param int
   */
  public function setStopping($stopping)
  {
    $this->stopping = $stopping;
  }
  /**
   * @return int
   */
  public function getStopping()
  {
    return $this->stopping;
  }
  /**
   * @param int
   */
  public function setSuspending($suspending)
  {
    $this->suspending = $suspending;
  }
  /**
   * @return int
   */
  public function getSuspending()
  {
    return $this->suspending;
  }
  /**
   * @param int
   */
  public function setVerifying($verifying)
  {
    $this->verifying = $verifying;
  }
  /**
   * @return int
   */
  public function getVerifying()
  {
    return $this->verifying;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InstanceGroupManagerActionsSummary::class, 'Google_Service_Compute_InstanceGroupManagerActionsSummary');
