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

namespace Google\Service\DisplayVideo;

class PerformanceGoalBidStrategy extends \Google\Model
{
  /**
   * @var string
   */
  public $customBiddingAlgorithmId;
  /**
   * @var string
   */
  public $maxAverageCpmBidAmountMicros;
  /**
   * @var string
   */
  public $performanceGoalAmountMicros;
  /**
   * @var string
   */
  public $performanceGoalType;

  /**
   * @param string
   */
  public function setCustomBiddingAlgorithmId($customBiddingAlgorithmId)
  {
    $this->customBiddingAlgorithmId = $customBiddingAlgorithmId;
  }
  /**
   * @return string
   */
  public function getCustomBiddingAlgorithmId()
  {
    return $this->customBiddingAlgorithmId;
  }
  /**
   * @param string
   */
  public function setMaxAverageCpmBidAmountMicros($maxAverageCpmBidAmountMicros)
  {
    $this->maxAverageCpmBidAmountMicros = $maxAverageCpmBidAmountMicros;
  }
  /**
   * @return string
   */
  public function getMaxAverageCpmBidAmountMicros()
  {
    return $this->maxAverageCpmBidAmountMicros;
  }
  /**
   * @param string
   */
  public function setPerformanceGoalAmountMicros($performanceGoalAmountMicros)
  {
    $this->performanceGoalAmountMicros = $performanceGoalAmountMicros;
  }
  /**
   * @return string
   */
  public function getPerformanceGoalAmountMicros()
  {
    return $this->performanceGoalAmountMicros;
  }
  /**
   * @param string
   */
  public function setPerformanceGoalType($performanceGoalType)
  {
    $this->performanceGoalType = $performanceGoalType;
  }
  /**
   * @return string
   */
  public function getPerformanceGoalType()
  {
    return $this->performanceGoalType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PerformanceGoalBidStrategy::class, 'Google_Service_DisplayVideo_PerformanceGoalBidStrategy');
