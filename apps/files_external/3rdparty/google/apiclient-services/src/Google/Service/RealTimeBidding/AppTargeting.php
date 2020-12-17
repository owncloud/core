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

class Google_Service_RealTimeBidding_AppTargeting extends Google_Model
{
  protected $mobileAppCategoryTargetingType = 'Google_Service_RealTimeBidding_NumericTargetingDimension';
  protected $mobileAppCategoryTargetingDataType = '';
  protected $mobileAppTargetingType = 'Google_Service_RealTimeBidding_StringTargetingDimension';
  protected $mobileAppTargetingDataType = '';

  /**
   * @param Google_Service_RealTimeBidding_NumericTargetingDimension
   */
  public function setMobileAppCategoryTargeting(Google_Service_RealTimeBidding_NumericTargetingDimension $mobileAppCategoryTargeting)
  {
    $this->mobileAppCategoryTargeting = $mobileAppCategoryTargeting;
  }
  /**
   * @return Google_Service_RealTimeBidding_NumericTargetingDimension
   */
  public function getMobileAppCategoryTargeting()
  {
    return $this->mobileAppCategoryTargeting;
  }
  /**
   * @param Google_Service_RealTimeBidding_StringTargetingDimension
   */
  public function setMobileAppTargeting(Google_Service_RealTimeBidding_StringTargetingDimension $mobileAppTargeting)
  {
    $this->mobileAppTargeting = $mobileAppTargeting;
  }
  /**
   * @return Google_Service_RealTimeBidding_StringTargetingDimension
   */
  public function getMobileAppTargeting()
  {
    return $this->mobileAppTargeting;
  }
}
