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

class AdvancedMachineFeatures extends \Google\Model
{
  /**
   * @var bool
   */
  public $enableNestedVirtualization;
  /**
   * @var bool
   */
  public $enableUefiNetworking;
  /**
   * @var int
   */
  public $threadsPerCore;
  /**
   * @var int
   */
  public $visibleCoreCount;

  /**
   * @param bool
   */
  public function setEnableNestedVirtualization($enableNestedVirtualization)
  {
    $this->enableNestedVirtualization = $enableNestedVirtualization;
  }
  /**
   * @return bool
   */
  public function getEnableNestedVirtualization()
  {
    return $this->enableNestedVirtualization;
  }
  /**
   * @param bool
   */
  public function setEnableUefiNetworking($enableUefiNetworking)
  {
    $this->enableUefiNetworking = $enableUefiNetworking;
  }
  /**
   * @return bool
   */
  public function getEnableUefiNetworking()
  {
    return $this->enableUefiNetworking;
  }
  /**
   * @param int
   */
  public function setThreadsPerCore($threadsPerCore)
  {
    $this->threadsPerCore = $threadsPerCore;
  }
  /**
   * @return int
   */
  public function getThreadsPerCore()
  {
    return $this->threadsPerCore;
  }
  /**
   * @param int
   */
  public function setVisibleCoreCount($visibleCoreCount)
  {
    $this->visibleCoreCount = $visibleCoreCount;
  }
  /**
   * @return int
   */
  public function getVisibleCoreCount()
  {
    return $this->visibleCoreCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdvancedMachineFeatures::class, 'Google_Service_Compute_AdvancedMachineFeatures');
