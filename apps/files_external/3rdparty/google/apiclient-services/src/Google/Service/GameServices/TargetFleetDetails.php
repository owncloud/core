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

class Google_Service_GameServices_TargetFleetDetails extends Google_Model
{
  protected $autoscalerType = 'Google_Service_GameServices_TargetFleetAutoscaler';
  protected $autoscalerDataType = '';
  protected $fleetType = 'Google_Service_GameServices_TargetFleet';
  protected $fleetDataType = '';

  /**
   * @param Google_Service_GameServices_TargetFleetAutoscaler
   */
  public function setAutoscaler(Google_Service_GameServices_TargetFleetAutoscaler $autoscaler)
  {
    $this->autoscaler = $autoscaler;
  }
  /**
   * @return Google_Service_GameServices_TargetFleetAutoscaler
   */
  public function getAutoscaler()
  {
    return $this->autoscaler;
  }
  /**
   * @param Google_Service_GameServices_TargetFleet
   */
  public function setFleet(Google_Service_GameServices_TargetFleet $fleet)
  {
    $this->fleet = $fleet;
  }
  /**
   * @return Google_Service_GameServices_TargetFleet
   */
  public function getFleet()
  {
    return $this->fleet;
  }
}
