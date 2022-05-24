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

namespace Google\Service\Calendar;

class FreeBusyRequest extends \Google\Collection
{
  protected $collection_key = 'items';
  /**
   * @var int
   */
  public $calendarExpansionMax;
  /**
   * @var int
   */
  public $groupExpansionMax;
  protected $itemsType = FreeBusyRequestItem::class;
  protected $itemsDataType = 'array';
  /**
   * @var string
   */
  public $timeMax;
  /**
   * @var string
   */
  public $timeMin;
  /**
   * @var string
   */
  public $timeZone;

  /**
   * @param int
   */
  public function setCalendarExpansionMax($calendarExpansionMax)
  {
    $this->calendarExpansionMax = $calendarExpansionMax;
  }
  /**
   * @return int
   */
  public function getCalendarExpansionMax()
  {
    return $this->calendarExpansionMax;
  }
  /**
   * @param int
   */
  public function setGroupExpansionMax($groupExpansionMax)
  {
    $this->groupExpansionMax = $groupExpansionMax;
  }
  /**
   * @return int
   */
  public function getGroupExpansionMax()
  {
    return $this->groupExpansionMax;
  }
  /**
   * @param FreeBusyRequestItem[]
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return FreeBusyRequestItem[]
   */
  public function getItems()
  {
    return $this->items;
  }
  /**
   * @param string
   */
  public function setTimeMax($timeMax)
  {
    $this->timeMax = $timeMax;
  }
  /**
   * @return string
   */
  public function getTimeMax()
  {
    return $this->timeMax;
  }
  /**
   * @param string
   */
  public function setTimeMin($timeMin)
  {
    $this->timeMin = $timeMin;
  }
  /**
   * @return string
   */
  public function getTimeMin()
  {
    return $this->timeMin;
  }
  /**
   * @param string
   */
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  /**
   * @return string
   */
  public function getTimeZone()
  {
    return $this->timeZone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FreeBusyRequest::class, 'Google_Service_Calendar_FreeBusyRequest');
