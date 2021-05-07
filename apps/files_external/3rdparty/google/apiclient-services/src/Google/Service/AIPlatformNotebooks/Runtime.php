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

class Google_Service_AIPlatformNotebooks_Runtime extends Google_Model
{
  protected $accessConfigType = 'Google_Service_AIPlatformNotebooks_RuntimeAccessConfig';
  protected $accessConfigDataType = '';
  public $createTime;
  public $healthState;
  protected $metricsType = 'Google_Service_AIPlatformNotebooks_RuntimeMetrics';
  protected $metricsDataType = '';
  public $name;
  protected $softwareConfigType = 'Google_Service_AIPlatformNotebooks_RuntimeSoftwareConfig';
  protected $softwareConfigDataType = '';
  public $state;
  public $updateTime;
  protected $virtualMachineType = 'Google_Service_AIPlatformNotebooks_VirtualMachine';
  protected $virtualMachineDataType = '';

  /**
   * @param Google_Service_AIPlatformNotebooks_RuntimeAccessConfig
   */
  public function setAccessConfig(Google_Service_AIPlatformNotebooks_RuntimeAccessConfig $accessConfig)
  {
    $this->accessConfig = $accessConfig;
  }
  /**
   * @return Google_Service_AIPlatformNotebooks_RuntimeAccessConfig
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
   * @param Google_Service_AIPlatformNotebooks_RuntimeMetrics
   */
  public function setMetrics(Google_Service_AIPlatformNotebooks_RuntimeMetrics $metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return Google_Service_AIPlatformNotebooks_RuntimeMetrics
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
   * @param Google_Service_AIPlatformNotebooks_RuntimeSoftwareConfig
   */
  public function setSoftwareConfig(Google_Service_AIPlatformNotebooks_RuntimeSoftwareConfig $softwareConfig)
  {
    $this->softwareConfig = $softwareConfig;
  }
  /**
   * @return Google_Service_AIPlatformNotebooks_RuntimeSoftwareConfig
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
   * @param Google_Service_AIPlatformNotebooks_VirtualMachine
   */
  public function setVirtualMachine(Google_Service_AIPlatformNotebooks_VirtualMachine $virtualMachine)
  {
    $this->virtualMachine = $virtualMachine;
  }
  /**
   * @return Google_Service_AIPlatformNotebooks_VirtualMachine
   */
  public function getVirtualMachine()
  {
    return $this->virtualMachine;
  }
}
