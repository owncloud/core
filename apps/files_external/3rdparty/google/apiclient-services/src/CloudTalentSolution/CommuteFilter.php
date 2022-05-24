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

namespace Google\Service\CloudTalentSolution;

class CommuteFilter extends \Google\Model
{
  /**
   * @var bool
   */
  public $allowImpreciseAddresses;
  /**
   * @var string
   */
  public $commuteMethod;
  protected $departureTimeType = TimeOfDay::class;
  protected $departureTimeDataType = '';
  /**
   * @var string
   */
  public $roadTraffic;
  protected $startCoordinatesType = LatLng::class;
  protected $startCoordinatesDataType = '';
  /**
   * @var string
   */
  public $travelDuration;

  /**
   * @param bool
   */
  public function setAllowImpreciseAddresses($allowImpreciseAddresses)
  {
    $this->allowImpreciseAddresses = $allowImpreciseAddresses;
  }
  /**
   * @return bool
   */
  public function getAllowImpreciseAddresses()
  {
    return $this->allowImpreciseAddresses;
  }
  /**
   * @param string
   */
  public function setCommuteMethod($commuteMethod)
  {
    $this->commuteMethod = $commuteMethod;
  }
  /**
   * @return string
   */
  public function getCommuteMethod()
  {
    return $this->commuteMethod;
  }
  /**
   * @param TimeOfDay
   */
  public function setDepartureTime(TimeOfDay $departureTime)
  {
    $this->departureTime = $departureTime;
  }
  /**
   * @return TimeOfDay
   */
  public function getDepartureTime()
  {
    return $this->departureTime;
  }
  /**
   * @param string
   */
  public function setRoadTraffic($roadTraffic)
  {
    $this->roadTraffic = $roadTraffic;
  }
  /**
   * @return string
   */
  public function getRoadTraffic()
  {
    return $this->roadTraffic;
  }
  /**
   * @param LatLng
   */
  public function setStartCoordinates(LatLng $startCoordinates)
  {
    $this->startCoordinates = $startCoordinates;
  }
  /**
   * @return LatLng
   */
  public function getStartCoordinates()
  {
    return $this->startCoordinates;
  }
  /**
   * @param string
   */
  public function setTravelDuration($travelDuration)
  {
    $this->travelDuration = $travelDuration;
  }
  /**
   * @return string
   */
  public function getTravelDuration()
  {
    return $this->travelDuration;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CommuteFilter::class, 'Google_Service_CloudTalentSolution_CommuteFilter');
