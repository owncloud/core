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

class SwitchRuntimeRequest extends \Google\Model
{
  protected $acceleratorConfigType = RuntimeAcceleratorConfig::class;
  protected $acceleratorConfigDataType = '';
  /**
   * @var string
   */
  public $machineType;

  /**
   * @param RuntimeAcceleratorConfig
   */
  public function setAcceleratorConfig(RuntimeAcceleratorConfig $acceleratorConfig)
  {
    $this->acceleratorConfig = $acceleratorConfig;
  }
  /**
   * @return RuntimeAcceleratorConfig
   */
  public function getAcceleratorConfig()
  {
    return $this->acceleratorConfig;
  }
  /**
   * @param string
   */
  public function setMachineType($machineType)
  {
    $this->machineType = $machineType;
  }
  /**
   * @return string
   */
  public function getMachineType()
  {
    return $this->machineType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SwitchRuntimeRequest::class, 'Google_Service_AIPlatformNotebooks_SwitchRuntimeRequest');
