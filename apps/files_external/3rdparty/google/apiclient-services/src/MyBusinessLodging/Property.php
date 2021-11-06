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
  public $builtYear;
  public $builtYearException;
  public $floorsCount;
  public $floorsCountException;
  public $lastRenovatedYear;
  public $lastRenovatedYearException;
  public $roomsCount;
  public $roomsCountException;

  public function setBuiltYear($builtYear)
  {
    $this->builtYear = $builtYear;
  }
  public function getBuiltYear()
  {
    return $this->builtYear;
  }
  public function setBuiltYearException($builtYearException)
  {
    $this->builtYearException = $builtYearException;
  }
  public function getBuiltYearException()
  {
    return $this->builtYearException;
  }
  public function setFloorsCount($floorsCount)
  {
    $this->floorsCount = $floorsCount;
  }
  public function getFloorsCount()
  {
    return $this->floorsCount;
  }
  public function setFloorsCountException($floorsCountException)
  {
    $this->floorsCountException = $floorsCountException;
  }
  public function getFloorsCountException()
  {
    return $this->floorsCountException;
  }
  public function setLastRenovatedYear($lastRenovatedYear)
  {
    $this->lastRenovatedYear = $lastRenovatedYear;
  }
  public function getLastRenovatedYear()
  {
    return $this->lastRenovatedYear;
  }
  public function setLastRenovatedYearException($lastRenovatedYearException)
  {
    $this->lastRenovatedYearException = $lastRenovatedYearException;
  }
  public function getLastRenovatedYearException()
  {
    return $this->lastRenovatedYearException;
  }
  public function setRoomsCount($roomsCount)
  {
    $this->roomsCount = $roomsCount;
  }
  public function getRoomsCount()
  {
    return $this->roomsCount;
  }
  public function setRoomsCountException($roomsCountException)
  {
    $this->roomsCountException = $roomsCountException;
  }
  public function getRoomsCountException()
  {
    return $this->roomsCountException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Property::class, 'Google_Service_MyBusinessLodging_Property');
