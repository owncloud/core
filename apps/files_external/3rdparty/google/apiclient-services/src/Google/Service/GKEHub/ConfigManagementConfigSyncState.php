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

class Google_Service_GKEHub_ConfigManagementConfigSyncState extends Google_Model
{
  protected $deploymentStateType = 'Google_Service_GKEHub_ConfigManagementConfigSyncDeploymentState';
  protected $deploymentStateDataType = '';
  protected $syncStateType = 'Google_Service_GKEHub_ConfigManagementSyncState';
  protected $syncStateDataType = '';
  protected $versionType = 'Google_Service_GKEHub_ConfigManagementConfigSyncVersion';
  protected $versionDataType = '';

  /**
   * @param Google_Service_GKEHub_ConfigManagementConfigSyncDeploymentState
   */
  public function setDeploymentState(Google_Service_GKEHub_ConfigManagementConfigSyncDeploymentState $deploymentState)
  {
    $this->deploymentState = $deploymentState;
  }
  /**
   * @return Google_Service_GKEHub_ConfigManagementConfigSyncDeploymentState
   */
  public function getDeploymentState()
  {
    return $this->deploymentState;
  }
  /**
   * @param Google_Service_GKEHub_ConfigManagementSyncState
   */
  public function setSyncState(Google_Service_GKEHub_ConfigManagementSyncState $syncState)
  {
    $this->syncState = $syncState;
  }
  /**
   * @return Google_Service_GKEHub_ConfigManagementSyncState
   */
  public function getSyncState()
  {
    return $this->syncState;
  }
  /**
   * @param Google_Service_GKEHub_ConfigManagementConfigSyncVersion
   */
  public function setVersion(Google_Service_GKEHub_ConfigManagementConfigSyncVersion $version)
  {
    $this->version = $version;
  }
  /**
   * @return Google_Service_GKEHub_ConfigManagementConfigSyncVersion
   */
  public function getVersion()
  {
    return $this->version;
  }
}
