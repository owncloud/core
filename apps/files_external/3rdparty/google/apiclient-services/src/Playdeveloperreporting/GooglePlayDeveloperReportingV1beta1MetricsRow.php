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

class GooglePlayDeveloperReportingV1beta1MetricsRow extends \Google\Collection
{
  protected $collection_key = 'metrics';
  /**
   * @var string
   */
  public $aggregationPeriod;
  protected $dimensionsType = GooglePlayDeveloperReportingV1beta1DimensionValue::class;
  protected $dimensionsDataType = 'array';
  protected $metricsType = GooglePlayDeveloperReportingV1beta1MetricValue::class;
  protected $metricsDataType = 'array';
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
   * @param GooglePlayDeveloperReportingV1beta1DimensionValue[]
   */
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return GooglePlayDeveloperReportingV1beta1DimensionValue[]
   */
  public function getDimensions()
  {
    return $this->dimensions;
  }
  /**
   * @param GooglePlayDeveloperReportingV1beta1MetricValue[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return GooglePlayDeveloperReportingV1beta1MetricValue[]
   */
  public function getMetrics()
  {
    return $this->metrics;
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
class_alias(GooglePlayDeveloperReportingV1beta1MetricsRow::class, 'Google_Service_Playdeveloperreporting_GooglePlayDeveloperReportingV1beta1MetricsRow');
