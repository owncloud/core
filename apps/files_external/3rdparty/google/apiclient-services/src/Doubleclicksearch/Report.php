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

class Report extends \Google\Collection
{
  protected $collection_key = 'rows';
  protected $filesType = ReportFiles::class;
  protected $filesDataType = 'array';
  public $id;
  public $isReportReady;
  public $kind;
  protected $requestType = ReportRequest::class;
  protected $requestDataType = '';
  public $rowCount;
  public $rows;
  public $statisticsCurrencyCode;
  public $statisticsTimeZone;

  /**
   * @param ReportFiles[]
   */
  public function setFiles($files)
  {
    $this->files = $files;
  }
  /**
   * @return ReportFiles[]
   */
  public function getFiles()
  {
    return $this->files;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setIsReportReady($isReportReady)
  {
    $this->isReportReady = $isReportReady;
  }
  public function getIsReportReady()
  {
    return $this->isReportReady;
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
   * @param ReportRequest
   */
  public function setRequest(ReportRequest $request)
  {
    $this->request = $request;
  }
  /**
   * @return ReportRequest
   */
  public function getRequest()
  {
    return $this->request;
  }
  public function setRowCount($rowCount)
  {
    $this->rowCount = $rowCount;
  }
  public function getRowCount()
  {
    return $this->rowCount;
  }
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  public function getRows()
  {
    return $this->rows;
  }
  public function setStatisticsCurrencyCode($statisticsCurrencyCode)
  {
    $this->statisticsCurrencyCode = $statisticsCurrencyCode;
  }
  public function getStatisticsCurrencyCode()
  {
    return $this->statisticsCurrencyCode;
  }
  public function setStatisticsTimeZone($statisticsTimeZone)
  {
    $this->statisticsTimeZone = $statisticsTimeZone;
  }
  public function getStatisticsTimeZone()
  {
    return $this->statisticsTimeZone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Report::class, 'Google_Service_Doubleclicksearch_Report');
