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

class Parking extends \Google\Model
{
  /**
   * @var bool
   */
  public $electricCarChargingStations;
  /**
   * @var string
   */
  public $electricCarChargingStationsException;
  /**
   * @var bool
   */
  public $freeParking;
  /**
   * @var string
   */
  public $freeParkingException;
  /**
   * @var bool
   */
  public $freeSelfParking;
  /**
   * @var string
   */
  public $freeSelfParkingException;
  /**
   * @var bool
   */
  public $freeValetParking;
  /**
   * @var string
   */
  public $freeValetParkingException;
  /**
   * @var bool
   */
  public $parkingAvailable;
  /**
   * @var string
   */
  public $parkingAvailableException;
  /**
   * @var bool
   */
  public $selfParkingAvailable;
  /**
   * @var string
   */
  public $selfParkingAvailableException;
  /**
   * @var bool
   */
  public $valetParkingAvailable;
  /**
   * @var string
   */
  public $valetParkingAvailableException;

  /**
   * @param bool
   */
  public function setElectricCarChargingStations($electricCarChargingStations)
  {
    $this->electricCarChargingStations = $electricCarChargingStations;
  }
  /**
   * @return bool
   */
  public function getElectricCarChargingStations()
  {
    return $this->electricCarChargingStations;
  }
  /**
   * @param string
   */
  public function setElectricCarChargingStationsException($electricCarChargingStationsException)
  {
    $this->electricCarChargingStationsException = $electricCarChargingStationsException;
  }
  /**
   * @return string
   */
  public function getElectricCarChargingStationsException()
  {
    return $this->electricCarChargingStationsException;
  }
  /**
   * @param bool
   */
  public function setFreeParking($freeParking)
  {
    $this->freeParking = $freeParking;
  }
  /**
   * @return bool
   */
  public function getFreeParking()
  {
    return $this->freeParking;
  }
  /**
   * @param string
   */
  public function setFreeParkingException($freeParkingException)
  {
    $this->freeParkingException = $freeParkingException;
  }
  /**
   * @return string
   */
  public function getFreeParkingException()
  {
    return $this->freeParkingException;
  }
  /**
   * @param bool
   */
  public function setFreeSelfParking($freeSelfParking)
  {
    $this->freeSelfParking = $freeSelfParking;
  }
  /**
   * @return bool
   */
  public function getFreeSelfParking()
  {
    return $this->freeSelfParking;
  }
  /**
   * @param string
   */
  public function setFreeSelfParkingException($freeSelfParkingException)
  {
    $this->freeSelfParkingException = $freeSelfParkingException;
  }
  /**
   * @return string
   */
  public function getFreeSelfParkingException()
  {
    return $this->freeSelfParkingException;
  }
  /**
   * @param bool
   */
  public function setFreeValetParking($freeValetParking)
  {
    $this->freeValetParking = $freeValetParking;
  }
  /**
   * @return bool
   */
  public function getFreeValetParking()
  {
    return $this->freeValetParking;
  }
  /**
   * @param string
   */
  public function setFreeValetParkingException($freeValetParkingException)
  {
    $this->freeValetParkingException = $freeValetParkingException;
  }
  /**
   * @return string
   */
  public function getFreeValetParkingException()
  {
    return $this->freeValetParkingException;
  }
  /**
   * @param bool
   */
  public function setParkingAvailable($parkingAvailable)
  {
    $this->parkingAvailable = $parkingAvailable;
  }
  /**
   * @return bool
   */
  public function getParkingAvailable()
  {
    return $this->parkingAvailable;
  }
  /**
   * @param string
   */
  public function setParkingAvailableException($parkingAvailableException)
  {
    $this->parkingAvailableException = $parkingAvailableException;
  }
  /**
   * @return string
   */
  public function getParkingAvailableException()
  {
    return $this->parkingAvailableException;
  }
  /**
   * @param bool
   */
  public function setSelfParkingAvailable($selfParkingAvailable)
  {
    $this->selfParkingAvailable = $selfParkingAvailable;
  }
  /**
   * @return bool
   */
  public function getSelfParkingAvailable()
  {
    return $this->selfParkingAvailable;
  }
  /**
   * @param string
   */
  public function setSelfParkingAvailableException($selfParkingAvailableException)
  {
    $this->selfParkingAvailableException = $selfParkingAvailableException;
  }
  /**
   * @return string
   */
  public function getSelfParkingAvailableException()
  {
    return $this->selfParkingAvailableException;
  }
  /**
   * @param bool
   */
  public function setValetParkingAvailable($valetParkingAvailable)
  {
    $this->valetParkingAvailable = $valetParkingAvailable;
  }
  /**
   * @return bool
   */
  public function getValetParkingAvailable()
  {
    return $this->valetParkingAvailable;
  }
  /**
   * @param string
   */
  public function setValetParkingAvailableException($valetParkingAvailableException)
  {
    $this->valetParkingAvailableException = $valetParkingAvailableException;
  }
  /**
   * @return string
   */
  public function getValetParkingAvailableException()
  {
    return $this->valetParkingAvailableException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Parking::class, 'Google_Service_MyBusinessLodging_Parking');
