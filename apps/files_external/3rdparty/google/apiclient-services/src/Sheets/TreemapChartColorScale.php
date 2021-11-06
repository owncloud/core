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

class TreemapChartColorScale extends \Google\Model
{
  protected $maxValueColorType = Color::class;
  protected $maxValueColorDataType = '';
  protected $maxValueColorStyleType = ColorStyle::class;
  protected $maxValueColorStyleDataType = '';
  protected $midValueColorType = Color::class;
  protected $midValueColorDataType = '';
  protected $midValueColorStyleType = ColorStyle::class;
  protected $midValueColorStyleDataType = '';
  protected $minValueColorType = Color::class;
  protected $minValueColorDataType = '';
  protected $minValueColorStyleType = ColorStyle::class;
  protected $minValueColorStyleDataType = '';
  protected $noDataColorType = Color::class;
  protected $noDataColorDataType = '';
  protected $noDataColorStyleType = ColorStyle::class;
  protected $noDataColorStyleDataType = '';

  /**
   * @param Color
   */
  public function setMaxValueColor(Color $maxValueColor)
  {
    $this->maxValueColor = $maxValueColor;
  }
  /**
   * @return Color
   */
  public function getMaxValueColor()
  {
    return $this->maxValueColor;
  }
  /**
   * @param ColorStyle
   */
  public function setMaxValueColorStyle(ColorStyle $maxValueColorStyle)
  {
    $this->maxValueColorStyle = $maxValueColorStyle;
  }
  /**
   * @return ColorStyle
   */
  public function getMaxValueColorStyle()
  {
    return $this->maxValueColorStyle;
  }
  /**
   * @param Color
   */
  public function setMidValueColor(Color $midValueColor)
  {
    $this->midValueColor = $midValueColor;
  }
  /**
   * @return Color
   */
  public function getMidValueColor()
  {
    return $this->midValueColor;
  }
  /**
   * @param ColorStyle
   */
  public function setMidValueColorStyle(ColorStyle $midValueColorStyle)
  {
    $this->midValueColorStyle = $midValueColorStyle;
  }
  /**
   * @return ColorStyle
   */
  public function getMidValueColorStyle()
  {
    return $this->midValueColorStyle;
  }
  /**
   * @param Color
   */
  public function setMinValueColor(Color $minValueColor)
  {
    $this->minValueColor = $minValueColor;
  }
  /**
   * @return Color
   */
  public function getMinValueColor()
  {
    return $this->minValueColor;
  }
  /**
   * @param ColorStyle
   */
  public function setMinValueColorStyle(ColorStyle $minValueColorStyle)
  {
    $this->minValueColorStyle = $minValueColorStyle;
  }
  /**
   * @return ColorStyle
   */
  public function getMinValueColorStyle()
  {
    return $this->minValueColorStyle;
  }
  /**
   * @param Color
   */
  public function setNoDataColor(Color $noDataColor)
  {
    $this->noDataColor = $noDataColor;
  }
  /**
   * @return Color
   */
  public function getNoDataColor()
  {
    return $this->noDataColor;
  }
  /**
   * @param ColorStyle
   */
  public function setNoDataColorStyle(ColorStyle $noDataColorStyle)
  {
    $this->noDataColorStyle = $noDataColorStyle;
  }
  /**
   * @return ColorStyle
   */
  public function getNoDataColorStyle()
  {
    return $this->noDataColorStyle;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TreemapChartColorScale::class, 'Google_Service_Sheets_TreemapChartColorScale');
