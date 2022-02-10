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

namespace Google\Service\CloudRedis;

class ClusterSlots extends \Google\Model
{
  /**
   * @var int
   */
  public $endSlotsExclusive;
  /**
   * @var int
   */
  public $memorySizeGb;
  /**
   * @var int
   */
  public $replicaCount;
  /**
   * @var int
   */
  public $startSlotsInclusive;

  /**
   * @param int
   */
  public function setEndSlotsExclusive($endSlotsExclusive)
  {
    $this->endSlotsExclusive = $endSlotsExclusive;
  }
  /**
   * @return int
   */
  public function getEndSlotsExclusive()
  {
    return $this->endSlotsExclusive;
  }
  /**
   * @param int
   */
  public function setMemorySizeGb($memorySizeGb)
  {
    $this->memorySizeGb = $memorySizeGb;
  }
  /**
   * @return int
   */
  public function getMemorySizeGb()
  {
    return $this->memorySizeGb;
  }
  /**
   * @param int
   */
  public function setReplicaCount($replicaCount)
  {
    $this->replicaCount = $replicaCount;
  }
  /**
   * @return int
   */
  public function getReplicaCount()
  {
    return $this->replicaCount;
  }
  /**
   * @param int
   */
  public function setStartSlotsInclusive($startSlotsInclusive)
  {
    $this->startSlotsInclusive = $startSlotsInclusive;
  }
  /**
   * @return int
   */
  public function getStartSlotsInclusive()
  {
    return $this->startSlotsInclusive;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ClusterSlots::class, 'Google_Service_CloudRedis_ClusterSlots');
