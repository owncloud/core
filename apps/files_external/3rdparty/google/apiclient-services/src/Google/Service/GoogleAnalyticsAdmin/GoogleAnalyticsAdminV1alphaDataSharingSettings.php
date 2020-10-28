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

class Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaDataSharingSettings extends Google_Model
{
  public $name;
  public $sharingWithGoogleAnySalesEnabled;
  public $sharingWithGoogleAssignedSalesEnabled;
  public $sharingWithGoogleProductsEnabled;
  public $sharingWithGoogleSupportEnabled;
  public $sharingWithOthersEnabled;

  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSharingWithGoogleAnySalesEnabled($sharingWithGoogleAnySalesEnabled)
  {
    $this->sharingWithGoogleAnySalesEnabled = $sharingWithGoogleAnySalesEnabled;
  }
  public function getSharingWithGoogleAnySalesEnabled()
  {
    return $this->sharingWithGoogleAnySalesEnabled;
  }
  public function setSharingWithGoogleAssignedSalesEnabled($sharingWithGoogleAssignedSalesEnabled)
  {
    $this->sharingWithGoogleAssignedSalesEnabled = $sharingWithGoogleAssignedSalesEnabled;
  }
  public function getSharingWithGoogleAssignedSalesEnabled()
  {
    return $this->sharingWithGoogleAssignedSalesEnabled;
  }
  public function setSharingWithGoogleProductsEnabled($sharingWithGoogleProductsEnabled)
  {
    $this->sharingWithGoogleProductsEnabled = $sharingWithGoogleProductsEnabled;
  }
  public function getSharingWithGoogleProductsEnabled()
  {
    return $this->sharingWithGoogleProductsEnabled;
  }
  public function setSharingWithGoogleSupportEnabled($sharingWithGoogleSupportEnabled)
  {
    $this->sharingWithGoogleSupportEnabled = $sharingWithGoogleSupportEnabled;
  }
  public function getSharingWithGoogleSupportEnabled()
  {
    return $this->sharingWithGoogleSupportEnabled;
  }
  public function setSharingWithOthersEnabled($sharingWithOthersEnabled)
  {
    $this->sharingWithOthersEnabled = $sharingWithOthersEnabled;
  }
  public function getSharingWithOthersEnabled()
  {
    return $this->sharingWithOthersEnabled;
  }
}
