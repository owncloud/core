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

class Google_Service_AdExchangeBuyerII_TechnologyTargeting extends Google_Model
{
  protected $deviceCapabilityTargetingType = 'Google_Service_AdExchangeBuyerII_CriteriaTargeting';
  protected $deviceCapabilityTargetingDataType = '';
  protected $deviceCategoryTargetingType = 'Google_Service_AdExchangeBuyerII_CriteriaTargeting';
  protected $deviceCategoryTargetingDataType = '';
  protected $operatingSystemTargetingType = 'Google_Service_AdExchangeBuyerII_OperatingSystemTargeting';
  protected $operatingSystemTargetingDataType = '';

  /**
   * @param Google_Service_AdExchangeBuyerII_CriteriaTargeting
   */
  public function setDeviceCapabilityTargeting(Google_Service_AdExchangeBuyerII_CriteriaTargeting $deviceCapabilityTargeting)
  {
    $this->deviceCapabilityTargeting = $deviceCapabilityTargeting;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_CriteriaTargeting
   */
  public function getDeviceCapabilityTargeting()
  {
    return $this->deviceCapabilityTargeting;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_CriteriaTargeting
   */
  public function setDeviceCategoryTargeting(Google_Service_AdExchangeBuyerII_CriteriaTargeting $deviceCategoryTargeting)
  {
    $this->deviceCategoryTargeting = $deviceCategoryTargeting;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_CriteriaTargeting
   */
  public function getDeviceCategoryTargeting()
  {
    return $this->deviceCategoryTargeting;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_OperatingSystemTargeting
   */
  public function setOperatingSystemTargeting(Google_Service_AdExchangeBuyerII_OperatingSystemTargeting $operatingSystemTargeting)
  {
    $this->operatingSystemTargeting = $operatingSystemTargeting;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_OperatingSystemTargeting
   */
  public function getOperatingSystemTargeting()
  {
    return $this->operatingSystemTargeting;
  }
}
