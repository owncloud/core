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

class Google_Service_ShoppingContent_RepricingRuleReport extends Google_Collection
{
  protected $collection_key = 'inapplicableProducts';
  protected $buyboxWinningRuleStatsType = 'Google_Service_ShoppingContent_RepricingRuleReportBuyboxWinningRuleStats';
  protected $buyboxWinningRuleStatsDataType = '';
  protected $dateType = 'Google_Service_ShoppingContent_Date';
  protected $dateDataType = '';
  public $impactedProducts;
  protected $inapplicabilityDetailsType = 'Google_Service_ShoppingContent_InapplicabilityDetails';
  protected $inapplicabilityDetailsDataType = 'array';
  public $inapplicableProducts;
  public $orderItemCount;
  public $ruleId;
  protected $totalGmvType = 'Google_Service_ShoppingContent_PriceAmount';
  protected $totalGmvDataType = '';
  public $type;

  /**
   * @param Google_Service_ShoppingContent_RepricingRuleReportBuyboxWinningRuleStats
   */
  public function setBuyboxWinningRuleStats(Google_Service_ShoppingContent_RepricingRuleReportBuyboxWinningRuleStats $buyboxWinningRuleStats)
  {
    $this->buyboxWinningRuleStats = $buyboxWinningRuleStats;
  }
  /**
   * @return Google_Service_ShoppingContent_RepricingRuleReportBuyboxWinningRuleStats
   */
  public function getBuyboxWinningRuleStats()
  {
    return $this->buyboxWinningRuleStats;
  }
  /**
   * @param Google_Service_ShoppingContent_Date
   */
  public function setDate(Google_Service_ShoppingContent_Date $date)
  {
    $this->date = $date;
  }
  /**
   * @return Google_Service_ShoppingContent_Date
   */
  public function getDate()
  {
    return $this->date;
  }
  public function setImpactedProducts($impactedProducts)
  {
    $this->impactedProducts = $impactedProducts;
  }
  public function getImpactedProducts()
  {
    return $this->impactedProducts;
  }
  /**
   * @param Google_Service_ShoppingContent_InapplicabilityDetails[]
   */
  public function setInapplicabilityDetails($inapplicabilityDetails)
  {
    $this->inapplicabilityDetails = $inapplicabilityDetails;
  }
  /**
   * @return Google_Service_ShoppingContent_InapplicabilityDetails[]
   */
  public function getInapplicabilityDetails()
  {
    return $this->inapplicabilityDetails;
  }
  public function setInapplicableProducts($inapplicableProducts)
  {
    $this->inapplicableProducts = $inapplicableProducts;
  }
  public function getInapplicableProducts()
  {
    return $this->inapplicableProducts;
  }
  public function setOrderItemCount($orderItemCount)
  {
    $this->orderItemCount = $orderItemCount;
  }
  public function getOrderItemCount()
  {
    return $this->orderItemCount;
  }
  public function setRuleId($ruleId)
  {
    $this->ruleId = $ruleId;
  }
  public function getRuleId()
  {
    return $this->ruleId;
  }
  /**
   * @param Google_Service_ShoppingContent_PriceAmount
   */
  public function setTotalGmv(Google_Service_ShoppingContent_PriceAmount $totalGmv)
  {
    $this->totalGmv = $totalGmv;
  }
  /**
   * @return Google_Service_ShoppingContent_PriceAmount
   */
  public function getTotalGmv()
  {
    return $this->totalGmv;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
