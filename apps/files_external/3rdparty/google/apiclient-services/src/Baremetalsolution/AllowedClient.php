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

class AllowedClient extends \Google\Model
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
  public $allowedClientsCidr;
  /**
   * @var string
   */
  public $mountPermissions;
  /**
   * @var string
   */
  public $network;
  /**
   * @var bool
   */
  public $noRootSquash;
  /**
   * @var string
   */
  public $shareIp;

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
  public function setAllowedClientsCidr($allowedClientsCidr)
  {
    $this->allowedClientsCidr = $allowedClientsCidr;
  }
  /**
   * @return string
   */
  public function getAllowedClientsCidr()
  {
    return $this->allowedClientsCidr;
  }
  /**
   * @param string
   */
  public function setMountPermissions($mountPermissions)
  {
    $this->mountPermissions = $mountPermissions;
  }
  /**
   * @return string
   */
  public function getMountPermissions()
  {
    return $this->mountPermissions;
  }
  /**
   * @param string
   */
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  /**
   * @return string
   */
  public function getNetwork()
  {
    return $this->network;
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
  public function setShareIp($shareIp)
  {
    $this->shareIp = $shareIp;
  }
  /**
   * @return string
   */
  public function getShareIp()
  {
    return $this->shareIp;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AllowedClient::class, 'Google_Service_Baremetalsolution_AllowedClient');
