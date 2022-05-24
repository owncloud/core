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

namespace Google\Service\Compute;

class OutlierDetection extends \Google\Model
{
  protected $baseEjectionTimeType = Duration::class;
  protected $baseEjectionTimeDataType = '';
  /**
   * @var int
   */
  public $consecutiveErrors;
  /**
   * @var int
   */
  public $consecutiveGatewayFailure;
  /**
   * @var int
   */
  public $enforcingConsecutiveErrors;
  /**
   * @var int
   */
  public $enforcingConsecutiveGatewayFailure;
  /**
   * @var int
   */
  public $enforcingSuccessRate;
  protected $intervalType = Duration::class;
  protected $intervalDataType = '';
  /**
   * @var int
   */
  public $maxEjectionPercent;
  /**
   * @var int
   */
  public $successRateMinimumHosts;
  /**
   * @var int
   */
  public $successRateRequestVolume;
  /**
   * @var int
   */
  public $successRateStdevFactor;

  /**
   * @param Duration
   */
  public function setBaseEjectionTime(Duration $baseEjectionTime)
  {
    $this->baseEjectionTime = $baseEjectionTime;
  }
  /**
   * @return Duration
   */
  public function getBaseEjectionTime()
  {
    return $this->baseEjectionTime;
  }
  /**
   * @param int
   */
  public function setConsecutiveErrors($consecutiveErrors)
  {
    $this->consecutiveErrors = $consecutiveErrors;
  }
  /**
   * @return int
   */
  public function getConsecutiveErrors()
  {
    return $this->consecutiveErrors;
  }
  /**
   * @param int
   */
  public function setConsecutiveGatewayFailure($consecutiveGatewayFailure)
  {
    $this->consecutiveGatewayFailure = $consecutiveGatewayFailure;
  }
  /**
   * @return int
   */
  public function getConsecutiveGatewayFailure()
  {
    return $this->consecutiveGatewayFailure;
  }
  /**
   * @param int
   */
  public function setEnforcingConsecutiveErrors($enforcingConsecutiveErrors)
  {
    $this->enforcingConsecutiveErrors = $enforcingConsecutiveErrors;
  }
  /**
   * @return int
   */
  public function getEnforcingConsecutiveErrors()
  {
    return $this->enforcingConsecutiveErrors;
  }
  /**
   * @param int
   */
  public function setEnforcingConsecutiveGatewayFailure($enforcingConsecutiveGatewayFailure)
  {
    $this->enforcingConsecutiveGatewayFailure = $enforcingConsecutiveGatewayFailure;
  }
  /**
   * @return int
   */
  public function getEnforcingConsecutiveGatewayFailure()
  {
    return $this->enforcingConsecutiveGatewayFailure;
  }
  /**
   * @param int
   */
  public function setEnforcingSuccessRate($enforcingSuccessRate)
  {
    $this->enforcingSuccessRate = $enforcingSuccessRate;
  }
  /**
   * @return int
   */
  public function getEnforcingSuccessRate()
  {
    return $this->enforcingSuccessRate;
  }
  /**
   * @param Duration
   */
  public function setInterval(Duration $interval)
  {
    $this->interval = $interval;
  }
  /**
   * @return Duration
   */
  public function getInterval()
  {
    return $this->interval;
  }
  /**
   * @param int
   */
  public function setMaxEjectionPercent($maxEjectionPercent)
  {
    $this->maxEjectionPercent = $maxEjectionPercent;
  }
  /**
   * @return int
   */
  public function getMaxEjectionPercent()
  {
    return $this->maxEjectionPercent;
  }
  /**
   * @param int
   */
  public function setSuccessRateMinimumHosts($successRateMinimumHosts)
  {
    $this->successRateMinimumHosts = $successRateMinimumHosts;
  }
  /**
   * @return int
   */
  public function getSuccessRateMinimumHosts()
  {
    return $this->successRateMinimumHosts;
  }
  /**
   * @param int
   */
  public function setSuccessRateRequestVolume($successRateRequestVolume)
  {
    $this->successRateRequestVolume = $successRateRequestVolume;
  }
  /**
   * @return int
   */
  public function getSuccessRateRequestVolume()
  {
    return $this->successRateRequestVolume;
  }
  /**
   * @param int
   */
  public function setSuccessRateStdevFactor($successRateStdevFactor)
  {
    $this->successRateStdevFactor = $successRateStdevFactor;
  }
  /**
   * @return int
   */
  public function getSuccessRateStdevFactor()
  {
    return $this->successRateStdevFactor;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OutlierDetection::class, 'Google_Service_Compute_OutlierDetection');
