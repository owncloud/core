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

namespace Google\Service\Doubleclicksearch;

class ReportRequest extends \Google\Collection
{
  protected $collection_key = 'orderBy';
  protected $columnsType = ReportApiColumnSpec::class;
  protected $columnsDataType = 'array';
  /**
   * @var string
   */
  public $downloadFormat;
  protected $filtersType = ReportRequestFilters::class;
  protected $filtersDataType = 'array';
  /**
   * @var bool
   */
  public $includeDeletedEntities;
  /**
   * @var bool
   */
  public $includeRemovedEntities;
  /**
   * @var int
   */
  public $maxRowsPerFile;
  protected $orderByType = ReportRequestOrderBy::class;
  protected $orderByDataType = 'array';
  protected $reportScopeType = ReportRequestReportScope::class;
  protected $reportScopeDataType = '';
  /**
   * @var string
   */
  public $reportType;
  /**
   * @var int
   */
  public $rowCount;
  /**
   * @var int
   */
  public $startRow;
  /**
   * @var string
   */
  public $statisticsCurrency;
  protected $timeRangeType = ReportRequestTimeRange::class;
  protected $timeRangeDataType = '';
  /**
   * @var bool
   */
  public $verifySingleTimeZone;

  /**
   * @param ReportApiColumnSpec[]
   */
  public function setColumns($columns)
  {
    $this->columns = $columns;
  }
  /**
   * @return ReportApiColumnSpec[]
   */
  public function getColumns()
  {
    return $this->columns;
  }
  /**
   * @param string
   */
  public function setDownloadFormat($downloadFormat)
  {
    $this->downloadFormat = $downloadFormat;
  }
  /**
   * @return string
   */
  public function getDownloadFormat()
  {
    return $this->downloadFormat;
  }
  /**
   * @param ReportRequestFilters[]
   */
  public function setFilters($filters)
  {
    $this->filters = $filters;
  }
  /**
   * @return ReportRequestFilters[]
   */
  public function getFilters()
  {
    return $this->filters;
  }
  /**
   * @param bool
   */
  public function setIncludeDeletedEntities($includeDeletedEntities)
  {
    $this->includeDeletedEntities = $includeDeletedEntities;
  }
  /**
   * @return bool
   */
  public function getIncludeDeletedEntities()
  {
    return $this->includeDeletedEntities;
  }
  /**
   * @param bool
   */
  public function setIncludeRemovedEntities($includeRemovedEntities)
  {
    $this->includeRemovedEntities = $includeRemovedEntities;
  }
  /**
   * @return bool
   */
  public function getIncludeRemovedEntities()
  {
    return $this->includeRemovedEntities;
  }
  /**
   * @param int
   */
  public function setMaxRowsPerFile($maxRowsPerFile)
  {
    $this->maxRowsPerFile = $maxRowsPerFile;
  }
  /**
   * @return int
   */
  public function getMaxRowsPerFile()
  {
    return $this->maxRowsPerFile;
  }
  /**
   * @param ReportRequestOrderBy[]
   */
  public function setOrderBy($orderBy)
  {
    $this->orderBy = $orderBy;
  }
  /**
   * @return ReportRequestOrderBy[]
   */
  public function getOrderBy()
  {
    return $this->orderBy;
  }
  /**
   * @param ReportRequestReportScope
   */
  public function setReportScope(ReportRequestReportScope $reportScope)
  {
    $this->reportScope = $reportScope;
  }
  /**
   * @return ReportRequestReportScope
   */
  public function getReportScope()
  {
    return $this->reportScope;
  }
  /**
   * @param string
   */
  public function setReportType($reportType)
  {
    $this->reportType = $reportType;
  }
  /**
   * @return string
   */
  public function getReportType()
  {
    return $this->reportType;
  }
  /**
   * @param int
   */
  public function setRowCount($rowCount)
  {
    $this->rowCount = $rowCount;
  }
  /**
   * @return int
   */
  public function getRowCount()
  {
    return $this->rowCount;
  }
  /**
   * @param int
   */
  public function setStartRow($startRow)
  {
    $this->startRow = $startRow;
  }
  /**
   * @return int
   */
  public function getStartRow()
  {
    return $this->startRow;
  }
  /**
   * @param string
   */
  public function setStatisticsCurrency($statisticsCurrency)
  {
    $this->statisticsCurrency = $statisticsCurrency;
  }
  /**
   * @return string
   */
  public function getStatisticsCurrency()
  {
    return $this->statisticsCurrency;
  }
  /**
   * @param ReportRequestTimeRange
   */
  public function setTimeRange(ReportRequestTimeRange $timeRange)
  {
    $this->timeRange = $timeRange;
  }
  /**
   * @return ReportRequestTimeRange
   */
  public function getTimeRange()
  {
    return $this->timeRange;
  }
  /**
   * @param bool
   */
  public function setVerifySingleTimeZone($verifySingleTimeZone)
  {
    $this->verifySingleTimeZone = $verifySingleTimeZone;
  }
  /**
   * @return bool
   */
  public function getVerifySingleTimeZone()
  {
    return $this->verifySingleTimeZone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReportRequest::class, 'Google_Service_Doubleclicksearch_ReportRequest');
