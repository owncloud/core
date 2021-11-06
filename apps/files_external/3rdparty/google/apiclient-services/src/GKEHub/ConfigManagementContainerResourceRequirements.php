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

namespace Google\Service\GKEHub;

class ConfigManagementContainerResourceRequirements extends \Google\Model
{
  public $containerName;
  protected $cpuLimitType = ConfigManagementQuantity::class;
  protected $cpuLimitDataType = '';
  protected $memoryLimitType = ConfigManagementQuantity::class;
  protected $memoryLimitDataType = '';

  public function setContainerName($containerName)
  {
    $this->containerName = $containerName;
  }
  public function getContainerName()
  {
    return $this->containerName;
  }
  /**
   * @param ConfigManagementQuantity
   */
  public function setCpuLimit(ConfigManagementQuantity $cpuLimit)
  {
    $this->cpuLimit = $cpuLimit;
  }
  /**
   * @return ConfigManagementQuantity
   */
  public function getCpuLimit()
  {
    return $this->cpuLimit;
  }
  /**
   * @param ConfigManagementQuantity
   */
  public function setMemoryLimit(ConfigManagementQuantity $memoryLimit)
  {
    $this->memoryLimit = $memoryLimit;
  }
  /**
   * @return ConfigManagementQuantity
   */
  public function getMemoryLimit()
  {
    return $this->memoryLimit;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConfigManagementContainerResourceRequirements::class, 'Google_Service_GKEHub_ConfigManagementContainerResourceRequirements');
