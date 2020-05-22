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

class Google_Service_NetworkManagement_VpnTunnelInfo extends Google_Model
{
  public $displayName;
  public $networkUri;
  public $region;
  public $remoteGateway;
  public $remoteGatewayIp;
  public $routingType;
  public $sourceGateway;
  public $sourceGatewayIp;
  public $uri;

  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setNetworkUri($networkUri)
  {
    $this->networkUri = $networkUri;
  }
  public function getNetworkUri()
  {
    return $this->networkUri;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setRemoteGateway($remoteGateway)
  {
    $this->remoteGateway = $remoteGateway;
  }
  public function getRemoteGateway()
  {
    return $this->remoteGateway;
  }
  public function setRemoteGatewayIp($remoteGatewayIp)
  {
    $this->remoteGatewayIp = $remoteGatewayIp;
  }
  public function getRemoteGatewayIp()
  {
    return $this->remoteGatewayIp;
  }
  public function setRoutingType($routingType)
  {
    $this->routingType = $routingType;
  }
  public function getRoutingType()
  {
    return $this->routingType;
  }
  public function setSourceGateway($sourceGateway)
  {
    $this->sourceGateway = $sourceGateway;
  }
  public function getSourceGateway()
  {
    return $this->sourceGateway;
  }
  public function setSourceGatewayIp($sourceGatewayIp)
  {
    $this->sourceGatewayIp = $sourceGatewayIp;
  }
  public function getSourceGatewayIp()
  {
    return $this->sourceGatewayIp;
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
