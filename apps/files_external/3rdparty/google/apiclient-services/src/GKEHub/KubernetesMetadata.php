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

class KubernetesMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $kubernetesApiServerVersion;
  /**
   * @var int
   */
  public $memoryMb;
  /**
   * @var int
   */
  public $nodeCount;
  /**
   * @var string
   */
  public $nodeProviderId;
  /**
   * @var string
   */
  public $updateTime;
  /**
   * @var int
   */
  public $vcpuCount;

  /**
   * @param string
   */
  public function setKubernetesApiServerVersion($kubernetesApiServerVersion)
  {
    $this->kubernetesApiServerVersion = $kubernetesApiServerVersion;
  }
  /**
   * @return string
   */
  public function getKubernetesApiServerVersion()
  {
    return $this->kubernetesApiServerVersion;
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
  public function setNodeCount($nodeCount)
  {
    $this->nodeCount = $nodeCount;
  }
  /**
   * @return int
   */
  public function getNodeCount()
  {
    return $this->nodeCount;
  }
  /**
   * @param string
   */
  public function setNodeProviderId($nodeProviderId)
  {
    $this->nodeProviderId = $nodeProviderId;
  }
  /**
   * @return string
   */
  public function getNodeProviderId()
  {
    return $this->nodeProviderId;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param int
   */
  public function setVcpuCount($vcpuCount)
  {
    $this->vcpuCount = $vcpuCount;
  }
  /**
   * @return int
   */
  public function getVcpuCount()
  {
    return $this->vcpuCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KubernetesMetadata::class, 'Google_Service_GKEHub_KubernetesMetadata');
