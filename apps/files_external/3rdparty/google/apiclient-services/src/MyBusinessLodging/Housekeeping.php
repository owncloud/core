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

namespace Google\Service\MyBusinessLodging;

class Housekeeping extends \Google\Model
{
  /**
   * @var bool
   */
  public $dailyHousekeeping;
  /**
   * @var string
   */
  public $dailyHousekeepingException;
  /**
   * @var bool
   */
  public $housekeepingAvailable;
  /**
   * @var string
   */
  public $housekeepingAvailableException;
  /**
   * @var bool
   */
  public $turndownService;
  /**
   * @var string
   */
  public $turndownServiceException;

  /**
   * @param bool
   */
  public function setDailyHousekeeping($dailyHousekeeping)
  {
    $this->dailyHousekeeping = $dailyHousekeeping;
  }
  /**
   * @return bool
   */
  public function getDailyHousekeeping()
  {
    return $this->dailyHousekeeping;
  }
  /**
   * @param string
   */
  public function setDailyHousekeepingException($dailyHousekeepingException)
  {
    $this->dailyHousekeepingException = $dailyHousekeepingException;
  }
  /**
   * @return string
   */
  public function getDailyHousekeepingException()
  {
    return $this->dailyHousekeepingException;
  }
  /**
   * @param bool
   */
  public function setHousekeepingAvailable($housekeepingAvailable)
  {
    $this->housekeepingAvailable = $housekeepingAvailable;
  }
  /**
   * @return bool
   */
  public function getHousekeepingAvailable()
  {
    return $this->housekeepingAvailable;
  }
  /**
   * @param string
   */
  public function setHousekeepingAvailableException($housekeepingAvailableException)
  {
    $this->housekeepingAvailableException = $housekeepingAvailableException;
  }
  /**
   * @return string
   */
  public function getHousekeepingAvailableException()
  {
    return $this->housekeepingAvailableException;
  }
  /**
   * @param bool
   */
  public function setTurndownService($turndownService)
  {
    $this->turndownService = $turndownService;
  }
  /**
   * @return bool
   */
  public function getTurndownService()
  {
    return $this->turndownService;
  }
  /**
   * @param string
   */
  public function setTurndownServiceException($turndownServiceException)
  {
    $this->turndownServiceException = $turndownServiceException;
  }
  /**
   * @return string
   */
  public function getTurndownServiceException()
  {
    return $this->turndownServiceException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Housekeeping::class, 'Google_Service_MyBusinessLodging_Housekeeping');
