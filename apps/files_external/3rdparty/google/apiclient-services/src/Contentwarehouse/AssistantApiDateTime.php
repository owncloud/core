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

class AssistantApiDateTime extends \Google\Model
{
  protected $dateType = AssistantApiDate::class;
  protected $dateDataType = '';
  protected $timeOfDayType = AssistantApiTimeOfDay::class;
  protected $timeOfDayDataType = '';
  protected $timeZoneType = AssistantApiTimeZone::class;
  protected $timeZoneDataType = '';

  /**
   * @param AssistantApiDate
   */
  public function setDate(AssistantApiDate $date)
  {
    $this->date = $date;
  }
  /**
   * @return AssistantApiDate
   */
  public function getDate()
  {
    return $this->date;
  }
  /**
   * @param AssistantApiTimeOfDay
   */
  public function setTimeOfDay(AssistantApiTimeOfDay $timeOfDay)
  {
    $this->timeOfDay = $timeOfDay;
  }
  /**
   * @return AssistantApiTimeOfDay
   */
  public function getTimeOfDay()
  {
    return $this->timeOfDay;
  }
  /**
   * @param AssistantApiTimeZone
   */
  public function setTimeZone(AssistantApiTimeZone $timeZone)
  {
    $this->timeZone = $timeZone;
  }
  /**
   * @return AssistantApiTimeZone
   */
  public function getTimeZone()
  {
    return $this->timeZone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiDateTime::class, 'Google_Service_Contentwarehouse_AssistantApiDateTime');
