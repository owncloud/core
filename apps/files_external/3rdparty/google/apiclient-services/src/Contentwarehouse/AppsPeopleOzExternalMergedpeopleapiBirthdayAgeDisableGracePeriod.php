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

class AppsPeopleOzExternalMergedpeopleapiBirthdayAgeDisableGracePeriod extends \Google\Model
{
  protected $calendarDayType = GoogleTypeDate::class;
  protected $calendarDayDataType = '';
  /**
   * @var string
   */
  public $gracePeriodEnd;
  /**
   * @var string
   */
  public $gracePeriodStart;
  /**
   * @var string
   */
  public $gracePeriodType;
  protected $manualGracePeriodInfoType = AppsPeopleOzExternalMergedpeopleapiBirthdayAgeDisableGracePeriodManualGracePeriodInfo::class;
  protected $manualGracePeriodInfoDataType = '';

  /**
   * @param GoogleTypeDate
   */
  public function setCalendarDay(GoogleTypeDate $calendarDay)
  {
    $this->calendarDay = $calendarDay;
  }
  /**
   * @return GoogleTypeDate
   */
  public function getCalendarDay()
  {
    return $this->calendarDay;
  }
  /**
   * @param string
   */
  public function setGracePeriodEnd($gracePeriodEnd)
  {
    $this->gracePeriodEnd = $gracePeriodEnd;
  }
  /**
   * @return string
   */
  public function getGracePeriodEnd()
  {
    return $this->gracePeriodEnd;
  }
  /**
   * @param string
   */
  public function setGracePeriodStart($gracePeriodStart)
  {
    $this->gracePeriodStart = $gracePeriodStart;
  }
  /**
   * @return string
   */
  public function getGracePeriodStart()
  {
    return $this->gracePeriodStart;
  }
  /**
   * @param string
   */
  public function setGracePeriodType($gracePeriodType)
  {
    $this->gracePeriodType = $gracePeriodType;
  }
  /**
   * @return string
   */
  public function getGracePeriodType()
  {
    return $this->gracePeriodType;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiBirthdayAgeDisableGracePeriodManualGracePeriodInfo
   */
  public function setManualGracePeriodInfo(AppsPeopleOzExternalMergedpeopleapiBirthdayAgeDisableGracePeriodManualGracePeriodInfo $manualGracePeriodInfo)
  {
    $this->manualGracePeriodInfo = $manualGracePeriodInfo;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiBirthdayAgeDisableGracePeriodManualGracePeriodInfo
   */
  public function getManualGracePeriodInfo()
  {
    return $this->manualGracePeriodInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiBirthdayAgeDisableGracePeriod::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiBirthdayAgeDisableGracePeriod');
