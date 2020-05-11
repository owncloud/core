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

class Google_Service_Sheets_SortSpec extends Google_Model
{
  protected $backgroundColorType = 'Google_Service_Sheets_Color';
  protected $backgroundColorDataType = '';
  protected $backgroundColorStyleType = 'Google_Service_Sheets_ColorStyle';
  protected $backgroundColorStyleDataType = '';
  public $dimensionIndex;
  protected $foregroundColorType = 'Google_Service_Sheets_Color';
  protected $foregroundColorDataType = '';
  protected $foregroundColorStyleType = 'Google_Service_Sheets_ColorStyle';
  protected $foregroundColorStyleDataType = '';
  public $sortOrder;

  /**
   * @param Google_Service_Sheets_Color
   */
  public function setBackgroundColor(Google_Service_Sheets_Color $backgroundColor)
  {
    $this->backgroundColor = $backgroundColor;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getBackgroundColor()
  {
    return $this->backgroundColor;
  }
  /**
   * @param Google_Service_Sheets_ColorStyle
   */
  public function setBackgroundColorStyle(Google_Service_Sheets_ColorStyle $backgroundColorStyle)
  {
    $this->backgroundColorStyle = $backgroundColorStyle;
  }
  /**
   * @return Google_Service_Sheets_ColorStyle
   */
  public function getBackgroundColorStyle()
  {
    return $this->backgroundColorStyle;
  }
  public function setDimensionIndex($dimensionIndex)
  {
    $this->dimensionIndex = $dimensionIndex;
  }
  public function getDimensionIndex()
  {
    return $this->dimensionIndex;
  }
  /**
   * @param Google_Service_Sheets_Color
   */
  public function setForegroundColor(Google_Service_Sheets_Color $foregroundColor)
  {
    $this->foregroundColor = $foregroundColor;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getForegroundColor()
  {
    return $this->foregroundColor;
  }
  /**
   * @param Google_Service_Sheets_ColorStyle
   */
  public function setForegroundColorStyle(Google_Service_Sheets_ColorStyle $foregroundColorStyle)
  {
    $this->foregroundColorStyle = $foregroundColorStyle;
  }
  /**
   * @return Google_Service_Sheets_ColorStyle
   */
  public function getForegroundColorStyle()
  {
    return $this->foregroundColorStyle;
  }
  public function setSortOrder($sortOrder)
  {
    $this->sortOrder = $sortOrder;
  }
  public function getSortOrder()
  {
    return $this->sortOrder;
  }
}
