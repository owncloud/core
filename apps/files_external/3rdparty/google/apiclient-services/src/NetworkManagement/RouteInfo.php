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

namespace Google\Service\NetworkManagement;

class RouteInfo extends \Google\Collection
{
  protected $collection_key = 'instanceTags';
  /**
   * @var string
   */
  public $destIpRange;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string[]
   */
  public $instanceTags;
  /**
   * @var string
   */
  public $networkUri;
  /**
   * @var string
   */
  public $nextHop;
  /**
   * @var string
   */
  public $nextHopType;
  /**
   * @var int
   */
  public $priority;
  /**
   * @var string
   */
  public $routeType;
  /**
   * @var string
   */
  public $uri;

  /**
   * @param string
   */
  public function setDestIpRange($destIpRange)
  {
    $this->destIpRange = $destIpRange;
  }
  /**
   * @return string
   */
  public function getDestIpRange()
  {
    return $this->destIpRange;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string[]
   */
  public function setInstanceTags($instanceTags)
  {
    $this->instanceTags = $instanceTags;
  }
  /**
   * @return string[]
   */
  public function getInstanceTags()
  {
    return $this->instanceTags;
  }
  /**
   * @param string
   */
  public function setNetworkUri($networkUri)
  {
    $this->networkUri = $networkUri;
  }
  /**
   * @return string
   */
  public function getNetworkUri()
  {
    return $this->networkUri;
  }
  /**
   * @param string
   */
  public function setNextHop($nextHop)
  {
    $this->nextHop = $nextHop;
  }
  /**
   * @return string
   */
  public function getNextHop()
  {
    return $this->nextHop;
  }
  /**
   * @param string
   */
  public function setNextHopType($nextHopType)
  {
    $this->nextHopType = $nextHopType;
  }
  /**
   * @return string
   */
  public function getNextHopType()
  {
    return $this->nextHopType;
  }
  /**
   * @param int
   */
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  /**
   * @return int
   */
  public function getPriority()
  {
    return $this->priority;
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
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  /**
   * @return string
   */
  public function getUri()
  {
    return $this->uri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RouteInfo::class, 'Google_Service_NetworkManagement_RouteInfo');
