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

class SubscriptionOffer extends \Google\Collection
{
  protected $collection_key = 'regionalConfigs';
  /**
   * @var string
   */
  public $basePlanId;
  /**
   * @var string
   */
  public $offerId;
  protected $offerTagsType = OfferTag::class;
  protected $offerTagsDataType = 'array';
  protected $otherRegionsConfigType = OtherRegionsSubscriptionOfferConfig::class;
  protected $otherRegionsConfigDataType = '';
  /**
   * @var string
   */
  public $packageName;
  protected $phasesType = SubscriptionOfferPhase::class;
  protected $phasesDataType = 'array';
  /**
   * @var string
   */
  public $productId;
  protected $regionalConfigsType = RegionalSubscriptionOfferConfig::class;
  protected $regionalConfigsDataType = 'array';
  /**
   * @var string
   */
  public $state;
  protected $targetingType = SubscriptionOfferTargeting::class;
  protected $targetingDataType = '';

  /**
   * @param string
   */
  public function setBasePlanId($basePlanId)
  {
    $this->basePlanId = $basePlanId;
  }
  /**
   * @return string
   */
  public function getBasePlanId()
  {
    return $this->basePlanId;
  }
  /**
   * @param string
   */
  public function setOfferId($offerId)
  {
    $this->offerId = $offerId;
  }
  /**
   * @return string
   */
  public function getOfferId()
  {
    return $this->offerId;
  }
  /**
   * @param OfferTag[]
   */
  public function setOfferTags($offerTags)
  {
    $this->offerTags = $offerTags;
  }
  /**
   * @return OfferTag[]
   */
  public function getOfferTags()
  {
    return $this->offerTags;
  }
  /**
   * @param OtherRegionsSubscriptionOfferConfig
   */
  public function setOtherRegionsConfig(OtherRegionsSubscriptionOfferConfig $otherRegionsConfig)
  {
    $this->otherRegionsConfig = $otherRegionsConfig;
  }
  /**
   * @return OtherRegionsSubscriptionOfferConfig
   */
  public function getOtherRegionsConfig()
  {
    return $this->otherRegionsConfig;
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
   * @param SubscriptionOfferPhase[]
   */
  public function setPhases($phases)
  {
    $this->phases = $phases;
  }
  /**
   * @return SubscriptionOfferPhase[]
   */
  public function getPhases()
  {
    return $this->phases;
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
   * @param RegionalSubscriptionOfferConfig[]
   */
  public function setRegionalConfigs($regionalConfigs)
  {
    $this->regionalConfigs = $regionalConfigs;
  }
  /**
   * @return RegionalSubscriptionOfferConfig[]
   */
  public function getRegionalConfigs()
  {
    return $this->regionalConfigs;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param SubscriptionOfferTargeting
   */
  public function setTargeting(SubscriptionOfferTargeting $targeting)
  {
    $this->targeting = $targeting;
  }
  /**
   * @return SubscriptionOfferTargeting
   */
  public function getTargeting()
  {
    return $this->targeting;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SubscriptionOffer::class, 'Google_Service_AndroidPublisher_SubscriptionOffer');
