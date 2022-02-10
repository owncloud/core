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
  /**
   * @var string
   */
  public $id;
  /**
   * @var bool
   */
  public $isReportReady;
  /**
   * @var string
   */
  public $kind;
  protected $requestType = ReportRequest::class;
  protected $requestDataType = '';
  /**
   * @var int
   */
  public $rowCount;
  /**
   * @var array[]
   */
  public $rows;
  /**
   * @var string
   */
  public $statisticsCurrencyCode;
  /**
   * @var string
   */
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
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param bool
   */
  public function setIsReportReady($isReportReady)
  {
    $this->isReportReady = $isReportReady;
  }
  /**
   * @return bool
   */
  public function getIsReportReady()
  {
    return $this->isReportReady;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
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
   * @param array[]
   */
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  /**
   * @return array[]
   */
  public function getRows()
  {
    return $this->rows;
  }
  /**
   * @param string
   */
  public function setStatisticsCurrencyCode($statisticsCurrencyCode)
  {
    $this->statisticsCurrencyCode = $statisticsCurrencyCode;
  }
  /**
   * @return string
   */
  public function getStatisticsCurrencyCode()
  {
    return $this->statisticsCurrencyCode;
  }
  /**
   * @param string
   */
  public function setStatisticsTimeZone($statisticsTimeZone)
  {
    $this->statisticsTimeZone = $statisticsTimeZone;
  }
  /**
   * @return string
   */
  public function getStatisticsTimeZone()
  {
    return $this->statisticsTimeZone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Report::class, 'Google_Service_Doubleclicksearch_Report');
