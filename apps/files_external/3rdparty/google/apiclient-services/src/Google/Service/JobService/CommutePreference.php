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

class Google_Service_JobService_CommutePreference extends Google_Model
{
  public $allowNonStreetLevelAddress;
  public $departureHourLocal;
  public $method;
  public $roadTraffic;
  protected $startLocationType = 'Google_Service_JobService_LatLng';
  protected $startLocationDataType = '';
  public $travelTime;

  public function setAllowNonStreetLevelAddress($allowNonStreetLevelAddress)
  {
    $this->allowNonStreetLevelAddress = $allowNonStreetLevelAddress;
  }
  public function getAllowNonStreetLevelAddress()
  {
    return $this->allowNonStreetLevelAddress;
  }
  public function setDepartureHourLocal($departureHourLocal)
  {
    $this->departureHourLocal = $departureHourLocal;
  }
  public function getDepartureHourLocal()
  {
    return $this->departureHourLocal;
  }
  public function setMethod($method)
  {
    $this->method = $method;
  }
  public function getMethod()
  {
    return $this->method;
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
   * @param Google_Service_JobService_LatLng
   */
  public function setStartLocation(Google_Service_JobService_LatLng $startLocation)
  {
    $this->startLocation = $startLocation;
  }
  /**
   * @return Google_Service_JobService_LatLng
   */
  public function getStartLocation()
  {
    return $this->startLocation;
  }
  public function setTravelTime($travelTime)
  {
    $this->travelTime = $travelTime;
  }
  public function getTravelTime()
  {
    return $this->travelTime;
  }
}
