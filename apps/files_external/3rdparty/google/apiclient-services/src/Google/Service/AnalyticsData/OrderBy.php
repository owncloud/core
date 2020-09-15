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

class Google_Service_AnalyticsData_OrderBy extends Google_Model
{
  public $desc;
  protected $dimensionType = 'Google_Service_AnalyticsData_DimensionOrderBy';
  protected $dimensionDataType = '';
  protected $metricType = 'Google_Service_AnalyticsData_MetricOrderBy';
  protected $metricDataType = '';
  protected $pivotType = 'Google_Service_AnalyticsData_PivotOrderBy';
  protected $pivotDataType = '';

  public function setDesc($desc)
  {
    $this->desc = $desc;
  }
  public function getDesc()
  {
    return $this->desc;
  }
  /**
   * @param Google_Service_AnalyticsData_DimensionOrderBy
   */
  public function setDimension(Google_Service_AnalyticsData_DimensionOrderBy $dimension)
  {
    $this->dimension = $dimension;
  }
  /**
   * @return Google_Service_AnalyticsData_DimensionOrderBy
   */
  public function getDimension()
  {
    return $this->dimension;
  }
  /**
   * @param Google_Service_AnalyticsData_MetricOrderBy
   */
  public function setMetric(Google_Service_AnalyticsData_MetricOrderBy $metric)
  {
    $this->metric = $metric;
  }
  /**
   * @return Google_Service_AnalyticsData_MetricOrderBy
   */
  public function getMetric()
  {
    return $this->metric;
  }
  /**
   * @param Google_Service_AnalyticsData_PivotOrderBy
   */
  public function setPivot(Google_Service_AnalyticsData_PivotOrderBy $pivot)
  {
    $this->pivot = $pivot;
  }
  /**
   * @return Google_Service_AnalyticsData_PivotOrderBy
   */
  public function getPivot()
  {
    return $this->pivot;
  }
}
