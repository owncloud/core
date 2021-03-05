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

class Google_Service_Sheets_WaterfallChartSeries extends Google_Collection
{
  protected $collection_key = 'customSubtotals';
  protected $customSubtotalsType = 'Google_Service_Sheets_WaterfallChartCustomSubtotal';
  protected $customSubtotalsDataType = 'array';
  protected $dataType = 'Google_Service_Sheets_ChartData';
  protected $dataDataType = '';
  protected $dataLabelType = 'Google_Service_Sheets_DataLabel';
  protected $dataLabelDataType = '';
  public $hideTrailingSubtotal;
  protected $negativeColumnsStyleType = 'Google_Service_Sheets_WaterfallChartColumnStyle';
  protected $negativeColumnsStyleDataType = '';
  protected $positiveColumnsStyleType = 'Google_Service_Sheets_WaterfallChartColumnStyle';
  protected $positiveColumnsStyleDataType = '';
  protected $subtotalColumnsStyleType = 'Google_Service_Sheets_WaterfallChartColumnStyle';
  protected $subtotalColumnsStyleDataType = '';

  /**
   * @param Google_Service_Sheets_WaterfallChartCustomSubtotal[]
   */
  public function setCustomSubtotals($customSubtotals)
  {
    $this->customSubtotals = $customSubtotals;
  }
  /**
   * @return Google_Service_Sheets_WaterfallChartCustomSubtotal[]
   */
  public function getCustomSubtotals()
  {
    return $this->customSubtotals;
  }
  /**
   * @param Google_Service_Sheets_ChartData
   */
  public function setData(Google_Service_Sheets_ChartData $data)
  {
    $this->data = $data;
  }
  /**
   * @return Google_Service_Sheets_ChartData
   */
  public function getData()
  {
    return $this->data;
  }
  /**
   * @param Google_Service_Sheets_DataLabel
   */
  public function setDataLabel(Google_Service_Sheets_DataLabel $dataLabel)
  {
    $this->dataLabel = $dataLabel;
  }
  /**
   * @return Google_Service_Sheets_DataLabel
   */
  public function getDataLabel()
  {
    return $this->dataLabel;
  }
  public function setHideTrailingSubtotal($hideTrailingSubtotal)
  {
    $this->hideTrailingSubtotal = $hideTrailingSubtotal;
  }
  public function getHideTrailingSubtotal()
  {
    return $this->hideTrailingSubtotal;
  }
  /**
   * @param Google_Service_Sheets_WaterfallChartColumnStyle
   */
  public function setNegativeColumnsStyle(Google_Service_Sheets_WaterfallChartColumnStyle $negativeColumnsStyle)
  {
    $this->negativeColumnsStyle = $negativeColumnsStyle;
  }
  /**
   * @return Google_Service_Sheets_WaterfallChartColumnStyle
   */
  public function getNegativeColumnsStyle()
  {
    return $this->negativeColumnsStyle;
  }
  /**
   * @param Google_Service_Sheets_WaterfallChartColumnStyle
   */
  public function setPositiveColumnsStyle(Google_Service_Sheets_WaterfallChartColumnStyle $positiveColumnsStyle)
  {
    $this->positiveColumnsStyle = $positiveColumnsStyle;
  }
  /**
   * @return Google_Service_Sheets_WaterfallChartColumnStyle
   */
  public function getPositiveColumnsStyle()
  {
    return $this->positiveColumnsStyle;
  }
  /**
   * @param Google_Service_Sheets_WaterfallChartColumnStyle
   */
  public function setSubtotalColumnsStyle(Google_Service_Sheets_WaterfallChartColumnStyle $subtotalColumnsStyle)
  {
    $this->subtotalColumnsStyle = $subtotalColumnsStyle;
  }
  /**
   * @return Google_Service_Sheets_WaterfallChartColumnStyle
   */
  public function getSubtotalColumnsStyle()
  {
    return $this->subtotalColumnsStyle;
  }
}
