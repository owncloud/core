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
  /**
   * @var string
   */
  public $defaultLanguage;
  protected $defaultPriceType = Price::class;
  protected $defaultPriceDataType = '';
  /**
   * @var string
   */
  public $gracePeriod;
  protected $listingsType = InAppProductListing::class;
  protected $listingsDataType = 'map';
  protected $managedProductTaxesAndComplianceSettingsType = ManagedProductTaxAndComplianceSettings::class;
  protected $managedProductTaxesAndComplianceSettingsDataType = '';
  /**
   * @var string
   */
  public $packageName;
  protected $pricesType = Price::class;
  protected $pricesDataType = 'map';
  /**
   * @var string
   */
  public $purchaseType;
  /**
   * @var string
   */
  public $sku;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $subscriptionPeriod;
  protected $subscriptionTaxesAndComplianceSettingsType = SubscriptionTaxAndComplianceSettings::class;
  protected $subscriptionTaxesAndComplianceSettingsDataType = '';
  /**
   * @var string
   */
  public $trialPeriod;

  /**
   * @param string
   */
  public function setDefaultLanguage($defaultLanguage)
  {
    $this->defaultLanguage = $defaultLanguage;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setGracePeriod($gracePeriod)
  {
    $this->gracePeriod = $gracePeriod;
  }
  /**
   * @return string
   */
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
  /**
   * @param ManagedProductTaxAndComplianceSettings
   */
  public function setManagedProductTaxesAndComplianceSettings(ManagedProductTaxAndComplianceSettings $managedProductTaxesAndComplianceSettings)
  {
    $this->managedProductTaxesAndComplianceSettings = $managedProductTaxesAndComplianceSettings;
  }
  /**
   * @return ManagedProductTaxAndComplianceSettings
   */
  public function getManagedProductTaxesAndComplianceSettings()
  {
    return $this->managedProductTaxesAndComplianceSettings;
  }
  /**
   * @param string
   */
  public function setPackageName($packageName)
  {
    $this->packageName = $packageName;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setPurchaseType($purchaseType)
  {
    $this->purchaseType = $purchaseType;
  }
  /**
   * @return string
   */
  public function getPurchaseType()
  {
    return $this->purchaseType;
  }
  /**
   * @param string
   */
  public function setSku($sku)
  {
    $this->sku = $sku;
  }
  /**
   * @return string
   */
  public function getSku()
  {
    return $this->sku;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setSubscriptionPeriod($subscriptionPeriod)
  {
    $this->subscriptionPeriod = $subscriptionPeriod;
  }
  /**
   * @return string
   */
  public function getSubscriptionPeriod()
  {
    return $this->subscriptionPeriod;
  }
  /**
   * @param SubscriptionTaxAndComplianceSettings
   */
  public function setSubscriptionTaxesAndComplianceSettings(SubscriptionTaxAndComplianceSettings $subscriptionTaxesAndComplianceSettings)
  {
    $this->subscriptionTaxesAndComplianceSettings = $subscriptionTaxesAndComplianceSettings;
  }
  /**
   * @return SubscriptionTaxAndComplianceSettings
   */
  public function getSubscriptionTaxesAndComplianceSettings()
  {
    return $this->subscriptionTaxesAndComplianceSettings;
  }
  /**
   * @param string
   */
  public function setTrialPeriod($trialPeriod)
  {
    $this->trialPeriod = $trialPeriod;
  }
  /**
   * @return string
   */
  public function getTrialPeriod()
  {
    return $this->trialPeriod;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InAppProduct::class, 'Google_Service_AndroidPublisher_InAppProduct');
