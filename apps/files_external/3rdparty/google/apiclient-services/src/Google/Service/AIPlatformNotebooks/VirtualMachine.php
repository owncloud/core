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

class Google_Service_AIPlatformNotebooks_VirtualMachine extends Google_Model
{
  public $instanceId;
  public $instanceName;
  protected $virtualMachineConfigType = 'Google_Service_AIPlatformNotebooks_VirtualMachineConfig';
  protected $virtualMachineConfigDataType = '';

  public function setInstanceId($instanceId)
  {
    $this->instanceId = $instanceId;
  }
  public function getInstanceId()
  {
    return $this->instanceId;
  }
  public function setInstanceName($instanceName)
  {
    $this->instanceName = $instanceName;
  }
  public function getInstanceName()
  {
    return $this->instanceName;
  }
  /**
   * @param Google_Service_AIPlatformNotebooks_VirtualMachineConfig
   */
  public function setVirtualMachineConfig(Google_Service_AIPlatformNotebooks_VirtualMachineConfig $virtualMachineConfig)
  {
    $this->virtualMachineConfig = $virtualMachineConfig;
  }
  /**
   * @return Google_Service_AIPlatformNotebooks_VirtualMachineConfig
   */
  public function getVirtualMachineConfig()
  {
    return $this->virtualMachineConfig;
  }
}
