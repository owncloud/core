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

class RegionNetworkFirewallPoliciesGetEffectiveFirewallsResponse extends \Google\Collection
{
  protected $collection_key = 'firewalls';
  protected $firewallPolicysType = RegionNetworkFirewallPoliciesGetEffectiveFirewallsResponseEffectiveFirewallPolicy::class;
  protected $firewallPolicysDataType = 'array';
  protected $firewallsType = Firewall::class;
  protected $firewallsDataType = 'array';

  /**
   * @param RegionNetworkFirewallPoliciesGetEffectiveFirewallsResponseEffectiveFirewallPolicy[]
   */
  public function setFirewallPolicys($firewallPolicys)
  {
    $this->firewallPolicys = $firewallPolicys;
  }
  /**
   * @return RegionNetworkFirewallPoliciesGetEffectiveFirewallsResponseEffectiveFirewallPolicy[]
   */
  public function getFirewallPolicys()
  {
    return $this->firewallPolicys;
  }
  /**
   * @param Firewall[]
   */
  public function setFirewalls($firewalls)
  {
    $this->firewalls = $firewalls;
  }
  /**
   * @return Firewall[]
   */
  public function getFirewalls()
  {
    return $this->firewalls;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RegionNetworkFirewallPoliciesGetEffectiveFirewallsResponse::class, 'Google_Service_Compute_RegionNetworkFirewallPoliciesGetEffectiveFirewallsResponse');
