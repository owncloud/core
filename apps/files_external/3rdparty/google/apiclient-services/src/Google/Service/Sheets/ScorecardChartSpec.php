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

class Google_Service_Sheets_ScorecardChartSpec extends Google_Model
{
  public $aggregateType;
  protected $baselineValueDataType = 'Google_Service_Sheets_ChartData';
  protected $baselineValueDataDataType = '';
  protected $baselineValueFormatType = 'Google_Service_Sheets_BaselineValueFormat';
  protected $baselineValueFormatDataType = '';
  protected $customFormatOptionsType = 'Google_Service_Sheets_ChartCustomNumberFormatOptions';
  protected $customFormatOptionsDataType = '';
  protected $keyValueDataType = 'Google_Service_Sheets_ChartData';
  protected $keyValueDataDataType = '';
  protected $keyValueFormatType = 'Google_Service_Sheets_KeyValueFormat';
  protected $keyValueFormatDataType = '';
  public $numberFormatSource;
  public $scaleFactor;

  public function setAggregateType($aggregateType)
  {
    $this->aggregateType = $aggregateType;
  }
  public function getAggregateType()
  {
    return $this->aggregateType;
  }
  /**
   * @param Google_Service_Sheets_ChartData
   */
  public function setBaselineValueData(Google_Service_Sheets_ChartData $baselineValueData)
  {
    $this->baselineValueData = $baselineValueData;
  }
  /**
   * @return Google_Service_Sheets_ChartData
   */
  public function getBaselineValueData()
  {
    return $this->baselineValueData;
  }
  /**
   * @param Google_Service_Sheets_BaselineValueFormat
   */
  public function setBaselineValueFormat(Google_Service_Sheets_BaselineValueFormat $baselineValueFormat)
  {
    $this->baselineValueFormat = $baselineValueFormat;
  }
  /**
   * @return Google_Service_Sheets_BaselineValueFormat
   */
  public function getBaselineValueFormat()
  {
    return $this->baselineValueFormat;
  }
  /**
   * @param Google_Service_Sheets_ChartCustomNumberFormatOptions
   */
  public function setCustomFormatOptions(Google_Service_Sheets_ChartCustomNumberFormatOptions $customFormatOptions)
  {
    $this->customFormatOptions = $customFormatOptions;
  }
  /**
   * @return Google_Service_Sheets_ChartCustomNumberFormatOptions
   */
  public function getCustomFormatOptions()
  {
    return $this->customFormatOptions;
  }
  /**
   * @param Google_Service_Sheets_ChartData
   */
  public function setKeyValueData(Google_Service_Sheets_ChartData $keyValueData)
  {
    $this->keyValueData = $keyValueData;
  }
  /**
   * @return Google_Service_Sheets_ChartData
   */
  public function getKeyValueData()
  {
    return $this->keyValueData;
  }
  /**
   * @param Google_Service_Sheets_KeyValueFormat
   */
  public function setKeyValueFormat(Google_Service_Sheets_KeyValueFormat $keyValueFormat)
  {
    $this->keyValueFormat = $keyValueFormat;
  }
  /**
   * @return Google_Service_Sheets_KeyValueFormat
   */
  public function getKeyValueFormat()
  {
    return $this->keyValueFormat;
  }
  public function setNumberFormatSource($numberFormatSource)
  {
    $this->numberFormatSource = $numberFormatSource;
  }
  public function getNumberFormatSource()
  {
    return $this->numberFormatSource;
  }
  public function setScaleFactor($scaleFactor)
  {
    $this->scaleFactor = $scaleFactor;
  }
  public function getScaleFactor()
  {
    return $this->scaleFactor;
  }
}
