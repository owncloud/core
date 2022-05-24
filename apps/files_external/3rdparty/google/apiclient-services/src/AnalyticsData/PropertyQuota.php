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

namespace Google\Service\AnalyticsData;

class PropertyQuota extends \Google\Model
{
  protected $concurrentRequestsType = QuotaStatus::class;
  protected $concurrentRequestsDataType = '';
  protected $potentiallyThresholdedRequestsPerHourType = QuotaStatus::class;
  protected $potentiallyThresholdedRequestsPerHourDataType = '';
  protected $serverErrorsPerProjectPerHourType = QuotaStatus::class;
  protected $serverErrorsPerProjectPerHourDataType = '';
  protected $tokensPerDayType = QuotaStatus::class;
  protected $tokensPerDayDataType = '';
  protected $tokensPerHourType = QuotaStatus::class;
  protected $tokensPerHourDataType = '';

  /**
   * @param QuotaStatus
   */
  public function setConcurrentRequests(QuotaStatus $concurrentRequests)
  {
    $this->concurrentRequests = $concurrentRequests;
  }
  /**
   * @return QuotaStatus
   */
  public function getConcurrentRequests()
  {
    return $this->concurrentRequests;
  }
  /**
   * @param QuotaStatus
   */
  public function setPotentiallyThresholdedRequestsPerHour(QuotaStatus $potentiallyThresholdedRequestsPerHour)
  {
    $this->potentiallyThresholdedRequestsPerHour = $potentiallyThresholdedRequestsPerHour;
  }
  /**
   * @return QuotaStatus
   */
  public function getPotentiallyThresholdedRequestsPerHour()
  {
    return $this->potentiallyThresholdedRequestsPerHour;
  }
  /**
   * @param QuotaStatus
   */
  public function setServerErrorsPerProjectPerHour(QuotaStatus $serverErrorsPerProjectPerHour)
  {
    $this->serverErrorsPerProjectPerHour = $serverErrorsPerProjectPerHour;
  }
  /**
   * @return QuotaStatus
   */
  public function getServerErrorsPerProjectPerHour()
  {
    return $this->serverErrorsPerProjectPerHour;
  }
  /**
   * @param QuotaStatus
   */
  public function setTokensPerDay(QuotaStatus $tokensPerDay)
  {
    $this->tokensPerDay = $tokensPerDay;
  }
  /**
   * @return QuotaStatus
   */
  public function getTokensPerDay()
  {
    return $this->tokensPerDay;
  }
  /**
   * @param QuotaStatus
   */
  public function setTokensPerHour(QuotaStatus $tokensPerHour)
  {
    $this->tokensPerHour = $tokensPerHour;
  }
  /**
   * @return QuotaStatus
   */
  public function getTokensPerHour()
  {
    return $this->tokensPerHour;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PropertyQuota::class, 'Google_Service_AnalyticsData_PropertyQuota');
