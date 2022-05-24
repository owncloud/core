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

namespace Google\Service\Baremetalsolution;

class NfsExport extends \Google\Model
{
  /**
   * @var bool
   */
  public $allowDev;
  /**
   * @var bool
   */
  public $allowSuid;
  /**
   * @var string
   */
  public $cidr;
  /**
   * @var string
   */
  public $machineId;
  /**
   * @var string
   */
  public $networkId;
  /**
   * @var bool
   */
  public $noRootSquash;
  /**
   * @var string
   */
  public $permissions;

  /**
   * @param bool
   */
  public function setAllowDev($allowDev)
  {
    $this->allowDev = $allowDev;
  }
  /**
   * @return bool
   */
  public function getAllowDev()
  {
    return $this->allowDev;
  }
  /**
   * @param bool
   */
  public function setAllowSuid($allowSuid)
  {
    $this->allowSuid = $allowSuid;
  }
  /**
   * @return bool
   */
  public function getAllowSuid()
  {
    return $this->allowSuid;
  }
  /**
   * @param string
   */
  public function setCidr($cidr)
  {
    $this->cidr = $cidr;
  }
  /**
   * @return string
   */
  public function getCidr()
  {
    return $this->cidr;
  }
  /**
   * @param string
   */
  public function setMachineId($machineId)
  {
    $this->machineId = $machineId;
  }
  /**
   * @return string
   */
  public function getMachineId()
  {
    return $this->machineId;
  }
  /**
   * @param string
   */
  public function setNetworkId($networkId)
  {
    $this->networkId = $networkId;
  }
  /**
   * @return string
   */
  public function getNetworkId()
  {
    return $this->networkId;
  }
  /**
   * @param bool
   */
  public function setNoRootSquash($noRootSquash)
  {
    $this->noRootSquash = $noRootSquash;
  }
  /**
   * @return bool
   */
  public function getNoRootSquash()
  {
    return $this->noRootSquash;
  }
  /**
   * @param string
   */
  public function setPermissions($permissions)
  {
    $this->permissions = $permissions;
  }
  /**
   * @return string
   */
  public function getPermissions()
  {
    return $this->permissions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NfsExport::class, 'Google_Service_Baremetalsolution_NfsExport');
