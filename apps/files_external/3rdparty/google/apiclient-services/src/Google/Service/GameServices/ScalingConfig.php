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

class Google_Service_GameServices_ScalingConfig extends Google_Collection
{
  protected $collection_key = 'selectors';
  public $fleetAutoscalerSpec;
  public $name;
  protected $schedulesType = 'Google_Service_GameServices_Schedule';
  protected $schedulesDataType = 'array';
  protected $selectorsType = 'Google_Service_GameServices_LabelSelector';
  protected $selectorsDataType = 'array';

  public function setFleetAutoscalerSpec($fleetAutoscalerSpec)
  {
    $this->fleetAutoscalerSpec = $fleetAutoscalerSpec;
  }
  public function getFleetAutoscalerSpec()
  {
    return $this->fleetAutoscalerSpec;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_GameServices_Schedule[]
   */
  public function setSchedules($schedules)
  {
    $this->schedules = $schedules;
  }
  /**
   * @return Google_Service_GameServices_Schedule[]
   */
  public function getSchedules()
  {
    return $this->schedules;
  }
  /**
   * @param Google_Service_GameServices_LabelSelector[]
   */
  public function setSelectors($selectors)
  {
    $this->selectors = $selectors;
  }
  /**
   * @return Google_Service_GameServices_LabelSelector[]
   */
  public function getSelectors()
  {
    return $this->selectors;
  }
}
