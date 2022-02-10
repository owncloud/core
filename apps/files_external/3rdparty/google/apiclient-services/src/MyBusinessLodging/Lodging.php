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

class Lodging extends \Google\Collection
{
  protected $collection_key = 'guestUnits';
  protected $accessibilityType = Accessibility::class;
  protected $accessibilityDataType = '';
  protected $activitiesType = Activities::class;
  protected $activitiesDataType = '';
  protected $allUnitsType = GuestUnitFeatures::class;
  protected $allUnitsDataType = '';
  protected $businessType = Business::class;
  protected $businessDataType = '';
  protected $commonLivingAreaType = LivingArea::class;
  protected $commonLivingAreaDataType = '';
  protected $connectivityType = Connectivity::class;
  protected $connectivityDataType = '';
  protected $familiesType = Families::class;
  protected $familiesDataType = '';
  protected $foodAndDrinkType = FoodAndDrink::class;
  protected $foodAndDrinkDataType = '';
  protected $guestUnitsType = GuestUnitType::class;
  protected $guestUnitsDataType = 'array';
  protected $healthAndSafetyType = HealthAndSafety::class;
  protected $healthAndSafetyDataType = '';
  protected $housekeepingType = Housekeeping::class;
  protected $housekeepingDataType = '';
  protected $metadataType = LodgingMetadata::class;
  protected $metadataDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $parkingType = Parking::class;
  protected $parkingDataType = '';
  protected $petsType = Pets::class;
  protected $petsDataType = '';
  protected $policiesType = Policies::class;
  protected $policiesDataType = '';
  protected $poolsType = Pools::class;
  protected $poolsDataType = '';
  protected $propertyType = Property::class;
  protected $propertyDataType = '';
  protected $servicesType = Services::class;
  protected $servicesDataType = '';
  protected $someUnitsType = GuestUnitFeatures::class;
  protected $someUnitsDataType = '';
  protected $sustainabilityType = Sustainability::class;
  protected $sustainabilityDataType = '';
  protected $transportationType = Transportation::class;
  protected $transportationDataType = '';
  protected $wellnessType = Wellness::class;
  protected $wellnessDataType = '';

  /**
   * @param Accessibility
   */
  public function setAccessibility(Accessibility $accessibility)
  {
    $this->accessibility = $accessibility;
  }
  /**
   * @return Accessibility
   */
  public function getAccessibility()
  {
    return $this->accessibility;
  }
  /**
   * @param Activities
   */
  public function setActivities(Activities $activities)
  {
    $this->activities = $activities;
  }
  /**
   * @return Activities
   */
  public function getActivities()
  {
    return $this->activities;
  }
  /**
   * @param GuestUnitFeatures
   */
  public function setAllUnits(GuestUnitFeatures $allUnits)
  {
    $this->allUnits = $allUnits;
  }
  /**
   * @return GuestUnitFeatures
   */
  public function getAllUnits()
  {
    return $this->allUnits;
  }
  /**
   * @param Business
   */
  public function setBusiness(Business $business)
  {
    $this->business = $business;
  }
  /**
   * @return Business
   */
  public function getBusiness()
  {
    return $this->business;
  }
  /**
   * @param LivingArea
   */
  public function setCommonLivingArea(LivingArea $commonLivingArea)
  {
    $this->commonLivingArea = $commonLivingArea;
  }
  /**
   * @return LivingArea
   */
  public function getCommonLivingArea()
  {
    return $this->commonLivingArea;
  }
  /**
   * @param Connectivity
   */
  public function setConnectivity(Connectivity $connectivity)
  {
    $this->connectivity = $connectivity;
  }
  /**
   * @return Connectivity
   */
  public function getConnectivity()
  {
    return $this->connectivity;
  }
  /**
   * @param Families
   */
  public function setFamilies(Families $families)
  {
    $this->families = $families;
  }
  /**
   * @return Families
   */
  public function getFamilies()
  {
    return $this->families;
  }
  /**
   * @param FoodAndDrink
   */
  public function setFoodAndDrink(FoodAndDrink $foodAndDrink)
  {
    $this->foodAndDrink = $foodAndDrink;
  }
  /**
   * @return FoodAndDrink
   */
  public function getFoodAndDrink()
  {
    return $this->foodAndDrink;
  }
  /**
   * @param GuestUnitType[]
   */
  public function setGuestUnits($guestUnits)
  {
    $this->guestUnits = $guestUnits;
  }
  /**
   * @return GuestUnitType[]
   */
  public function getGuestUnits()
  {
    return $this->guestUnits;
  }
  /**
   * @param HealthAndSafety
   */
  public function setHealthAndSafety(HealthAndSafety $healthAndSafety)
  {
    $this->healthAndSafety = $healthAndSafety;
  }
  /**
   * @return HealthAndSafety
   */
  public function getHealthAndSafety()
  {
    return $this->healthAndSafety;
  }
  /**
   * @param Housekeeping
   */
  public function setHousekeeping(Housekeeping $housekeeping)
  {
    $this->housekeeping = $housekeeping;
  }
  /**
   * @return Housekeeping
   */
  public function getHousekeeping()
  {
    return $this->housekeeping;
  }
  /**
   * @param LodgingMetadata
   */
  public function setMetadata(LodgingMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return LodgingMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Parking
   */
  public function setParking(Parking $parking)
  {
    $this->parking = $parking;
  }
  /**
   * @return Parking
   */
  public function getParking()
  {
    return $this->parking;
  }
  /**
   * @param Pets
   */
  public function setPets(Pets $pets)
  {
    $this->pets = $pets;
  }
  /**
   * @return Pets
   */
  public function getPets()
  {
    return $this->pets;
  }
  /**
   * @param Policies
   */
  public function setPolicies(Policies $policies)
  {
    $this->policies = $policies;
  }
  /**
   * @return Policies
   */
  public function getPolicies()
  {
    return $this->policies;
  }
  /**
   * @param Pools
   */
  public function setPools(Pools $pools)
  {
    $this->pools = $pools;
  }
  /**
   * @return Pools
   */
  public function getPools()
  {
    return $this->pools;
  }
  /**
   * @param Property
   */
  public function setProperty(Property $property)
  {
    $this->property = $property;
  }
  /**
   * @return Property
   */
  public function getProperty()
  {
    return $this->property;
  }
  /**
   * @param Services
   */
  public function setServices(Services $services)
  {
    $this->services = $services;
  }
  /**
   * @return Services
   */
  public function getServices()
  {
    return $this->services;
  }
  /**
   * @param GuestUnitFeatures
   */
  public function setSomeUnits(GuestUnitFeatures $someUnits)
  {
    $this->someUnits = $someUnits;
  }
  /**
   * @return GuestUnitFeatures
   */
  public function getSomeUnits()
  {
    return $this->someUnits;
  }
  /**
   * @param Sustainability
   */
  public function setSustainability(Sustainability $sustainability)
  {
    $this->sustainability = $sustainability;
  }
  /**
   * @return Sustainability
   */
  public function getSustainability()
  {
    return $this->sustainability;
  }
  /**
   * @param Transportation
   */
  public function setTransportation(Transportation $transportation)
  {
    $this->transportation = $transportation;
  }
  /**
   * @return Transportation
   */
  public function getTransportation()
  {
    return $this->transportation;
  }
  /**
   * @param Wellness
   */
  public function setWellness(Wellness $wellness)
  {
    $this->wellness = $wellness;
  }
  /**
   * @return Wellness
   */
  public function getWellness()
  {
    return $this->wellness;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Lodging::class, 'Google_Service_MyBusinessLodging_Lodging');
