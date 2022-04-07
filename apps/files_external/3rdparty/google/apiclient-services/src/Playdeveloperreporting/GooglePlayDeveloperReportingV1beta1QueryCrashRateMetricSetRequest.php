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

class GooglePlayDeveloperReportingV1beta1QueryCrashRateMetricSetRequest extends \Google\Collection
{
  protected $collection_key = 'metrics';
  /**
   * @var string[]
   */
  public $dimensions;
  /**
   * @var string
   */
  public $filter;
  /**
   * @var string[]
   */
  public $metrics;
  /**
   * @var int
   */
  public $pageSize;
  /**
   * @var string
   */
  public $pageToken;
  protected $timelineSpecType = GooglePlayDeveloperReportingV1beta1TimelineSpec::class;
  protected $timelineSpecDataType = '';

  /**
   * @param string[]
   */
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return string[]
   */
  public function getDimensions()
  {
    return $this->dimensions;
  }
  /**
   * @param string
   */
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  /**
   * @return string
   */
  public function getFilter()
  {
    return $this->filter;
  }
  /**
   * @param string[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return string[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param int
   */
  public function setPageSize($pageSize)
  {
    $this->pageSize = $pageSize;
  }
  /**
   * @return int
   */
  public function getPageSize()
  {
    return $this->pageSize;
  }
  /**
   * @param string
   */
  public function setPageToken($pageToken)
  {
    $this->pageToken = $pageToken;
  }
  /**
   * @return string
   */
  public function getPageToken()
  {
    return $this->pageToken;
  }
  /**
   * @param GooglePlayDeveloperReportingV1beta1TimelineSpec
   */
  public function setTimelineSpec(GooglePlayDeveloperReportingV1beta1TimelineSpec $timelineSpec)
  {
    $this->timelineSpec = $timelineSpec;
  }
  /**
   * @return GooglePlayDeveloperReportingV1beta1TimelineSpec
   */
  public function getTimelineSpec()
  {
    return $this->timelineSpec;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePlayDeveloperReportingV1beta1QueryCrashRateMetricSetRequest::class, 'Google_Service_Playdeveloperreporting_GooglePlayDeveloperReportingV1beta1QueryCrashRateMetricSetRequest');
