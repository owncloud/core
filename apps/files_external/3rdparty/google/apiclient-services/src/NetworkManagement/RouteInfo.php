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
  public $destIpRange;
  public $displayName;
  public $instanceTags;
  public $networkUri;
  public $nextHop;
  public $nextHopType;
  public $priority;
  public $routeType;
  public $uri;

  public function setDestIpRange($destIpRange)
  {
    $this->destIpRange = $destIpRange;
  }
  public function getDestIpRange()
  {
    return $this->destIpRange;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setInstanceTags($instanceTags)
  {
    $this->instanceTags = $instanceTags;
  }
  public function getInstanceTags()
  {
    return $this->instanceTags;
  }
  public function setNetworkUri($networkUri)
  {
    $this->networkUri = $networkUri;
  }
  public function getNetworkUri()
  {
    return $this->networkUri;
  }
  public function setNextHop($nextHop)
  {
    $this->nextHop = $nextHop;
  }
  public function getNextHop()
  {
    return $this->nextHop;
  }
  public function setNextHopType($nextHopType)
  {
    $this->nextHopType = $nextHopType;
  }
  public function getNextHopType()
  {
    return $this->nextHopType;
  }
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  public function getPriority()
  {
    return $this->priority;
  }
  public function setRouteType($routeType)
  {
    $this->routeType = $routeType;
  }
  public function getRouteType()
  {
    return $this->routeType;
  }
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  public function getUri()
  {
    return $this->uri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RouteInfo::class, 'Google_Service_NetworkManagement_RouteInfo');
