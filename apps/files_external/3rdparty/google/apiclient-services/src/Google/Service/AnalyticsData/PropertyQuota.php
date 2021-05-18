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

class Google_Service_AnalyticsData_PropertyQuota extends Google_Model
{
  protected $concurrentRequestsType = 'Google_Service_AnalyticsData_QuotaStatus';
  protected $concurrentRequestsDataType = '';
  protected $potentiallyThresholdedRequestsPerHourType = 'Google_Service_AnalyticsData_QuotaStatus';
  protected $potentiallyThresholdedRequestsPerHourDataType = '';
  protected $serverErrorsPerProjectPerHourType = 'Google_Service_AnalyticsData_QuotaStatus';
  protected $serverErrorsPerProjectPerHourDataType = '';
  protected $tokensPerDayType = 'Google_Service_AnalyticsData_QuotaStatus';
  protected $tokensPerDayDataType = '';
  protected $tokensPerHourType = 'Google_Service_AnalyticsData_QuotaStatus';
  protected $tokensPerHourDataType = '';

  /**
   * @param Google_Service_AnalyticsData_QuotaStatus
   */
  public function setConcurrentRequests(Google_Service_AnalyticsData_QuotaStatus $concurrentRequests)
  {
    $this->concurrentRequests = $concurrentRequests;
  }
  /**
   * @return Google_Service_AnalyticsData_QuotaStatus
   */
  public function getConcurrentRequests()
  {
    return $this->concurrentRequests;
  }
  /**
   * @param Google_Service_AnalyticsData_QuotaStatus
   */
  public function setPotentiallyThresholdedRequestsPerHour(Google_Service_AnalyticsData_QuotaStatus $potentiallyThresholdedRequestsPerHour)
  {
    $this->potentiallyThresholdedRequestsPerHour = $potentiallyThresholdedRequestsPerHour;
  }
  /**
   * @return Google_Service_AnalyticsData_QuotaStatus
   */
  public function getPotentiallyThresholdedRequestsPerHour()
  {
    return $this->potentiallyThresholdedRequestsPerHour;
  }
  /**
   * @param Google_Service_AnalyticsData_QuotaStatus
   */
  public function setServerErrorsPerProjectPerHour(Google_Service_AnalyticsData_QuotaStatus $serverErrorsPerProjectPerHour)
  {
    $this->serverErrorsPerProjectPerHour = $serverErrorsPerProjectPerHour;
  }
  /**
   * @return Google_Service_AnalyticsData_QuotaStatus
   */
  public function getServerErrorsPerProjectPerHour()
  {
    return $this->serverErrorsPerProjectPerHour;
  }
  /**
   * @param Google_Service_AnalyticsData_QuotaStatus
   */
  public function setTokensPerDay(Google_Service_AnalyticsData_QuotaStatus $tokensPerDay)
  {
    $this->tokensPerDay = $tokensPerDay;
  }
  /**
   * @return Google_Service_AnalyticsData_QuotaStatus
   */
  public function getTokensPerDay()
  {
    return $this->tokensPerDay;
  }
  /**
   * @param Google_Service_AnalyticsData_QuotaStatus
   */
  public function setTokensPerHour(Google_Service_AnalyticsData_QuotaStatus $tokensPerHour)
  {
    $this->tokensPerHour = $tokensPerHour;
  }
  /**
   * @return Google_Service_AnalyticsData_QuotaStatus
   */
  public function getTokensPerHour()
  {
    return $this->tokensPerHour;
  }
}
