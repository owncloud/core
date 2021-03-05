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

class Google_Service_AnalyticsData_RunPivotReportRequest extends Google_Collection
{
  protected $collection_key = 'pivots';
  protected $cohortSpecType = 'Google_Service_AnalyticsData_CohortSpec';
  protected $cohortSpecDataType = '';
  public $currencyCode;
  protected $dateRangesType = 'Google_Service_AnalyticsData_DateRange';
  protected $dateRangesDataType = 'array';
  protected $dimensionFilterType = 'Google_Service_AnalyticsData_FilterExpression';
  protected $dimensionFilterDataType = '';
  protected $dimensionsType = 'Google_Service_AnalyticsData_Dimension';
  protected $dimensionsDataType = 'array';
  protected $entityType = 'Google_Service_AnalyticsData_Entity';
  protected $entityDataType = '';
  public $keepEmptyRows;
  protected $metricFilterType = 'Google_Service_AnalyticsData_FilterExpression';
  protected $metricFilterDataType = '';
  protected $metricsType = 'Google_Service_AnalyticsData_Metric';
  protected $metricsDataType = 'array';
  protected $pivotsType = 'Google_Service_AnalyticsData_Pivot';
  protected $pivotsDataType = 'array';
  public $returnPropertyQuota;

  /**
   * @param Google_Service_AnalyticsData_CohortSpec
   */
  public function setCohortSpec(Google_Service_AnalyticsData_CohortSpec $cohortSpec)
  {
    $this->cohortSpec = $cohortSpec;
  }
  /**
   * @return Google_Service_AnalyticsData_CohortSpec
   */
  public function getCohortSpec()
  {
    return $this->cohortSpec;
  }
  public function setCurrencyCode($currencyCode)
  {
    $this->currencyCode = $currencyCode;
  }
  public function getCurrencyCode()
  {
    return $this->currencyCode;
  }
  /**
   * @param Google_Service_AnalyticsData_DateRange[]
   */
  public function setDateRanges($dateRanges)
  {
    $this->dateRanges = $dateRanges;
  }
  /**
   * @return Google_Service_AnalyticsData_DateRange[]
   */
  public function getDateRanges()
  {
    return $this->dateRanges;
  }
  /**
   * @param Google_Service_AnalyticsData_FilterExpression
   */
  public function setDimensionFilter(Google_Service_AnalyticsData_FilterExpression $dimensionFilter)
  {
    $this->dimensionFilter = $dimensionFilter;
  }
  /**
   * @return Google_Service_AnalyticsData_FilterExpression
   */
  public function getDimensionFilter()
  {
    return $this->dimensionFilter;
  }
  /**
   * @param Google_Service_AnalyticsData_Dimension[]
   */
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return Google_Service_AnalyticsData_Dimension[]
   */
  public function getDimensions()
  {
    return $this->dimensions;
  }
  /**
   * @param Google_Service_AnalyticsData_Entity
   */
  public function setEntity(Google_Service_AnalyticsData_Entity $entity)
  {
    $this->entity = $entity;
  }
  /**
   * @return Google_Service_AnalyticsData_Entity
   */
  public function getEntity()
  {
    return $this->entity;
  }
  public function setKeepEmptyRows($keepEmptyRows)
  {
    $this->keepEmptyRows = $keepEmptyRows;
  }
  public function getKeepEmptyRows()
  {
    return $this->keepEmptyRows;
  }
  /**
   * @param Google_Service_AnalyticsData_FilterExpression
   */
  public function setMetricFilter(Google_Service_AnalyticsData_FilterExpression $metricFilter)
  {
    $this->metricFilter = $metricFilter;
  }
  /**
   * @return Google_Service_AnalyticsData_FilterExpression
   */
  public function getMetricFilter()
  {
    return $this->metricFilter;
  }
  /**
   * @param Google_Service_AnalyticsData_Metric[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return Google_Service_AnalyticsData_Metric[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param Google_Service_AnalyticsData_Pivot[]
   */
  public function setPivots($pivots)
  {
    $this->pivots = $pivots;
  }
  /**
   * @return Google_Service_AnalyticsData_Pivot[]
   */
  public function getPivots()
  {
    return $this->pivots;
  }
  public function setReturnPropertyQuota($returnPropertyQuota)
  {
    $this->returnPropertyQuota = $returnPropertyQuota;
  }
  public function getReturnPropertyQuota()
  {
    return $this->returnPropertyQuota;
  }
}
