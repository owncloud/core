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

class Google_Service_ShoppingContent_RepricingProductReport extends Google_Collection
{
  protected $collection_key = 'ruleIds';
  public $applicationCount;
  protected $buyboxWinningProductStatsType = 'Google_Service_ShoppingContent_RepricingProductReportBuyboxWinningProductStats';
  protected $buyboxWinningProductStatsDataType = '';
  protected $dateType = 'Google_Service_ShoppingContent_Date';
  protected $dateDataType = '';
  protected $highWatermarkType = 'Google_Service_ShoppingContent_PriceAmount';
  protected $highWatermarkDataType = '';
  protected $inapplicabilityDetailsType = 'Google_Service_ShoppingContent_InapplicabilityDetails';
  protected $inapplicabilityDetailsDataType = 'array';
  protected $lowWatermarkType = 'Google_Service_ShoppingContent_PriceAmount';
  protected $lowWatermarkDataType = '';
  public $orderItemCount;
  public $ruleIds;
  protected $totalGmvType = 'Google_Service_ShoppingContent_PriceAmount';
  protected $totalGmvDataType = '';
  public $type;

  public function setApplicationCount($applicationCount)
  {
    $this->applicationCount = $applicationCount;
  }
  public function getApplicationCount()
  {
    return $this->applicationCount;
  }
  /**
   * @param Google_Service_ShoppingContent_RepricingProductReportBuyboxWinningProductStats
   */
  public function setBuyboxWinningProductStats(Google_Service_ShoppingContent_RepricingProductReportBuyboxWinningProductStats $buyboxWinningProductStats)
  {
    $this->buyboxWinningProductStats = $buyboxWinningProductStats;
  }
  /**
   * @return Google_Service_ShoppingContent_RepricingProductReportBuyboxWinningProductStats
   */
  public function getBuyboxWinningProductStats()
  {
    return $this->buyboxWinningProductStats;
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
  /**
   * @param Google_Service_ShoppingContent_PriceAmount
   */
  public function setHighWatermark(Google_Service_ShoppingContent_PriceAmount $highWatermark)
  {
    $this->highWatermark = $highWatermark;
  }
  /**
   * @return Google_Service_ShoppingContent_PriceAmount
   */
  public function getHighWatermark()
  {
    return $this->highWatermark;
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
  /**
   * @param Google_Service_ShoppingContent_PriceAmount
   */
  public function setLowWatermark(Google_Service_ShoppingContent_PriceAmount $lowWatermark)
  {
    $this->lowWatermark = $lowWatermark;
  }
  /**
   * @return Google_Service_ShoppingContent_PriceAmount
   */
  public function getLowWatermark()
  {
    return $this->lowWatermark;
  }
  public function setOrderItemCount($orderItemCount)
  {
    $this->orderItemCount = $orderItemCount;
  }
  public function getOrderItemCount()
  {
    return $this->orderItemCount;
  }
  public function setRuleIds($ruleIds)
  {
    $this->ruleIds = $ruleIds;
  }
  public function getRuleIds()
  {
    return $this->ruleIds;
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
