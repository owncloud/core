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

namespace Google\Service\Contentwarehouse;

class AssistantApiSettingsDowntimePeriod extends \Google\Model
{
  /**
   * @var bool
   */
  public $enabled;
  protected $endTimeType = GoogleTypeTimeOfDay::class;
  protected $endTimeDataType = '';
  /**
   * @var string
   */
  public $startDay;
  protected $startTimeType = GoogleTypeTimeOfDay::class;
  protected $startTimeDataType = '';

  /**
   * @param bool
   */
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  /**
   * @return bool
   */
  public function getEnabled()
  {
    return $this->enabled;
  }
  /**
   * @param GoogleTypeTimeOfDay
   */
  public function setEndTime(GoogleTypeTimeOfDay $endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return GoogleTypeTimeOfDay
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param string
   */
  public function setStartDay($startDay)
  {
    $this->startDay = $startDay;
  }
  /**
   * @return string
   */
  public function getStartDay()
  {
    return $this->startDay;
  }
  /**
   * @param GoogleTypeTimeOfDay
   */
  public function setStartTime(GoogleTypeTimeOfDay $startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return GoogleTypeTimeOfDay
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiSettingsDowntimePeriod::class, 'Google_Service_Contentwarehouse_AssistantApiSettingsDowntimePeriod');
