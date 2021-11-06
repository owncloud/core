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

class InAppProduct extends \Google\Model
{
  public $defaultLanguage;
  protected $defaultPriceType = Price::class;
  protected $defaultPriceDataType = '';
  public $gracePeriod;
  protected $listingsType = InAppProductListing::class;
  protected $listingsDataType = 'map';
  public $packageName;
  protected $pricesType = Price::class;
  protected $pricesDataType = 'map';
  public $purchaseType;
  public $sku;
  public $status;
  public $subscriptionPeriod;
  public $trialPeriod;

  public function setDefaultLanguage($defaultLanguage)
  {
    $this->defaultLanguage = $defaultLanguage;
  }
  public function getDefaultLanguage()
  {
    return $this->defaultLanguage;
  }
  /**
   * @param Price
   */
  public function setDefaultPrice(Price $defaultPrice)
  {
    $this->defaultPrice = $defaultPrice;
  }
  /**
   * @return Price
   */
  public function getDefaultPrice()
  {
    return $this->defaultPrice;
  }
  public function setGracePeriod($gracePeriod)
  {
    $this->gracePeriod = $gracePeriod;
  }
  public function getGracePeriod()
  {
    return $this->gracePeriod;
  }
  /**
   * @param InAppProductListing[]
   */
  public function setListings($listings)
  {
    $this->listings = $listings;
  }
  /**
   * @return InAppProductListing[]
   */
  public function getListings()
  {
    return $this->listings;
  }
  public function setPackageName($packageName)
  {
    $this->packageName = $packageName;
  }
  public function getPackageName()
  {
    return $this->packageName;
  }
  /**
   * @param Price[]
   */
  public function setPrices($prices)
  {
    $this->prices = $prices;
  }
  /**
   * @return Price[]
   */
  public function getPrices()
  {
    return $this->prices;
  }
  public function setPurchaseType($purchaseType)
  {
    $this->purchaseType = $purchaseType;
  }
  public function getPurchaseType()
  {
    return $this->purchaseType;
  }
  public function setSku($sku)
  {
    $this->sku = $sku;
  }
  public function getSku()
  {
    return $this->sku;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setSubscriptionPeriod($subscriptionPeriod)
  {
    $this->subscriptionPeriod = $subscriptionPeriod;
  }
  public function getSubscriptionPeriod()
  {
    return $this->subscriptionPeriod;
  }
  public function setTrialPeriod($trialPeriod)
  {
    $this->trialPeriod = $trialPeriod;
  }
  public function getTrialPeriod()
  {
    return $this->trialPeriod;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InAppProduct::class, 'Google_Service_AndroidPublisher_InAppProduct');
