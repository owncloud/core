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

class Google_Service_DisplayVideo_BiddingStrategy extends Google_Model
{
  protected $fixedBidType = 'Google_Service_DisplayVideo_FixedBidStrategy';
  protected $fixedBidDataType = '';
  protected $maximizeSpendAutoBidType = 'Google_Service_DisplayVideo_MaximizeSpendBidStrategy';
  protected $maximizeSpendAutoBidDataType = '';
  protected $performanceGoalAutoBidType = 'Google_Service_DisplayVideo_PerformanceGoalBidStrategy';
  protected $performanceGoalAutoBidDataType = '';

  /**
   * @param Google_Service_DisplayVideo_FixedBidStrategy
   */
  public function setFixedBid(Google_Service_DisplayVideo_FixedBidStrategy $fixedBid)
  {
    $this->fixedBid = $fixedBid;
  }
  /**
   * @return Google_Service_DisplayVideo_FixedBidStrategy
   */
  public function getFixedBid()
  {
    return $this->fixedBid;
  }
  /**
   * @param Google_Service_DisplayVideo_MaximizeSpendBidStrategy
   */
  public function setMaximizeSpendAutoBid(Google_Service_DisplayVideo_MaximizeSpendBidStrategy $maximizeSpendAutoBid)
  {
    $this->maximizeSpendAutoBid = $maximizeSpendAutoBid;
  }
  /**
   * @return Google_Service_DisplayVideo_MaximizeSpendBidStrategy
   */
  public function getMaximizeSpendAutoBid()
  {
    return $this->maximizeSpendAutoBid;
  }
  /**
   * @param Google_Service_DisplayVideo_PerformanceGoalBidStrategy
   */
  public function setPerformanceGoalAutoBid(Google_Service_DisplayVideo_PerformanceGoalBidStrategy $performanceGoalAutoBid)
  {
    $this->performanceGoalAutoBid = $performanceGoalAutoBid;
  }
  /**
   * @return Google_Service_DisplayVideo_PerformanceGoalBidStrategy
   */
  public function getPerformanceGoalAutoBid()
  {
    return $this->performanceGoalAutoBid;
  }
}
