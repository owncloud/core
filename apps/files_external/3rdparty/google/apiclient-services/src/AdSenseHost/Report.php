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

namespace Google\Service\AdSenseHost;

class Report extends \Google\Collection
{
  protected $collection_key = 'warnings';
  /**
   * @var string[]
   */
  public $averages;
  protected $headersType = ReportHeaders::class;
  protected $headersDataType = 'array';
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string[]
   */
  public $rows;
  /**
   * @var string
   */
  public $totalMatchedRows;
  /**
   * @var string[]
   */
  public $totals;
  /**
   * @var string[]
   */
  public $warnings;

  /**
   * @param string[]
   */
  public function setAverages($averages)
  {
    $this->averages = $averages;
  }
  /**
   * @return string[]
   */
  public function getAverages()
  {
    return $this->averages;
  }
  /**
   * @param ReportHeaders[]
   */
  public function setHeaders($headers)
  {
    $this->headers = $headers;
  }
  /**
   * @return ReportHeaders[]
   */
  public function getHeaders()
  {
    return $this->headers;
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
   * @param string[]
   */
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  /**
   * @return string[]
   */
  public function getRows()
  {
    return $this->rows;
  }
  /**
   * @param string
   */
  public function setTotalMatchedRows($totalMatchedRows)
  {
    $this->totalMatchedRows = $totalMatchedRows;
  }
  /**
   * @return string
   */
  public function getTotalMatchedRows()
  {
    return $this->totalMatchedRows;
  }
  /**
   * @param string[]
   */
  public function setTotals($totals)
  {
    $this->totals = $totals;
  }
  /**
   * @return string[]
   */
  public function getTotals()
  {
    return $this->totals;
  }
  /**
   * @param string[]
   */
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  /**
   * @return string[]
   */
  public function getWarnings()
  {
    return $this->warnings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Report::class, 'Google_Service_AdSenseHost_Report');
