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

class Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Metrics extends Google_Collection
{
  protected $collection_key = 'scoreMetrics';
  protected $challengeMetricsType = 'Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1ChallengeMetrics';
  protected $challengeMetricsDataType = 'array';
  protected $scoreMetricsType = 'Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1ScoreMetrics';
  protected $scoreMetricsDataType = 'array';
  public $startTime;

  /**
   * @param Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1ChallengeMetrics[]
   */
  public function setChallengeMetrics($challengeMetrics)
  {
    $this->challengeMetrics = $challengeMetrics;
  }
  /**
   * @return Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1ChallengeMetrics[]
   */
  public function getChallengeMetrics()
  {
    return $this->challengeMetrics;
  }
  /**
   * @param Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1ScoreMetrics[]
   */
  public function setScoreMetrics($scoreMetrics)
  {
    $this->scoreMetrics = $scoreMetrics;
  }
  /**
   * @return Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1ScoreMetrics[]
   */
  public function getScoreMetrics()
  {
    return $this->scoreMetrics;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
}
