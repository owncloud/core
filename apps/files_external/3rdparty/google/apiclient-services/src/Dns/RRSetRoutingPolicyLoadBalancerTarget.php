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

namespace Google\Service\Dns;

class RRSetRoutingPolicyLoadBalancerTarget extends \Google\Model
{
  /**
   * @var string
   */
  public $ipAddress;
  /**
   * @var string
   */
  public $ipProtocol;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $loadBalancerType;
  /**
   * @var string
   */
  public $networkUrl;
  /**
   * @var string
   */
  public $port;
  /**
   * @var string
   */
  public $project;
  /**
   * @var string
   */
  public $region;

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
  public function setIpProtocol($ipProtocol)
  {
    $this->ipProtocol = $ipProtocol;
  }
  /**
   * @return string
   */
  public function getIpProtocol()
  {
    return $this->ipProtocol;
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
  public function setLoadBalancerType($loadBalancerType)
  {
    $this->loadBalancerType = $loadBalancerType;
  }
  /**
   * @return string
   */
  public function getLoadBalancerType()
  {
    return $this->loadBalancerType;
  }
  /**
   * @param string
   */
  public function setNetworkUrl($networkUrl)
  {
    $this->networkUrl = $networkUrl;
  }
  /**
   * @return string
   */
  public function getNetworkUrl()
  {
    return $this->networkUrl;
  }
  /**
   * @param string
   */
  public function setPort($port)
  {
    $this->port = $port;
  }
  /**
   * @return string
   */
  public function getPort()
  {
    return $this->port;
  }
  /**
   * @param string
   */
  public function setProject($project)
  {
    $this->project = $project;
  }
  /**
   * @return string
   */
  public function getProject()
  {
    return $this->project;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RRSetRoutingPolicyLoadBalancerTarget::class, 'Google_Service_Dns_RRSetRoutingPolicyLoadBalancerTarget');
