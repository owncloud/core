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

class Google_Service_GKEHub_ConfigManagementMembershipSpec extends Google_Model
{
  protected $configSyncType = 'Google_Service_GKEHub_ConfigManagementConfigSync';
  protected $configSyncDataType = '';
  protected $hierarchyControllerType = 'Google_Service_GKEHub_ConfigManagementHierarchyControllerConfig';
  protected $hierarchyControllerDataType = '';
  protected $policyControllerType = 'Google_Service_GKEHub_ConfigManagementPolicyController';
  protected $policyControllerDataType = '';
  public $version;

  /**
   * @param Google_Service_GKEHub_ConfigManagementConfigSync
   */
  public function setConfigSync(Google_Service_GKEHub_ConfigManagementConfigSync $configSync)
  {
    $this->configSync = $configSync;
  }
  /**
   * @return Google_Service_GKEHub_ConfigManagementConfigSync
   */
  public function getConfigSync()
  {
    return $this->configSync;
  }
  /**
   * @param Google_Service_GKEHub_ConfigManagementHierarchyControllerConfig
   */
  public function setHierarchyController(Google_Service_GKEHub_ConfigManagementHierarchyControllerConfig $hierarchyController)
  {
    $this->hierarchyController = $hierarchyController;
  }
  /**
   * @return Google_Service_GKEHub_ConfigManagementHierarchyControllerConfig
   */
  public function getHierarchyController()
  {
    return $this->hierarchyController;
  }
  /**
   * @param Google_Service_GKEHub_ConfigManagementPolicyController
   */
  public function setPolicyController(Google_Service_GKEHub_ConfigManagementPolicyController $policyController)
  {
    $this->policyController = $policyController;
  }
  /**
   * @return Google_Service_GKEHub_ConfigManagementPolicyController
   */
  public function getPolicyController()
  {
    return $this->policyController;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}
