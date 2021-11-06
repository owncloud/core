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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1RatePlan extends \Google\Collection
{
  protected $collection_key = 'revenueShareRates';
  public $apiproduct;
  public $billingPeriod;
  protected $consumptionPricingRatesType = GoogleCloudApigeeV1RateRange::class;
  protected $consumptionPricingRatesDataType = 'array';
  public $consumptionPricingType;
  public $createdAt;
  public $currencyCode;
  public $description;
  public $displayName;
  public $endTime;
  public $fixedFeeFrequency;
  protected $fixedRecurringFeeType = GoogleTypeMoney::class;
  protected $fixedRecurringFeeDataType = '';
  public $lastModifiedAt;
  public $name;
  public $paymentFundingModel;
  protected $revenueShareRatesType = GoogleCloudApigeeV1RevenueShareRange::class;
  protected $revenueShareRatesDataType = 'array';
  public $revenueShareType;
  protected $setupFeeType = GoogleTypeMoney::class;
  protected $setupFeeDataType = '';
  public $startTime;
  public $state;

  public function setApiproduct($apiproduct)
  {
    $this->apiproduct = $apiproduct;
  }
  public function getApiproduct()
  {
    return $this->apiproduct;
  }
  public function setBillingPeriod($billingPeriod)
  {
    $this->billingPeriod = $billingPeriod;
  }
  public function getBillingPeriod()
  {
    return $this->billingPeriod;
  }
  /**
   * @param GoogleCloudApigeeV1RateRange[]
   */
  public function setConsumptionPricingRates($consumptionPricingRates)
  {
    $this->consumptionPricingRates = $consumptionPricingRates;
  }
  /**
   * @return GoogleCloudApigeeV1RateRange[]
   */
  public function getConsumptionPricingRates()
  {
    return $this->consumptionPricingRates;
  }
  public function setConsumptionPricingType($consumptionPricingType)
  {
    $this->consumptionPricingType = $consumptionPricingType;
  }
  public function getConsumptionPricingType()
  {
    return $this->consumptionPricingType;
  }
  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;
  }
  public function getCreatedAt()
  {
    return $this->createdAt;
  }
  public function setCurrencyCode($currencyCode)
  {
    $this->currencyCode = $currencyCode;
  }
  public function getCurrencyCode()
  {
    return $this->currencyCode;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setFixedFeeFrequency($fixedFeeFrequency)
  {
    $this->fixedFeeFrequency = $fixedFeeFrequency;
  }
  public function getFixedFeeFrequency()
  {
    return $this->fixedFeeFrequency;
  }
  /**
   * @param GoogleTypeMoney
   */
  public function setFixedRecurringFee(GoogleTypeMoney $fixedRecurringFee)
  {
    $this->fixedRecurringFee = $fixedRecurringFee;
  }
  /**
   * @return GoogleTypeMoney
   */
  public function getFixedRecurringFee()
  {
    return $this->fixedRecurringFee;
  }
  public function setLastModifiedAt($lastModifiedAt)
  {
    $this->lastModifiedAt = $lastModifiedAt;
  }
  public function getLastModifiedAt()
  {
    return $this->lastModifiedAt;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPaymentFundingModel($paymentFundingModel)
  {
    $this->paymentFundingModel = $paymentFundingModel;
  }
  public function getPaymentFundingModel()
  {
    return $this->paymentFundingModel;
  }
  /**
   * @param GoogleCloudApigeeV1RevenueShareRange[]
   */
  public function setRevenueShareRates($revenueShareRates)
  {
    $this->revenueShareRates = $revenueShareRates;
  }
  /**
   * @return GoogleCloudApigeeV1RevenueShareRange[]
   */
  public function getRevenueShareRates()
  {
    return $this->revenueShareRates;
  }
  public function setRevenueShareType($revenueShareType)
  {
    $this->revenueShareType = $revenueShareType;
  }
  public function getRevenueShareType()
  {
    return $this->revenueShareType;
  }
  /**
   * @param GoogleTypeMoney
   */
  public function setSetupFee(GoogleTypeMoney $setupFee)
  {
    $this->setupFee = $setupFee;
  }
  /**
   * @return GoogleTypeMoney
   */
  public function getSetupFee()
  {
    return $this->setupFee;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1RatePlan::class, 'Google_Service_Apigee_GoogleCloudApigeeV1RatePlan');
