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

class LoadBalancerBackend extends \Google\Collection
{
  protected $collection_key = 'healthCheckBlockingFirewallRules';
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string[]
   */
  public $healthCheckAllowingFirewallRules;
  /**
   * @var string[]
   */
  public $healthCheckBlockingFirewallRules;
  /**
   * @var string
   */
  public $healthCheckFirewallState;
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
   * @param string[]
   */
  public function setHealthCheckAllowingFirewallRules($healthCheckAllowingFirewallRules)
  {
    $this->healthCheckAllowingFirewallRules = $healthCheckAllowingFirewallRules;
  }
  /**
   * @return string[]
   */
  public function getHealthCheckAllowingFirewallRules()
  {
    return $this->healthCheckAllowingFirewallRules;
  }
  /**
   * @param string[]
   */
  public function setHealthCheckBlockingFirewallRules($healthCheckBlockingFirewallRules)
  {
    $this->healthCheckBlockingFirewallRules = $healthCheckBlockingFirewallRules;
  }
  /**
   * @return string[]
   */
  public function getHealthCheckBlockingFirewallRules()
  {
    return $this->healthCheckBlockingFirewallRules;
  }
  /**
   * @param string
   */
  public function setHealthCheckFirewallState($healthCheckFirewallState)
  {
    $this->healthCheckFirewallState = $healthCheckFirewallState;
  }
  /**
   * @return string
   */
  public function getHealthCheckFirewallState()
  {
    return $this->healthCheckFirewallState;
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
class_alias(LoadBalancerBackend::class, 'Google_Service_NetworkManagement_LoadBalancerBackend');
