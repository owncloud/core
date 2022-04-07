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

class GooglePlayDeveloperReportingV1beta1Anomaly extends \Google\Collection
{
  protected $collection_key = 'dimensions';
  protected $dimensionsType = GooglePlayDeveloperReportingV1beta1DimensionValue::class;
  protected $dimensionsDataType = 'array';
  protected $metricType = GooglePlayDeveloperReportingV1beta1MetricValue::class;
  protected $metricDataType = '';
  /**
   * @var string
   */
  public $metricSet;
  /**
   * @var string
   */
  public $name;
  protected $timelineSpecType = GooglePlayDeveloperReportingV1beta1TimelineSpec::class;
  protected $timelineSpecDataType = '';

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
   * @param GooglePlayDeveloperReportingV1beta1MetricValue
   */
  public function setMetric(GooglePlayDeveloperReportingV1beta1MetricValue $metric)
  {
    $this->metric = $metric;
  }
  /**
   * @return GooglePlayDeveloperReportingV1beta1MetricValue
   */
  public function getMetric()
  {
    return $this->metric;
  }
  /**
   * @param string
   */
  public function setMetricSet($metricSet)
  {
    $this->metricSet = $metricSet;
  }
  /**
   * @return string
   */
  public function getMetricSet()
  {
    return $this->metricSet;
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
class_alias(GooglePlayDeveloperReportingV1beta1Anomaly::class, 'Google_Service_Playdeveloperreporting_GooglePlayDeveloperReportingV1beta1Anomaly');
