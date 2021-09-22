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

class RunRealtimeReportResponse extends \Google\Collection
{
  protected $collection_key = 'totals';
  protected $dimensionHeadersType = DimensionHeader::class;
  protected $dimensionHeadersDataType = 'array';
  public $kind;
  protected $maximumsType = Row::class;
  protected $maximumsDataType = 'array';
  protected $metricHeadersType = MetricHeader::class;
  protected $metricHeadersDataType = 'array';
  protected $minimumsType = Row::class;
  protected $minimumsDataType = 'array';
  protected $propertyQuotaType = PropertyQuota::class;
  protected $propertyQuotaDataType = '';
  public $rowCount;
  protected $rowsType = Row::class;
  protected $rowsDataType = 'array';
  protected $totalsType = Row::class;
  protected $totalsDataType = 'array';

  /**
   * @param DimensionHeader[]
   */
  public function setDimensionHeaders($dimensionHeaders)
  {
    $this->dimensionHeaders = $dimensionHeaders;
  }
  /**
   * @return DimensionHeader[]
   */
  public function getDimensionHeaders()
  {
    return $this->dimensionHeaders;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Row[]
   */
  public function setMaximums($maximums)
  {
    $this->maximums = $maximums;
  }
  /**
   * @return Row[]
   */
  public function getMaximums()
  {
    return $this->maximums;
  }
  /**
   * @param MetricHeader[]
   */
  public function setMetricHeaders($metricHeaders)
  {
    $this->metricHeaders = $metricHeaders;
  }
  /**
   * @return MetricHeader[]
   */
  public function getMetricHeaders()
  {
    return $this->metricHeaders;
  }
  /**
   * @param Row[]
   */
  public function setMinimums($minimums)
  {
    $this->minimums = $minimums;
  }
  /**
   * @return Row[]
   */
  public function getMinimums()
  {
    return $this->minimums;
  }
  /**
   * @param PropertyQuota
   */
  public function setPropertyQuota(PropertyQuota $propertyQuota)
  {
    $this->propertyQuota = $propertyQuota;
  }
  /**
   * @return PropertyQuota
   */
  public function getPropertyQuota()
  {
    return $this->propertyQuota;
  }
  public function setRowCount($rowCount)
  {
    $this->rowCount = $rowCount;
  }
  public function getRowCount()
  {
    return $this->rowCount;
  }
  /**
   * @param Row[]
   */
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  /**
   * @return Row[]
   */
  public function getRows()
  {
    return $this->rows;
  }
  /**
   * @param Row[]
   */
  public function setTotals($totals)
  {
    $this->totals = $totals;
  }
  /**
   * @return Row[]
   */
  public function getTotals()
  {
    return $this->totals;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RunRealtimeReportResponse::class, 'Google_Service_AnalyticsData_RunRealtimeReportResponse');
