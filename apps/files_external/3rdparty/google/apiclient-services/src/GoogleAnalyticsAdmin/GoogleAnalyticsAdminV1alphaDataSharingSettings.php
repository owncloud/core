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

namespace Google\Service\GoogleAnalyticsAdmin;

class GoogleAnalyticsAdminV1alphaDataSharingSettings extends \Google\Model
{
  /**
   * @var string
   */
  public $name;
  /**
   * @var bool
   */
  public $sharingWithGoogleAnySalesEnabled;
  /**
   * @var bool
   */
  public $sharingWithGoogleAssignedSalesEnabled;
  /**
   * @var bool
   */
  public $sharingWithGoogleProductsEnabled;
  /**
   * @var bool
   */
  public $sharingWithGoogleSupportEnabled;
  /**
   * @var bool
   */
  public $sharingWithOthersEnabled;

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
   * @param bool
   */
  public function setSharingWithGoogleAnySalesEnabled($sharingWithGoogleAnySalesEnabled)
  {
    $this->sharingWithGoogleAnySalesEnabled = $sharingWithGoogleAnySalesEnabled;
  }
  /**
   * @return bool
   */
  public function getSharingWithGoogleAnySalesEnabled()
  {
    return $this->sharingWithGoogleAnySalesEnabled;
  }
  /**
   * @param bool
   */
  public function setSharingWithGoogleAssignedSalesEnabled($sharingWithGoogleAssignedSalesEnabled)
  {
    $this->sharingWithGoogleAssignedSalesEnabled = $sharingWithGoogleAssignedSalesEnabled;
  }
  /**
   * @return bool
   */
  public function getSharingWithGoogleAssignedSalesEnabled()
  {
    return $this->sharingWithGoogleAssignedSalesEnabled;
  }
  /**
   * @param bool
   */
  public function setSharingWithGoogleProductsEnabled($sharingWithGoogleProductsEnabled)
  {
    $this->sharingWithGoogleProductsEnabled = $sharingWithGoogleProductsEnabled;
  }
  /**
   * @return bool
   */
  public function getSharingWithGoogleProductsEnabled()
  {
    return $this->sharingWithGoogleProductsEnabled;
  }
  /**
   * @param bool
   */
  public function setSharingWithGoogleSupportEnabled($sharingWithGoogleSupportEnabled)
  {
    $this->sharingWithGoogleSupportEnabled = $sharingWithGoogleSupportEnabled;
  }
  /**
   * @return bool
   */
  public function getSharingWithGoogleSupportEnabled()
  {
    return $this->sharingWithGoogleSupportEnabled;
  }
  /**
   * @param bool
   */
  public function setSharingWithOthersEnabled($sharingWithOthersEnabled)
  {
    $this->sharingWithOthersEnabled = $sharingWithOthersEnabled;
  }
  /**
   * @return bool
   */
  public function getSharingWithOthersEnabled()
  {
    return $this->sharingWithOthersEnabled;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaDataSharingSettings::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaDataSharingSettings');
