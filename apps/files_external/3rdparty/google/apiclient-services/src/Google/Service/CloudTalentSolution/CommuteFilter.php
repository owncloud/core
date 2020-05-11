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

class Google_Service_CloudTalentSolution_CommuteFilter extends Google_Model
{
  public $allowImpreciseAddresses;
  public $commuteMethod;
  protected $departureTimeType = 'Google_Service_CloudTalentSolution_TimeOfDay';
  protected $departureTimeDataType = '';
  public $roadTraffic;
  protected $startCoordinatesType = 'Google_Service_CloudTalentSolution_LatLng';
  protected $startCoordinatesDataType = '';
  public $travelDuration;

  public function setAllowImpreciseAddresses($allowImpreciseAddresses)
  {
    $this->allowImpreciseAddresses = $allowImpreciseAddresses;
  }
  public function getAllowImpreciseAddresses()
  {
    return $this->allowImpreciseAddresses;
  }
  public function setCommuteMethod($commuteMethod)
  {
    $this->commuteMethod = $commuteMethod;
  }
  public function getCommuteMethod()
  {
    return $this->commuteMethod;
  }
  /**
   * @param Google_Service_CloudTalentSolution_TimeOfDay
   */
  public function setDepartureTime(Google_Service_CloudTalentSolution_TimeOfDay $departureTime)
  {
    $this->departureTime = $departureTime;
  }
  /**
   * @return Google_Service_CloudTalentSolution_TimeOfDay
   */
  public function getDepartureTime()
  {
    return $this->departureTime;
  }
  public function setRoadTraffic($roadTraffic)
  {
    $this->roadTraffic = $roadTraffic;
  }
  public function getRoadTraffic()
  {
    return $this->roadTraffic;
  }
  /**
   * @param Google_Service_CloudTalentSolution_LatLng
   */
  public function setStartCoordinates(Google_Service_CloudTalentSolution_LatLng $startCoordinates)
  {
    $this->startCoordinates = $startCoordinates;
  }
  /**
   * @return Google_Service_CloudTalentSolution_LatLng
   */
  public function getStartCoordinates()
  {
    return $this->startCoordinates;
  }
  public function setTravelDuration($travelDuration)
  {
    $this->travelDuration = $travelDuration;
  }
  public function getTravelDuration()
  {
    return $this->travelDuration;
  }
}
