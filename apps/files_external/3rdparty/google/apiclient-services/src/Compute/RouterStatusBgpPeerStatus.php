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

class RouterStatusBgpPeerStatus extends \Google\Collection
{
  protected $collection_key = 'advertisedRoutes';
  protected $advertisedRoutesType = Route::class;
  protected $advertisedRoutesDataType = 'array';
  protected $bfdStatusType = BfdStatus::class;
  protected $bfdStatusDataType = '';
  /**
   * @var string
   */
  public $ipAddress;
  /**
   * @var string
   */
  public $linkedVpnTunnel;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $numLearnedRoutes;
  /**
   * @var string
   */
  public $peerIpAddress;
  /**
   * @var string
   */
  public $routerApplianceInstance;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $uptime;
  /**
   * @var string
   */
  public $uptimeSeconds;

  /**
   * @param Route[]
   */
  public function setAdvertisedRoutes($advertisedRoutes)
  {
    $this->advertisedRoutes = $advertisedRoutes;
  }
  /**
   * @return Route[]
   */
  public function getAdvertisedRoutes()
  {
    return $this->advertisedRoutes;
  }
  /**
   * @param BfdStatus
   */
  public function setBfdStatus(BfdStatus $bfdStatus)
  {
    $this->bfdStatus = $bfdStatus;
  }
  /**
   * @return BfdStatus
   */
  public function getBfdStatus()
  {
    return $this->bfdStatus;
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
  public function setNumLearnedRoutes($numLearnedRoutes)
  {
    $this->numLearnedRoutes = $numLearnedRoutes;
  }
  /**
   * @return string
   */
  public function getNumLearnedRoutes()
  {
    return $this->numLearnedRoutes;
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
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setUptime($uptime)
  {
    $this->uptime = $uptime;
  }
  /**
   * @return string
   */
  public function getUptime()
  {
    return $this->uptime;
  }
  /**
   * @param string
   */
  public function setUptimeSeconds($uptimeSeconds)
  {
    $this->uptimeSeconds = $uptimeSeconds;
  }
  /**
   * @return string
   */
  public function getUptimeSeconds()
  {
    return $this->uptimeSeconds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RouterStatusBgpPeerStatus::class, 'Google_Service_Compute_RouterStatusBgpPeerStatus');
