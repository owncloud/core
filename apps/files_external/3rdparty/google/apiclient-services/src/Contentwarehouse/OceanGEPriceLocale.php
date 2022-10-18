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

namespace Google\Service\Contentwarehouse;

class OceanGEPriceLocale extends \Google\Model
{
  /**
   * @var string
   */
  public $locale;
  protected $offerPriceType = OceanGEMoney::class;
  protected $offerPriceDataType = '';
  /**
   * @var string
   */
  public $onSaleTimeSecs;

  /**
   * @param string
   */
  public function setLocale($locale)
  {
    $this->locale = $locale;
  }
  /**
   * @return string
   */
  public function getLocale()
  {
    return $this->locale;
  }
  /**
   * @param OceanGEMoney
   */
  public function setOfferPrice(OceanGEMoney $offerPrice)
  {
    $this->offerPrice = $offerPrice;
  }
  /**
   * @return OceanGEMoney
   */
  public function getOfferPrice()
  {
    return $this->offerPrice;
  }
  /**
   * @param string
   */
  public function setOnSaleTimeSecs($onSaleTimeSecs)
  {
    $this->onSaleTimeSecs = $onSaleTimeSecs;
  }
  /**
   * @return string
   */
  public function getOnSaleTimeSecs()
  {
    return $this->onSaleTimeSecs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OceanGEPriceLocale::class, 'Google_Service_Contentwarehouse_OceanGEPriceLocale');
