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

namespace Google\Service\Contentwarehouse;

class NlpSemanticParsingLocalBusinessType extends \Google\Collection
{
  protected $collection_key = 'vehicleType';
  /**
   * @var bool
   */
  public $airline;
  /**
   * @var bool
   */
  public $airport;
  /**
   * @var bool
   */
  public $bank;
  /**
   * @var bool
   */
  public $bikeSharingStation;
  /**
   * @var bool
   */
  public $busStop;
  /**
   * @var bool
   */
  public $clothingStore;
  /**
   * @var string[]
   */
  public $cuisineGcid;
  /**
   * @var bool
   */
  public $departmentStore;
  /**
   * @var bool
   */
  public $drugDropOff;
  /**
   * @var bool
   */
  public $electricVehicleChargingStation;
  /**
   * @var bool
   */
  public $electronicStore;
  /**
   * @var string
   */
  public $emergency;
  /**
   * @var bool
   */
  public $foodPantry;
  /**
   * @var bool
   */
  public $gasStation;
  /**
   * @var bool
   */
  public $groceryStore;
  /**
   * @var bool
   */
  public $hairdresser;
  /**
   * @var bool
   */
  public $hardwareStore;
  /**
   * @var bool
   */
  public $hospital;
  /**
   * @var bool
   */
  public $hotel;
  /**
   * @var bool
   */
  public $parking;
  /**
   * @var bool
   */
  public $petStore;
  /**
   * @var bool
   */
  public $pharmacy;
  /**
   * @var bool
   */
  public $qrefTransitStation;
  /**
   * @var bool
   */
  public $restaurant;
  /**
   * @var bool
   */
  public $retail;
  /**
   * @var bool
   */
  public $school;
  /**
   * @var bool
   */
  public $shoppingCenter;
  /**
   * @var bool
   */
  public $soupKitchen;
  /**
   * @var bool
   */
  public $sportStore;
  /**
   * @var bool
   */
  public $subwayStation;
  /**
   * @var bool
   */
  public $telecom;
  /**
   * @var bool
   */
  public $toyStore;
  /**
   * @var bool
   */
  public $trainStation;
  /**
   * @var bool
   */
  public $transitLine;
  /**
   * @var bool
   */
  public $transitOperator;
  /**
   * @var bool
   */
  public $transitStation;
  /**
   * @var bool
   */
  public $university;
  /**
   * @var string[]
   */
  public $vehicleType;
  /**
   * @var bool
   */
  public $venue;

  /**
   * @param bool
   */
  public function setAirline($airline)
  {
    $this->airline = $airline;
  }
  /**
   * @return bool
   */
  public function getAirline()
  {
    return $this->airline;
  }
  /**
   * @param bool
   */
  public function setAirport($airport)
  {
    $this->airport = $airport;
  }
  /**
   * @return bool
   */
  public function getAirport()
  {
    return $this->airport;
  }
  /**
   * @param bool
   */
  public function setBank($bank)
  {
    $this->bank = $bank;
  }
  /**
   * @return bool
   */
  public function getBank()
  {
    return $this->bank;
  }
  /**
   * @param bool
   */
  public function setBikeSharingStation($bikeSharingStation)
  {
    $this->bikeSharingStation = $bikeSharingStation;
  }
  /**
   * @return bool
   */
  public function getBikeSharingStation()
  {
    return $this->bikeSharingStation;
  }
  /**
   * @param bool
   */
  public function setBusStop($busStop)
  {
    $this->busStop = $busStop;
  }
  /**
   * @return bool
   */
  public function getBusStop()
  {
    return $this->busStop;
  }
  /**
   * @param bool
   */
  public function setClothingStore($clothingStore)
  {
    $this->clothingStore = $clothingStore;
  }
  /**
   * @return bool
   */
  public function getClothingStore()
  {
    return $this->clothingStore;
  }
  /**
   * @param string[]
   */
  public function setCuisineGcid($cuisineGcid)
  {
    $this->cuisineGcid = $cuisineGcid;
  }
  /**
   * @return string[]
   */
  public function getCuisineGcid()
  {
    return $this->cuisineGcid;
  }
  /**
   * @param bool
   */
  public function setDepartmentStore($departmentStore)
  {
    $this->departmentStore = $departmentStore;
  }
  /**
   * @return bool
   */
  public function getDepartmentStore()
  {
    return $this->departmentStore;
  }
  /**
   * @param bool
   */
  public function setDrugDropOff($drugDropOff)
  {
    $this->drugDropOff = $drugDropOff;
  }
  /**
   * @return bool
   */
  public function getDrugDropOff()
  {
    return $this->drugDropOff;
  }
  /**
   * @param bool
   */
  public function setElectricVehicleChargingStation($electricVehicleChargingStation)
  {
    $this->electricVehicleChargingStation = $electricVehicleChargingStation;
  }
  /**
   * @return bool
   */
  public function getElectricVehicleChargingStation()
  {
    return $this->electricVehicleChargingStation;
  }
  /**
   * @param bool
   */
  public function setElectronicStore($electronicStore)
  {
    $this->electronicStore = $electronicStore;
  }
  /**
   * @return bool
   */
  public function getElectronicStore()
  {
    return $this->electronicStore;
  }
  /**
   * @param string
   */
  public function setEmergency($emergency)
  {
    $this->emergency = $emergency;
  }
  /**
   * @return string
   */
  public function getEmergency()
  {
    return $this->emergency;
  }
  /**
   * @param bool
   */
  public function setFoodPantry($foodPantry)
  {
    $this->foodPantry = $foodPantry;
  }
  /**
   * @return bool
   */
  public function getFoodPantry()
  {
    return $this->foodPantry;
  }
  /**
   * @param bool
   */
  public function setGasStation($gasStation)
  {
    $this->gasStation = $gasStation;
  }
  /**
   * @return bool
   */
  public function getGasStation()
  {
    return $this->gasStation;
  }
  /**
   * @param bool
   */
  public function setGroceryStore($groceryStore)
  {
    $this->groceryStore = $groceryStore;
  }
  /**
   * @return bool
   */
  public function getGroceryStore()
  {
    return $this->groceryStore;
  }
  /**
   * @param bool
   */
  public function setHairdresser($hairdresser)
  {
    $this->hairdresser = $hairdresser;
  }
  /**
   * @return bool
   */
  public function getHairdresser()
  {
    return $this->hairdresser;
  }
  /**
   * @param bool
   */
  public function setHardwareStore($hardwareStore)
  {
    $this->hardwareStore = $hardwareStore;
  }
  /**
   * @return bool
   */
  public function getHardwareStore()
  {
    return $this->hardwareStore;
  }
  /**
   * @param bool
   */
  public function setHospital($hospital)
  {
    $this->hospital = $hospital;
  }
  /**
   * @return bool
   */
  public function getHospital()
  {
    return $this->hospital;
  }
  /**
   * @param bool
   */
  public function setHotel($hotel)
  {
    $this->hotel = $hotel;
  }
  /**
   * @return bool
   */
  public function getHotel()
  {
    return $this->hotel;
  }
  /**
   * @param bool
   */
  public function setParking($parking)
  {
    $this->parking = $parking;
  }
  /**
   * @return bool
   */
  public function getParking()
  {
    return $this->parking;
  }
  /**
   * @param bool
   */
  public function setPetStore($petStore)
  {
    $this->petStore = $petStore;
  }
  /**
   * @return bool
   */
  public function getPetStore()
  {
    return $this->petStore;
  }
  /**
   * @param bool
   */
  public function setPharmacy($pharmacy)
  {
    $this->pharmacy = $pharmacy;
  }
  /**
   * @return bool
   */
  public function getPharmacy()
  {
    return $this->pharmacy;
  }
  /**
   * @param bool
   */
  public function setQrefTransitStation($qrefTransitStation)
  {
    $this->qrefTransitStation = $qrefTransitStation;
  }
  /**
   * @return bool
   */
  public function getQrefTransitStation()
  {
    return $this->qrefTransitStation;
  }
  /**
   * @param bool
   */
  public function setRestaurant($restaurant)
  {
    $this->restaurant = $restaurant;
  }
  /**
   * @return bool
   */
  public function getRestaurant()
  {
    return $this->restaurant;
  }
  /**
   * @param bool
   */
  public function setRetail($retail)
  {
    $this->retail = $retail;
  }
  /**
   * @return bool
   */
  public function getRetail()
  {
    return $this->retail;
  }
  /**
   * @param bool
   */
  public function setSchool($school)
  {
    $this->school = $school;
  }
  /**
   * @return bool
   */
  public function getSchool()
  {
    return $this->school;
  }
  /**
   * @param bool
   */
  public function setShoppingCenter($shoppingCenter)
  {
    $this->shoppingCenter = $shoppingCenter;
  }
  /**
   * @return bool
   */
  public function getShoppingCenter()
  {
    return $this->shoppingCenter;
  }
  /**
   * @param bool
   */
  public function setSoupKitchen($soupKitchen)
  {
    $this->soupKitchen = $soupKitchen;
  }
  /**
   * @return bool
   */
  public function getSoupKitchen()
  {
    return $this->soupKitchen;
  }
  /**
   * @param bool
   */
  public function setSportStore($sportStore)
  {
    $this->sportStore = $sportStore;
  }
  /**
   * @return bool
   */
  public function getSportStore()
  {
    return $this->sportStore;
  }
  /**
   * @param bool
   */
  public function setSubwayStation($subwayStation)
  {
    $this->subwayStation = $subwayStation;
  }
  /**
   * @return bool
   */
  public function getSubwayStation()
  {
    return $this->subwayStation;
  }
  /**
   * @param bool
   */
  public function setTelecom($telecom)
  {
    $this->telecom = $telecom;
  }
  /**
   * @return bool
   */
  public function getTelecom()
  {
    return $this->telecom;
  }
  /**
   * @param bool
   */
  public function setToyStore($toyStore)
  {
    $this->toyStore = $toyStore;
  }
  /**
   * @return bool
   */
  public function getToyStore()
  {
    return $this->toyStore;
  }
  /**
   * @param bool
   */
  public function setTrainStation($trainStation)
  {
    $this->trainStation = $trainStation;
  }
  /**
   * @return bool
   */
  public function getTrainStation()
  {
    return $this->trainStation;
  }
  /**
   * @param bool
   */
  public function setTransitLine($transitLine)
  {
    $this->transitLine = $transitLine;
  }
  /**
   * @return bool
   */
  public function getTransitLine()
  {
    return $this->transitLine;
  }
  /**
   * @param bool
   */
  public function setTransitOperator($transitOperator)
  {
    $this->transitOperator = $transitOperator;
  }
  /**
   * @return bool
   */
  public function getTransitOperator()
  {
    return $this->transitOperator;
  }
  /**
   * @param bool
   */
  public function setTransitStation($transitStation)
  {
    $this->transitStation = $transitStation;
  }
  /**
   * @return bool
   */
  public function getTransitStation()
  {
    return $this->transitStation;
  }
  /**
   * @param bool
   */
  public function setUniversity($university)
  {
    $this->university = $university;
  }
  /**
   * @return bool
   */
  public function getUniversity()
  {
    return $this->university;
  }
  /**
   * @param string[]
   */
  public function setVehicleType($vehicleType)
  {
    $this->vehicleType = $vehicleType;
  }
  /**
   * @return string[]
   */
  public function getVehicleType()
  {
    return $this->vehicleType;
  }
  /**
   * @param bool
   */
  public function setVenue($venue)
  {
    $this->venue = $venue;
  }
  /**
   * @return bool
   */
  public function getVenue()
  {
    return $this->venue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingLocalBusinessType::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingLocalBusinessType');
