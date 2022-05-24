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

class LivingAreaFeatures extends \Google\Model
{
  /**
   * @var bool
   */
  public $airConditioning;
  /**
   * @var string
   */
  public $airConditioningException;
  /**
   * @var bool
   */
  public $bathtub;
  /**
   * @var string
   */
  public $bathtubException;
  /**
   * @var bool
   */
  public $bidet;
  /**
   * @var string
   */
  public $bidetException;
  /**
   * @var bool
   */
  public $dryer;
  /**
   * @var string
   */
  public $dryerException;
  /**
   * @var bool
   */
  public $electronicRoomKey;
  /**
   * @var string
   */
  public $electronicRoomKeyException;
  /**
   * @var bool
   */
  public $fireplace;
  /**
   * @var string
   */
  public $fireplaceException;
  /**
   * @var bool
   */
  public $hairdryer;
  /**
   * @var string
   */
  public $hairdryerException;
  /**
   * @var bool
   */
  public $heating;
  /**
   * @var string
   */
  public $heatingException;
  /**
   * @var bool
   */
  public $inunitSafe;
  /**
   * @var string
   */
  public $inunitSafeException;
  /**
   * @var bool
   */
  public $inunitWifiAvailable;
  /**
   * @var string
   */
  public $inunitWifiAvailableException;
  /**
   * @var bool
   */
  public $ironingEquipment;
  /**
   * @var string
   */
  public $ironingEquipmentException;
  /**
   * @var bool
   */
  public $payPerViewMovies;
  /**
   * @var string
   */
  public $payPerViewMoviesException;
  /**
   * @var bool
   */
  public $privateBathroom;
  /**
   * @var string
   */
  public $privateBathroomException;
  /**
   * @var bool
   */
  public $shower;
  /**
   * @var string
   */
  public $showerException;
  /**
   * @var bool
   */
  public $toilet;
  /**
   * @var string
   */
  public $toiletException;
  /**
   * @var bool
   */
  public $tv;
  /**
   * @var bool
   */
  public $tvCasting;
  /**
   * @var string
   */
  public $tvCastingException;
  /**
   * @var string
   */
  public $tvException;
  /**
   * @var bool
   */
  public $tvStreaming;
  /**
   * @var string
   */
  public $tvStreamingException;
  /**
   * @var bool
   */
  public $universalPowerAdapters;
  /**
   * @var string
   */
  public $universalPowerAdaptersException;
  /**
   * @var bool
   */
  public $washer;
  /**
   * @var string
   */
  public $washerException;

  /**
   * @param bool
   */
  public function setAirConditioning($airConditioning)
  {
    $this->airConditioning = $airConditioning;
  }
  /**
   * @return bool
   */
  public function getAirConditioning()
  {
    return $this->airConditioning;
  }
  /**
   * @param string
   */
  public function setAirConditioningException($airConditioningException)
  {
    $this->airConditioningException = $airConditioningException;
  }
  /**
   * @return string
   */
  public function getAirConditioningException()
  {
    return $this->airConditioningException;
  }
  /**
   * @param bool
   */
  public function setBathtub($bathtub)
  {
    $this->bathtub = $bathtub;
  }
  /**
   * @return bool
   */
  public function getBathtub()
  {
    return $this->bathtub;
  }
  /**
   * @param string
   */
  public function setBathtubException($bathtubException)
  {
    $this->bathtubException = $bathtubException;
  }
  /**
   * @return string
   */
  public function getBathtubException()
  {
    return $this->bathtubException;
  }
  /**
   * @param bool
   */
  public function setBidet($bidet)
  {
    $this->bidet = $bidet;
  }
  /**
   * @return bool
   */
  public function getBidet()
  {
    return $this->bidet;
  }
  /**
   * @param string
   */
  public function setBidetException($bidetException)
  {
    $this->bidetException = $bidetException;
  }
  /**
   * @return string
   */
  public function getBidetException()
  {
    return $this->bidetException;
  }
  /**
   * @param bool
   */
  public function setDryer($dryer)
  {
    $this->dryer = $dryer;
  }
  /**
   * @return bool
   */
  public function getDryer()
  {
    return $this->dryer;
  }
  /**
   * @param string
   */
  public function setDryerException($dryerException)
  {
    $this->dryerException = $dryerException;
  }
  /**
   * @return string
   */
  public function getDryerException()
  {
    return $this->dryerException;
  }
  /**
   * @param bool
   */
  public function setElectronicRoomKey($electronicRoomKey)
  {
    $this->electronicRoomKey = $electronicRoomKey;
  }
  /**
   * @return bool
   */
  public function getElectronicRoomKey()
  {
    return $this->electronicRoomKey;
  }
  /**
   * @param string
   */
  public function setElectronicRoomKeyException($electronicRoomKeyException)
  {
    $this->electronicRoomKeyException = $electronicRoomKeyException;
  }
  /**
   * @return string
   */
  public function getElectronicRoomKeyException()
  {
    return $this->electronicRoomKeyException;
  }
  /**
   * @param bool
   */
  public function setFireplace($fireplace)
  {
    $this->fireplace = $fireplace;
  }
  /**
   * @return bool
   */
  public function getFireplace()
  {
    return $this->fireplace;
  }
  /**
   * @param string
   */
  public function setFireplaceException($fireplaceException)
  {
    $this->fireplaceException = $fireplaceException;
  }
  /**
   * @return string
   */
  public function getFireplaceException()
  {
    return $this->fireplaceException;
  }
  /**
   * @param bool
   */
  public function setHairdryer($hairdryer)
  {
    $this->hairdryer = $hairdryer;
  }
  /**
   * @return bool
   */
  public function getHairdryer()
  {
    return $this->hairdryer;
  }
  /**
   * @param string
   */
  public function setHairdryerException($hairdryerException)
  {
    $this->hairdryerException = $hairdryerException;
  }
  /**
   * @return string
   */
  public function getHairdryerException()
  {
    return $this->hairdryerException;
  }
  /**
   * @param bool
   */
  public function setHeating($heating)
  {
    $this->heating = $heating;
  }
  /**
   * @return bool
   */
  public function getHeating()
  {
    return $this->heating;
  }
  /**
   * @param string
   */
  public function setHeatingException($heatingException)
  {
    $this->heatingException = $heatingException;
  }
  /**
   * @return string
   */
  public function getHeatingException()
  {
    return $this->heatingException;
  }
  /**
   * @param bool
   */
  public function setInunitSafe($inunitSafe)
  {
    $this->inunitSafe = $inunitSafe;
  }
  /**
   * @return bool
   */
  public function getInunitSafe()
  {
    return $this->inunitSafe;
  }
  /**
   * @param string
   */
  public function setInunitSafeException($inunitSafeException)
  {
    $this->inunitSafeException = $inunitSafeException;
  }
  /**
   * @return string
   */
  public function getInunitSafeException()
  {
    return $this->inunitSafeException;
  }
  /**
   * @param bool
   */
  public function setInunitWifiAvailable($inunitWifiAvailable)
  {
    $this->inunitWifiAvailable = $inunitWifiAvailable;
  }
  /**
   * @return bool
   */
  public function getInunitWifiAvailable()
  {
    return $this->inunitWifiAvailable;
  }
  /**
   * @param string
   */
  public function setInunitWifiAvailableException($inunitWifiAvailableException)
  {
    $this->inunitWifiAvailableException = $inunitWifiAvailableException;
  }
  /**
   * @return string
   */
  public function getInunitWifiAvailableException()
  {
    return $this->inunitWifiAvailableException;
  }
  /**
   * @param bool
   */
  public function setIroningEquipment($ironingEquipment)
  {
    $this->ironingEquipment = $ironingEquipment;
  }
  /**
   * @return bool
   */
  public function getIroningEquipment()
  {
    return $this->ironingEquipment;
  }
  /**
   * @param string
   */
  public function setIroningEquipmentException($ironingEquipmentException)
  {
    $this->ironingEquipmentException = $ironingEquipmentException;
  }
  /**
   * @return string
   */
  public function getIroningEquipmentException()
  {
    return $this->ironingEquipmentException;
  }
  /**
   * @param bool
   */
  public function setPayPerViewMovies($payPerViewMovies)
  {
    $this->payPerViewMovies = $payPerViewMovies;
  }
  /**
   * @return bool
   */
  public function getPayPerViewMovies()
  {
    return $this->payPerViewMovies;
  }
  /**
   * @param string
   */
  public function setPayPerViewMoviesException($payPerViewMoviesException)
  {
    $this->payPerViewMoviesException = $payPerViewMoviesException;
  }
  /**
   * @return string
   */
  public function getPayPerViewMoviesException()
  {
    return $this->payPerViewMoviesException;
  }
  /**
   * @param bool
   */
  public function setPrivateBathroom($privateBathroom)
  {
    $this->privateBathroom = $privateBathroom;
  }
  /**
   * @return bool
   */
  public function getPrivateBathroom()
  {
    return $this->privateBathroom;
  }
  /**
   * @param string
   */
  public function setPrivateBathroomException($privateBathroomException)
  {
    $this->privateBathroomException = $privateBathroomException;
  }
  /**
   * @return string
   */
  public function getPrivateBathroomException()
  {
    return $this->privateBathroomException;
  }
  /**
   * @param bool
   */
  public function setShower($shower)
  {
    $this->shower = $shower;
  }
  /**
   * @return bool
   */
  public function getShower()
  {
    return $this->shower;
  }
  /**
   * @param string
   */
  public function setShowerException($showerException)
  {
    $this->showerException = $showerException;
  }
  /**
   * @return string
   */
  public function getShowerException()
  {
    return $this->showerException;
  }
  /**
   * @param bool
   */
  public function setToilet($toilet)
  {
    $this->toilet = $toilet;
  }
  /**
   * @return bool
   */
  public function getToilet()
  {
    return $this->toilet;
  }
  /**
   * @param string
   */
  public function setToiletException($toiletException)
  {
    $this->toiletException = $toiletException;
  }
  /**
   * @return string
   */
  public function getToiletException()
  {
    return $this->toiletException;
  }
  /**
   * @param bool
   */
  public function setTv($tv)
  {
    $this->tv = $tv;
  }
  /**
   * @return bool
   */
  public function getTv()
  {
    return $this->tv;
  }
  /**
   * @param bool
   */
  public function setTvCasting($tvCasting)
  {
    $this->tvCasting = $tvCasting;
  }
  /**
   * @return bool
   */
  public function getTvCasting()
  {
    return $this->tvCasting;
  }
  /**
   * @param string
   */
  public function setTvCastingException($tvCastingException)
  {
    $this->tvCastingException = $tvCastingException;
  }
  /**
   * @return string
   */
  public function getTvCastingException()
  {
    return $this->tvCastingException;
  }
  /**
   * @param string
   */
  public function setTvException($tvException)
  {
    $this->tvException = $tvException;
  }
  /**
   * @return string
   */
  public function getTvException()
  {
    return $this->tvException;
  }
  /**
   * @param bool
   */
  public function setTvStreaming($tvStreaming)
  {
    $this->tvStreaming = $tvStreaming;
  }
  /**
   * @return bool
   */
  public function getTvStreaming()
  {
    return $this->tvStreaming;
  }
  /**
   * @param string
   */
  public function setTvStreamingException($tvStreamingException)
  {
    $this->tvStreamingException = $tvStreamingException;
  }
  /**
   * @return string
   */
  public function getTvStreamingException()
  {
    return $this->tvStreamingException;
  }
  /**
   * @param bool
   */
  public function setUniversalPowerAdapters($universalPowerAdapters)
  {
    $this->universalPowerAdapters = $universalPowerAdapters;
  }
  /**
   * @return bool
   */
  public function getUniversalPowerAdapters()
  {
    return $this->universalPowerAdapters;
  }
  /**
   * @param string
   */
  public function setUniversalPowerAdaptersException($universalPowerAdaptersException)
  {
    $this->universalPowerAdaptersException = $universalPowerAdaptersException;
  }
  /**
   * @return string
   */
  public function getUniversalPowerAdaptersException()
  {
    return $this->universalPowerAdaptersException;
  }
  /**
   * @param bool
   */
  public function setWasher($washer)
  {
    $this->washer = $washer;
  }
  /**
   * @return bool
   */
  public function getWasher()
  {
    return $this->washer;
  }
  /**
   * @param string
   */
  public function setWasherException($washerException)
  {
    $this->washerException = $washerException;
  }
  /**
   * @return string
   */
  public function getWasherException()
  {
    return $this->washerException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LivingAreaFeatures::class, 'Google_Service_MyBusinessLodging_LivingAreaFeatures');
