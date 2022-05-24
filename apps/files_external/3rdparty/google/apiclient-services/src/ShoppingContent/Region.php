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

namespace Google\Service\ShoppingContent;

class Region extends \Google\Model
{
  /**
   * @var string
   */
  public $displayName;
  protected $geotargetAreaType = RegionGeoTargetArea::class;
  protected $geotargetAreaDataType = '';
  /**
   * @var string
   */
  public $merchantId;
  protected $postalCodeAreaType = RegionPostalCodeArea::class;
  protected $postalCodeAreaDataType = '';
  /**
   * @var string
   */
  public $regionId;
  /**
   * @var bool
   */
  public $regionalInventoryEligible;
  /**
   * @var bool
   */
  public $shippingEligible;

  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param RegionGeoTargetArea
   */
  public function setGeotargetArea(RegionGeoTargetArea $geotargetArea)
  {
    $this->geotargetArea = $geotargetArea;
  }
  /**
   * @return RegionGeoTargetArea
   */
  public function getGeotargetArea()
  {
    return $this->geotargetArea;
  }
  /**
   * @param string
   */
  public function setMerchantId($merchantId)
  {
    $this->merchantId = $merchantId;
  }
  /**
   * @return string
   */
  public function getMerchantId()
  {
    return $this->merchantId;
  }
  /**
   * @param RegionPostalCodeArea
   */
  public function setPostalCodeArea(RegionPostalCodeArea $postalCodeArea)
  {
    $this->postalCodeArea = $postalCodeArea;
  }
  /**
   * @return RegionPostalCodeArea
   */
  public function getPostalCodeArea()
  {
    return $this->postalCodeArea;
  }
  /**
   * @param string
   */
  public function setRegionId($regionId)
  {
    $this->regionId = $regionId;
  }
  /**
   * @return string
   */
  public function getRegionId()
  {
    return $this->regionId;
  }
  /**
   * @param bool
   */
  public function setRegionalInventoryEligible($regionalInventoryEligible)
  {
    $this->regionalInventoryEligible = $regionalInventoryEligible;
  }
  /**
   * @return bool
   */
  public function getRegionalInventoryEligible()
  {
    return $this->regionalInventoryEligible;
  }
  /**
   * @param bool
   */
  public function setShippingEligible($shippingEligible)
  {
    $this->shippingEligible = $shippingEligible;
  }
  /**
   * @return bool
   */
  public function getShippingEligible()
  {
    return $this->shippingEligible;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Region::class, 'Google_Service_ShoppingContent_Region');
