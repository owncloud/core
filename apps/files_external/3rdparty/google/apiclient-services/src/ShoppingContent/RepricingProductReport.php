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

namespace Google\Service\ShoppingContent;

class RepricingProductReport extends \Google\Collection
{
  protected $collection_key = 'ruleIds';
  public $applicationCount;
  protected $buyboxWinningProductStatsType = RepricingProductReportBuyboxWinningProductStats::class;
  protected $buyboxWinningProductStatsDataType = '';
  protected $dateType = Date::class;
  protected $dateDataType = '';
  protected $highWatermarkType = PriceAmount::class;
  protected $highWatermarkDataType = '';
  protected $inapplicabilityDetailsType = InapplicabilityDetails::class;
  protected $inapplicabilityDetailsDataType = 'array';
  protected $lowWatermarkType = PriceAmount::class;
  protected $lowWatermarkDataType = '';
  public $orderItemCount;
  public $ruleIds;
  protected $totalGmvType = PriceAmount::class;
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
   * @param RepricingProductReportBuyboxWinningProductStats
   */
  public function setBuyboxWinningProductStats(RepricingProductReportBuyboxWinningProductStats $buyboxWinningProductStats)
  {
    $this->buyboxWinningProductStats = $buyboxWinningProductStats;
  }
  /**
   * @return RepricingProductReportBuyboxWinningProductStats
   */
  public function getBuyboxWinningProductStats()
  {
    return $this->buyboxWinningProductStats;
  }
  /**
   * @param Date
   */
  public function setDate(Date $date)
  {
    $this->date = $date;
  }
  /**
   * @return Date
   */
  public function getDate()
  {
    return $this->date;
  }
  /**
   * @param PriceAmount
   */
  public function setHighWatermark(PriceAmount $highWatermark)
  {
    $this->highWatermark = $highWatermark;
  }
  /**
   * @return PriceAmount
   */
  public function getHighWatermark()
  {
    return $this->highWatermark;
  }
  /**
   * @param InapplicabilityDetails[]
   */
  public function setInapplicabilityDetails($inapplicabilityDetails)
  {
    $this->inapplicabilityDetails = $inapplicabilityDetails;
  }
  /**
   * @return InapplicabilityDetails[]
   */
  public function getInapplicabilityDetails()
  {
    return $this->inapplicabilityDetails;
  }
  /**
   * @param PriceAmount
   */
  public function setLowWatermark(PriceAmount $lowWatermark)
  {
    $this->lowWatermark = $lowWatermark;
  }
  /**
   * @return PriceAmount
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
   * @param PriceAmount
   */
  public function setTotalGmv(PriceAmount $totalGmv)
  {
    $this->totalGmv = $totalGmv;
  }
  /**
   * @return PriceAmount
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepricingProductReport::class, 'Google_Service_ShoppingContent_RepricingProductReport');
