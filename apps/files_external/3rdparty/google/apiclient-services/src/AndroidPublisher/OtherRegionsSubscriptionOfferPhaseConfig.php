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

namespace Google\Service\AndroidPublisher;

class OtherRegionsSubscriptionOfferPhaseConfig extends \Google\Model
{
  protected $absoluteDiscountsType = OtherRegionsSubscriptionOfferPhasePrices::class;
  protected $absoluteDiscountsDataType = '';
  protected $otherRegionsPricesType = OtherRegionsSubscriptionOfferPhasePrices::class;
  protected $otherRegionsPricesDataType = '';
  public $relativeDiscount;

  /**
   * @param OtherRegionsSubscriptionOfferPhasePrices
   */
  public function setAbsoluteDiscounts(OtherRegionsSubscriptionOfferPhasePrices $absoluteDiscounts)
  {
    $this->absoluteDiscounts = $absoluteDiscounts;
  }
  /**
   * @return OtherRegionsSubscriptionOfferPhasePrices
   */
  public function getAbsoluteDiscounts()
  {
    return $this->absoluteDiscounts;
  }
  /**
   * @param OtherRegionsSubscriptionOfferPhasePrices
   */
  public function setOtherRegionsPrices(OtherRegionsSubscriptionOfferPhasePrices $otherRegionsPrices)
  {
    $this->otherRegionsPrices = $otherRegionsPrices;
  }
  /**
   * @return OtherRegionsSubscriptionOfferPhasePrices
   */
  public function getOtherRegionsPrices()
  {
    return $this->otherRegionsPrices;
  }
  public function setRelativeDiscount($relativeDiscount)
  {
    $this->relativeDiscount = $relativeDiscount;
  }
  public function getRelativeDiscount()
  {
    return $this->relativeDiscount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OtherRegionsSubscriptionOfferPhaseConfig::class, 'Google_Service_AndroidPublisher_OtherRegionsSubscriptionOfferPhaseConfig');
