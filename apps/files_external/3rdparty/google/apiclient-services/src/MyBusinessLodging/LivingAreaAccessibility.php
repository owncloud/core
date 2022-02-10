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

class LivingAreaAccessibility extends \Google\Model
{
  /**
   * @var bool
   */
  public $adaCompliantUnit;
  /**
   * @var string
   */
  public $adaCompliantUnitException;
  /**
   * @var bool
   */
  public $hearingAccessibleDoorbell;
  /**
   * @var string
   */
  public $hearingAccessibleDoorbellException;
  /**
   * @var bool
   */
  public $hearingAccessibleFireAlarm;
  /**
   * @var string
   */
  public $hearingAccessibleFireAlarmException;
  /**
   * @var bool
   */
  public $hearingAccessibleUnit;
  /**
   * @var string
   */
  public $hearingAccessibleUnitException;
  /**
   * @var bool
   */
  public $mobilityAccessibleBathtub;
  /**
   * @var string
   */
  public $mobilityAccessibleBathtubException;
  /**
   * @var bool
   */
  public $mobilityAccessibleShower;
  /**
   * @var string
   */
  public $mobilityAccessibleShowerException;
  /**
   * @var bool
   */
  public $mobilityAccessibleToilet;
  /**
   * @var string
   */
  public $mobilityAccessibleToiletException;
  /**
   * @var bool
   */
  public $mobilityAccessibleUnit;
  /**
   * @var string
   */
  public $mobilityAccessibleUnitException;

  /**
   * @param bool
   */
  public function setAdaCompliantUnit($adaCompliantUnit)
  {
    $this->adaCompliantUnit = $adaCompliantUnit;
  }
  /**
   * @return bool
   */
  public function getAdaCompliantUnit()
  {
    return $this->adaCompliantUnit;
  }
  /**
   * @param string
   */
  public function setAdaCompliantUnitException($adaCompliantUnitException)
  {
    $this->adaCompliantUnitException = $adaCompliantUnitException;
  }
  /**
   * @return string
   */
  public function getAdaCompliantUnitException()
  {
    return $this->adaCompliantUnitException;
  }
  /**
   * @param bool
   */
  public function setHearingAccessibleDoorbell($hearingAccessibleDoorbell)
  {
    $this->hearingAccessibleDoorbell = $hearingAccessibleDoorbell;
  }
  /**
   * @return bool
   */
  public function getHearingAccessibleDoorbell()
  {
    return $this->hearingAccessibleDoorbell;
  }
  /**
   * @param string
   */
  public function setHearingAccessibleDoorbellException($hearingAccessibleDoorbellException)
  {
    $this->hearingAccessibleDoorbellException = $hearingAccessibleDoorbellException;
  }
  /**
   * @return string
   */
  public function getHearingAccessibleDoorbellException()
  {
    return $this->hearingAccessibleDoorbellException;
  }
  /**
   * @param bool
   */
  public function setHearingAccessibleFireAlarm($hearingAccessibleFireAlarm)
  {
    $this->hearingAccessibleFireAlarm = $hearingAccessibleFireAlarm;
  }
  /**
   * @return bool
   */
  public function getHearingAccessibleFireAlarm()
  {
    return $this->hearingAccessibleFireAlarm;
  }
  /**
   * @param string
   */
  public function setHearingAccessibleFireAlarmException($hearingAccessibleFireAlarmException)
  {
    $this->hearingAccessibleFireAlarmException = $hearingAccessibleFireAlarmException;
  }
  /**
   * @return string
   */
  public function getHearingAccessibleFireAlarmException()
  {
    return $this->hearingAccessibleFireAlarmException;
  }
  /**
   * @param bool
   */
  public function setHearingAccessibleUnit($hearingAccessibleUnit)
  {
    $this->hearingAccessibleUnit = $hearingAccessibleUnit;
  }
  /**
   * @return bool
   */
  public function getHearingAccessibleUnit()
  {
    return $this->hearingAccessibleUnit;
  }
  /**
   * @param string
   */
  public function setHearingAccessibleUnitException($hearingAccessibleUnitException)
  {
    $this->hearingAccessibleUnitException = $hearingAccessibleUnitException;
  }
  /**
   * @return string
   */
  public function getHearingAccessibleUnitException()
  {
    return $this->hearingAccessibleUnitException;
  }
  /**
   * @param bool
   */
  public function setMobilityAccessibleBathtub($mobilityAccessibleBathtub)
  {
    $this->mobilityAccessibleBathtub = $mobilityAccessibleBathtub;
  }
  /**
   * @return bool
   */
  public function getMobilityAccessibleBathtub()
  {
    return $this->mobilityAccessibleBathtub;
  }
  /**
   * @param string
   */
  public function setMobilityAccessibleBathtubException($mobilityAccessibleBathtubException)
  {
    $this->mobilityAccessibleBathtubException = $mobilityAccessibleBathtubException;
  }
  /**
   * @return string
   */
  public function getMobilityAccessibleBathtubException()
  {
    return $this->mobilityAccessibleBathtubException;
  }
  /**
   * @param bool
   */
  public function setMobilityAccessibleShower($mobilityAccessibleShower)
  {
    $this->mobilityAccessibleShower = $mobilityAccessibleShower;
  }
  /**
   * @return bool
   */
  public function getMobilityAccessibleShower()
  {
    return $this->mobilityAccessibleShower;
  }
  /**
   * @param string
   */
  public function setMobilityAccessibleShowerException($mobilityAccessibleShowerException)
  {
    $this->mobilityAccessibleShowerException = $mobilityAccessibleShowerException;
  }
  /**
   * @return string
   */
  public function getMobilityAccessibleShowerException()
  {
    return $this->mobilityAccessibleShowerException;
  }
  /**
   * @param bool
   */
  public function setMobilityAccessibleToilet($mobilityAccessibleToilet)
  {
    $this->mobilityAccessibleToilet = $mobilityAccessibleToilet;
  }
  /**
   * @return bool
   */
  public function getMobilityAccessibleToilet()
  {
    return $this->mobilityAccessibleToilet;
  }
  /**
   * @param string
   */
  public function setMobilityAccessibleToiletException($mobilityAccessibleToiletException)
  {
    $this->mobilityAccessibleToiletException = $mobilityAccessibleToiletException;
  }
  /**
   * @return string
   */
  public function getMobilityAccessibleToiletException()
  {
    return $this->mobilityAccessibleToiletException;
  }
  /**
   * @param bool
   */
  public function setMobilityAccessibleUnit($mobilityAccessibleUnit)
  {
    $this->mobilityAccessibleUnit = $mobilityAccessibleUnit;
  }
  /**
   * @return bool
   */
  public function getMobilityAccessibleUnit()
  {
    return $this->mobilityAccessibleUnit;
  }
  /**
   * @param string
   */
  public function setMobilityAccessibleUnitException($mobilityAccessibleUnitException)
  {
    $this->mobilityAccessibleUnitException = $mobilityAccessibleUnitException;
  }
  /**
   * @return string
   */
  public function getMobilityAccessibleUnitException()
  {
    return $this->mobilityAccessibleUnitException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LivingAreaAccessibility::class, 'Google_Service_MyBusinessLodging_LivingAreaAccessibility');
