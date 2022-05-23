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

class DeliveryArea extends \Google\Model
{
  /**
   * @var string
   */
  public $countryCode;
  protected $postalCodeRangeType = DeliveryAreaPostalCodeRange::class;
  protected $postalCodeRangeDataType = '';
  /**
   * @var string
   */
  public $regionCode;

  /**
   * @param string
   */
  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  /**
   * @return string
   */
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  /**
   * @param DeliveryAreaPostalCodeRange
   */
  public function setPostalCodeRange(DeliveryAreaPostalCodeRange $postalCodeRange)
  {
    $this->postalCodeRange = $postalCodeRange;
  }
  /**
   * @return DeliveryAreaPostalCodeRange
   */
  public function getPostalCodeRange()
  {
    return $this->postalCodeRange;
  }
  /**
   * @param string
   */
  public function setRegionCode($regionCode)
  {
    $this->regionCode = $regionCode;
  }
  /**
   * @return string
   */
  public function getRegionCode()
  {
    return $this->regionCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeliveryArea::class, 'Google_Service_ShoppingContent_DeliveryArea');
