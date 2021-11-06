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

class EnhancedCleaning extends \Google\Model
{
  public $commercialGradeDisinfectantCleaning;
  public $commercialGradeDisinfectantCleaningException;
  public $commonAreasEnhancedCleaning;
  public $commonAreasEnhancedCleaningException;
  public $employeesTrainedCleaningProcedures;
  public $employeesTrainedCleaningProceduresException;
  public $employeesTrainedThoroughHandWashing;
  public $employeesTrainedThoroughHandWashingException;
  public $employeesWearProtectiveEquipment;
  public $employeesWearProtectiveEquipmentException;
  public $guestRoomsEnhancedCleaning;
  public $guestRoomsEnhancedCleaningException;

  public function setCommercialGradeDisinfectantCleaning($commercialGradeDisinfectantCleaning)
  {
    $this->commercialGradeDisinfectantCleaning = $commercialGradeDisinfectantCleaning;
  }
  public function getCommercialGradeDisinfectantCleaning()
  {
    return $this->commercialGradeDisinfectantCleaning;
  }
  public function setCommercialGradeDisinfectantCleaningException($commercialGradeDisinfectantCleaningException)
  {
    $this->commercialGradeDisinfectantCleaningException = $commercialGradeDisinfectantCleaningException;
  }
  public function getCommercialGradeDisinfectantCleaningException()
  {
    return $this->commercialGradeDisinfectantCleaningException;
  }
  public function setCommonAreasEnhancedCleaning($commonAreasEnhancedCleaning)
  {
    $this->commonAreasEnhancedCleaning = $commonAreasEnhancedCleaning;
  }
  public function getCommonAreasEnhancedCleaning()
  {
    return $this->commonAreasEnhancedCleaning;
  }
  public function setCommonAreasEnhancedCleaningException($commonAreasEnhancedCleaningException)
  {
    $this->commonAreasEnhancedCleaningException = $commonAreasEnhancedCleaningException;
  }
  public function getCommonAreasEnhancedCleaningException()
  {
    return $this->commonAreasEnhancedCleaningException;
  }
  public function setEmployeesTrainedCleaningProcedures($employeesTrainedCleaningProcedures)
  {
    $this->employeesTrainedCleaningProcedures = $employeesTrainedCleaningProcedures;
  }
  public function getEmployeesTrainedCleaningProcedures()
  {
    return $this->employeesTrainedCleaningProcedures;
  }
  public function setEmployeesTrainedCleaningProceduresException($employeesTrainedCleaningProceduresException)
  {
    $this->employeesTrainedCleaningProceduresException = $employeesTrainedCleaningProceduresException;
  }
  public function getEmployeesTrainedCleaningProceduresException()
  {
    return $this->employeesTrainedCleaningProceduresException;
  }
  public function setEmployeesTrainedThoroughHandWashing($employeesTrainedThoroughHandWashing)
  {
    $this->employeesTrainedThoroughHandWashing = $employeesTrainedThoroughHandWashing;
  }
  public function getEmployeesTrainedThoroughHandWashing()
  {
    return $this->employeesTrainedThoroughHandWashing;
  }
  public function setEmployeesTrainedThoroughHandWashingException($employeesTrainedThoroughHandWashingException)
  {
    $this->employeesTrainedThoroughHandWashingException = $employeesTrainedThoroughHandWashingException;
  }
  public function getEmployeesTrainedThoroughHandWashingException()
  {
    return $this->employeesTrainedThoroughHandWashingException;
  }
  public function setEmployeesWearProtectiveEquipment($employeesWearProtectiveEquipment)
  {
    $this->employeesWearProtectiveEquipment = $employeesWearProtectiveEquipment;
  }
  public function getEmployeesWearProtectiveEquipment()
  {
    return $this->employeesWearProtectiveEquipment;
  }
  public function setEmployeesWearProtectiveEquipmentException($employeesWearProtectiveEquipmentException)
  {
    $this->employeesWearProtectiveEquipmentException = $employeesWearProtectiveEquipmentException;
  }
  public function getEmployeesWearProtectiveEquipmentException()
  {
    return $this->employeesWearProtectiveEquipmentException;
  }
  public function setGuestRoomsEnhancedCleaning($guestRoomsEnhancedCleaning)
  {
    $this->guestRoomsEnhancedCleaning = $guestRoomsEnhancedCleaning;
  }
  public function getGuestRoomsEnhancedCleaning()
  {
    return $this->guestRoomsEnhancedCleaning;
  }
  public function setGuestRoomsEnhancedCleaningException($guestRoomsEnhancedCleaningException)
  {
    $this->guestRoomsEnhancedCleaningException = $guestRoomsEnhancedCleaningException;
  }
  public function getGuestRoomsEnhancedCleaningException()
  {
    return $this->guestRoomsEnhancedCleaningException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnhancedCleaning::class, 'Google_Service_MyBusinessLodging_EnhancedCleaning');
