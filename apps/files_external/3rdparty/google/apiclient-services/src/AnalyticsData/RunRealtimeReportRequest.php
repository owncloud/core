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

namespace Google\Service\AnalyticsData;

class RunRealtimeReportRequest extends \Google\Collection
{
  protected $collection_key = 'orderBys';
  protected $dimensionFilterType = FilterExpression::class;
  protected $dimensionFilterDataType = '';
  protected $dimensionsType = Dimension::class;
  protected $dimensionsDataType = 'array';
  /**
   * @var string
   */
  public $limit;
  /**
   * @var string[]
   */
  public $metricAggregations;
  protected $metricFilterType = FilterExpression::class;
  protected $metricFilterDataType = '';
  protected $metricsType = Metric::class;
  protected $metricsDataType = 'array';
  protected $minuteRangesType = MinuteRange::class;
  protected $minuteRangesDataType = 'array';
  protected $orderBysType = OrderBy::class;
  protected $orderBysDataType = 'array';
  /**
   * @var bool
   */
  public $returnPropertyQuota;

  /**
   * @param FilterExpression
   */
  public function setDimensionFilter(FilterExpression $dimensionFilter)
  {
    $this->dimensionFilter = $dimensionFilter;
  }
  /**
   * @return FilterExpression
   */
  public function getDimensionFilter()
  {
    return $this->dimensionFilter;
  }
  /**
   * @param Dimension[]
   */
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return Dimension[]
   */
  public function getDimensions()
  {
    return $this->dimensions;
  }
  /**
   * @param string
   */
  public function setLimit($limit)
  {
    $this->limit = $limit;
  }
  /**
   * @return string
   */
  public function getLimit()
  {
    return $this->limit;
  }
  /**
   * @param string[]
   */
  public function setMetricAggregations($metricAggregations)
  {
    $this->metricAggregations = $metricAggregations;
  }
  /**
   * @return string[]
   */
  public function getMetricAggregations()
  {
    return $this->metricAggregations;
  }
  /**
   * @param FilterExpression
   */
  public function setMetricFilter(FilterExpression $metricFilter)
  {
    $this->metricFilter = $metricFilter;
  }
  /**
   * @return FilterExpression
   */
  public function getMetricFilter()
  {
    return $this->metricFilter;
  }
  /**
   * @param Metric[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return Metric[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param MinuteRange[]
   */
  public function setMinuteRanges($minuteRanges)
  {
    $this->minuteRanges = $minuteRanges;
  }
  /**
   * @return MinuteRange[]
   */
  public function getMinuteRanges()
  {
    return $this->minuteRanges;
  }
  /**
   * @param OrderBy[]
   */
  public function setOrderBys($orderBys)
  {
    $this->orderBys = $orderBys;
  }
  /**
   * @return OrderBy[]
   */
  public function getOrderBys()
  {
    return $this->orderBys;
  }
  /**
   * @param bool
   */
  public function setReturnPropertyQuota($returnPropertyQuota)
  {
    $this->returnPropertyQuota = $returnPropertyQuota;
  }
  /**
   * @return bool
   */
  public function getReturnPropertyQuota()
  {
    return $this->returnPropertyQuota;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RunRealtimeReportRequest::class, 'Google_Service_AnalyticsData_RunRealtimeReportRequest');
