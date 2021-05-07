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

class Google_Service_Adsense_ReportResult extends Google_Collection
{
  protected $collection_key = 'warnings';
  protected $averagesType = 'Google_Service_Adsense_Row';
  protected $averagesDataType = '';
  protected $endDateType = 'Google_Service_Adsense_Date';
  protected $endDateDataType = '';
  protected $headersType = 'Google_Service_Adsense_Header';
  protected $headersDataType = 'array';
  protected $rowsType = 'Google_Service_Adsense_Row';
  protected $rowsDataType = 'array';
  protected $startDateType = 'Google_Service_Adsense_Date';
  protected $startDateDataType = '';
  public $totalMatchedRows;
  protected $totalsType = 'Google_Service_Adsense_Row';
  protected $totalsDataType = '';
  public $warnings;

  /**
   * @param Google_Service_Adsense_Row
   */
  public function setAverages(Google_Service_Adsense_Row $averages)
  {
    $this->averages = $averages;
  }
  /**
   * @return Google_Service_Adsense_Row
   */
  public function getAverages()
  {
    return $this->averages;
  }
  /**
   * @param Google_Service_Adsense_Date
   */
  public function setEndDate(Google_Service_Adsense_Date $endDate)
  {
    $this->endDate = $endDate;
  }
  /**
   * @return Google_Service_Adsense_Date
   */
  public function getEndDate()
  {
    return $this->endDate;
  }
  /**
   * @param Google_Service_Adsense_Header[]
   */
  public function setHeaders($headers)
  {
    $this->headers = $headers;
  }
  /**
   * @return Google_Service_Adsense_Header[]
   */
  public function getHeaders()
  {
    return $this->headers;
  }
  /**
   * @param Google_Service_Adsense_Row[]
   */
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  /**
   * @return Google_Service_Adsense_Row[]
   */
  public function getRows()
  {
    return $this->rows;
  }
  /**
   * @param Google_Service_Adsense_Date
   */
  public function setStartDate(Google_Service_Adsense_Date $startDate)
  {
    $this->startDate = $startDate;
  }
  /**
   * @return Google_Service_Adsense_Date
   */
  public function getStartDate()
  {
    return $this->startDate;
  }
  public function setTotalMatchedRows($totalMatchedRows)
  {
    $this->totalMatchedRows = $totalMatchedRows;
  }
  public function getTotalMatchedRows()
  {
    return $this->totalMatchedRows;
  }
  /**
   * @param Google_Service_Adsense_Row
   */
  public function setTotals(Google_Service_Adsense_Row $totals)
  {
    $this->totals = $totals;
  }
  /**
   * @return Google_Service_Adsense_Row
   */
  public function getTotals()
  {
    return $this->totals;
  }
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  public function getWarnings()
  {
    return $this->warnings;
  }
}
