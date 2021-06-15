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

class Google_Service_MyBusinessLodging_Lodging extends Google_Collection
{
  protected $collection_key = 'guestUnits';
  protected $accessibilityType = 'Google_Service_MyBusinessLodging_Accessibility';
  protected $accessibilityDataType = '';
  protected $activitiesType = 'Google_Service_MyBusinessLodging_Activities';
  protected $activitiesDataType = '';
  protected $allUnitsType = 'Google_Service_MyBusinessLodging_GuestUnitFeatures';
  protected $allUnitsDataType = '';
  protected $businessType = 'Google_Service_MyBusinessLodging_Business';
  protected $businessDataType = '';
  protected $commonLivingAreaType = 'Google_Service_MyBusinessLodging_LivingArea';
  protected $commonLivingAreaDataType = '';
  protected $connectivityType = 'Google_Service_MyBusinessLodging_Connectivity';
  protected $connectivityDataType = '';
  protected $familiesType = 'Google_Service_MyBusinessLodging_Families';
  protected $familiesDataType = '';
  protected $foodAndDrinkType = 'Google_Service_MyBusinessLodging_FoodAndDrink';
  protected $foodAndDrinkDataType = '';
  protected $guestUnitsType = 'Google_Service_MyBusinessLodging_GuestUnitType';
  protected $guestUnitsDataType = 'array';
  protected $healthAndSafetyType = 'Google_Service_MyBusinessLodging_HealthAndSafety';
  protected $healthAndSafetyDataType = '';
  protected $housekeepingType = 'Google_Service_MyBusinessLodging_Housekeeping';
  protected $housekeepingDataType = '';
  protected $metadataType = 'Google_Service_MyBusinessLodging_LodgingMetadata';
  protected $metadataDataType = '';
  public $name;
  protected $parkingType = 'Google_Service_MyBusinessLodging_Parking';
  protected $parkingDataType = '';
  protected $petsType = 'Google_Service_MyBusinessLodging_Pets';
  protected $petsDataType = '';
  protected $policiesType = 'Google_Service_MyBusinessLodging_Policies';
  protected $policiesDataType = '';
  protected $poolsType = 'Google_Service_MyBusinessLodging_Pools';
  protected $poolsDataType = '';
  protected $propertyType = 'Google_Service_MyBusinessLodging_Property';
  protected $propertyDataType = '';
  protected $servicesType = 'Google_Service_MyBusinessLodging_Services';
  protected $servicesDataType = '';
  protected $someUnitsType = 'Google_Service_MyBusinessLodging_GuestUnitFeatures';
  protected $someUnitsDataType = '';
  protected $transportationType = 'Google_Service_MyBusinessLodging_Transportation';
  protected $transportationDataType = '';
  protected $wellnessType = 'Google_Service_MyBusinessLodging_Wellness';
  protected $wellnessDataType = '';

  /**
   * @param Google_Service_MyBusinessLodging_Accessibility
   */
  public function setAccessibility(Google_Service_MyBusinessLodging_Accessibility $accessibility)
  {
    $this->accessibility = $accessibility;
  }
  /**
   * @return Google_Service_MyBusinessLodging_Accessibility
   */
  public function getAccessibility()
  {
    return $this->accessibility;
  }
  /**
   * @param Google_Service_MyBusinessLodging_Activities
   */
  public function setActivities(Google_Service_MyBusinessLodging_Activities $activities)
  {
    $this->activities = $activities;
  }
  /**
   * @return Google_Service_MyBusinessLodging_Activities
   */
  public function getActivities()
  {
    return $this->activities;
  }
  /**
   * @param Google_Service_MyBusinessLodging_GuestUnitFeatures
   */
  public function setAllUnits(Google_Service_MyBusinessLodging_GuestUnitFeatures $allUnits)
  {
    $this->allUnits = $allUnits;
  }
  /**
   * @return Google_Service_MyBusinessLodging_GuestUnitFeatures
   */
  public function getAllUnits()
  {
    return $this->allUnits;
  }
  /**
   * @param Google_Service_MyBusinessLodging_Business
   */
  public function setBusiness(Google_Service_MyBusinessLodging_Business $business)
  {
    $this->business = $business;
  }
  /**
   * @return Google_Service_MyBusinessLodging_Business
   */
  public function getBusiness()
  {
    return $this->business;
  }
  /**
   * @param Google_Service_MyBusinessLodging_LivingArea
   */
  public function setCommonLivingArea(Google_Service_MyBusinessLodging_LivingArea $commonLivingArea)
  {
    $this->commonLivingArea = $commonLivingArea;
  }
  /**
   * @return Google_Service_MyBusinessLodging_LivingArea
   */
  public function getCommonLivingArea()
  {
    return $this->commonLivingArea;
  }
  /**
   * @param Google_Service_MyBusinessLodging_Connectivity
   */
  public function setConnectivity(Google_Service_MyBusinessLodging_Connectivity $connectivity)
  {
    $this->connectivity = $connectivity;
  }
  /**
   * @return Google_Service_MyBusinessLodging_Connectivity
   */
  public function getConnectivity()
  {
    return $this->connectivity;
  }
  /**
   * @param Google_Service_MyBusinessLodging_Families
   */
  public function setFamilies(Google_Service_MyBusinessLodging_Families $families)
  {
    $this->families = $families;
  }
  /**
   * @return Google_Service_MyBusinessLodging_Families
   */
  public function getFamilies()
  {
    return $this->families;
  }
  /**
   * @param Google_Service_MyBusinessLodging_FoodAndDrink
   */
  public function setFoodAndDrink(Google_Service_MyBusinessLodging_FoodAndDrink $foodAndDrink)
  {
    $this->foodAndDrink = $foodAndDrink;
  }
  /**
   * @return Google_Service_MyBusinessLodging_FoodAndDrink
   */
  public function getFoodAndDrink()
  {
    return $this->foodAndDrink;
  }
  /**
   * @param Google_Service_MyBusinessLodging_GuestUnitType[]
   */
  public function setGuestUnits($guestUnits)
  {
    $this->guestUnits = $guestUnits;
  }
  /**
   * @return Google_Service_MyBusinessLodging_GuestUnitType[]
   */
  public function getGuestUnits()
  {
    return $this->guestUnits;
  }
  /**
   * @param Google_Service_MyBusinessLodging_HealthAndSafety
   */
  public function setHealthAndSafety(Google_Service_MyBusinessLodging_HealthAndSafety $healthAndSafety)
  {
    $this->healthAndSafety = $healthAndSafety;
  }
  /**
   * @return Google_Service_MyBusinessLodging_HealthAndSafety
   */
  public function getHealthAndSafety()
  {
    return $this->healthAndSafety;
  }
  /**
   * @param Google_Service_MyBusinessLodging_Housekeeping
   */
  public function setHousekeeping(Google_Service_MyBusinessLodging_Housekeeping $housekeeping)
  {
    $this->housekeeping = $housekeeping;
  }
  /**
   * @return Google_Service_MyBusinessLodging_Housekeeping
   */
  public function getHousekeeping()
  {
    return $this->housekeeping;
  }
  /**
   * @param Google_Service_MyBusinessLodging_LodgingMetadata
   */
  public function setMetadata(Google_Service_MyBusinessLodging_LodgingMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_MyBusinessLodging_LodgingMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_MyBusinessLodging_Parking
   */
  public function setParking(Google_Service_MyBusinessLodging_Parking $parking)
  {
    $this->parking = $parking;
  }
  /**
   * @return Google_Service_MyBusinessLodging_Parking
   */
  public function getParking()
  {
    return $this->parking;
  }
  /**
   * @param Google_Service_MyBusinessLodging_Pets
   */
  public function setPets(Google_Service_MyBusinessLodging_Pets $pets)
  {
    $this->pets = $pets;
  }
  /**
   * @return Google_Service_MyBusinessLodging_Pets
   */
  public function getPets()
  {
    return $this->pets;
  }
  /**
   * @param Google_Service_MyBusinessLodging_Policies
   */
  public function setPolicies(Google_Service_MyBusinessLodging_Policies $policies)
  {
    $this->policies = $policies;
  }
  /**
   * @return Google_Service_MyBusinessLodging_Policies
   */
  public function getPolicies()
  {
    return $this->policies;
  }
  /**
   * @param Google_Service_MyBusinessLodging_Pools
   */
  public function setPools(Google_Service_MyBusinessLodging_Pools $pools)
  {
    $this->pools = $pools;
  }
  /**
   * @return Google_Service_MyBusinessLodging_Pools
   */
  public function getPools()
  {
    return $this->pools;
  }
  /**
   * @param Google_Service_MyBusinessLodging_Property
   */
  public function setProperty(Google_Service_MyBusinessLodging_Property $property)
  {
    $this->property = $property;
  }
  /**
   * @return Google_Service_MyBusinessLodging_Property
   */
  public function getProperty()
  {
    return $this->property;
  }
  /**
   * @param Google_Service_MyBusinessLodging_Services
   */
  public function setServices(Google_Service_MyBusinessLodging_Services $services)
  {
    $this->services = $services;
  }
  /**
   * @return Google_Service_MyBusinessLodging_Services
   */
  public function getServices()
  {
    return $this->services;
  }
  /**
   * @param Google_Service_MyBusinessLodging_GuestUnitFeatures
   */
  public function setSomeUnits(Google_Service_MyBusinessLodging_GuestUnitFeatures $someUnits)
  {
    $this->someUnits = $someUnits;
  }
  /**
   * @return Google_Service_MyBusinessLodging_GuestUnitFeatures
   */
  public function getSomeUnits()
  {
    return $this->someUnits;
  }
  /**
   * @param Google_Service_MyBusinessLodging_Transportation
   */
  public function setTransportation(Google_Service_MyBusinessLodging_Transportation $transportation)
  {
    $this->transportation = $transportation;
  }
  /**
   * @return Google_Service_MyBusinessLodging_Transportation
   */
  public function getTransportation()
  {
    return $this->transportation;
  }
  /**
   * @param Google_Service_MyBusinessLodging_Wellness
   */
  public function setWellness(Google_Service_MyBusinessLodging_Wellness $wellness)
  {
    $this->wellness = $wellness;
  }
  /**
   * @return Google_Service_MyBusinessLodging_Wellness
   */
  public function getWellness()
  {
    return $this->wellness;
  }
}
