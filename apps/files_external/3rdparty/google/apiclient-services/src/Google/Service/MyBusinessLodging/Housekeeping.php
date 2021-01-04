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

class Google_Service_MyBusinessLodging_Housekeeping extends Google_Model
{
  public $dailyHousekeeping;
  public $dailyHousekeepingException;
  public $housekeepingAvailable;
  public $housekeepingAvailableException;
  public $turndownService;
  public $turndownServiceException;

  public function setDailyHousekeeping($dailyHousekeeping)
  {
    $this->dailyHousekeeping = $dailyHousekeeping;
  }
  public function getDailyHousekeeping()
  {
    return $this->dailyHousekeeping;
  }
  public function setDailyHousekeepingException($dailyHousekeepingException)
  {
    $this->dailyHousekeepingException = $dailyHousekeepingException;
  }
  public function getDailyHousekeepingException()
  {
    return $this->dailyHousekeepingException;
  }
  public function setHousekeepingAvailable($housekeepingAvailable)
  {
    $this->housekeepingAvailable = $housekeepingAvailable;
  }
  public function getHousekeepingAvailable()
  {
    return $this->housekeepingAvailable;
  }
  public function setHousekeepingAvailableException($housekeepingAvailableException)
  {
    $this->housekeepingAvailableException = $housekeepingAvailableException;
  }
  public function getHousekeepingAvailableException()
  {
    return $this->housekeepingAvailableException;
  }
  public function setTurndownService($turndownService)
  {
    $this->turndownService = $turndownService;
  }
  public function getTurndownService()
  {
    return $this->turndownService;
  }
  public function setTurndownServiceException($turndownServiceException)
  {
    $this->turndownServiceException = $turndownServiceException;
  }
  public function getTurndownServiceException()
  {
    return $this->turndownServiceException;
  }
}
