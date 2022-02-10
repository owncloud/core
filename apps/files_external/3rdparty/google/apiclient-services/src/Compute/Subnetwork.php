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

class Subnetwork extends \Google\Collection
{
  protected $collection_key = 'secondaryIpRanges';
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
  public $enableFlowLogs;
  /**
   * @var string
   */
  public $externalIpv6Prefix;
  /**
   * @var string
   */
  public $fingerprint;
  /**
   * @var string
   */
  public $gatewayAddress;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $ipCidrRange;
  /**
   * @var string
   */
  public $ipv6AccessType;
  /**
   * @var string
   */
  public $ipv6CidrRange;
  /**
   * @var string
   */
  public $kind;
  protected $logConfigType = SubnetworkLogConfig::class;
  protected $logConfigDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $network;
  /**
   * @var bool
   */
  public $privateIpGoogleAccess;
  /**
   * @var string
   */
  public $privateIpv6GoogleAccess;
  /**
   * @var string
   */
  public $purpose;
  /**
   * @var string
   */
  public $region;
  /**
   * @var string
   */
  public $role;
  protected $secondaryIpRangesType = SubnetworkSecondaryRange::class;
  protected $secondaryIpRangesDataType = 'array';
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $stackType;
  /**
   * @var string
   */
  public $state;

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
  public function setEnableFlowLogs($enableFlowLogs)
  {
    $this->enableFlowLogs = $enableFlowLogs;
  }
  /**
   * @return bool
   */
  public function getEnableFlowLogs()
  {
    return $this->enableFlowLogs;
  }
  /**
   * @param string
   */
  public function setExternalIpv6Prefix($externalIpv6Prefix)
  {
    $this->externalIpv6Prefix = $externalIpv6Prefix;
  }
  /**
   * @return string
   */
  public function getExternalIpv6Prefix()
  {
    return $this->externalIpv6Prefix;
  }
  /**
   * @param string
   */
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  /**
   * @return string
   */
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  /**
   * @param string
   */
  public function setGatewayAddress($gatewayAddress)
  {
    $this->gatewayAddress = $gatewayAddress;
  }
  /**
   * @return string
   */
  public function getGatewayAddress()
  {
    return $this->gatewayAddress;
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
  public function setIpCidrRange($ipCidrRange)
  {
    $this->ipCidrRange = $ipCidrRange;
  }
  /**
   * @return string
   */
  public function getIpCidrRange()
  {
    return $this->ipCidrRange;
  }
  /**
   * @param string
   */
  public function setIpv6AccessType($ipv6AccessType)
  {
    $this->ipv6AccessType = $ipv6AccessType;
  }
  /**
   * @return string
   */
  public function getIpv6AccessType()
  {
    return $this->ipv6AccessType;
  }
  /**
   * @param string
   */
  public function setIpv6CidrRange($ipv6CidrRange)
  {
    $this->ipv6CidrRange = $ipv6CidrRange;
  }
  /**
   * @return string
   */
  public function getIpv6CidrRange()
  {
    return $this->ipv6CidrRange;
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
   * @param SubnetworkLogConfig
   */
  public function setLogConfig(SubnetworkLogConfig $logConfig)
  {
    $this->logConfig = $logConfig;
  }
  /**
   * @return SubnetworkLogConfig
   */
  public function getLogConfig()
  {
    return $this->logConfig;
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
  public function setPrivateIpGoogleAccess($privateIpGoogleAccess)
  {
    $this->privateIpGoogleAccess = $privateIpGoogleAccess;
  }
  /**
   * @return bool
   */
  public function getPrivateIpGoogleAccess()
  {
    return $this->privateIpGoogleAccess;
  }
  /**
   * @param string
   */
  public function setPrivateIpv6GoogleAccess($privateIpv6GoogleAccess)
  {
    $this->privateIpv6GoogleAccess = $privateIpv6GoogleAccess;
  }
  /**
   * @return string
   */
  public function getPrivateIpv6GoogleAccess()
  {
    return $this->privateIpv6GoogleAccess;
  }
  /**
   * @param string
   */
  public function setPurpose($purpose)
  {
    $this->purpose = $purpose;
  }
  /**
   * @return string
   */
  public function getPurpose()
  {
    return $this->purpose;
  }
  /**
   * @param string
   */
  public function setRegion($region)
  {
    $this->region = $region;
  }
  /**
   * @return string
   */
  public function getRegion()
  {
    return $this->region;
  }
  /**
   * @param string
   */
  public function setRole($role)
  {
    $this->role = $role;
  }
  /**
   * @return string
   */
  public function getRole()
  {
    return $this->role;
  }
  /**
   * @param SubnetworkSecondaryRange[]
   */
  public function setSecondaryIpRanges($secondaryIpRanges)
  {
    $this->secondaryIpRanges = $secondaryIpRanges;
  }
  /**
   * @return SubnetworkSecondaryRange[]
   */
  public function getSecondaryIpRanges()
  {
    return $this->secondaryIpRanges;
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
  public function setStackType($stackType)
  {
    $this->stackType = $stackType;
  }
  /**
   * @return string
   */
  public function getStackType()
  {
    return $this->stackType;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Subnetwork::class, 'Google_Service_Compute_Subnetwork');
