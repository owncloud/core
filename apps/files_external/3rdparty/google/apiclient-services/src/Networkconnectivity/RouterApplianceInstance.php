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

namespace Google\Service\Networkconnectivity;

class RouterApplianceInstance extends \Google\Model
{
  /**
   * @var string
   */
  public $ipAddress;
  /**
   * @var string
   */
  public $virtualMachine;

  /**
   * @param string
   */
  public function setIpAddress($ipAddress)
  {
    $this->ipAddress = $ipAddress;
  }
  /**
   * @return string
   */
  public function getIpAddress()
  {
    return $this->ipAddress;
  }
  /**
   * @param string
   */
  public function setVirtualMachine($virtualMachine)
  {
    $this->virtualMachine = $virtualMachine;
  }
  /**
   * @return string
   */
  public function getVirtualMachine()
  {
    return $this->virtualMachine;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RouterApplianceInstance::class, 'Google_Service_Networkconnectivity_RouterApplianceInstance');
