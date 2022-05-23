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

class BasePlan extends \Google\Collection
{
  protected $collection_key = 'regionalConfigs';
  protected $autoRenewingBasePlanTypeType = AutoRenewingBasePlanType::class;
  protected $autoRenewingBasePlanTypeDataType = '';
  /**
   * @var string
   */
  public $basePlanId;
  protected $offerTagsType = OfferTag::class;
  protected $offerTagsDataType = 'array';
  protected $otherRegionsConfigType = OtherRegionsBasePlanConfig::class;
  protected $otherRegionsConfigDataType = '';
  protected $prepaidBasePlanTypeType = PrepaidBasePlanType::class;
  protected $prepaidBasePlanTypeDataType = '';
  protected $regionalConfigsType = RegionalBasePlanConfig::class;
  protected $regionalConfigsDataType = 'array';
  /**
   * @var string
   */
  public $state;

  /**
   * @param AutoRenewingBasePlanType
   */
  public function setAutoRenewingBasePlanType(AutoRenewingBasePlanType $autoRenewingBasePlanType)
  {
    $this->autoRenewingBasePlanType = $autoRenewingBasePlanType;
  }
  /**
   * @return AutoRenewingBasePlanType
   */
  public function getAutoRenewingBasePlanType()
  {
    return $this->autoRenewingBasePlanType;
  }
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
   * @param OtherRegionsBasePlanConfig
   */
  public function setOtherRegionsConfig(OtherRegionsBasePlanConfig $otherRegionsConfig)
  {
    $this->otherRegionsConfig = $otherRegionsConfig;
  }
  /**
   * @return OtherRegionsBasePlanConfig
   */
  public function getOtherRegionsConfig()
  {
    return $this->otherRegionsConfig;
  }
  /**
   * @param PrepaidBasePlanType
   */
  public function setPrepaidBasePlanType(PrepaidBasePlanType $prepaidBasePlanType)
  {
    $this->prepaidBasePlanType = $prepaidBasePlanType;
  }
  /**
   * @return PrepaidBasePlanType
   */
  public function getPrepaidBasePlanType()
  {
    return $this->prepaidBasePlanType;
  }
  /**
   * @param RegionalBasePlanConfig[]
   */
  public function setRegionalConfigs($regionalConfigs)
  {
    $this->regionalConfigs = $regionalConfigs;
  }
  /**
   * @return RegionalBasePlanConfig[]
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BasePlan::class, 'Google_Service_AndroidPublisher_BasePlan');
