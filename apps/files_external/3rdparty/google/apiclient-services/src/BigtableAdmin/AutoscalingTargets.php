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

namespace Google\Service\BigtableAdmin;

class AutoscalingTargets extends \Google\Model
{
  /**
   * @var int
   */
  public $cpuUtilizationPercent;
  /**
   * @var int
   */
  public $storageUtilizationGibPerNode;

  /**
   * @param int
   */
  public function setCpuUtilizationPercent($cpuUtilizationPercent)
  {
    $this->cpuUtilizationPercent = $cpuUtilizationPercent;
  }
  /**
   * @return int
   */
  public function getCpuUtilizationPercent()
  {
    return $this->cpuUtilizationPercent;
  }
  /**
   * @param int
   */
  public function setStorageUtilizationGibPerNode($storageUtilizationGibPerNode)
  {
    $this->storageUtilizationGibPerNode = $storageUtilizationGibPerNode;
  }
  /**
   * @return int
   */
  public function getStorageUtilizationGibPerNode()
  {
    return $this->storageUtilizationGibPerNode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AutoscalingTargets::class, 'Google_Service_BigtableAdmin_AutoscalingTargets');
