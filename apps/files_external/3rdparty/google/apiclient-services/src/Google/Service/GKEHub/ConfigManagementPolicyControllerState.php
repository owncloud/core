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

class Google_Service_GKEHub_ConfigManagementPolicyControllerState extends Google_Model
{
  protected $deploymentStateType = 'Google_Service_GKEHub_ConfigManagementGatekeeperDeploymentState';
  protected $deploymentStateDataType = '';
  protected $versionType = 'Google_Service_GKEHub_ConfigManagementPolicyControllerVersion';
  protected $versionDataType = '';

  /**
   * @param Google_Service_GKEHub_ConfigManagementGatekeeperDeploymentState
   */
  public function setDeploymentState(Google_Service_GKEHub_ConfigManagementGatekeeperDeploymentState $deploymentState)
  {
    $this->deploymentState = $deploymentState;
  }
  /**
   * @return Google_Service_GKEHub_ConfigManagementGatekeeperDeploymentState
   */
  public function getDeploymentState()
  {
    return $this->deploymentState;
  }
  /**
   * @param Google_Service_GKEHub_ConfigManagementPolicyControllerVersion
   */
  public function setVersion(Google_Service_GKEHub_ConfigManagementPolicyControllerVersion $version)
  {
    $this->version = $version;
  }
  /**
   * @return Google_Service_GKEHub_ConfigManagementPolicyControllerVersion
   */
  public function getVersion()
  {
    return $this->version;
  }
}
