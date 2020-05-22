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

class Google_Service_Sheets_BaselineValueFormat extends Google_Model
{
  public $comparisonType;
  public $description;
  protected $negativeColorType = 'Google_Service_Sheets_Color';
  protected $negativeColorDataType = '';
  protected $negativeColorStyleType = 'Google_Service_Sheets_ColorStyle';
  protected $negativeColorStyleDataType = '';
  protected $positionType = 'Google_Service_Sheets_TextPosition';
  protected $positionDataType = '';
  protected $positiveColorType = 'Google_Service_Sheets_Color';
  protected $positiveColorDataType = '';
  protected $positiveColorStyleType = 'Google_Service_Sheets_ColorStyle';
  protected $positiveColorStyleDataType = '';
  protected $textFormatType = 'Google_Service_Sheets_TextFormat';
  protected $textFormatDataType = '';

  public function setComparisonType($comparisonType)
  {
    $this->comparisonType = $comparisonType;
  }
  public function getComparisonType()
  {
    return $this->comparisonType;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_Sheets_Color
   */
  public function setNegativeColor(Google_Service_Sheets_Color $negativeColor)
  {
    $this->negativeColor = $negativeColor;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getNegativeColor()
  {
    return $this->negativeColor;
  }
  /**
   * @param Google_Service_Sheets_ColorStyle
   */
  public function setNegativeColorStyle(Google_Service_Sheets_ColorStyle $negativeColorStyle)
  {
    $this->negativeColorStyle = $negativeColorStyle;
  }
  /**
   * @return Google_Service_Sheets_ColorStyle
   */
  public function getNegativeColorStyle()
  {
    return $this->negativeColorStyle;
  }
  /**
   * @param Google_Service_Sheets_TextPosition
   */
  public function setPosition(Google_Service_Sheets_TextPosition $position)
  {
    $this->position = $position;
  }
  /**
   * @return Google_Service_Sheets_TextPosition
   */
  public function getPosition()
  {
    return $this->position;
  }
  /**
   * @param Google_Service_Sheets_Color
   */
  public function setPositiveColor(Google_Service_Sheets_Color $positiveColor)
  {
    $this->positiveColor = $positiveColor;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getPositiveColor()
  {
    return $this->positiveColor;
  }
  /**
   * @param Google_Service_Sheets_ColorStyle
   */
  public function setPositiveColorStyle(Google_Service_Sheets_ColorStyle $positiveColorStyle)
  {
    $this->positiveColorStyle = $positiveColorStyle;
  }
  /**
   * @return Google_Service_Sheets_ColorStyle
   */
  public function getPositiveColorStyle()
  {
    return $this->positiveColorStyle;
  }
  /**
   * @param Google_Service_Sheets_TextFormat
   */
  public function setTextFormat(Google_Service_Sheets_TextFormat $textFormat)
  {
    $this->textFormat = $textFormat;
  }
  /**
   * @return Google_Service_Sheets_TextFormat
   */
  public function getTextFormat()
  {
    return $this->textFormat;
  }
}
