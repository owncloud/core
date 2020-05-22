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

class Google_Service_Sheets_TreemapChartColorScale extends Google_Model
{
  protected $maxValueColorType = 'Google_Service_Sheets_Color';
  protected $maxValueColorDataType = '';
  protected $maxValueColorStyleType = 'Google_Service_Sheets_ColorStyle';
  protected $maxValueColorStyleDataType = '';
  protected $midValueColorType = 'Google_Service_Sheets_Color';
  protected $midValueColorDataType = '';
  protected $midValueColorStyleType = 'Google_Service_Sheets_ColorStyle';
  protected $midValueColorStyleDataType = '';
  protected $minValueColorType = 'Google_Service_Sheets_Color';
  protected $minValueColorDataType = '';
  protected $minValueColorStyleType = 'Google_Service_Sheets_ColorStyle';
  protected $minValueColorStyleDataType = '';
  protected $noDataColorType = 'Google_Service_Sheets_Color';
  protected $noDataColorDataType = '';
  protected $noDataColorStyleType = 'Google_Service_Sheets_ColorStyle';
  protected $noDataColorStyleDataType = '';

  /**
   * @param Google_Service_Sheets_Color
   */
  public function setMaxValueColor(Google_Service_Sheets_Color $maxValueColor)
  {
    $this->maxValueColor = $maxValueColor;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getMaxValueColor()
  {
    return $this->maxValueColor;
  }
  /**
   * @param Google_Service_Sheets_ColorStyle
   */
  public function setMaxValueColorStyle(Google_Service_Sheets_ColorStyle $maxValueColorStyle)
  {
    $this->maxValueColorStyle = $maxValueColorStyle;
  }
  /**
   * @return Google_Service_Sheets_ColorStyle
   */
  public function getMaxValueColorStyle()
  {
    return $this->maxValueColorStyle;
  }
  /**
   * @param Google_Service_Sheets_Color
   */
  public function setMidValueColor(Google_Service_Sheets_Color $midValueColor)
  {
    $this->midValueColor = $midValueColor;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getMidValueColor()
  {
    return $this->midValueColor;
  }
  /**
   * @param Google_Service_Sheets_ColorStyle
   */
  public function setMidValueColorStyle(Google_Service_Sheets_ColorStyle $midValueColorStyle)
  {
    $this->midValueColorStyle = $midValueColorStyle;
  }
  /**
   * @return Google_Service_Sheets_ColorStyle
   */
  public function getMidValueColorStyle()
  {
    return $this->midValueColorStyle;
  }
  /**
   * @param Google_Service_Sheets_Color
   */
  public function setMinValueColor(Google_Service_Sheets_Color $minValueColor)
  {
    $this->minValueColor = $minValueColor;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getMinValueColor()
  {
    return $this->minValueColor;
  }
  /**
   * @param Google_Service_Sheets_ColorStyle
   */
  public function setMinValueColorStyle(Google_Service_Sheets_ColorStyle $minValueColorStyle)
  {
    $this->minValueColorStyle = $minValueColorStyle;
  }
  /**
   * @return Google_Service_Sheets_ColorStyle
   */
  public function getMinValueColorStyle()
  {
    return $this->minValueColorStyle;
  }
  /**
   * @param Google_Service_Sheets_Color
   */
  public function setNoDataColor(Google_Service_Sheets_Color $noDataColor)
  {
    $this->noDataColor = $noDataColor;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getNoDataColor()
  {
    return $this->noDataColor;
  }
  /**
   * @param Google_Service_Sheets_ColorStyle
   */
  public function setNoDataColorStyle(Google_Service_Sheets_ColorStyle $noDataColorStyle)
  {
    $this->noDataColorStyle = $noDataColorStyle;
  }
  /**
   * @return Google_Service_Sheets_ColorStyle
   */
  public function getNoDataColorStyle()
  {
    return $this->noDataColorStyle;
  }
}
