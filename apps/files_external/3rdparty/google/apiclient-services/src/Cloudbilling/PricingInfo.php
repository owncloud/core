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

namespace Google\Service\Cloudbilling;

class PricingInfo extends \Google\Model
{
  protected $aggregationInfoType = AggregationInfo::class;
  protected $aggregationInfoDataType = '';
  public $currencyConversionRate;
  public $effectiveTime;
  protected $pricingExpressionType = PricingExpression::class;
  protected $pricingExpressionDataType = '';
  public $summary;

  /**
   * @param AggregationInfo
   */
  public function setAggregationInfo(AggregationInfo $aggregationInfo)
  {
    $this->aggregationInfo = $aggregationInfo;
  }
  /**
   * @return AggregationInfo
   */
  public function getAggregationInfo()
  {
    return $this->aggregationInfo;
  }
  public function setCurrencyConversionRate($currencyConversionRate)
  {
    $this->currencyConversionRate = $currencyConversionRate;
  }
  public function getCurrencyConversionRate()
  {
    return $this->currencyConversionRate;
  }
  public function setEffectiveTime($effectiveTime)
  {
    $this->effectiveTime = $effectiveTime;
  }
  public function getEffectiveTime()
  {
    return $this->effectiveTime;
  }
  /**
   * @param PricingExpression
   */
  public function setPricingExpression(PricingExpression $pricingExpression)
  {
    $this->pricingExpression = $pricingExpression;
  }
  /**
   * @return PricingExpression
   */
  public function getPricingExpression()
  {
    return $this->pricingExpression;
  }
  public function setSummary($summary)
  {
    $this->summary = $summary;
  }
  public function getSummary()
  {
    return $this->summary;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PricingInfo::class, 'Google_Service_Cloudbilling_PricingInfo');
