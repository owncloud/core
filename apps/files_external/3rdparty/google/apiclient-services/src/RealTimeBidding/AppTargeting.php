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

namespace Google\Service\RealTimeBidding;

class AppTargeting extends \Google\Model
{
  protected $mobileAppCategoryTargetingType = NumericTargetingDimension::class;
  protected $mobileAppCategoryTargetingDataType = '';
  protected $mobileAppTargetingType = StringTargetingDimension::class;
  protected $mobileAppTargetingDataType = '';

  /**
   * @param NumericTargetingDimension
   */
  public function setMobileAppCategoryTargeting(NumericTargetingDimension $mobileAppCategoryTargeting)
  {
    $this->mobileAppCategoryTargeting = $mobileAppCategoryTargeting;
  }
  /**
   * @return NumericTargetingDimension
   */
  public function getMobileAppCategoryTargeting()
  {
    return $this->mobileAppCategoryTargeting;
  }
  /**
   * @param StringTargetingDimension
   */
  public function setMobileAppTargeting(StringTargetingDimension $mobileAppTargeting)
  {
    $this->mobileAppTargeting = $mobileAppTargeting;
  }
  /**
   * @return StringTargetingDimension
   */
  public function getMobileAppTargeting()
  {
    return $this->mobileAppTargeting;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppTargeting::class, 'Google_Service_RealTimeBidding_AppTargeting');
