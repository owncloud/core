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

class Google_Service_ShoppingContent_Region extends Google_Model
{
  public $displayName;
  protected $geotargetAreaType = 'Google_Service_ShoppingContent_RegionGeoTargetArea';
  protected $geotargetAreaDataType = '';
  public $merchantId;
  protected $postalCodeAreaType = 'Google_Service_ShoppingContent_RegionPostalCodeArea';
  protected $postalCodeAreaDataType = '';
  public $regionId;
  public $regionalInventoryEligible;
  public $shippingEligible;

  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Google_Service_ShoppingContent_RegionGeoTargetArea
   */
  public function setGeotargetArea(Google_Service_ShoppingContent_RegionGeoTargetArea $geotargetArea)
  {
    $this->geotargetArea = $geotargetArea;
  }
  /**
   * @return Google_Service_ShoppingContent_RegionGeoTargetArea
   */
  public function getGeotargetArea()
  {
    return $this->geotargetArea;
  }
  public function setMerchantId($merchantId)
  {
    $this->merchantId = $merchantId;
  }
  public function getMerchantId()
  {
    return $this->merchantId;
  }
  /**
   * @param Google_Service_ShoppingContent_RegionPostalCodeArea
   */
  public function setPostalCodeArea(Google_Service_ShoppingContent_RegionPostalCodeArea $postalCodeArea)
  {
    $this->postalCodeArea = $postalCodeArea;
  }
  /**
   * @return Google_Service_ShoppingContent_RegionPostalCodeArea
   */
  public function getPostalCodeArea()
  {
    return $this->postalCodeArea;
  }
  public function setRegionId($regionId)
  {
    $this->regionId = $regionId;
  }
  public function getRegionId()
  {
    return $this->regionId;
  }
  public function setRegionalInventoryEligible($regionalInventoryEligible)
  {
    $this->regionalInventoryEligible = $regionalInventoryEligible;
  }
  public function getRegionalInventoryEligible()
  {
    return $this->regionalInventoryEligible;
  }
  public function setShippingEligible($shippingEligible)
  {
    $this->shippingEligible = $shippingEligible;
  }
  public function getShippingEligible()
  {
    return $this->shippingEligible;
  }
}
