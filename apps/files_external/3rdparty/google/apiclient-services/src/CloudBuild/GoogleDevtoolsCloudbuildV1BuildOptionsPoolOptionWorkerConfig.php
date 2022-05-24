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

namespace Google\Service\CloudBuild;

class GoogleDevtoolsCloudbuildV1BuildOptionsPoolOptionWorkerConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $diskSizeGb;
  /**
   * @var float
   */
  public $memoryGb;
  /**
   * @var float
   */
  public $vcpuCount;

  /**
   * @param string
   */
  public function setDiskSizeGb($diskSizeGb)
  {
    $this->diskSizeGb = $diskSizeGb;
  }
  /**
   * @return string
   */
  public function getDiskSizeGb()
  {
    return $this->diskSizeGb;
  }
  /**
   * @param float
   */
  public function setMemoryGb($memoryGb)
  {
    $this->memoryGb = $memoryGb;
  }
  /**
   * @return float
   */
  public function getMemoryGb()
  {
    return $this->memoryGb;
  }
  /**
   * @param float
   */
  public function setVcpuCount($vcpuCount)
  {
    $this->vcpuCount = $vcpuCount;
  }
  /**
   * @return float
   */
  public function getVcpuCount()
  {
    return $this->vcpuCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleDevtoolsCloudbuildV1BuildOptionsPoolOptionWorkerConfig::class, 'Google_Service_CloudBuild_GoogleDevtoolsCloudbuildV1BuildOptionsPoolOptionWorkerConfig');
