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

namespace Google\Service\ShoppingContent;

class HolidayCutoff extends \Google\Model
{
  /**
   * @var string
   */
  public $deadlineDate;
  /**
   * @var string
   */
  public $deadlineHour;
  /**
   * @var string
   */
  public $deadlineTimezone;
  /**
   * @var string
   */
  public $holidayId;
  /**
   * @var string
   */
  public $visibleFromDate;

  /**
   * @param string
   */
  public function setDeadlineDate($deadlineDate)
  {
    $this->deadlineDate = $deadlineDate;
  }
  /**
   * @return string
   */
  public function getDeadlineDate()
  {
    return $this->deadlineDate;
  }
  /**
   * @param string
   */
  public function setDeadlineHour($deadlineHour)
  {
    $this->deadlineHour = $deadlineHour;
  }
  /**
   * @return string
   */
  public function getDeadlineHour()
  {
    return $this->deadlineHour;
  }
  /**
   * @param string
   */
  public function setDeadlineTimezone($deadlineTimezone)
  {
    $this->deadlineTimezone = $deadlineTimezone;
  }
  /**
   * @return string
   */
  public function getDeadlineTimezone()
  {
    return $this->deadlineTimezone;
  }
  /**
   * @param string
   */
  public function setHolidayId($holidayId)
  {
    $this->holidayId = $holidayId;
  }
  /**
   * @return string
   */
  public function getHolidayId()
  {
    return $this->holidayId;
  }
  /**
   * @param string
   */
  public function setVisibleFromDate($visibleFromDate)
  {
    $this->visibleFromDate = $visibleFromDate;
  }
  /**
   * @return string
   */
  public function getVisibleFromDate()
  {
    return $this->visibleFromDate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HolidayCutoff::class, 'Google_Service_ShoppingContent_HolidayCutoff');
