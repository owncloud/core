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

class InstanceConsumptionInfo extends \Google\Model
{
  /**
   * @var int
   */
  public $guestCpus;
  /**
   * @var int
   */
  public $localSsdGb;
  /**
   * @var int
   */
  public $memoryMb;
  /**
   * @var int
   */
  public $minNodeCpus;

  /**
   * @param int
   */
  public function setGuestCpus($guestCpus)
  {
    $this->guestCpus = $guestCpus;
  }
  /**
   * @return int
   */
  public function getGuestCpus()
  {
    return $this->guestCpus;
  }
  /**
   * @param int
   */
  public function setLocalSsdGb($localSsdGb)
  {
    $this->localSsdGb = $localSsdGb;
  }
  /**
   * @return int
   */
  public function getLocalSsdGb()
  {
    return $this->localSsdGb;
  }
  /**
   * @param int
   */
  public function setMemoryMb($memoryMb)
  {
    $this->memoryMb = $memoryMb;
  }
  /**
   * @return int
   */
  public function getMemoryMb()
  {
    return $this->memoryMb;
  }
  /**
   * @param int
   */
  public function setMinNodeCpus($minNodeCpus)
  {
    $this->minNodeCpus = $minNodeCpus;
  }
  /**
   * @return int
   */
  public function getMinNodeCpus()
  {
    return $this->minNodeCpus;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InstanceConsumptionInfo::class, 'Google_Service_Compute_InstanceConsumptionInfo');
