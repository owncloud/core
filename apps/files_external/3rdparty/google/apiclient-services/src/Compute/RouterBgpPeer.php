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
  public $advertiseMode;
  public $advertisedGroups;
  protected $advertisedIpRangesType = RouterAdvertisedIpRange::class;
  protected $advertisedIpRangesDataType = 'array';
  public $advertisedRoutePriority;
  protected $bfdType = RouterBgpPeerBfd::class;
  protected $bfdDataType = '';
  public $enable;
  public $interfaceName;
  public $ipAddress;
  public $managementType;
  public $name;
  public $peerAsn;
  public $peerIpAddress;
  public $routerApplianceInstance;

  public function setAdvertiseMode($advertiseMode)
  {
    $this->advertiseMode = $advertiseMode;
  }
  public function getAdvertiseMode()
  {
    return $this->advertiseMode;
  }
  public function setAdvertisedGroups($advertisedGroups)
  {
    $this->advertisedGroups = $advertisedGroups;
  }
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
  public function setAdvertisedRoutePriority($advertisedRoutePriority)
  {
    $this->advertisedRoutePriority = $advertisedRoutePriority;
  }
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
  public function setEnable($enable)
  {
    $this->enable = $enable;
  }
  public function getEnable()
  {
    return $this->enable;
  }
  public function setInterfaceName($interfaceName)
  {
    $this->interfaceName = $interfaceName;
  }
  public function getInterfaceName()
  {
    return $this->interfaceName;
  }
  public function setIpAddress($ipAddress)
  {
    $this->ipAddress = $ipAddress;
  }
  public function getIpAddress()
  {
    return $this->ipAddress;
  }
  public function setManagementType($managementType)
  {
    $this->managementType = $managementType;
  }
  public function getManagementType()
  {
    return $this->managementType;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPeerAsn($peerAsn)
  {
    $this->peerAsn = $peerAsn;
  }
  public function getPeerAsn()
  {
    return $this->peerAsn;
  }
  public function setPeerIpAddress($peerIpAddress)
  {
    $this->peerIpAddress = $peerIpAddress;
  }
  public function getPeerIpAddress()
  {
    return $this->peerIpAddress;
  }
  public function setRouterApplianceInstance($routerApplianceInstance)
  {
    $this->routerApplianceInstance = $routerApplianceInstance;
  }
  public function getRouterApplianceInstance()
  {
    return $this->routerApplianceInstance;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RouterBgpPeer::class, 'Google_Service_Compute_RouterBgpPeer');
