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

class VpnTunnelInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $networkUri;
  /**
   * @var string
   */
  public $region;
  /**
   * @var string
   */
  public $remoteGateway;
  /**
   * @var string
   */
  public $remoteGatewayIp;
  /**
   * @var string
   */
  public $routingType;
  /**
   * @var string
   */
  public $sourceGateway;
  /**
   * @var string
   */
  public $sourceGatewayIp;
  /**
   * @var string
   */
  public $uri;

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
  public function setRegion($region)
  {
    $this->region = $region;
  }
  /**
   * @return string
   */
  public function getRegion()
  {
    return $this->region;
  }
  /**
   * @param string
   */
  public function setRemoteGateway($remoteGateway)
  {
    $this->remoteGateway = $remoteGateway;
  }
  /**
   * @return string
   */
  public function getRemoteGateway()
  {
    return $this->remoteGateway;
  }
  /**
   * @param string
   */
  public function setRemoteGatewayIp($remoteGatewayIp)
  {
    $this->remoteGatewayIp = $remoteGatewayIp;
  }
  /**
   * @return string
   */
  public function getRemoteGatewayIp()
  {
    return $this->remoteGatewayIp;
  }
  /**
   * @param string
   */
  public function setRoutingType($routingType)
  {
    $this->routingType = $routingType;
  }
  /**
   * @return string
   */
  public function getRoutingType()
  {
    return $this->routingType;
  }
  /**
   * @param string
   */
  public function setSourceGateway($sourceGateway)
  {
    $this->sourceGateway = $sourceGateway;
  }
  /**
   * @return string
   */
  public function getSourceGateway()
  {
    return $this->sourceGateway;
  }
  /**
   * @param string
   */
  public function setSourceGatewayIp($sourceGatewayIp)
  {
    $this->sourceGatewayIp = $sourceGatewayIp;
  }
  /**
   * @return string
   */
  public function getSourceGatewayIp()
  {
    return $this->sourceGatewayIp;
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
class_alias(VpnTunnelInfo::class, 'Google_Service_NetworkManagement_VpnTunnelInfo');
