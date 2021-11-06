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

namespace Google\Service\Cloudchannel;

class GoogleCloudChannelV1Offer extends \Google\Collection
{
  protected $collection_key = 'priceByResources';
  protected $constraintsType = GoogleCloudChannelV1Constraints::class;
  protected $constraintsDataType = '';
  public $endTime;
  protected $marketingInfoType = GoogleCloudChannelV1MarketingInfo::class;
  protected $marketingInfoDataType = '';
  public $name;
  protected $parameterDefinitionsType = GoogleCloudChannelV1ParameterDefinition::class;
  protected $parameterDefinitionsDataType = 'array';
  protected $planType = GoogleCloudChannelV1Plan::class;
  protected $planDataType = '';
  protected $priceByResourcesType = GoogleCloudChannelV1PriceByResource::class;
  protected $priceByResourcesDataType = 'array';
  protected $skuType = GoogleCloudChannelV1Sku::class;
  protected $skuDataType = '';
  public $startTime;

  /**
   * @param GoogleCloudChannelV1Constraints
   */
  public function setConstraints(GoogleCloudChannelV1Constraints $constraints)
  {
    $this->constraints = $constraints;
  }
  /**
   * @return GoogleCloudChannelV1Constraints
   */
  public function getConstraints()
  {
    return $this->constraints;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param GoogleCloudChannelV1MarketingInfo
   */
  public function setMarketingInfo(GoogleCloudChannelV1MarketingInfo $marketingInfo)
  {
    $this->marketingInfo = $marketingInfo;
  }
  /**
   * @return GoogleCloudChannelV1MarketingInfo
   */
  public function getMarketingInfo()
  {
    return $this->marketingInfo;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GoogleCloudChannelV1ParameterDefinition[]
   */
  public function setParameterDefinitions($parameterDefinitions)
  {
    $this->parameterDefinitions = $parameterDefinitions;
  }
  /**
   * @return GoogleCloudChannelV1ParameterDefinition[]
   */
  public function getParameterDefinitions()
  {
    return $this->parameterDefinitions;
  }
  /**
   * @param GoogleCloudChannelV1Plan
   */
  public function setPlan(GoogleCloudChannelV1Plan $plan)
  {
    $this->plan = $plan;
  }
  /**
   * @return GoogleCloudChannelV1Plan
   */
  public function getPlan()
  {
    return $this->plan;
  }
  /**
   * @param GoogleCloudChannelV1PriceByResource[]
   */
  public function setPriceByResources($priceByResources)
  {
    $this->priceByResources = $priceByResources;
  }
  /**
   * @return GoogleCloudChannelV1PriceByResource[]
   */
  public function getPriceByResources()
  {
    return $this->priceByResources;
  }
  /**
   * @param GoogleCloudChannelV1Sku
   */
  public function setSku(GoogleCloudChannelV1Sku $sku)
  {
    $this->sku = $sku;
  }
  /**
   * @return GoogleCloudChannelV1Sku
   */
  public function getSku()
  {
    return $this->sku;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudChannelV1Offer::class, 'Google_Service_Cloudchannel_GoogleCloudChannelV1Offer');
