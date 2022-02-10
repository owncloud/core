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

class CellFormat extends \Google\Model
{
  protected $backgroundColorType = Color::class;
  protected $backgroundColorDataType = '';
  protected $backgroundColorStyleType = ColorStyle::class;
  protected $backgroundColorStyleDataType = '';
  protected $bordersType = Borders::class;
  protected $bordersDataType = '';
  /**
   * @var string
   */
  public $horizontalAlignment;
  /**
   * @var string
   */
  public $hyperlinkDisplayType;
  protected $numberFormatType = NumberFormat::class;
  protected $numberFormatDataType = '';
  protected $paddingType = Padding::class;
  protected $paddingDataType = '';
  /**
   * @var string
   */
  public $textDirection;
  protected $textFormatType = TextFormat::class;
  protected $textFormatDataType = '';
  protected $textRotationType = TextRotation::class;
  protected $textRotationDataType = '';
  /**
   * @var string
   */
  public $verticalAlignment;
  /**
   * @var string
   */
  public $wrapStrategy;

  /**
   * @param Color
   */
  public function setBackgroundColor(Color $backgroundColor)
  {
    $this->backgroundColor = $backgroundColor;
  }
  /**
   * @return Color
   */
  public function getBackgroundColor()
  {
    return $this->backgroundColor;
  }
  /**
   * @param ColorStyle
   */
  public function setBackgroundColorStyle(ColorStyle $backgroundColorStyle)
  {
    $this->backgroundColorStyle = $backgroundColorStyle;
  }
  /**
   * @return ColorStyle
   */
  public function getBackgroundColorStyle()
  {
    return $this->backgroundColorStyle;
  }
  /**
   * @param Borders
   */
  public function setBorders(Borders $borders)
  {
    $this->borders = $borders;
  }
  /**
   * @return Borders
   */
  public function getBorders()
  {
    return $this->borders;
  }
  /**
   * @param string
   */
  public function setHorizontalAlignment($horizontalAlignment)
  {
    $this->horizontalAlignment = $horizontalAlignment;
  }
  /**
   * @return string
   */
  public function getHorizontalAlignment()
  {
    return $this->horizontalAlignment;
  }
  /**
   * @param string
   */
  public function setHyperlinkDisplayType($hyperlinkDisplayType)
  {
    $this->hyperlinkDisplayType = $hyperlinkDisplayType;
  }
  /**
   * @return string
   */
  public function getHyperlinkDisplayType()
  {
    return $this->hyperlinkDisplayType;
  }
  /**
   * @param NumberFormat
   */
  public function setNumberFormat(NumberFormat $numberFormat)
  {
    $this->numberFormat = $numberFormat;
  }
  /**
   * @return NumberFormat
   */
  public function getNumberFormat()
  {
    return $this->numberFormat;
  }
  /**
   * @param Padding
   */
  public function setPadding(Padding $padding)
  {
    $this->padding = $padding;
  }
  /**
   * @return Padding
   */
  public function getPadding()
  {
    return $this->padding;
  }
  /**
   * @param string
   */
  public function setTextDirection($textDirection)
  {
    $this->textDirection = $textDirection;
  }
  /**
   * @return string
   */
  public function getTextDirection()
  {
    return $this->textDirection;
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
  /**
   * @param TextRotation
   */
  public function setTextRotation(TextRotation $textRotation)
  {
    $this->textRotation = $textRotation;
  }
  /**
   * @return TextRotation
   */
  public function getTextRotation()
  {
    return $this->textRotation;
  }
  /**
   * @param string
   */
  public function setVerticalAlignment($verticalAlignment)
  {
    $this->verticalAlignment = $verticalAlignment;
  }
  /**
   * @return string
   */
  public function getVerticalAlignment()
  {
    return $this->verticalAlignment;
  }
  /**
   * @param string
   */
  public function setWrapStrategy($wrapStrategy)
  {
    $this->wrapStrategy = $wrapStrategy;
  }
  /**
   * @return string
   */
  public function getWrapStrategy()
  {
    return $this->wrapStrategy;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CellFormat::class, 'Google_Service_Sheets_CellFormat');
