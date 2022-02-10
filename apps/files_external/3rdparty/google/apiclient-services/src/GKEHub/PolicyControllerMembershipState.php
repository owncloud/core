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

namespace Google\Service\GKEHub;

class PolicyControllerMembershipState extends \Google\Model
{
  /**
   * @var string
   */
  public $clusterName;
  protected $membershipSpecType = PolicyControllerMembershipSpec::class;
  protected $membershipSpecDataType = '';
  protected $policyControllerHubStateType = PolicyControllerPolicyControllerHubState::class;
  protected $policyControllerHubStateDataType = '';
  /**
   * @var string
   */
  public $state;

  /**
   * @param string
   */
  public function setClusterName($clusterName)
  {
    $this->clusterName = $clusterName;
  }
  /**
   * @return string
   */
  public function getClusterName()
  {
    return $this->clusterName;
  }
  /**
   * @param PolicyControllerMembershipSpec
   */
  public function setMembershipSpec(PolicyControllerMembershipSpec $membershipSpec)
  {
    $this->membershipSpec = $membershipSpec;
  }
  /**
   * @return PolicyControllerMembershipSpec
   */
  public function getMembershipSpec()
  {
    return $this->membershipSpec;
  }
  /**
   * @param PolicyControllerPolicyControllerHubState
   */
  public function setPolicyControllerHubState(PolicyControllerPolicyControllerHubState $policyControllerHubState)
  {
    $this->policyControllerHubState = $policyControllerHubState;
  }
  /**
   * @return PolicyControllerPolicyControllerHubState
   */
  public function getPolicyControllerHubState()
  {
    return $this->policyControllerHubState;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PolicyControllerMembershipState::class, 'Google_Service_GKEHub_PolicyControllerMembershipState');
