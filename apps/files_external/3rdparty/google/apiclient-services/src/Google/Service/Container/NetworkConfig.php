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

class Google_Service_Container_NetworkConfig extends Google_Model
{
  protected $defaultSnatStatusType = 'Google_Service_Container_DefaultSnatStatus';
  protected $defaultSnatStatusDataType = '';
  public $enableIntraNodeVisibility;
  public $network;
  public $privateIpv6GoogleAccess;
  public $subnetwork;

  /**
   * @param Google_Service_Container_DefaultSnatStatus
   */
  public function setDefaultSnatStatus(Google_Service_Container_DefaultSnatStatus $defaultSnatStatus)
  {
    $this->defaultSnatStatus = $defaultSnatStatus;
  }
  /**
   * @return Google_Service_Container_DefaultSnatStatus
   */
  public function getDefaultSnatStatus()
  {
    return $this->defaultSnatStatus;
  }
  public function setEnableIntraNodeVisibility($enableIntraNodeVisibility)
  {
    $this->enableIntraNodeVisibility = $enableIntraNodeVisibility;
  }
  public function getEnableIntraNodeVisibility()
  {
    return $this->enableIntraNodeVisibility;
  }
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  public function getNetwork()
  {
    return $this->network;
  }
  public function setPrivateIpv6GoogleAccess($privateIpv6GoogleAccess)
  {
    $this->privateIpv6GoogleAccess = $privateIpv6GoogleAccess;
  }
  public function getPrivateIpv6GoogleAccess()
  {
    return $this->privateIpv6GoogleAccess;
  }
  public function setSubnetwork($subnetwork)
  {
    $this->subnetwork = $subnetwork;
  }
  public function getSubnetwork()
  {
    return $this->subnetwork;
  }
}
