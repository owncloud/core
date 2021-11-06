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
  public $consecutiveErrors;
  public $consecutiveGatewayFailure;
  public $enforcingConsecutiveErrors;
  public $enforcingConsecutiveGatewayFailure;
  public $enforcingSuccessRate;
  protected $intervalType = Duration::class;
  protected $intervalDataType = '';
  public $maxEjectionPercent;
  public $successRateMinimumHosts;
  public $successRateRequestVolume;
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
  public function setConsecutiveErrors($consecutiveErrors)
  {
    $this->consecutiveErrors = $consecutiveErrors;
  }
  public function getConsecutiveErrors()
  {
    return $this->consecutiveErrors;
  }
  public function setConsecutiveGatewayFailure($consecutiveGatewayFailure)
  {
    $this->consecutiveGatewayFailure = $consecutiveGatewayFailure;
  }
  public function getConsecutiveGatewayFailure()
  {
    return $this->consecutiveGatewayFailure;
  }
  public function setEnforcingConsecutiveErrors($enforcingConsecutiveErrors)
  {
    $this->enforcingConsecutiveErrors = $enforcingConsecutiveErrors;
  }
  public function getEnforcingConsecutiveErrors()
  {
    return $this->enforcingConsecutiveErrors;
  }
  public function setEnforcingConsecutiveGatewayFailure($enforcingConsecutiveGatewayFailure)
  {
    $this->enforcingConsecutiveGatewayFailure = $enforcingConsecutiveGatewayFailure;
  }
  public function getEnforcingConsecutiveGatewayFailure()
  {
    return $this->enforcingConsecutiveGatewayFailure;
  }
  public function setEnforcingSuccessRate($enforcingSuccessRate)
  {
    $this->enforcingSuccessRate = $enforcingSuccessRate;
  }
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
  public function setMaxEjectionPercent($maxEjectionPercent)
  {
    $this->maxEjectionPercent = $maxEjectionPercent;
  }
  public function getMaxEjectionPercent()
  {
    return $this->maxEjectionPercent;
  }
  public function setSuccessRateMinimumHosts($successRateMinimumHosts)
  {
    $this->successRateMinimumHosts = $successRateMinimumHosts;
  }
  public function getSuccessRateMinimumHosts()
  {
    return $this->successRateMinimumHosts;
  }
  public function setSuccessRateRequestVolume($successRateRequestVolume)
  {
    $this->successRateRequestVolume = $successRateRequestVolume;
  }
  public function getSuccessRateRequestVolume()
  {
    return $this->successRateRequestVolume;
  }
  public function setSuccessRateStdevFactor($successRateStdevFactor)
  {
    $this->successRateStdevFactor = $successRateStdevFactor;
  }
  public function getSuccessRateStdevFactor()
  {
    return $this->successRateStdevFactor;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OutlierDetection::class, 'Google_Service_Compute_OutlierDetection');
