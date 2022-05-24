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
  /**
   * @var string
   */
  public $fingerprint;
  /**
   * @var int
   */
  public $internalIpv6PrefixLength;
  protected $ipv6AccessConfigsType = AccessConfig::class;
  protected $ipv6AccessConfigsDataType = 'array';
  /**
   * @var string
   */
  public $ipv6AccessType;
  /**
   * @var string
   */
  public $ipv6Address;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $network;
  /**
   * @var string
   */
  public $networkIP;
  /**
   * @var string
   */
  public $nicType;
  /**
   * @var int
   */
  public $queueCount;
  /**
   * @var string
   */
  public $stackType;
  /**
   * @var string
   */
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
   * @param int
   */
  public function setInternalIpv6PrefixLength($internalIpv6PrefixLength)
  {
    $this->internalIpv6PrefixLength = $internalIpv6PrefixLength;
  }
  /**
   * @return int
   */
  public function getInternalIpv6PrefixLength()
  {
    return $this->internalIpv6PrefixLength;
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
  public function setIpv6Address($ipv6Address)
  {
    $this->ipv6Address = $ipv6Address;
  }
  /**
   * @return string
   */
  public function getIpv6Address()
  {
    return $this->ipv6Address;
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
   * @param string
   */
  public function setNetworkIP($networkIP)
  {
    $this->networkIP = $networkIP;
  }
  /**
   * @return string
   */
  public function getNetworkIP()
  {
    return $this->networkIP;
  }
  /**
   * @param string
   */
  public function setNicType($nicType)
  {
    $this->nicType = $nicType;
  }
  /**
   * @return string
   */
  public function getNicType()
  {
    return $this->nicType;
  }
  /**
   * @param int
   */
  public function setQueueCount($queueCount)
  {
    $this->queueCount = $queueCount;
  }
  /**
   * @return int
   */
  public function getQueueCount()
  {
    return $this->queueCount;
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
class_alias(NetworkInterface::class, 'Google_Service_Compute_NetworkInterface');
