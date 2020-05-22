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

class Google_Service_Monitoring_ServiceLevelObjective extends Google_Model
{
  public $calendarPeriod;
  public $displayName;
  public $goal;
  public $name;
  public $rollingPeriod;
  protected $serviceLevelIndicatorType = 'Google_Service_Monitoring_ServiceLevelIndicator';
  protected $serviceLevelIndicatorDataType = '';

  public function setCalendarPeriod($calendarPeriod)
  {
    $this->calendarPeriod = $calendarPeriod;
  }
  public function getCalendarPeriod()
  {
    return $this->calendarPeriod;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setGoal($goal)
  {
    $this->goal = $goal;
  }
  public function getGoal()
  {
    return $this->goal;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setRollingPeriod($rollingPeriod)
  {
    $this->rollingPeriod = $rollingPeriod;
  }
  public function getRollingPeriod()
  {
    return $this->rollingPeriod;
  }
  /**
   * @param Google_Service_Monitoring_ServiceLevelIndicator
   */
  public function setServiceLevelIndicator(Google_Service_Monitoring_ServiceLevelIndicator $serviceLevelIndicator)
  {
    $this->serviceLevelIndicator = $serviceLevelIndicator;
  }
  /**
   * @return Google_Service_Monitoring_ServiceLevelIndicator
   */
  public function getServiceLevelIndicator()
  {
    return $this->serviceLevelIndicator;
  }
}
