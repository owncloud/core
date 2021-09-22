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

class VirtualMachine extends \Google\Model
{
  public $instanceId;
  public $instanceName;
  protected $virtualMachineConfigType = VirtualMachineConfig::class;
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
   * @param VirtualMachineConfig
   */
  public function setVirtualMachineConfig(VirtualMachineConfig $virtualMachineConfig)
  {
    $this->virtualMachineConfig = $virtualMachineConfig;
  }
  /**
   * @return VirtualMachineConfig
   */
  public function getVirtualMachineConfig()
  {
    return $this->virtualMachineConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VirtualMachine::class, 'Google_Service_AIPlatformNotebooks_VirtualMachine');
