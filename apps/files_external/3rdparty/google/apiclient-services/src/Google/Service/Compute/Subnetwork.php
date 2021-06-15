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

class Google_Service_Compute_Subnetwork extends Google_Collection
{
  protected $collection_key = 'secondaryIpRanges';
  public $creationTimestamp;
  public $description;
  public $enableFlowLogs;
  public $externalIpv6Prefix;
  public $fingerprint;
  public $gatewayAddress;
  public $id;
  public $ipCidrRange;
  public $ipv6AccessType;
  public $ipv6CidrRange;
  public $kind;
  protected $logConfigType = 'Google_Service_Compute_SubnetworkLogConfig';
  protected $logConfigDataType = '';
  public $name;
  public $network;
  public $privateIpGoogleAccess;
  public $privateIpv6GoogleAccess;
  public $purpose;
  public $region;
  public $role;
  protected $secondaryIpRangesType = 'Google_Service_Compute_SubnetworkSecondaryRange';
  protected $secondaryIpRangesDataType = 'array';
  public $selfLink;
  public $stackType;
  public $state;

  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEnableFlowLogs($enableFlowLogs)
  {
    $this->enableFlowLogs = $enableFlowLogs;
  }
  public function getEnableFlowLogs()
  {
    return $this->enableFlowLogs;
  }
  public function setExternalIpv6Prefix($externalIpv6Prefix)
  {
    $this->externalIpv6Prefix = $externalIpv6Prefix;
  }
  public function getExternalIpv6Prefix()
  {
    return $this->externalIpv6Prefix;
  }
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  public function setGatewayAddress($gatewayAddress)
  {
    $this->gatewayAddress = $gatewayAddress;
  }
  public function getGatewayAddress()
  {
    return $this->gatewayAddress;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setIpCidrRange($ipCidrRange)
  {
    $this->ipCidrRange = $ipCidrRange;
  }
  public function getIpCidrRange()
  {
    return $this->ipCidrRange;
  }
  public function setIpv6AccessType($ipv6AccessType)
  {
    $this->ipv6AccessType = $ipv6AccessType;
  }
  public function getIpv6AccessType()
  {
    return $this->ipv6AccessType;
  }
  public function setIpv6CidrRange($ipv6CidrRange)
  {
    $this->ipv6CidrRange = $ipv6CidrRange;
  }
  public function getIpv6CidrRange()
  {
    return $this->ipv6CidrRange;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_Compute_SubnetworkLogConfig
   */
  public function setLogConfig(Google_Service_Compute_SubnetworkLogConfig $logConfig)
  {
    $this->logConfig = $logConfig;
  }
  /**
   * @return Google_Service_Compute_SubnetworkLogConfig
   */
  public function getLogConfig()
  {
    return $this->logConfig;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  public function getNetwork()
  {
    return $this->network;
  }
  public function setPrivateIpGoogleAccess($privateIpGoogleAccess)
  {
    $this->privateIpGoogleAccess = $privateIpGoogleAccess;
  }
  public function getPrivateIpGoogleAccess()
  {
    return $this->privateIpGoogleAccess;
  }
  public function setPrivateIpv6GoogleAccess($privateIpv6GoogleAccess)
  {
    $this->privateIpv6GoogleAccess = $privateIpv6GoogleAccess;
  }
  public function getPrivateIpv6GoogleAccess()
  {
    return $this->privateIpv6GoogleAccess;
  }
  public function setPurpose($purpose)
  {
    $this->purpose = $purpose;
  }
  public function getPurpose()
  {
    return $this->purpose;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setRole($role)
  {
    $this->role = $role;
  }
  public function getRole()
  {
    return $this->role;
  }
  /**
   * @param Google_Service_Compute_SubnetworkSecondaryRange[]
   */
  public function setSecondaryIpRanges($secondaryIpRanges)
  {
    $this->secondaryIpRanges = $secondaryIpRanges;
  }
  /**
   * @return Google_Service_Compute_SubnetworkSecondaryRange[]
   */
  public function getSecondaryIpRanges()
  {
    return $this->secondaryIpRanges;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setStackType($stackType)
  {
    $this->stackType = $stackType;
  }
  public function getStackType()
  {
    return $this->stackType;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}
