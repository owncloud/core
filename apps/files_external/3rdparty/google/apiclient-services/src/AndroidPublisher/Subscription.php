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

class Subscription extends \Google\Collection
{
  protected $collection_key = 'listings';
  /**
   * @var bool
   */
  public $archived;
  protected $basePlansType = BasePlan::class;
  protected $basePlansDataType = 'array';
  protected $listingsType = SubscriptionListing::class;
  protected $listingsDataType = 'array';
  /**
   * @var string
   */
  public $packageName;
  /**
   * @var string
   */
  public $productId;
  protected $taxAndComplianceSettingsType = SubscriptionTaxAndComplianceSettings::class;
  protected $taxAndComplianceSettingsDataType = '';

  /**
   * @param bool
   */
  public function setArchived($archived)
  {
    $this->archived = $archived;
  }
  /**
   * @return bool
   */
  public function getArchived()
  {
    return $this->archived;
  }
  /**
   * @param BasePlan[]
   */
  public function setBasePlans($basePlans)
  {
    $this->basePlans = $basePlans;
  }
  /**
   * @return BasePlan[]
   */
  public function getBasePlans()
  {
    return $this->basePlans;
  }
  /**
   * @param SubscriptionListing[]
   */
  public function setListings($listings)
  {
    $this->listings = $listings;
  }
  /**
   * @return SubscriptionListing[]
   */
  public function getListings()
  {
    return $this->listings;
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
   * @param string
   */
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  /**
   * @return string
   */
  public function getProductId()
  {
    return $this->productId;
  }
  /**
   * @param SubscriptionTaxAndComplianceSettings
   */
  public function setTaxAndComplianceSettings(SubscriptionTaxAndComplianceSettings $taxAndComplianceSettings)
  {
    $this->taxAndComplianceSettings = $taxAndComplianceSettings;
  }
  /**
   * @return SubscriptionTaxAndComplianceSettings
   */
  public function getTaxAndComplianceSettings()
  {
    return $this->taxAndComplianceSettings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Subscription::class, 'Google_Service_AndroidPublisher_Subscription');
