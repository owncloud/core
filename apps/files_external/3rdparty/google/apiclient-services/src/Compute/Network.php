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

class Network extends \Google\Collection
{
  protected $collection_key = 'subnetworks';
  protected $internal_gapi_mappings = [
        "iPv4Range" => "IPv4Range",
  ];
  /**
   * @var string
   */
  public $iPv4Range;
  /**
   * @var bool
   */
  public $autoCreateSubnetworks;
  /**
   * @var string
   */
  public $creationTimestamp;
  /**
   * @var string
   */
  public $description;
  /**
   * @var bool
   */
  public $enableUlaInternalIpv6;
  /**
   * @var string
   */
  public $firewallPolicy;
  /**
   * @var string
   */
  public $gatewayIPv4;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $internalIpv6Range;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var int
   */
  public $mtu;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $networkFirewallPolicyEnforcementOrder;
  protected $peeringsType = NetworkPeering::class;
  protected $peeringsDataType = 'array';
  protected $routingConfigType = NetworkRoutingConfig::class;
  protected $routingConfigDataType = '';
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $selfLinkWithId;
  /**
   * @var string[]
   */
  public $subnetworks;

  /**
   * @param string
   */
  public function setIPv4Range($iPv4Range)
  {
    $this->iPv4Range = $iPv4Range;
  }
  /**
   * @return string
   */
  public function getIPv4Range()
  {
    return $this->iPv4Range;
  }
  /**
   * @param bool
   */
  public function setAutoCreateSubnetworks($autoCreateSubnetworks)
  {
    $this->autoCreateSubnetworks = $autoCreateSubnetworks;
  }
  /**
   * @return bool
   */
  public function getAutoCreateSubnetworks()
  {
    return $this->autoCreateSubnetworks;
  }
  /**
   * @param string
   */
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  /**
   * @return string
   */
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param bool
   */
  public function setEnableUlaInternalIpv6($enableUlaInternalIpv6)
  {
    $this->enableUlaInternalIpv6 = $enableUlaInternalIpv6;
  }
  /**
   * @return bool
   */
  public function getEnableUlaInternalIpv6()
  {
    return $this->enableUlaInternalIpv6;
  }
  /**
   * @param string
   */
  public function setFirewallPolicy($firewallPolicy)
  {
    $this->firewallPolicy = $firewallPolicy;
  }
  /**
   * @return string
   */
  public function getFirewallPolicy()
  {
    return $this->firewallPolicy;
  }
  /**
   * @param string
   */
  public function setGatewayIPv4($gatewayIPv4)
  {
    $this->gatewayIPv4 = $gatewayIPv4;
  }
  /**
   * @return string
   */
  public function getGatewayIPv4()
  {
    return $this->gatewayIPv4;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setInternalIpv6Range($internalIpv6Range)
  {
    $this->internalIpv6Range = $internalIpv6Range;
  }
  /**
   * @return string
   */
  public function getInternalIpv6Range()
  {
    return $this->internalIpv6Range;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param int
   */
  public function setMtu($mtu)
  {
    $this->mtu = $mtu;
  }
  /**
   * @return int
   */
  public function getMtu()
  {
    return $this->mtu;
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
  public function setNetworkFirewallPolicyEnforcementOrder($networkFirewallPolicyEnforcementOrder)
  {
    $this->networkFirewallPolicyEnforcementOrder = $networkFirewallPolicyEnforcementOrder;
  }
  /**
   * @return string
   */
  public function getNetworkFirewallPolicyEnforcementOrder()
  {
    return $this->networkFirewallPolicyEnforcementOrder;
  }
  /**
   * @param NetworkPeering[]
   */
  public function setPeerings($peerings)
  {
    $this->peerings = $peerings;
  }
  /**
   * @return NetworkPeering[]
   */
  public function getPeerings()
  {
    return $this->peerings;
  }
  /**
   * @param NetworkRoutingConfig
   */
  public function setRoutingConfig(NetworkRoutingConfig $routingConfig)
  {
    $this->routingConfig = $routingConfig;
  }
  /**
   * @return NetworkRoutingConfig
   */
  public function getRoutingConfig()
  {
    return $this->routingConfig;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param string
   */
  public function setSelfLinkWithId($selfLinkWithId)
  {
    $this->selfLinkWithId = $selfLinkWithId;
  }
  /**
   * @return string
   */
  public function getSelfLinkWithId()
  {
    return $this->selfLinkWithId;
  }
  /**
   * @param string[]
   */
  public function setSubnetworks($subnetworks)
  {
    $this->subnetworks = $subnetworks;
  }
  /**
   * @return string[]
   */
  public function getSubnetworks()
  {
    return $this->subnetworks;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Network::class, 'Google_Service_Compute_Network');
