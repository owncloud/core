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

namespace Google\Service\AndroidManagement;

class PersonalUsagePolicies extends \Google\Collection
{
  protected $collection_key = 'personalApplications';
  /**
   * @var string[]
   */
  public $accountTypesWithManagementDisabled;
  /**
   * @var bool
   */
  public $cameraDisabled;
  /**
   * @var int
   */
  public $maxDaysWithWorkOff;
  protected $personalApplicationsType = PersonalApplicationPolicy::class;
  protected $personalApplicationsDataType = 'array';
  /**
   * @var string
   */
  public $personalPlayStoreMode;
  /**
   * @var bool
   */
  public $screenCaptureDisabled;

  /**
   * @param string[]
   */
  public function setAccountTypesWithManagementDisabled($accountTypesWithManagementDisabled)
  {
    $this->accountTypesWithManagementDisabled = $accountTypesWithManagementDisabled;
  }
  /**
   * @return string[]
   */
  public function getAccountTypesWithManagementDisabled()
  {
    return $this->accountTypesWithManagementDisabled;
  }
  /**
   * @param bool
   */
  public function setCameraDisabled($cameraDisabled)
  {
    $this->cameraDisabled = $cameraDisabled;
  }
  /**
   * @return bool
   */
  public function getCameraDisabled()
  {
    return $this->cameraDisabled;
  }
  /**
   * @param int
   */
  public function setMaxDaysWithWorkOff($maxDaysWithWorkOff)
  {
    $this->maxDaysWithWorkOff = $maxDaysWithWorkOff;
  }
  /**
   * @return int
   */
  public function getMaxDaysWithWorkOff()
  {
    return $this->maxDaysWithWorkOff;
  }
  /**
   * @param PersonalApplicationPolicy[]
   */
  public function setPersonalApplications($personalApplications)
  {
    $this->personalApplications = $personalApplications;
  }
  /**
   * @return PersonalApplicationPolicy[]
   */
  public function getPersonalApplications()
  {
    return $this->personalApplications;
  }
  /**
   * @param string
   */
  public function setPersonalPlayStoreMode($personalPlayStoreMode)
  {
    $this->personalPlayStoreMode = $personalPlayStoreMode;
  }
  /**
   * @return string
   */
  public function getPersonalPlayStoreMode()
  {
    return $this->personalPlayStoreMode;
  }
  /**
   * @param bool
   */
  public function setScreenCaptureDisabled($screenCaptureDisabled)
  {
    $this->screenCaptureDisabled = $screenCaptureDisabled;
  }
  /**
   * @return bool
   */
  public function getScreenCaptureDisabled()
  {
    return $this->screenCaptureDisabled;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PersonalUsagePolicies::class, 'Google_Service_AndroidManagement_PersonalUsagePolicies');
