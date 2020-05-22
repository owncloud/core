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

class Google_Service_ShoppingContent_HolidayCutoff extends Google_Model
{
  public $deadlineDate;
  public $deadlineHour;
  public $deadlineTimezone;
  public $holidayId;
  public $visibleFromDate;

  public function setDeadlineDate($deadlineDate)
  {
    $this->deadlineDate = $deadlineDate;
  }
  public function getDeadlineDate()
  {
    return $this->deadlineDate;
  }
  public function setDeadlineHour($deadlineHour)
  {
    $this->deadlineHour = $deadlineHour;
  }
  public function getDeadlineHour()
  {
    return $this->deadlineHour;
  }
  public function setDeadlineTimezone($deadlineTimezone)
  {
    $this->deadlineTimezone = $deadlineTimezone;
  }
  public function getDeadlineTimezone()
  {
    return $this->deadlineTimezone;
  }
  public function setHolidayId($holidayId)
  {
    $this->holidayId = $holidayId;
  }
  public function getHolidayId()
  {
    return $this->holidayId;
  }
  public function setVisibleFromDate($visibleFromDate)
  {
    $this->visibleFromDate = $visibleFromDate;
  }
  public function getVisibleFromDate()
  {
    return $this->visibleFromDate;
  }
}
