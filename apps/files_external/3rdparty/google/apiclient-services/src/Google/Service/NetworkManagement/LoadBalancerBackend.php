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

class Google_Service_NetworkManagement_LoadBalancerBackend extends Google_Collection
{
  protected $collection_key = 'healthCheckBlockingFirewallRules';
  public $displayName;
  public $healthCheckAllowingFirewallRules;
  public $healthCheckBlockingFirewallRules;
  public $healthCheckFirewallState;
  public $uri;

  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setHealthCheckAllowingFirewallRules($healthCheckAllowingFirewallRules)
  {
    $this->healthCheckAllowingFirewallRules = $healthCheckAllowingFirewallRules;
  }
  public function getHealthCheckAllowingFirewallRules()
  {
    return $this->healthCheckAllowingFirewallRules;
  }
  public function setHealthCheckBlockingFirewallRules($healthCheckBlockingFirewallRules)
  {
    $this->healthCheckBlockingFirewallRules = $healthCheckBlockingFirewallRules;
  }
  public function getHealthCheckBlockingFirewallRules()
  {
    return $this->healthCheckBlockingFirewallRules;
  }
  public function setHealthCheckFirewallState($healthCheckFirewallState)
  {
    $this->healthCheckFirewallState = $healthCheckFirewallState;
  }
  public function getHealthCheckFirewallState()
  {
    return $this->healthCheckFirewallState;
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
