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

class HealthAndSafety extends \Google\Model
{
  protected $enhancedCleaningType = EnhancedCleaning::class;
  protected $enhancedCleaningDataType = '';
  protected $increasedFoodSafetyType = IncreasedFoodSafety::class;
  protected $increasedFoodSafetyDataType = '';
  protected $minimizedContactType = MinimizedContact::class;
  protected $minimizedContactDataType = '';
  protected $personalProtectionType = PersonalProtection::class;
  protected $personalProtectionDataType = '';
  protected $physicalDistancingType = PhysicalDistancing::class;
  protected $physicalDistancingDataType = '';

  /**
   * @param EnhancedCleaning
   */
  public function setEnhancedCleaning(EnhancedCleaning $enhancedCleaning)
  {
    $this->enhancedCleaning = $enhancedCleaning;
  }
  /**
   * @return EnhancedCleaning
   */
  public function getEnhancedCleaning()
  {
    return $this->enhancedCleaning;
  }
  /**
   * @param IncreasedFoodSafety
   */
  public function setIncreasedFoodSafety(IncreasedFoodSafety $increasedFoodSafety)
  {
    $this->increasedFoodSafety = $increasedFoodSafety;
  }
  /**
   * @return IncreasedFoodSafety
   */
  public function getIncreasedFoodSafety()
  {
    return $this->increasedFoodSafety;
  }
  /**
   * @param MinimizedContact
   */
  public function setMinimizedContact(MinimizedContact $minimizedContact)
  {
    $this->minimizedContact = $minimizedContact;
  }
  /**
   * @return MinimizedContact
   */
  public function getMinimizedContact()
  {
    return $this->minimizedContact;
  }
  /**
   * @param PersonalProtection
   */
  public function setPersonalProtection(PersonalProtection $personalProtection)
  {
    $this->personalProtection = $personalProtection;
  }
  /**
   * @return PersonalProtection
   */
  public function getPersonalProtection()
  {
    return $this->personalProtection;
  }
  /**
   * @param PhysicalDistancing
   */
  public function setPhysicalDistancing(PhysicalDistancing $physicalDistancing)
  {
    $this->physicalDistancing = $physicalDistancing;
  }
  /**
   * @return PhysicalDistancing
   */
  public function getPhysicalDistancing()
  {
    return $this->physicalDistancing;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HealthAndSafety::class, 'Google_Service_MyBusinessLodging_HealthAndSafety');
