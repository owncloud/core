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

class Google_Service_Sheets_TreemapChartSpec extends Google_Model
{
  protected $colorDataType = 'Google_Service_Sheets_ChartData';
  protected $colorDataDataType = '';
  protected $colorScaleType = 'Google_Service_Sheets_TreemapChartColorScale';
  protected $colorScaleDataType = '';
  protected $headerColorType = 'Google_Service_Sheets_Color';
  protected $headerColorDataType = '';
  protected $headerColorStyleType = 'Google_Service_Sheets_ColorStyle';
  protected $headerColorStyleDataType = '';
  public $hideTooltips;
  public $hintedLevels;
  protected $labelsType = 'Google_Service_Sheets_ChartData';
  protected $labelsDataType = '';
  public $levels;
  public $maxValue;
  public $minValue;
  protected $parentLabelsType = 'Google_Service_Sheets_ChartData';
  protected $parentLabelsDataType = '';
  protected $sizeDataType = 'Google_Service_Sheets_ChartData';
  protected $sizeDataDataType = '';
  protected $textFormatType = 'Google_Service_Sheets_TextFormat';
  protected $textFormatDataType = '';

  /**
   * @param Google_Service_Sheets_ChartData
   */
  public function setColorData(Google_Service_Sheets_ChartData $colorData)
  {
    $this->colorData = $colorData;
  }
  /**
   * @return Google_Service_Sheets_ChartData
   */
  public function getColorData()
  {
    return $this->colorData;
  }
  /**
   * @param Google_Service_Sheets_TreemapChartColorScale
   */
  public function setColorScale(Google_Service_Sheets_TreemapChartColorScale $colorScale)
  {
    $this->colorScale = $colorScale;
  }
  /**
   * @return Google_Service_Sheets_TreemapChartColorScale
   */
  public function getColorScale()
  {
    return $this->colorScale;
  }
  /**
   * @param Google_Service_Sheets_Color
   */
  public function setHeaderColor(Google_Service_Sheets_Color $headerColor)
  {
    $this->headerColor = $headerColor;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getHeaderColor()
  {
    return $this->headerColor;
  }
  /**
   * @param Google_Service_Sheets_ColorStyle
   */
  public function setHeaderColorStyle(Google_Service_Sheets_ColorStyle $headerColorStyle)
  {
    $this->headerColorStyle = $headerColorStyle;
  }
  /**
   * @return Google_Service_Sheets_ColorStyle
   */
  public function getHeaderColorStyle()
  {
    return $this->headerColorStyle;
  }
  public function setHideTooltips($hideTooltips)
  {
    $this->hideTooltips = $hideTooltips;
  }
  public function getHideTooltips()
  {
    return $this->hideTooltips;
  }
  public function setHintedLevels($hintedLevels)
  {
    $this->hintedLevels = $hintedLevels;
  }
  public function getHintedLevels()
  {
    return $this->hintedLevels;
  }
  /**
   * @param Google_Service_Sheets_ChartData
   */
  public function setLabels(Google_Service_Sheets_ChartData $labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return Google_Service_Sheets_ChartData
   */
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLevels($levels)
  {
    $this->levels = $levels;
  }
  public function getLevels()
  {
    return $this->levels;
  }
  public function setMaxValue($maxValue)
  {
    $this->maxValue = $maxValue;
  }
  public function getMaxValue()
  {
    return $this->maxValue;
  }
  public function setMinValue($minValue)
  {
    $this->minValue = $minValue;
  }
  public function getMinValue()
  {
    return $this->minValue;
  }
  /**
   * @param Google_Service_Sheets_ChartData
   */
  public function setParentLabels(Google_Service_Sheets_ChartData $parentLabels)
  {
    $this->parentLabels = $parentLabels;
  }
  /**
   * @return Google_Service_Sheets_ChartData
   */
  public function getParentLabels()
  {
    return $this->parentLabels;
  }
  /**
   * @param Google_Service_Sheets_ChartData
   */
  public function setSizeData(Google_Service_Sheets_ChartData $sizeData)
  {
    $this->sizeData = $sizeData;
  }
  /**
   * @return Google_Service_Sheets_ChartData
   */
  public function getSizeData()
  {
    return $this->sizeData;
  }
  /**
   * @param Google_Service_Sheets_TextFormat
   */
  public function setTextFormat(Google_Service_Sheets_TextFormat $textFormat)
  {
    $this->textFormat = $textFormat;
  }
  /**
   * @return Google_Service_Sheets_TextFormat
   */
  public function getTextFormat()
  {
    return $this->textFormat;
  }
}
