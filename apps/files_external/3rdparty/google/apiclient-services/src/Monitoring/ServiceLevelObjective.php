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

namespace Google\Service\Monitoring;

class ServiceLevelObjective extends \Google\Model
{
  /**
   * @var string
   */
  public $calendarPeriod;
  /**
   * @var string
   */
  public $displayName;
  public $goal;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $rollingPeriod;
  protected $serviceLevelIndicatorType = ServiceLevelIndicator::class;
  protected $serviceLevelIndicatorDataType = '';
  /**
   * @var string[]
   */
  public $userLabels;

  /**
   * @param string
   */
  public function setCalendarPeriod($calendarPeriod)
  {
    $this->calendarPeriod = $calendarPeriod;
  }
  /**
   * @return string
   */
  public function getCalendarPeriod()
  {
    return $this->calendarPeriod;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setRollingPeriod($rollingPeriod)
  {
    $this->rollingPeriod = $rollingPeriod;
  }
  /**
   * @return string
   */
  public function getRollingPeriod()
  {
    return $this->rollingPeriod;
  }
  /**
   * @param ServiceLevelIndicator
   */
  public function setServiceLevelIndicator(ServiceLevelIndicator $serviceLevelIndicator)
  {
    $this->serviceLevelIndicator = $serviceLevelIndicator;
  }
  /**
   * @return ServiceLevelIndicator
   */
  public function getServiceLevelIndicator()
  {
    return $this->serviceLevelIndicator;
  }
  /**
   * @param string[]
   */
  public function setUserLabels($userLabels)
  {
    $this->userLabels = $userLabels;
  }
  /**
   * @return string[]
   */
  public function getUserLabels()
  {
    return $this->userLabels;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServiceLevelObjective::class, 'Google_Service_Monitoring_ServiceLevelObjective');
