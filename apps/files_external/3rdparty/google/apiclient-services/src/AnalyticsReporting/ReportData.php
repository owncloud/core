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

namespace Google\Service\AnalyticsReporting;

class ReportData extends \Google\Collection
{
  protected $collection_key = 'totals';
  public $dataLastRefreshed;
  public $emptyReason;
  public $isDataGolden;
  protected $maximumsType = DateRangeValues::class;
  protected $maximumsDataType = 'array';
  protected $minimumsType = DateRangeValues::class;
  protected $minimumsDataType = 'array';
  public $rowCount;
  protected $rowsType = ReportRow::class;
  protected $rowsDataType = 'array';
  public $samplesReadCounts;
  public $samplingSpaceSizes;
  protected $totalsType = DateRangeValues::class;
  protected $totalsDataType = 'array';

  public function setDataLastRefreshed($dataLastRefreshed)
  {
    $this->dataLastRefreshed = $dataLastRefreshed;
  }
  public function getDataLastRefreshed()
  {
    return $this->dataLastRefreshed;
  }
  public function setEmptyReason($emptyReason)
  {
    $this->emptyReason = $emptyReason;
  }
  public function getEmptyReason()
  {
    return $this->emptyReason;
  }
  public function setIsDataGolden($isDataGolden)
  {
    $this->isDataGolden = $isDataGolden;
  }
  public function getIsDataGolden()
  {
    return $this->isDataGolden;
  }
  /**
   * @param DateRangeValues[]
   */
  public function setMaximums($maximums)
  {
    $this->maximums = $maximums;
  }
  /**
   * @return DateRangeValues[]
   */
  public function getMaximums()
  {
    return $this->maximums;
  }
  /**
   * @param DateRangeValues[]
   */
  public function setMinimums($minimums)
  {
    $this->minimums = $minimums;
  }
  /**
   * @return DateRangeValues[]
   */
  public function getMinimums()
  {
    return $this->minimums;
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
   * @param ReportRow[]
   */
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  /**
   * @return ReportRow[]
   */
  public function getRows()
  {
    return $this->rows;
  }
  public function setSamplesReadCounts($samplesReadCounts)
  {
    $this->samplesReadCounts = $samplesReadCounts;
  }
  public function getSamplesReadCounts()
  {
    return $this->samplesReadCounts;
  }
  public function setSamplingSpaceSizes($samplingSpaceSizes)
  {
    $this->samplingSpaceSizes = $samplingSpaceSizes;
  }
  public function getSamplingSpaceSizes()
  {
    return $this->samplingSpaceSizes;
  }
  /**
   * @param DateRangeValues[]
   */
  public function setTotals($totals)
  {
    $this->totals = $totals;
  }
  /**
   * @return DateRangeValues[]
   */
  public function getTotals()
  {
    return $this->totals;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReportData::class, 'Google_Service_AnalyticsReporting_ReportData');
