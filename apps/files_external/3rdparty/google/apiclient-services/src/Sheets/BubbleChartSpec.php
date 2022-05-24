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

class BubbleChartSpec extends \Google\Model
{
  protected $bubbleBorderColorType = Color::class;
  protected $bubbleBorderColorDataType = '';
  protected $bubbleBorderColorStyleType = ColorStyle::class;
  protected $bubbleBorderColorStyleDataType = '';
  protected $bubbleLabelsType = ChartData::class;
  protected $bubbleLabelsDataType = '';
  /**
   * @var int
   */
  public $bubbleMaxRadiusSize;
  /**
   * @var int
   */
  public $bubbleMinRadiusSize;
  /**
   * @var float
   */
  public $bubbleOpacity;
  protected $bubbleSizesType = ChartData::class;
  protected $bubbleSizesDataType = '';
  protected $bubbleTextStyleType = TextFormat::class;
  protected $bubbleTextStyleDataType = '';
  protected $domainType = ChartData::class;
  protected $domainDataType = '';
  protected $groupIdsType = ChartData::class;
  protected $groupIdsDataType = '';
  /**
   * @var string
   */
  public $legendPosition;
  protected $seriesType = ChartData::class;
  protected $seriesDataType = '';

  /**
   * @param Color
   */
  public function setBubbleBorderColor(Color $bubbleBorderColor)
  {
    $this->bubbleBorderColor = $bubbleBorderColor;
  }
  /**
   * @return Color
   */
  public function getBubbleBorderColor()
  {
    return $this->bubbleBorderColor;
  }
  /**
   * @param ColorStyle
   */
  public function setBubbleBorderColorStyle(ColorStyle $bubbleBorderColorStyle)
  {
    $this->bubbleBorderColorStyle = $bubbleBorderColorStyle;
  }
  /**
   * @return ColorStyle
   */
  public function getBubbleBorderColorStyle()
  {
    return $this->bubbleBorderColorStyle;
  }
  /**
   * @param ChartData
   */
  public function setBubbleLabels(ChartData $bubbleLabels)
  {
    $this->bubbleLabels = $bubbleLabels;
  }
  /**
   * @return ChartData
   */
  public function getBubbleLabels()
  {
    return $this->bubbleLabels;
  }
  /**
   * @param int
   */
  public function setBubbleMaxRadiusSize($bubbleMaxRadiusSize)
  {
    $this->bubbleMaxRadiusSize = $bubbleMaxRadiusSize;
  }
  /**
   * @return int
   */
  public function getBubbleMaxRadiusSize()
  {
    return $this->bubbleMaxRadiusSize;
  }
  /**
   * @param int
   */
  public function setBubbleMinRadiusSize($bubbleMinRadiusSize)
  {
    $this->bubbleMinRadiusSize = $bubbleMinRadiusSize;
  }
  /**
   * @return int
   */
  public function getBubbleMinRadiusSize()
  {
    return $this->bubbleMinRadiusSize;
  }
  /**
   * @param float
   */
  public function setBubbleOpacity($bubbleOpacity)
  {
    $this->bubbleOpacity = $bubbleOpacity;
  }
  /**
   * @return float
   */
  public function getBubbleOpacity()
  {
    return $this->bubbleOpacity;
  }
  /**
   * @param ChartData
   */
  public function setBubbleSizes(ChartData $bubbleSizes)
  {
    $this->bubbleSizes = $bubbleSizes;
  }
  /**
   * @return ChartData
   */
  public function getBubbleSizes()
  {
    return $this->bubbleSizes;
  }
  /**
   * @param TextFormat
   */
  public function setBubbleTextStyle(TextFormat $bubbleTextStyle)
  {
    $this->bubbleTextStyle = $bubbleTextStyle;
  }
  /**
   * @return TextFormat
   */
  public function getBubbleTextStyle()
  {
    return $this->bubbleTextStyle;
  }
  /**
   * @param ChartData
   */
  public function setDomain(ChartData $domain)
  {
    $this->domain = $domain;
  }
  /**
   * @return ChartData
   */
  public function getDomain()
  {
    return $this->domain;
  }
  /**
   * @param ChartData
   */
  public function setGroupIds(ChartData $groupIds)
  {
    $this->groupIds = $groupIds;
  }
  /**
   * @return ChartData
   */
  public function getGroupIds()
  {
    return $this->groupIds;
  }
  /**
   * @param string
   */
  public function setLegendPosition($legendPosition)
  {
    $this->legendPosition = $legendPosition;
  }
  /**
   * @return string
   */
  public function getLegendPosition()
  {
    return $this->legendPosition;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BubbleChartSpec::class, 'Google_Service_Sheets_BubbleChartSpec');
