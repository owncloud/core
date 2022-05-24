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

class GooglePlayDeveloperReportingV1beta1TimelineSpec extends \Google\Model
{
  /**
   * @var string
   */
  public $aggregationPeriod;
  protected $endTimeType = GoogleTypeDateTime::class;
  protected $endTimeDataType = '';
  protected $startTimeType = GoogleTypeDateTime::class;
  protected $startTimeDataType = '';

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
  public function setEndTime(GoogleTypeDateTime $endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return GoogleTypeDateTime
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param GoogleTypeDateTime
   */
  public function setStartTime(GoogleTypeDateTime $startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return GoogleTypeDateTime
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePlayDeveloperReportingV1beta1TimelineSpec::class, 'Google_Service_Playdeveloperreporting_GooglePlayDeveloperReportingV1beta1TimelineSpec');
