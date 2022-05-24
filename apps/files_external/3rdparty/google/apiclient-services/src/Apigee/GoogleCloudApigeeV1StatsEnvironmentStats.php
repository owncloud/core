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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1StatsEnvironmentStats extends \Google\Collection
{
  protected $collection_key = 'metrics';
  protected $dimensionsType = GoogleCloudApigeeV1DimensionMetric::class;
  protected $dimensionsDataType = 'array';
  protected $metricsType = GoogleCloudApigeeV1Metric::class;
  protected $metricsDataType = 'array';
  /**
   * @var string
   */
  public $name;

  /**
   * @param GoogleCloudApigeeV1DimensionMetric[]
   */
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return GoogleCloudApigeeV1DimensionMetric[]
   */
  public function getDimensions()
  {
    return $this->dimensions;
  }
  /**
   * @param GoogleCloudApigeeV1Metric[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return GoogleCloudApigeeV1Metric[]
   */
  public function getMetrics()
  {
    return $this->metrics;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1StatsEnvironmentStats::class, 'Google_Service_Apigee_GoogleCloudApigeeV1StatsEnvironmentStats');
