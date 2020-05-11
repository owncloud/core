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

class Google_Service_GameServices_DeployedFleetDetails extends Google_Model
{
  protected $deployedAutoscalerType = 'Google_Service_GameServices_DeployedFleetAutoscaler';
  protected $deployedAutoscalerDataType = '';
  protected $deployedFleetType = 'Google_Service_GameServices_DeployedFleet';
  protected $deployedFleetDataType = '';

  /**
   * @param Google_Service_GameServices_DeployedFleetAutoscaler
   */
  public function setDeployedAutoscaler(Google_Service_GameServices_DeployedFleetAutoscaler $deployedAutoscaler)
  {
    $this->deployedAutoscaler = $deployedAutoscaler;
  }
  /**
   * @return Google_Service_GameServices_DeployedFleetAutoscaler
   */
  public function getDeployedAutoscaler()
  {
    return $this->deployedAutoscaler;
  }
  /**
   * @param Google_Service_GameServices_DeployedFleet
   */
  public function setDeployedFleet(Google_Service_GameServices_DeployedFleet $deployedFleet)
  {
    $this->deployedFleet = $deployedFleet;
  }
  /**
   * @return Google_Service_GameServices_DeployedFleet
   */
  public function getDeployedFleet()
  {
    return $this->deployedFleet;
  }
}
