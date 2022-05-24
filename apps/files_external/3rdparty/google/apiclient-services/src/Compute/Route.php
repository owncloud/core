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

class Route extends \Google\Collection
{
  protected $collection_key = 'warnings';
  protected $asPathsType = RouteAsPath::class;
  protected $asPathsDataType = 'array';
  /**
   * @var string
   */
  public $creationTimestamp;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $destRange;
  /**
   * @var string
   */
  public $id;
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
  public $nextHopGateway;
  /**
   * @var string
   */
  public $nextHopIlb;
  /**
   * @var string
   */
  public $nextHopInstance;
  /**
   * @var string
   */
  public $nextHopIp;
  /**
   * @var string
   */
  public $nextHopNetwork;
  /**
   * @var string
   */
  public $nextHopPeering;
  /**
   * @var string
   */
  public $nextHopVpnTunnel;
  /**
   * @var string
   */
  public $priority;
  /**
   * @var string
   */
  public $routeStatus;
  /**
   * @var string
   */
  public $routeType;
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string[]
   */
  public $tags;
  protected $warningsType = RouteWarnings::class;
  protected $warningsDataType = 'array';

  /**
   * @param RouteAsPath[]
   */
  public function setAsPaths($asPaths)
  {
    $this->asPaths = $asPaths;
  }
  /**
   * @return RouteAsPath[]
   */
  public function getAsPaths()
  {
    return $this->asPaths;
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
   * @param string
   */
  public function setDestRange($destRange)
  {
    $this->destRange = $destRange;
  }
  /**
   * @return string
   */
  public function getDestRange()
  {
    return $this->destRange;
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
  public function setNextHopGateway($nextHopGateway)
  {
    $this->nextHopGateway = $nextHopGateway;
  }
  /**
   * @return string
   */
  public function getNextHopGateway()
  {
    return $this->nextHopGateway;
  }
  /**
   * @param string
   */
  public function setNextHopIlb($nextHopIlb)
  {
    $this->nextHopIlb = $nextHopIlb;
  }
  /**
   * @return string
   */
  public function getNextHopIlb()
  {
    return $this->nextHopIlb;
  }
  /**
   * @param string
   */
  public function setNextHopInstance($nextHopInstance)
  {
    $this->nextHopInstance = $nextHopInstance;
  }
  /**
   * @return string
   */
  public function getNextHopInstance()
  {
    return $this->nextHopInstance;
  }
  /**
   * @param string
   */
  public function setNextHopIp($nextHopIp)
  {
    $this->nextHopIp = $nextHopIp;
  }
  /**
   * @return string
   */
  public function getNextHopIp()
  {
    return $this->nextHopIp;
  }
  /**
   * @param string
   */
  public function setNextHopNetwork($nextHopNetwork)
  {
    $this->nextHopNetwork = $nextHopNetwork;
  }
  /**
   * @return string
   */
  public function getNextHopNetwork()
  {
    return $this->nextHopNetwork;
  }
  /**
   * @param string
   */
  public function setNextHopPeering($nextHopPeering)
  {
    $this->nextHopPeering = $nextHopPeering;
  }
  /**
   * @return string
   */
  public function getNextHopPeering()
  {
    return $this->nextHopPeering;
  }
  /**
   * @param string
   */
  public function setNextHopVpnTunnel($nextHopVpnTunnel)
  {
    $this->nextHopVpnTunnel = $nextHopVpnTunnel;
  }
  /**
   * @return string
   */
  public function getNextHopVpnTunnel()
  {
    return $this->nextHopVpnTunnel;
  }
  /**
   * @param string
   */
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  /**
   * @return string
   */
  public function getPriority()
  {
    return $this->priority;
  }
  /**
   * @param string
   */
  public function setRouteStatus($routeStatus)
  {
    $this->routeStatus = $routeStatus;
  }
  /**
   * @return string
   */
  public function getRouteStatus()
  {
    return $this->routeStatus;
  }
  /**
   * @param string
   */
  public function setRouteType($routeType)
  {
    $this->routeType = $routeType;
  }
  /**
   * @return string
   */
  public function getRouteType()
  {
    return $this->routeType;
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
   * @param string[]
   */
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  /**
   * @return string[]
   */
  public function getTags()
  {
    return $this->tags;
  }
  /**
   * @param RouteWarnings[]
   */
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  /**
   * @return RouteWarnings[]
   */
  public function getWarnings()
  {
    return $this->warnings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Route::class, 'Google_Service_Compute_Route');
