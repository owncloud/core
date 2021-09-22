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

namespace Google\Service\AIPlatformNotebooks;

class Runtime extends \Google\Model
{
  protected $accessConfigType = RuntimeAccessConfig::class;
  protected $accessConfigDataType = '';
  public $createTime;
  public $healthState;
  protected $metricsType = RuntimeMetrics::class;
  protected $metricsDataType = '';
  public $name;
  protected $softwareConfigType = RuntimeSoftwareConfig::class;
  protected $softwareConfigDataType = '';
  public $state;
  public $updateTime;
  protected $virtualMachineType = VirtualMachine::class;
  protected $virtualMachineDataType = '';

  /**
   * @param RuntimeAccessConfig
   */
  public function setAccessConfig(RuntimeAccessConfig $accessConfig)
  {
    $this->accessConfig = $accessConfig;
  }
  /**
   * @return RuntimeAccessConfig
   */
  public function getAccessConfig()
  {
    return $this->accessConfig;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setHealthState($healthState)
  {
    $this->healthState = $healthState;
  }
  public function getHealthState()
  {
    return $this->healthState;
  }
  /**
   * @param RuntimeMetrics
   */
  public function setMetrics(RuntimeMetrics $metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return RuntimeMetrics
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param RuntimeSoftwareConfig
   */
  public function setSoftwareConfig(RuntimeSoftwareConfig $softwareConfig)
  {
    $this->softwareConfig = $softwareConfig;
  }
  /**
   * @return RuntimeSoftwareConfig
   */
  public function getSoftwareConfig()
  {
    return $this->softwareConfig;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param VirtualMachine
   */
  public function setVirtualMachine(VirtualMachine $virtualMachine)
  {
    $this->virtualMachine = $virtualMachine;
  }
  /**
   * @return VirtualMachine
   */
  public function getVirtualMachine()
  {
    return $this->virtualMachine;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Runtime::class, 'Google_Service_AIPlatformNotebooks_Runtime');
