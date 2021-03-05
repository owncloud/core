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

class Google_Service_Cloudchannel_GoogleCloudChannelV1Offer extends Google_Collection
{
  protected $collection_key = 'priceByResources';
  protected $constraintsType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1Constraints';
  protected $constraintsDataType = '';
  public $endTime;
  protected $marketingInfoType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1MarketingInfo';
  protected $marketingInfoDataType = '';
  public $name;
  protected $parameterDefinitionsType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1ParameterDefinition';
  protected $parameterDefinitionsDataType = 'array';
  protected $planType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1Plan';
  protected $planDataType = '';
  protected $priceByResourcesType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1PriceByResource';
  protected $priceByResourcesDataType = 'array';
  protected $skuType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1Sku';
  protected $skuDataType = '';
  public $startTime;

  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1Constraints
   */
  public function setConstraints(Google_Service_Cloudchannel_GoogleCloudChannelV1Constraints $constraints)
  {
    $this->constraints = $constraints;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1Constraints
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
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1MarketingInfo
   */
  public function setMarketingInfo(Google_Service_Cloudchannel_GoogleCloudChannelV1MarketingInfo $marketingInfo)
  {
    $this->marketingInfo = $marketingInfo;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1MarketingInfo
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
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1ParameterDefinition[]
   */
  public function setParameterDefinitions($parameterDefinitions)
  {
    $this->parameterDefinitions = $parameterDefinitions;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1ParameterDefinition[]
   */
  public function getParameterDefinitions()
  {
    return $this->parameterDefinitions;
  }
  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1Plan
   */
  public function setPlan(Google_Service_Cloudchannel_GoogleCloudChannelV1Plan $plan)
  {
    $this->plan = $plan;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1Plan
   */
  public function getPlan()
  {
    return $this->plan;
  }
  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1PriceByResource[]
   */
  public function setPriceByResources($priceByResources)
  {
    $this->priceByResources = $priceByResources;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1PriceByResource[]
   */
  public function getPriceByResources()
  {
    return $this->priceByResources;
  }
  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1Sku
   */
  public function setSku(Google_Service_Cloudchannel_GoogleCloudChannelV1Sku $sku)
  {
    $this->sku = $sku;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1Sku
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
