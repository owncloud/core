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

class BackendServiceLocalityLoadBalancingPolicyConfig extends \Google\Model
{
  protected $customPolicyType = BackendServiceLocalityLoadBalancingPolicyConfigCustomPolicy::class;
  protected $customPolicyDataType = '';
  protected $policyType = BackendServiceLocalityLoadBalancingPolicyConfigPolicy::class;
  protected $policyDataType = '';

  /**
   * @param BackendServiceLocalityLoadBalancingPolicyConfigCustomPolicy
   */
  public function setCustomPolicy(BackendServiceLocalityLoadBalancingPolicyConfigCustomPolicy $customPolicy)
  {
    $this->customPolicy = $customPolicy;
  }
  /**
   * @return BackendServiceLocalityLoadBalancingPolicyConfigCustomPolicy
   */
  public function getCustomPolicy()
  {
    return $this->customPolicy;
  }
  /**
   * @param BackendServiceLocalityLoadBalancingPolicyConfigPolicy
   */
  public function setPolicy(BackendServiceLocalityLoadBalancingPolicyConfigPolicy $policy)
  {
    $this->policy = $policy;
  }
  /**
   * @return BackendServiceLocalityLoadBalancingPolicyConfigPolicy
   */
  public function getPolicy()
  {
    return $this->policy;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BackendServiceLocalityLoadBalancingPolicyConfig::class, 'Google_Service_Compute_BackendServiceLocalityLoadBalancingPolicyConfig');
