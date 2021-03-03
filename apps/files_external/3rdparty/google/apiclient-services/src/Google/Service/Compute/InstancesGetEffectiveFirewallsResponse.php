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

class Google_Service_Compute_InstancesGetEffectiveFirewallsResponse extends Google_Collection
{
  protected $collection_key = 'firewalls';
  protected $firewallPolicysType = 'Google_Service_Compute_InstancesGetEffectiveFirewallsResponseEffectiveFirewallPolicy';
  protected $firewallPolicysDataType = 'array';
  protected $firewallsType = 'Google_Service_Compute_Firewall';
  protected $firewallsDataType = 'array';

  /**
   * @param Google_Service_Compute_InstancesGetEffectiveFirewallsResponseEffectiveFirewallPolicy[]
   */
  public function setFirewallPolicys($firewallPolicys)
  {
    $this->firewallPolicys = $firewallPolicys;
  }
  /**
   * @return Google_Service_Compute_InstancesGetEffectiveFirewallsResponseEffectiveFirewallPolicy[]
   */
  public function getFirewallPolicys()
  {
    return $this->firewallPolicys;
  }
  /**
   * @param Google_Service_Compute_Firewall[]
   */
  public function setFirewalls($firewalls)
  {
    $this->firewalls = $firewalls;
  }
  /**
   * @return Google_Service_Compute_Firewall[]
   */
  public function getFirewalls()
  {
    return $this->firewalls;
  }
}
