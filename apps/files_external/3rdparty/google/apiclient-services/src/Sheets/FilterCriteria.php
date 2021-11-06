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

class FilterCriteria extends \Google\Collection
{
  protected $collection_key = 'hiddenValues';
  protected $conditionType = BooleanCondition::class;
  protected $conditionDataType = '';
  public $hiddenValues;
  protected $visibleBackgroundColorType = Color::class;
  protected $visibleBackgroundColorDataType = '';
  protected $visibleBackgroundColorStyleType = ColorStyle::class;
  protected $visibleBackgroundColorStyleDataType = '';
  protected $visibleForegroundColorType = Color::class;
  protected $visibleForegroundColorDataType = '';
  protected $visibleForegroundColorStyleType = ColorStyle::class;
  protected $visibleForegroundColorStyleDataType = '';

  /**
   * @param BooleanCondition
   */
  public function setCondition(BooleanCondition $condition)
  {
    $this->condition = $condition;
  }
  /**
   * @return BooleanCondition
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
   * @param Color
   */
  public function setVisibleBackgroundColor(Color $visibleBackgroundColor)
  {
    $this->visibleBackgroundColor = $visibleBackgroundColor;
  }
  /**
   * @return Color
   */
  public function getVisibleBackgroundColor()
  {
    return $this->visibleBackgroundColor;
  }
  /**
   * @param ColorStyle
   */
  public function setVisibleBackgroundColorStyle(ColorStyle $visibleBackgroundColorStyle)
  {
    $this->visibleBackgroundColorStyle = $visibleBackgroundColorStyle;
  }
  /**
   * @return ColorStyle
   */
  public function getVisibleBackgroundColorStyle()
  {
    return $this->visibleBackgroundColorStyle;
  }
  /**
   * @param Color
   */
  public function setVisibleForegroundColor(Color $visibleForegroundColor)
  {
    $this->visibleForegroundColor = $visibleForegroundColor;
  }
  /**
   * @return Color
   */
  public function getVisibleForegroundColor()
  {
    return $this->visibleForegroundColor;
  }
  /**
   * @param ColorStyle
   */
  public function setVisibleForegroundColorStyle(ColorStyle $visibleForegroundColorStyle)
  {
    $this->visibleForegroundColorStyle = $visibleForegroundColorStyle;
  }
  /**
   * @return ColorStyle
   */
  public function getVisibleForegroundColorStyle()
  {
    return $this->visibleForegroundColorStyle;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FilterCriteria::class, 'Google_Service_Sheets_FilterCriteria');
