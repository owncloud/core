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

class Google_Service_GKEHub_KubernetesMetadata extends Google_Model
{
  public $kubernetesApiServerVersion;
  public $memoryMb;
  public $nodeCount;
  public $nodeProviderId;
  public $updateTime;
  public $vcpuCount;

  public function setKubernetesApiServerVersion($kubernetesApiServerVersion)
  {
    $this->kubernetesApiServerVersion = $kubernetesApiServerVersion;
  }
  public function getKubernetesApiServerVersion()
  {
    return $this->kubernetesApiServerVersion;
  }
  public function setMemoryMb($memoryMb)
  {
    $this->memoryMb = $memoryMb;
  }
  public function getMemoryMb()
  {
    return $this->memoryMb;
  }
  public function setNodeCount($nodeCount)
  {
    $this->nodeCount = $nodeCount;
  }
  public function getNodeCount()
  {
    return $this->nodeCount;
  }
  public function setNodeProviderId($nodeProviderId)
  {
    $this->nodeProviderId = $nodeProviderId;
  }
  public function getNodeProviderId()
  {
    return $this->nodeProviderId;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  public function setVcpuCount($vcpuCount)
  {
    $this->vcpuCount = $vcpuCount;
  }
  public function getVcpuCount()
  {
    return $this->vcpuCount;
  }
}
