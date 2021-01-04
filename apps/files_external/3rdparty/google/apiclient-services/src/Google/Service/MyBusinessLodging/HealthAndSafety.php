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

class Google_Service_MyBusinessLodging_HealthAndSafety extends Google_Model
{
  protected $enhancedCleaningType = 'Google_Service_MyBusinessLodging_EnhancedCleaning';
  protected $enhancedCleaningDataType = '';
  protected $increasedFoodSafetyType = 'Google_Service_MyBusinessLodging_IncreasedFoodSafety';
  protected $increasedFoodSafetyDataType = '';
  protected $minimizedContactType = 'Google_Service_MyBusinessLodging_MinimizedContact';
  protected $minimizedContactDataType = '';
  protected $personalProtectionType = 'Google_Service_MyBusinessLodging_PersonalProtection';
  protected $personalProtectionDataType = '';
  protected $physicalDistancingType = 'Google_Service_MyBusinessLodging_PhysicalDistancing';
  protected $physicalDistancingDataType = '';

  /**
   * @param Google_Service_MyBusinessLodging_EnhancedCleaning
   */
  public function setEnhancedCleaning(Google_Service_MyBusinessLodging_EnhancedCleaning $enhancedCleaning)
  {
    $this->enhancedCleaning = $enhancedCleaning;
  }
  /**
   * @return Google_Service_MyBusinessLodging_EnhancedCleaning
   */
  public function getEnhancedCleaning()
  {
    return $this->enhancedCleaning;
  }
  /**
   * @param Google_Service_MyBusinessLodging_IncreasedFoodSafety
   */
  public function setIncreasedFoodSafety(Google_Service_MyBusinessLodging_IncreasedFoodSafety $increasedFoodSafety)
  {
    $this->increasedFoodSafety = $increasedFoodSafety;
  }
  /**
   * @return Google_Service_MyBusinessLodging_IncreasedFoodSafety
   */
  public function getIncreasedFoodSafety()
  {
    return $this->increasedFoodSafety;
  }
  /**
   * @param Google_Service_MyBusinessLodging_MinimizedContact
   */
  public function setMinimizedContact(Google_Service_MyBusinessLodging_MinimizedContact $minimizedContact)
  {
    $this->minimizedContact = $minimizedContact;
  }
  /**
   * @return Google_Service_MyBusinessLodging_MinimizedContact
   */
  public function getMinimizedContact()
  {
    return $this->minimizedContact;
  }
  /**
   * @param Google_Service_MyBusinessLodging_PersonalProtection
   */
  public function setPersonalProtection(Google_Service_MyBusinessLodging_PersonalProtection $personalProtection)
  {
    $this->personalProtection = $personalProtection;
  }
  /**
   * @return Google_Service_MyBusinessLodging_PersonalProtection
   */
  public function getPersonalProtection()
  {
    return $this->personalProtection;
  }
  /**
   * @param Google_Service_MyBusinessLodging_PhysicalDistancing
   */
  public function setPhysicalDistancing(Google_Service_MyBusinessLodging_PhysicalDistancing $physicalDistancing)
  {
    $this->physicalDistancing = $physicalDistancing;
  }
  /**
   * @return Google_Service_MyBusinessLodging_PhysicalDistancing
   */
  public function getPhysicalDistancing()
  {
    return $this->physicalDistancing;
  }
}
