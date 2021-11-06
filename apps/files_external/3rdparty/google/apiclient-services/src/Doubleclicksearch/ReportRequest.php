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
  public $downloadFormat;
  protected $filtersType = ReportRequestFilters::class;
  protected $filtersDataType = 'array';
  public $includeDeletedEntities;
  public $includeRemovedEntities;
  public $maxRowsPerFile;
  protected $orderByType = ReportRequestOrderBy::class;
  protected $orderByDataType = 'array';
  protected $reportScopeType = ReportRequestReportScope::class;
  protected $reportScopeDataType = '';
  public $reportType;
  public $rowCount;
  public $startRow;
  public $statisticsCurrency;
  protected $timeRangeType = ReportRequestTimeRange::class;
  protected $timeRangeDataType = '';
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
  public function setDownloadFormat($downloadFormat)
  {
    $this->downloadFormat = $downloadFormat;
  }
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
  public function setIncludeDeletedEntities($includeDeletedEntities)
  {
    $this->includeDeletedEntities = $includeDeletedEntities;
  }
  public function getIncludeDeletedEntities()
  {
    return $this->includeDeletedEntities;
  }
  public function setIncludeRemovedEntities($includeRemovedEntities)
  {
    $this->includeRemovedEntities = $includeRemovedEntities;
  }
  public function getIncludeRemovedEntities()
  {
    return $this->includeRemovedEntities;
  }
  public function setMaxRowsPerFile($maxRowsPerFile)
  {
    $this->maxRowsPerFile = $maxRowsPerFile;
  }
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
  public function setReportType($reportType)
  {
    $this->reportType = $reportType;
  }
  public function getReportType()
  {
    return $this->reportType;
  }
  public function setRowCount($rowCount)
  {
    $this->rowCount = $rowCount;
  }
  public function getRowCount()
  {
    return $this->rowCount;
  }
  public function setStartRow($startRow)
  {
    $this->startRow = $startRow;
  }
  public function getStartRow()
  {
    return $this->startRow;
  }
  public function setStatisticsCurrency($statisticsCurrency)
  {
    $this->statisticsCurrency = $statisticsCurrency;
  }
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
  public function setVerifySingleTimeZone($verifySingleTimeZone)
  {
    $this->verifySingleTimeZone = $verifySingleTimeZone;
  }
  public function getVerifySingleTimeZone()
  {
    return $this->verifySingleTimeZone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReportRequest::class, 'Google_Service_Doubleclicksearch_ReportRequest');
