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

namespace Google\Service\Playdeveloperreporting;

class GooglePlayDeveloperReportingV1beta1FreshnessInfoFreshness extends \Google\Model
{
  /**
   * @var string
   */
  public $aggregationPeriod;
  protected $latestEndTimeType = GoogleTypeDateTime::class;
  protected $latestEndTimeDataType = '';

  /**
   * @param string
   */
  public function setAggregationPeriod($aggregationPeriod)
  {
    $this->aggregationPeriod = $aggregationPeriod;
  }
  /**
   * @return string
   */
  public function getAggregationPeriod()
  {
    return $this->aggregationPeriod;
  }
  /**
   * @param GoogleTypeDateTime
   */
  public function setLatestEndTime(GoogleTypeDateTime $latestEndTime)
  {
    $this->latestEndTime = $latestEndTime;
  }
  /**
   * @return GoogleTypeDateTime
   */
  public function getLatestEndTime()
  {
    return $this->latestEndTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePlayDeveloperReportingV1beta1FreshnessInfoFreshness::class, 'Google_Service_Playdeveloperreporting_GooglePlayDeveloperReportingV1beta1FreshnessInfoFreshness');
