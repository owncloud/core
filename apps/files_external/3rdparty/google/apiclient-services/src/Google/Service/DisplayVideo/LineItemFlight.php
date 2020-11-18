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

class Google_Service_DisplayVideo_LineItemFlight extends Google_Model
{
  protected $dateRangeType = 'Google_Service_DisplayVideo_DateRange';
  protected $dateRangeDataType = '';
  public $flightDateType;
  public $triggerId;

  /**
   * @param Google_Service_DisplayVideo_DateRange
   */
  public function setDateRange(Google_Service_DisplayVideo_DateRange $dateRange)
  {
    $this->dateRange = $dateRange;
  }
  /**
   * @return Google_Service_DisplayVideo_DateRange
   */
  public function getDateRange()
  {
    return $this->dateRange;
  }
  public function setFlightDateType($flightDateType)
  {
    $this->flightDateType = $flightDateType;
  }
  public function getFlightDateType()
  {
    return $this->flightDateType;
  }
  public function setTriggerId($triggerId)
  {
    $this->triggerId = $triggerId;
  }
  public function getTriggerId()
  {
    return $this->triggerId;
  }
}
