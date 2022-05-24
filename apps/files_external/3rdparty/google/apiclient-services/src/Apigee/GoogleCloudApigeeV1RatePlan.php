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
  /**
   * @var string
   */
  public $apiproduct;
  /**
   * @var string
   */
  public $billingPeriod;
  protected $consumptionPricingRatesType = GoogleCloudApigeeV1RateRange::class;
  protected $consumptionPricingRatesDataType = 'array';
  /**
   * @var string
   */
  public $consumptionPricingType;
  /**
   * @var string
   */
  public $createdAt;
  /**
   * @var string
   */
  public $currencyCode;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $endTime;
  /**
   * @var int
   */
  public $fixedFeeFrequency;
  protected $fixedRecurringFeeType = GoogleTypeMoney::class;
  protected $fixedRecurringFeeDataType = '';
  /**
   * @var string
   */
  public $lastModifiedAt;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $paymentFundingModel;
  protected $revenueShareRatesType = GoogleCloudApigeeV1RevenueShareRange::class;
  protected $revenueShareRatesDataType = 'array';
  /**
   * @var string
   */
  public $revenueShareType;
  protected $setupFeeType = GoogleTypeMoney::class;
  protected $setupFeeDataType = '';
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $state;

  /**
   * @param string
   */
  public function setApiproduct($apiproduct)
  {
    $this->apiproduct = $apiproduct;
  }
  /**
   * @return string
   */
  public function getApiproduct()
  {
    return $this->apiproduct;
  }
  /**
   * @param string
   */
  public function setBillingPeriod($billingPeriod)
  {
    $this->billingPeriod = $billingPeriod;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setConsumptionPricingType($consumptionPricingType)
  {
    $this->consumptionPricingType = $consumptionPricingType;
  }
  /**
   * @return string
   */
  public function getConsumptionPricingType()
  {
    return $this->consumptionPricingType;
  }
  /**
   * @param string
   */
  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;
  }
  /**
   * @return string
   */
  public function getCreatedAt()
  {
    return $this->createdAt;
  }
  /**
   * @param string
   */
  public function setCurrencyCode($currencyCode)
  {
    $this->currencyCode = $currencyCode;
  }
  /**
   * @return string
   */
  public function getCurrencyCode()
  {
    return $this->currencyCode;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param int
   */
  public function setFixedFeeFrequency($fixedFeeFrequency)
  {
    $this->fixedFeeFrequency = $fixedFeeFrequency;
  }
  /**
   * @return int
   */
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
  /**
   * @param string
   */
  public function setLastModifiedAt($lastModifiedAt)
  {
    $this->lastModifiedAt = $lastModifiedAt;
  }
  /**
   * @return string
   */
  public function getLastModifiedAt()
  {
    return $this->lastModifiedAt;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setPaymentFundingModel($paymentFundingModel)
  {
    $this->paymentFundingModel = $paymentFundingModel;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setRevenueShareType($revenueShareType)
  {
    $this->revenueShareType = $revenueShareType;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
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
class_alias(GoogleCloudApigeeV1RatePlan::class, 'Google_Service_Apigee_GoogleCloudApigeeV1RatePlan');
