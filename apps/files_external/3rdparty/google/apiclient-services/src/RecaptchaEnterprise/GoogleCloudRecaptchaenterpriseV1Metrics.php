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

namespace Google\Service\RecaptchaEnterprise;

class GoogleCloudRecaptchaenterpriseV1Metrics extends \Google\Collection
{
  protected $collection_key = 'scoreMetrics';
  protected $challengeMetricsType = GoogleCloudRecaptchaenterpriseV1ChallengeMetrics::class;
  protected $challengeMetricsDataType = 'array';
  /**
   * @var string
   */
  public $name;
  protected $scoreMetricsType = GoogleCloudRecaptchaenterpriseV1ScoreMetrics::class;
  protected $scoreMetricsDataType = 'array';
  /**
   * @var string
   */
  public $startTime;

  /**
   * @param GoogleCloudRecaptchaenterpriseV1ChallengeMetrics[]
   */
  public function setChallengeMetrics($challengeMetrics)
  {
    $this->challengeMetrics = $challengeMetrics;
  }
  /**
   * @return GoogleCloudRecaptchaenterpriseV1ChallengeMetrics[]
   */
  public function getChallengeMetrics()
  {
    return $this->challengeMetrics;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GoogleCloudRecaptchaenterpriseV1ScoreMetrics[]
   */
  public function setScoreMetrics($scoreMetrics)
  {
    $this->scoreMetrics = $scoreMetrics;
  }
  /**
   * @return GoogleCloudRecaptchaenterpriseV1ScoreMetrics[]
   */
  public function getScoreMetrics()
  {
    return $this->scoreMetrics;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecaptchaenterpriseV1Metrics::class, 'Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1Metrics');
