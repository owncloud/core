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

class Property extends \Google\Model
{
  /**
   * @var int
   */
  public $builtYear;
  /**
   * @var string
   */
  public $builtYearException;
  /**
   * @var int
   */
  public $floorsCount;
  /**
   * @var string
   */
  public $floorsCountException;
  /**
   * @var int
   */
  public $lastRenovatedYear;
  /**
   * @var string
   */
  public $lastRenovatedYearException;
  /**
   * @var int
   */
  public $roomsCount;
  /**
   * @var string
   */
  public $roomsCountException;

  /**
   * @param int
   */
  public function setBuiltYear($builtYear)
  {
    $this->builtYear = $builtYear;
  }
  /**
   * @return int
   */
  public function getBuiltYear()
  {
    return $this->builtYear;
  }
  /**
   * @param string
   */
  public function setBuiltYearException($builtYearException)
  {
    $this->builtYearException = $builtYearException;
  }
  /**
   * @return string
   */
  public function getBuiltYearException()
  {
    return $this->builtYearException;
  }
  /**
   * @param int
   */
  public function setFloorsCount($floorsCount)
  {
    $this->floorsCount = $floorsCount;
  }
  /**
   * @return int
   */
  public function getFloorsCount()
  {
    return $this->floorsCount;
  }
  /**
   * @param string
   */
  public function setFloorsCountException($floorsCountException)
  {
    $this->floorsCountException = $floorsCountException;
  }
  /**
   * @return string
   */
  public function getFloorsCountException()
  {
    return $this->floorsCountException;
  }
  /**
   * @param int
   */
  public function setLastRenovatedYear($lastRenovatedYear)
  {
    $this->lastRenovatedYear = $lastRenovatedYear;
  }
  /**
   * @return int
   */
  public function getLastRenovatedYear()
  {
    return $this->lastRenovatedYear;
  }
  /**
   * @param string
   */
  public function setLastRenovatedYearException($lastRenovatedYearException)
  {
    $this->lastRenovatedYearException = $lastRenovatedYearException;
  }
  /**
   * @return string
   */
  public function getLastRenovatedYearException()
  {
    return $this->lastRenovatedYearException;
  }
  /**
   * @param int
   */
  public function setRoomsCount($roomsCount)
  {
    $this->roomsCount = $roomsCount;
  }
  /**
   * @return int
   */
  public function getRoomsCount()
  {
    return $this->roomsCount;
  }
  /**
   * @param string
   */
  public function setRoomsCountException($roomsCountException)
  {
    $this->roomsCountException = $roomsCountException;
  }
  /**
   * @return string
   */
  public function getRoomsCountException()
  {
    return $this->roomsCountException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Property::class, 'Google_Service_MyBusinessLodging_Property');
