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

namespace Google\Service\GoogleAnalyticsAdmin;

class GoogleAnalyticsAdminV1alphaRunAccessReportRequest extends \Google\Collection
{
  protected $collection_key = 'orderBys';
  protected $dateRangesType = GoogleAnalyticsAdminV1alphaAccessDateRange::class;
  protected $dateRangesDataType = 'array';
  protected $dimensionFilterType = GoogleAnalyticsAdminV1alphaAccessFilterExpression::class;
  protected $dimensionFilterDataType = '';
  protected $dimensionsType = GoogleAnalyticsAdminV1alphaAccessDimension::class;
  protected $dimensionsDataType = 'array';
  /**
   * @var string
   */
  public $limit;
  protected $metricFilterType = GoogleAnalyticsAdminV1alphaAccessFilterExpression::class;
  protected $metricFilterDataType = '';
  protected $metricsType = GoogleAnalyticsAdminV1alphaAccessMetric::class;
  protected $metricsDataType = 'array';
  /**
   * @var string
   */
  public $offset;
  protected $orderBysType = GoogleAnalyticsAdminV1alphaAccessOrderBy::class;
  protected $orderBysDataType = 'array';
  /**
   * @var bool
   */
  public $returnEntityQuota;
  /**
   * @var string
   */
  public $timeZone;

  /**
   * @param GoogleAnalyticsAdminV1alphaAccessDateRange[]
   */
  public function setDateRanges($dateRanges)
  {
    $this->dateRanges = $dateRanges;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaAccessDateRange[]
   */
  public function getDateRanges()
  {
    return $this->dateRanges;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaAccessFilterExpression
   */
  public function setDimensionFilter(GoogleAnalyticsAdminV1alphaAccessFilterExpression $dimensionFilter)
  {
    $this->dimensionFilter = $dimensionFilter;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaAccessFilterExpression
   */
  public function getDimensionFilter()
  {
    return $this->dimensionFilter;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaAccessDimension[]
   */
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaAccessDimension[]
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
   * @param GoogleAnalyticsAdminV1alphaAccessFilterExpression
   */
  public function setMetricFilter(GoogleAnalyticsAdminV1alphaAccessFilterExpression $metricFilter)
  {
    $this->metricFilter = $metricFilter;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaAccessFilterExpression
   */
  public function getMetricFilter()
  {
    return $this->metricFilter;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaAccessMetric[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaAccessMetric[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param string
   */
  public function setOffset($offset)
  {
    $this->offset = $offset;
  }
  /**
   * @return string
   */
  public function getOffset()
  {
    return $this->offset;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaAccessOrderBy[]
   */
  public function setOrderBys($orderBys)
  {
    $this->orderBys = $orderBys;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaAccessOrderBy[]
   */
  public function getOrderBys()
  {
    return $this->orderBys;
  }
  /**
   * @param bool
   */
  public function setReturnEntityQuota($returnEntityQuota)
  {
    $this->returnEntityQuota = $returnEntityQuota;
  }
  /**
   * @return bool
   */
  public function getReturnEntityQuota()
  {
    return $this->returnEntityQuota;
  }
  /**
   * @param string
   */
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  /**
   * @return string
   */
  public function getTimeZone()
  {
    return $this->timeZone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaRunAccessReportRequest::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaRunAccessReportRequest');
