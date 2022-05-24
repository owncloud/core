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

class BaselineValueFormat extends \Google\Model
{
  /**
   * @var string
   */
  public $comparisonType;
  /**
   * @var string
   */
  public $description;
  protected $negativeColorType = Color::class;
  protected $negativeColorDataType = '';
  protected $negativeColorStyleType = ColorStyle::class;
  protected $negativeColorStyleDataType = '';
  protected $positionType = TextPosition::class;
  protected $positionDataType = '';
  protected $positiveColorType = Color::class;
  protected $positiveColorDataType = '';
  protected $positiveColorStyleType = ColorStyle::class;
  protected $positiveColorStyleDataType = '';
  protected $textFormatType = TextFormat::class;
  protected $textFormatDataType = '';

  /**
   * @param string
   */
  public function setComparisonType($comparisonType)
  {
    $this->comparisonType = $comparisonType;
  }
  /**
   * @return string
   */
  public function getComparisonType()
  {
    return $this->comparisonType;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Color
   */
  public function setNegativeColor(Color $negativeColor)
  {
    $this->negativeColor = $negativeColor;
  }
  /**
   * @return Color
   */
  public function getNegativeColor()
  {
    return $this->negativeColor;
  }
  /**
   * @param ColorStyle
   */
  public function setNegativeColorStyle(ColorStyle $negativeColorStyle)
  {
    $this->negativeColorStyle = $negativeColorStyle;
  }
  /**
   * @return ColorStyle
   */
  public function getNegativeColorStyle()
  {
    return $this->negativeColorStyle;
  }
  /**
   * @param TextPosition
   */
  public function setPosition(TextPosition $position)
  {
    $this->position = $position;
  }
  /**
   * @return TextPosition
   */
  public function getPosition()
  {
    return $this->position;
  }
  /**
   * @param Color
   */
  public function setPositiveColor(Color $positiveColor)
  {
    $this->positiveColor = $positiveColor;
  }
  /**
   * @return Color
   */
  public function getPositiveColor()
  {
    return $this->positiveColor;
  }
  /**
   * @param ColorStyle
   */
  public function setPositiveColorStyle(ColorStyle $positiveColorStyle)
  {
    $this->positiveColorStyle = $positiveColorStyle;
  }
  /**
   * @return ColorStyle
   */
  public function getPositiveColorStyle()
  {
    return $this->positiveColorStyle;
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
class_alias(BaselineValueFormat::class, 'Google_Service_Sheets_BaselineValueFormat');
