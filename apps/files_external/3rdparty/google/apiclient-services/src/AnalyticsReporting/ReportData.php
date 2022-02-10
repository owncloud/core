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
  /**
   * @var string
   */
  public $dataLastRefreshed;
  /**
   * @var string
   */
  public $emptyReason;
  /**
   * @var bool
   */
  public $isDataGolden;
  protected $maximumsType = DateRangeValues::class;
  protected $maximumsDataType = 'array';
  protected $minimumsType = DateRangeValues::class;
  protected $minimumsDataType = 'array';
  /**
   * @var int
   */
  public $rowCount;
  protected $rowsType = ReportRow::class;
  protected $rowsDataType = 'array';
  /**
   * @var string[]
   */
  public $samplesReadCounts;
  /**
   * @var string[]
   */
  public $samplingSpaceSizes;
  protected $totalsType = DateRangeValues::class;
  protected $totalsDataType = 'array';

  /**
   * @param string
   */
  public function setDataLastRefreshed($dataLastRefreshed)
  {
    $this->dataLastRefreshed = $dataLastRefreshed;
  }
  /**
   * @return string
   */
  public function getDataLastRefreshed()
  {
    return $this->dataLastRefreshed;
  }
  /**
   * @param string
   */
  public function setEmptyReason($emptyReason)
  {
    $this->emptyReason = $emptyReason;
  }
  /**
   * @return string
   */
  public function getEmptyReason()
  {
    return $this->emptyReason;
  }
  /**
   * @param bool
   */
  public function setIsDataGolden($isDataGolden)
  {
    $this->isDataGolden = $isDataGolden;
  }
  /**
   * @return bool
   */
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
  /**
   * @param string[]
   */
  public function setSamplesReadCounts($samplesReadCounts)
  {
    $this->samplesReadCounts = $samplesReadCounts;
  }
  /**
   * @return string[]
   */
  public function getSamplesReadCounts()
  {
    return $this->samplesReadCounts;
  }
  /**
   * @param string[]
   */
  public function setSamplingSpaceSizes($samplingSpaceSizes)
  {
    $this->samplingSpaceSizes = $samplingSpaceSizes;
  }
  /**
   * @return string[]
   */
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
