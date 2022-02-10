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

class WaterfallChartSeries extends \Google\Collection
{
  protected $collection_key = 'customSubtotals';
  protected $customSubtotalsType = WaterfallChartCustomSubtotal::class;
  protected $customSubtotalsDataType = 'array';
  protected $dataType = ChartData::class;
  protected $dataDataType = '';
  protected $dataLabelType = DataLabel::class;
  protected $dataLabelDataType = '';
  /**
   * @var bool
   */
  public $hideTrailingSubtotal;
  protected $negativeColumnsStyleType = WaterfallChartColumnStyle::class;
  protected $negativeColumnsStyleDataType = '';
  protected $positiveColumnsStyleType = WaterfallChartColumnStyle::class;
  protected $positiveColumnsStyleDataType = '';
  protected $subtotalColumnsStyleType = WaterfallChartColumnStyle::class;
  protected $subtotalColumnsStyleDataType = '';

  /**
   * @param WaterfallChartCustomSubtotal[]
   */
  public function setCustomSubtotals($customSubtotals)
  {
    $this->customSubtotals = $customSubtotals;
  }
  /**
   * @return WaterfallChartCustomSubtotal[]
   */
  public function getCustomSubtotals()
  {
    return $this->customSubtotals;
  }
  /**
   * @param ChartData
   */
  public function setData(ChartData $data)
  {
    $this->data = $data;
  }
  /**
   * @return ChartData
   */
  public function getData()
  {
    return $this->data;
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
   * @param bool
   */
  public function setHideTrailingSubtotal($hideTrailingSubtotal)
  {
    $this->hideTrailingSubtotal = $hideTrailingSubtotal;
  }
  /**
   * @return bool
   */
  public function getHideTrailingSubtotal()
  {
    return $this->hideTrailingSubtotal;
  }
  /**
   * @param WaterfallChartColumnStyle
   */
  public function setNegativeColumnsStyle(WaterfallChartColumnStyle $negativeColumnsStyle)
  {
    $this->negativeColumnsStyle = $negativeColumnsStyle;
  }
  /**
   * @return WaterfallChartColumnStyle
   */
  public function getNegativeColumnsStyle()
  {
    return $this->negativeColumnsStyle;
  }
  /**
   * @param WaterfallChartColumnStyle
   */
  public function setPositiveColumnsStyle(WaterfallChartColumnStyle $positiveColumnsStyle)
  {
    $this->positiveColumnsStyle = $positiveColumnsStyle;
  }
  /**
   * @return WaterfallChartColumnStyle
   */
  public function getPositiveColumnsStyle()
  {
    return $this->positiveColumnsStyle;
  }
  /**
   * @param WaterfallChartColumnStyle
   */
  public function setSubtotalColumnsStyle(WaterfallChartColumnStyle $subtotalColumnsStyle)
  {
    $this->subtotalColumnsStyle = $subtotalColumnsStyle;
  }
  /**
   * @return WaterfallChartColumnStyle
   */
  public function getSubtotalColumnsStyle()
  {
    return $this->subtotalColumnsStyle;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WaterfallChartSeries::class, 'Google_Service_Sheets_WaterfallChartSeries');
