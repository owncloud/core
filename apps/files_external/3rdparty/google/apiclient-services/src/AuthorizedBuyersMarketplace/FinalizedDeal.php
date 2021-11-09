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

namespace Google\Service\AuthorizedBuyersMarketplace;

class FinalizedDeal extends \Google\Model
{
  protected $dealType = Deal::class;
  protected $dealDataType = '';
  protected $dealPausingInfoType = DealPausingInfo::class;
  protected $dealPausingInfoDataType = '';
  public $dealServingStatus;
  public $name;
  public $readyToServe;
  protected $rtbMetricsType = RtbMetrics::class;
  protected $rtbMetricsDataType = '';

  /**
   * @param Deal
   */
  public function setDeal(Deal $deal)
  {
    $this->deal = $deal;
  }
  /**
   * @return Deal
   */
  public function getDeal()
  {
    return $this->deal;
  }
  /**
   * @param DealPausingInfo
   */
  public function setDealPausingInfo(DealPausingInfo $dealPausingInfo)
  {
    $this->dealPausingInfo = $dealPausingInfo;
  }
  /**
   * @return DealPausingInfo
   */
  public function getDealPausingInfo()
  {
    return $this->dealPausingInfo;
  }
  public function setDealServingStatus($dealServingStatus)
  {
    $this->dealServingStatus = $dealServingStatus;
  }
  public function getDealServingStatus()
  {
    return $this->dealServingStatus;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setReadyToServe($readyToServe)
  {
    $this->readyToServe = $readyToServe;
  }
  public function getReadyToServe()
  {
    return $this->readyToServe;
  }
  /**
   * @param RtbMetrics
   */
  public function setRtbMetrics(RtbMetrics $rtbMetrics)
  {
    $this->rtbMetrics = $rtbMetrics;
  }
  /**
   * @return RtbMetrics
   */
  public function getRtbMetrics()
  {
    return $this->rtbMetrics;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FinalizedDeal::class, 'Google_Service_AuthorizedBuyersMarketplace_FinalizedDeal');
