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

class Google_Service_GKEHub_ConfigManagementMembershipState extends Google_Model
{
  public $clusterName;
  protected $configSyncStateType = 'Google_Service_GKEHub_ConfigManagementConfigSyncState';
  protected $configSyncStateDataType = '';
  protected $hierarchyControllerStateType = 'Google_Service_GKEHub_ConfigManagementHierarchyControllerState';
  protected $hierarchyControllerStateDataType = '';
  protected $membershipSpecType = 'Google_Service_GKEHub_ConfigManagementMembershipSpec';
  protected $membershipSpecDataType = '';
  protected $operatorStateType = 'Google_Service_GKEHub_ConfigManagementOperatorState';
  protected $operatorStateDataType = '';
  protected $policyControllerStateType = 'Google_Service_GKEHub_ConfigManagementPolicyControllerState';
  protected $policyControllerStateDataType = '';

  public function setClusterName($clusterName)
  {
    $this->clusterName = $clusterName;
  }
  public function getClusterName()
  {
    return $this->clusterName;
  }
  /**
   * @param Google_Service_GKEHub_ConfigManagementConfigSyncState
   */
  public function setConfigSyncState(Google_Service_GKEHub_ConfigManagementConfigSyncState $configSyncState)
  {
    $this->configSyncState = $configSyncState;
  }
  /**
   * @return Google_Service_GKEHub_ConfigManagementConfigSyncState
   */
  public function getConfigSyncState()
  {
    return $this->configSyncState;
  }
  /**
   * @param Google_Service_GKEHub_ConfigManagementHierarchyControllerState
   */
  public function setHierarchyControllerState(Google_Service_GKEHub_ConfigManagementHierarchyControllerState $hierarchyControllerState)
  {
    $this->hierarchyControllerState = $hierarchyControllerState;
  }
  /**
   * @return Google_Service_GKEHub_ConfigManagementHierarchyControllerState
   */
  public function getHierarchyControllerState()
  {
    return $this->hierarchyControllerState;
  }
  /**
   * @param Google_Service_GKEHub_ConfigManagementMembershipSpec
   */
  public function setMembershipSpec(Google_Service_GKEHub_ConfigManagementMembershipSpec $membershipSpec)
  {
    $this->membershipSpec = $membershipSpec;
  }
  /**
   * @return Google_Service_GKEHub_ConfigManagementMembershipSpec
   */
  public function getMembershipSpec()
  {
    return $this->membershipSpec;
  }
  /**
   * @param Google_Service_GKEHub_ConfigManagementOperatorState
   */
  public function setOperatorState(Google_Service_GKEHub_ConfigManagementOperatorState $operatorState)
  {
    $this->operatorState = $operatorState;
  }
  /**
   * @return Google_Service_GKEHub_ConfigManagementOperatorState
   */
  public function getOperatorState()
  {
    return $this->operatorState;
  }
  /**
   * @param Google_Service_GKEHub_ConfigManagementPolicyControllerState
   */
  public function setPolicyControllerState(Google_Service_GKEHub_ConfigManagementPolicyControllerState $policyControllerState)
  {
    $this->policyControllerState = $policyControllerState;
  }
  /**
   * @return Google_Service_GKEHub_ConfigManagementPolicyControllerState
   */
  public function getPolicyControllerState()
  {
    return $this->policyControllerState;
  }
}
