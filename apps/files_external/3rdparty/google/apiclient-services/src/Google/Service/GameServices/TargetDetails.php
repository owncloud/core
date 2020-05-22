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

class Google_Service_GameServices_TargetDetails extends Google_Collection
{
  protected $collection_key = 'fleetDetails';
  protected $fleetDetailsType = 'Google_Service_GameServices_TargetFleetDetails';
  protected $fleetDetailsDataType = 'array';
  public $gameServerClusterName;
  public $gameServerDeploymentName;

  /**
   * @param Google_Service_GameServices_TargetFleetDetails
   */
  public function setFleetDetails($fleetDetails)
  {
    $this->fleetDetails = $fleetDetails;
  }
  /**
   * @return Google_Service_GameServices_TargetFleetDetails
   */
  public function getFleetDetails()
  {
    return $this->fleetDetails;
  }
  public function setGameServerClusterName($gameServerClusterName)
  {
    $this->gameServerClusterName = $gameServerClusterName;
  }
  public function getGameServerClusterName()
  {
    return $this->gameServerClusterName;
  }
  public function setGameServerDeploymentName($gameServerDeploymentName)
  {
    $this->gameServerDeploymentName = $gameServerDeploymentName;
  }
  public function getGameServerDeploymentName()
  {
    return $this->gameServerDeploymentName;
  }
}
