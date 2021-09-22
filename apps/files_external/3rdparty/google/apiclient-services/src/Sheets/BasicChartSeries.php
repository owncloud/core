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

class BasicChartSeries extends \Google\Collection
{
  protected $collection_key = 'styleOverrides';
  protected $colorType = Color::class;
  protected $colorDataType = '';
  protected $colorStyleType = ColorStyle::class;
  protected $colorStyleDataType = '';
  protected $dataLabelType = DataLabel::class;
  protected $dataLabelDataType = '';
  protected $lineStyleType = LineStyle::class;
  protected $lineStyleDataType = '';
  protected $pointStyleType = PointStyle::class;
  protected $pointStyleDataType = '';
  protected $seriesType = ChartData::class;
  protected $seriesDataType = '';
  protected $styleOverridesType = BasicSeriesDataPointStyleOverride::class;
  protected $styleOverridesDataType = 'array';
  public $targetAxis;
  public $type;

  /**
   * @param Color
   */
  public function setColor(Color $color)
  {
    $this->color = $color;
  }
  /**
   * @return Color
   */
  public function getColor()
  {
    return $this->color;
  }
  /**
   * @param ColorStyle
   */
  public function setColorStyle(ColorStyle $colorStyle)
  {
    $this->colorStyle = $colorStyle;
  }
  /**
   * @return ColorStyle
   */
  public function getColorStyle()
  {
    return $this->colorStyle;
  }
  /**
   * @param DataLabel
   */
  public function setDataLabel(DataLabel $dataLabel)
  {
    $this->dataLabel = $dataLabel;
  }
  /**
   * @return DataLabel
   */
  public function getDataLabel()
  {
    return $this->dataLabel;
  }
  /**
   * @param LineStyle
   */
  public function setLineStyle(LineStyle $lineStyle)
  {
    $this->lineStyle = $lineStyle;
  }
  /**
   * @return LineStyle
   */
  public function getLineStyle()
  {
    return $this->lineStyle;
  }
  /**
   * @param PointStyle
   */
  public function setPointStyle(PointStyle $pointStyle)
  {
    $this->pointStyle = $pointStyle;
  }
  /**
   * @return PointStyle
   */
  public function getPointStyle()
  {
    return $this->pointStyle;
  }
  /**
   * @param ChartData
   */
  public function setSeries(ChartData $series)
  {
    $this->series = $series;
  }
  /**
   * @return ChartData
   */
  public function getSeries()
  {
    return $this->series;
  }
  /**
   * @param BasicSeriesDataPointStyleOverride[]
   */
  public function setStyleOverrides($styleOverrides)
  {
    $this->styleOverrides = $styleOverrides;
  }
  /**
   * @return BasicSeriesDataPointStyleOverride[]
   */
  public function getStyleOverrides()
  {
    return $this->styleOverrides;
  }
  public function setTargetAxis($targetAxis)
  {
    $this->targetAxis = $targetAxis;
  }
  public function getTargetAxis()
  {
    return $this->targetAxis;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BasicChartSeries::class, 'Google_Service_Sheets_BasicChartSeries');
