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

namespace Google\Service\Sheets;

class TreemapChartSpec extends \Google\Model
{
  protected $colorDataType = ChartData::class;
  protected $colorDataDataType = '';
  protected $colorScaleType = TreemapChartColorScale::class;
  protected $colorScaleDataType = '';
  protected $headerColorType = Color::class;
  protected $headerColorDataType = '';
  protected $headerColorStyleType = ColorStyle::class;
  protected $headerColorStyleDataType = '';
  /**
   * @var bool
   */
  public $hideTooltips;
  /**
   * @var int
   */
  public $hintedLevels;
  protected $labelsType = ChartData::class;
  protected $labelsDataType = '';
  /**
   * @var int
   */
  public $levels;
  public $maxValue;
  public $minValue;
  protected $parentLabelsType = ChartData::class;
  protected $parentLabelsDataType = '';
  protected $sizeDataType = ChartData::class;
  protected $sizeDataDataType = '';
  protected $textFormatType = TextFormat::class;
  protected $textFormatDataType = '';

  /**
   * @param ChartData
   */
  public function setColorData(ChartData $colorData)
  {
    $this->colorData = $colorData;
  }
  /**
   * @return ChartData
   */
  public function getColorData()
  {
    return $this->colorData;
  }
  /**
   * @param TreemapChartColorScale
   */
  public function setColorScale(TreemapChartColorScale $colorScale)
  {
    $this->colorScale = $colorScale;
  }
  /**
   * @return TreemapChartColorScale
   */
  public function getColorScale()
  {
    return $this->colorScale;
  }
  /**
   * @param Color
   */
  public function setHeaderColor(Color $headerColor)
  {
    $this->headerColor = $headerColor;
  }
  /**
   * @return Color
   */
  public function getHeaderColor()
  {
    return $this->headerColor;
  }
  /**
   * @param ColorStyle
   */
  public function setHeaderColorStyle(ColorStyle $headerColorStyle)
  {
    $this->headerColorStyle = $headerColorStyle;
  }
  /**
   * @return ColorStyle
   */
  public function getHeaderColorStyle()
  {
    return $this->headerColorStyle;
  }
  /**
   * @param bool
   */
  public function setHideTooltips($hideTooltips)
  {
    $this->hideTooltips = $hideTooltips;
  }
  /**
   * @return bool
   */
  public function getHideTooltips()
  {
    return $this->hideTooltips;
  }
  /**
   * @param int
   */
  public function setHintedLevels($hintedLevels)
  {
    $this->hintedLevels = $hintedLevels;
  }
  /**
   * @return int
   */
  public function getHintedLevels()
  {
    return $this->hintedLevels;
  }
  /**
   * @param ChartData
   */
  public function setLabels(ChartData $labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return ChartData
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param int
   */
  public function setLevels($levels)
  {
    $this->levels = $levels;
  }
  /**
   * @return int
   */
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
   * @param ChartData
   */
  public function setParentLabels(ChartData $parentLabels)
  {
    $this->parentLabels = $parentLabels;
  }
  /**
   * @return ChartData
   */
  public function getParentLabels()
  {
    return $this->parentLabels;
  }
  /**
   * @param ChartData
   */
  public function setSizeData(ChartData $sizeData)
  {
    $this->sizeData = $sizeData;
  }
  /**
   * @return ChartData
   */
  public function getSizeData()
  {
    return $this->sizeData;
  }
  /**
   * @param TextFormat
   */
  public function setTextFormat(TextFormat $textFormat)
  {
    $this->textFormat = $textFormat;
  }
  /**
   * @return TextFormat
   */
  public function getTextFormat()
  {
    return $this->textFormat;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TreemapChartSpec::class, 'Google_Service_Sheets_TreemapChartSpec');
