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

namespace Google\Service\Compute;

class RouterInterface extends \Google\Model
{
  /**
   * @var string
   */
  public $ipRange;
  /**
   * @var string
   */
  public $linkedInterconnectAttachment;
  /**
   * @var string
   */
  public $linkedVpnTunnel;
  /**
   * @var string
   */
  public $managementType;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $privateIpAddress;
  /**
   * @var string
   */
  public $redundantInterface;
  /**
   * @var string
   */
  public $subnetwork;

  /**
   * @param string
   */
  public function setIpRange($ipRange)
  {
    $this->ipRange = $ipRange;
  }
  /**
   * @return string
   */
  public function getIpRange()
  {
    return $this->ipRange;
  }
  /**
   * @param string
   */
  public function setLinkedInterconnectAttachment($linkedInterconnectAttachment)
  {
    $this->linkedInterconnectAttachment = $linkedInterconnectAttachment;
  }
  /**
   * @return string
   */
  public function getLinkedInterconnectAttachment()
  {
    return $this->linkedInterconnectAttachment;
  }
  /**
   * @param string
   */
  public function setLinkedVpnTunnel($linkedVpnTunnel)
  {
    $this->linkedVpnTunnel = $linkedVpnTunnel;
  }
  /**
   * @return string
   */
  public function getLinkedVpnTunnel()
  {
    return $this->linkedVpnTunnel;
  }
  /**
   * @param string
   */
  public function setManagementType($managementType)
  {
    $this->managementType = $managementType;
  }
  /**
   * @return string
   */
  public function getManagementType()
  {
    return $this->managementType;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setPrivateIpAddress($privateIpAddress)
  {
    $this->privateIpAddress = $privateIpAddress;
  }
  /**
   * @return string
   */
  public function getPrivateIpAddress()
  {
    return $this->privateIpAddress;
  }
  /**
   * @param string
   */
  public function setRedundantInterface($redundantInterface)
  {
    $this->redundantInterface = $redundantInterface;
  }
  /**
   * @return string
   */
  public function getRedundantInterface()
  {
    return $this->redundantInterface;
  }
  /**
   * @param string
   */
  public function setSubnetwork($subnetwork)
  {
    $this->subnetwork = $subnetwork;
  }
  /**
   * @return string
   */
  public function getSubnetwork()
  {
    return $this->subnetwork;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RouterInterface::class, 'Google_Service_Compute_RouterInterface');
