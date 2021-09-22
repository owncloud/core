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
  public $adaCompliantUnit;
  public $adaCompliantUnitException;
  public $hearingAccessibleDoorbell;
  public $hearingAccessibleDoorbellException;
  public $hearingAccessibleFireAlarm;
  public $hearingAccessibleFireAlarmException;
  public $hearingAccessibleUnit;
  public $hearingAccessibleUnitException;
  public $mobilityAccessibleBathtub;
  public $mobilityAccessibleBathtubException;
  public $mobilityAccessibleShower;
  public $mobilityAccessibleShowerException;
  public $mobilityAccessibleToilet;
  public $mobilityAccessibleToiletException;
  public $mobilityAccessibleUnit;
  public $mobilityAccessibleUnitException;

  public function setAdaCompliantUnit($adaCompliantUnit)
  {
    $this->adaCompliantUnit = $adaCompliantUnit;
  }
  public function getAdaCompliantUnit()
  {
    return $this->adaCompliantUnit;
  }
  public function setAdaCompliantUnitException($adaCompliantUnitException)
  {
    $this->adaCompliantUnitException = $adaCompliantUnitException;
  }
  public function getAdaCompliantUnitException()
  {
    return $this->adaCompliantUnitException;
  }
  public function setHearingAccessibleDoorbell($hearingAccessibleDoorbell)
  {
    $this->hearingAccessibleDoorbell = $hearingAccessibleDoorbell;
  }
  public function getHearingAccessibleDoorbell()
  {
    return $this->hearingAccessibleDoorbell;
  }
  public function setHearingAccessibleDoorbellException($hearingAccessibleDoorbellException)
  {
    $this->hearingAccessibleDoorbellException = $hearingAccessibleDoorbellException;
  }
  public function getHearingAccessibleDoorbellException()
  {
    return $this->hearingAccessibleDoorbellException;
  }
  public function setHearingAccessibleFireAlarm($hearingAccessibleFireAlarm)
  {
    $this->hearingAccessibleFireAlarm = $hearingAccessibleFireAlarm;
  }
  public function getHearingAccessibleFireAlarm()
  {
    return $this->hearingAccessibleFireAlarm;
  }
  public function setHearingAccessibleFireAlarmException($hearingAccessibleFireAlarmException)
  {
    $this->hearingAccessibleFireAlarmException = $hearingAccessibleFireAlarmException;
  }
  public function getHearingAccessibleFireAlarmException()
  {
    return $this->hearingAccessibleFireAlarmException;
  }
  public function setHearingAccessibleUnit($hearingAccessibleUnit)
  {
    $this->hearingAccessibleUnit = $hearingAccessibleUnit;
  }
  public function getHearingAccessibleUnit()
  {
    return $this->hearingAccessibleUnit;
  }
  public function setHearingAccessibleUnitException($hearingAccessibleUnitException)
  {
    $this->hearingAccessibleUnitException = $hearingAccessibleUnitException;
  }
  public function getHearingAccessibleUnitException()
  {
    return $this->hearingAccessibleUnitException;
  }
  public function setMobilityAccessibleBathtub($mobilityAccessibleBathtub)
  {
    $this->mobilityAccessibleBathtub = $mobilityAccessibleBathtub;
  }
  public function getMobilityAccessibleBathtub()
  {
    return $this->mobilityAccessibleBathtub;
  }
  public function setMobilityAccessibleBathtubException($mobilityAccessibleBathtubException)
  {
    $this->mobilityAccessibleBathtubException = $mobilityAccessibleBathtubException;
  }
  public function getMobilityAccessibleBathtubException()
  {
    return $this->mobilityAccessibleBathtubException;
  }
  public function setMobilityAccessibleShower($mobilityAccessibleShower)
  {
    $this->mobilityAccessibleShower = $mobilityAccessibleShower;
  }
  public function getMobilityAccessibleShower()
  {
    return $this->mobilityAccessibleShower;
  }
  public function setMobilityAccessibleShowerException($mobilityAccessibleShowerException)
  {
    $this->mobilityAccessibleShowerException = $mobilityAccessibleShowerException;
  }
  public function getMobilityAccessibleShowerException()
  {
    return $this->mobilityAccessibleShowerException;
  }
  public function setMobilityAccessibleToilet($mobilityAccessibleToilet)
  {
    $this->mobilityAccessibleToilet = $mobilityAccessibleToilet;
  }
  public function getMobilityAccessibleToilet()
  {
    return $this->mobilityAccessibleToilet;
  }
  public function setMobilityAccessibleToiletException($mobilityAccessibleToiletException)
  {
    $this->mobilityAccessibleToiletException = $mobilityAccessibleToiletException;
  }
  public function getMobilityAccessibleToiletException()
  {
    return $this->mobilityAccessibleToiletException;
  }
  public function setMobilityAccessibleUnit($mobilityAccessibleUnit)
  {
    $this->mobilityAccessibleUnit = $mobilityAccessibleUnit;
  }
  public function getMobilityAccessibleUnit()
  {
    return $this->mobilityAccessibleUnit;
  }
  public function setMobilityAccessibleUnitException($mobilityAccessibleUnitException)
  {
    $this->mobilityAccessibleUnitException = $mobilityAccessibleUnitException;
  }
  public function getMobilityAccessibleUnitException()
  {
    return $this->mobilityAccessibleUnitException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LivingAreaAccessibility::class, 'Google_Service_MyBusinessLodging_LivingAreaAccessibility');
