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

class RouterBgpPeer extends \Google\Collection
{
  protected $collection_key = 'advertisedIpRanges';
  /**
   * @var string
   */
  public $advertiseMode;
  /**
   * @var string[]
   */
  public $advertisedGroups;
  protected $advertisedIpRangesType = RouterAdvertisedIpRange::class;
  protected $advertisedIpRangesDataType = 'array';
  /**
   * @var string
   */
  public $advertisedRoutePriority;
  protected $bfdType = RouterBgpPeerBfd::class;
  protected $bfdDataType = '';
  /**
   * @var string
   */
  public $enable;
  /**
   * @var bool
   */
  public $enableIpv6;
  /**
   * @var string
   */
  public $interfaceName;
  /**
   * @var string
   */
  public $ipAddress;
  /**
   * @var string
   */
  public $ipv6NexthopAddress;
  /**
   * @var string
   */
  public $managementType;
  /**
   * @var string
   */
  public $md5AuthenticationKeyName;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $peerAsn;
  /**
   * @var string
   */
  public $peerIpAddress;
  /**
   * @var string
   */
  public $peerIpv6NexthopAddress;
  /**
   * @var string
   */
  public $routerApplianceInstance;

  /**
   * @param string
   */
  public function setAdvertiseMode($advertiseMode)
  {
    $this->advertiseMode = $advertiseMode;
  }
  /**
   * @return string
   */
  public function getAdvertiseMode()
  {
    return $this->advertiseMode;
  }
  /**
   * @param string[]
   */
  public function setAdvertisedGroups($advertisedGroups)
  {
    $this->advertisedGroups = $advertisedGroups;
  }
  /**
   * @return string[]
   */
  public function getAdvertisedGroups()
  {
    return $this->advertisedGroups;
  }
  /**
   * @param RouterAdvertisedIpRange[]
   */
  public function setAdvertisedIpRanges($advertisedIpRanges)
  {
    $this->advertisedIpRanges = $advertisedIpRanges;
  }
  /**
   * @return RouterAdvertisedIpRange[]
   */
  public function getAdvertisedIpRanges()
  {
    return $this->advertisedIpRanges;
  }
  /**
   * @param string
   */
  public function setAdvertisedRoutePriority($advertisedRoutePriority)
  {
    $this->advertisedRoutePriority = $advertisedRoutePriority;
  }
  /**
   * @return string
   */
  public function getAdvertisedRoutePriority()
  {
    return $this->advertisedRoutePriority;
  }
  /**
   * @param RouterBgpPeerBfd
   */
  public function setBfd(RouterBgpPeerBfd $bfd)
  {
    $this->bfd = $bfd;
  }
  /**
   * @return RouterBgpPeerBfd
   */
  public function getBfd()
  {
    return $this->bfd;
  }
  /**
   * @param string
   */
  public function setEnable($enable)
  {
    $this->enable = $enable;
  }
  /**
   * @return string
   */
  public function getEnable()
  {
    return $this->enable;
  }
  /**
   * @param bool
   */
  public function setEnableIpv6($enableIpv6)
  {
    $this->enableIpv6 = $enableIpv6;
  }
  /**
   * @return bool
   */
  public function getEnableIpv6()
  {
    return $this->enableIpv6;
  }
  /**
   * @param string
   */
  public function setInterfaceName($interfaceName)
  {
    $this->interfaceName = $interfaceName;
  }
  /**
   * @return string
   */
  public function getInterfaceName()
  {
    return $this->interfaceName;
  }
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
  public function setIpv6NexthopAddress($ipv6NexthopAddress)
  {
    $this->ipv6NexthopAddress = $ipv6NexthopAddress;
  }
  /**
   * @return string
   */
  public function getIpv6NexthopAddress()
  {
    return $this->ipv6NexthopAddress;
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
  public function setMd5AuthenticationKeyName($md5AuthenticationKeyName)
  {
    $this->md5AuthenticationKeyName = $md5AuthenticationKeyName;
  }
  /**
   * @return string
   */
  public function getMd5AuthenticationKeyName()
  {
    return $this->md5AuthenticationKeyName;
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
  public function setPeerAsn($peerAsn)
  {
    $this->peerAsn = $peerAsn;
  }
  /**
   * @return string
   */
  public function getPeerAsn()
  {
    return $this->peerAsn;
  }
  /**
   * @param string
   */
  public function setPeerIpAddress($peerIpAddress)
  {
    $this->peerIpAddress = $peerIpAddress;
  }
  /**
   * @return string
   */
  public function getPeerIpAddress()
  {
    return $this->peerIpAddress;
  }
  /**
   * @param string
   */
  public function setPeerIpv6NexthopAddress($peerIpv6NexthopAddress)
  {
    $this->peerIpv6NexthopAddress = $peerIpv6NexthopAddress;
  }
  /**
   * @return string
   */
  public function getPeerIpv6NexthopAddress()
  {
    return $this->peerIpv6NexthopAddress;
  }
  /**
   * @param string
   */
  public function setRouterApplianceInstance($routerApplianceInstance)
  {
    $this->routerApplianceInstance = $routerApplianceInstance;
  }
  /**
   * @return string
   */
  public function getRouterApplianceInstance()
  {
    return $this->routerApplianceInstance;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RouterBgpPeer::class, 'Google_Service_Compute_RouterBgpPeer');
