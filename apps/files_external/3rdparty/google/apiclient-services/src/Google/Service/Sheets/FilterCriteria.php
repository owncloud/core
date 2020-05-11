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

class Google_Service_Sheets_FilterCriteria extends Google_Collection
{
  protected $collection_key = 'hiddenValues';
  protected $conditionType = 'Google_Service_Sheets_BooleanCondition';
  protected $conditionDataType = '';
  public $hiddenValues;
  protected $visibleBackgroundColorType = 'Google_Service_Sheets_Color';
  protected $visibleBackgroundColorDataType = '';
  protected $visibleBackgroundColorStyleType = 'Google_Service_Sheets_ColorStyle';
  protected $visibleBackgroundColorStyleDataType = '';
  protected $visibleForegroundColorType = 'Google_Service_Sheets_Color';
  protected $visibleForegroundColorDataType = '';
  protected $visibleForegroundColorStyleType = 'Google_Service_Sheets_ColorStyle';
  protected $visibleForegroundColorStyleDataType = '';

  /**
   * @param Google_Service_Sheets_BooleanCondition
   */
  public function setCondition(Google_Service_Sheets_BooleanCondition $condition)
  {
    $this->condition = $condition;
  }
  /**
   * @return Google_Service_Sheets_BooleanCondition
   */
  public function getCondition()
  {
    return $this->condition;
  }
  public function setHiddenValues($hiddenValues)
  {
    $this->hiddenValues = $hiddenValues;
  }
  public function getHiddenValues()
  {
    return $this->hiddenValues;
  }
  /**
   * @param Google_Service_Sheets_Color
   */
  public function setVisibleBackgroundColor(Google_Service_Sheets_Color $visibleBackgroundColor)
  {
    $this->visibleBackgroundColor = $visibleBackgroundColor;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getVisibleBackgroundColor()
  {
    return $this->visibleBackgroundColor;
  }
  /**
   * @param Google_Service_Sheets_ColorStyle
   */
  public function setVisibleBackgroundColorStyle(Google_Service_Sheets_ColorStyle $visibleBackgroundColorStyle)
  {
    $this->visibleBackgroundColorStyle = $visibleBackgroundColorStyle;
  }
  /**
   * @return Google_Service_Sheets_ColorStyle
   */
  public function getVisibleBackgroundColorStyle()
  {
    return $this->visibleBackgroundColorStyle;
  }
  /**
   * @param Google_Service_Sheets_Color
   */
  public function setVisibleForegroundColor(Google_Service_Sheets_Color $visibleForegroundColor)
  {
    $this->visibleForegroundColor = $visibleForegroundColor;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getVisibleForegroundColor()
  {
    return $this->visibleForegroundColor;
  }
  /**
   * @param Google_Service_Sheets_ColorStyle
   */
  public function setVisibleForegroundColorStyle(Google_Service_Sheets_ColorStyle $visibleForegroundColorStyle)
  {
    $this->visibleForegroundColorStyle = $visibleForegroundColorStyle;
  }
  /**
   * @return Google_Service_Sheets_ColorStyle
   */
  public function getVisibleForegroundColorStyle()
  {
    return $this->visibleForegroundColorStyle;
  }
}
