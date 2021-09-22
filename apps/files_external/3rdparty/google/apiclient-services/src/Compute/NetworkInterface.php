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

class NetworkInterface extends \Google\Collection
{
  protected $collection_key = 'ipv6AccessConfigs';
  protected $accessConfigsType = AccessConfig::class;
  protected $accessConfigsDataType = 'array';
  protected $aliasIpRangesType = AliasIpRange::class;
  protected $aliasIpRangesDataType = 'array';
  public $fingerprint;
  protected $ipv6AccessConfigsType = AccessConfig::class;
  protected $ipv6AccessConfigsDataType = 'array';
  public $ipv6AccessType;
  public $ipv6Address;
  public $kind;
  public $name;
  public $network;
  public $networkIP;
  public $nicType;
  public $queueCount;
  public $stackType;
  public $subnetwork;

  /**
   * @param AccessConfig[]
   */
  public function setAccessConfigs($accessConfigs)
  {
    $this->accessConfigs = $accessConfigs;
  }
  /**
   * @return AccessConfig[]
   */
  public function getAccessConfigs()
  {
    return $this->accessConfigs;
  }
  /**
   * @param AliasIpRange[]
   */
  public function setAliasIpRanges($aliasIpRanges)
  {
    $this->aliasIpRanges = $aliasIpRanges;
  }
  /**
   * @return AliasIpRange[]
   */
  public function getAliasIpRanges()
  {
    return $this->aliasIpRanges;
  }
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  /**
   * @param AccessConfig[]
   */
  public function setIpv6AccessConfigs($ipv6AccessConfigs)
  {
    $this->ipv6AccessConfigs = $ipv6AccessConfigs;
  }
  /**
   * @return AccessConfig[]
   */
  public function getIpv6AccessConfigs()
  {
    return $this->ipv6AccessConfigs;
  }
  public function setIpv6AccessType($ipv6AccessType)
  {
    $this->ipv6AccessType = $ipv6AccessType;
  }
  public function getIpv6AccessType()
  {
    return $this->ipv6AccessType;
  }
  public function setIpv6Address($ipv6Address)
  {
    $this->ipv6Address = $ipv6Address;
  }
  public function getIpv6Address()
  {
    return $this->ipv6Address;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
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
  public function setNetworkIP($networkIP)
  {
    $this->networkIP = $networkIP;
  }
  public function getNetworkIP()
  {
    return $this->networkIP;
  }
  public function setNicType($nicType)
  {
    $this->nicType = $nicType;
  }
  public function getNicType()
  {
    return $this->nicType;
  }
  public function setQueueCount($queueCount)
  {
    $this->queueCount = $queueCount;
  }
  public function getQueueCount()
  {
    return $this->queueCount;
  }
  public function setStackType($stackType)
  {
    $this->stackType = $stackType;
  }
  public function getStackType()
  {
    return $this->stackType;
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NetworkInterface::class, 'Google_Service_Compute_NetworkInterface');
