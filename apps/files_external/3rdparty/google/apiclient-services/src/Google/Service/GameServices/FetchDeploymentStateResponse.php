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

class Google_Service_GameServices_FetchDeploymentStateResponse extends Google_Collection
{
  protected $collection_key = 'unavailable';
  protected $clusterStateType = 'Google_Service_GameServices_DeployedClusterState';
  protected $clusterStateDataType = 'array';
  public $unavailable;

  /**
   * @param Google_Service_GameServices_DeployedClusterState
   */
  public function setClusterState($clusterState)
  {
    $this->clusterState = $clusterState;
  }
  /**
   * @return Google_Service_GameServices_DeployedClusterState
   */
  public function getClusterState()
  {
    return $this->clusterState;
  }
  public function setUnavailable($unavailable)
  {
    $this->unavailable = $unavailable;
  }
  public function getUnavailable()
  {
    return $this->unavailable;
  }
}
