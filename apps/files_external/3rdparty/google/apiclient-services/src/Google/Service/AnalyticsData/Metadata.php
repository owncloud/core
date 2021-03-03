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

class Google_Service_AnalyticsData_Metadata extends Google_Collection
{
  protected $collection_key = 'metrics';
  protected $dimensionsType = 'Google_Service_AnalyticsData_DimensionMetadata';
  protected $dimensionsDataType = 'array';
  protected $metricsType = 'Google_Service_AnalyticsData_MetricMetadata';
  protected $metricsDataType = 'array';
  public $name;

  /**
   * @param Google_Service_AnalyticsData_DimensionMetadata[]
   */
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return Google_Service_AnalyticsData_DimensionMetadata[]
   */
  public function getDimensions()
  {
    return $this->dimensions;
  }
  /**
   * @param Google_Service_AnalyticsData_MetricMetadata[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return Google_Service_AnalyticsData_MetricMetadata[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}
