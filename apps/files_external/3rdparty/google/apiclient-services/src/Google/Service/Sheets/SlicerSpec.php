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

class Google_Service_Sheets_SlicerSpec extends Google_Model
{
  public $applyToPivotTables;
  protected $backgroundColorType = 'Google_Service_Sheets_Color';
  protected $backgroundColorDataType = '';
  protected $backgroundColorStyleType = 'Google_Service_Sheets_ColorStyle';
  protected $backgroundColorStyleDataType = '';
  public $columnIndex;
  protected $dataRangeType = 'Google_Service_Sheets_GridRange';
  protected $dataRangeDataType = '';
  protected $filterCriteriaType = 'Google_Service_Sheets_FilterCriteria';
  protected $filterCriteriaDataType = '';
  public $horizontalAlignment;
  protected $textFormatType = 'Google_Service_Sheets_TextFormat';
  protected $textFormatDataType = '';
  public $title;

  public function setApplyToPivotTables($applyToPivotTables)
  {
    $this->applyToPivotTables = $applyToPivotTables;
  }
  public function getApplyToPivotTables()
  {
    return $this->applyToPivotTables;
  }
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
  public function setColumnIndex($columnIndex)
  {
    $this->columnIndex = $columnIndex;
  }
  public function getColumnIndex()
  {
    return $this->columnIndex;
  }
  /**
   * @param Google_Service_Sheets_GridRange
   */
  public function setDataRange(Google_Service_Sheets_GridRange $dataRange)
  {
    $this->dataRange = $dataRange;
  }
  /**
   * @return Google_Service_Sheets_GridRange
   */
  public function getDataRange()
  {
    return $this->dataRange;
  }
  /**
   * @param Google_Service_Sheets_FilterCriteria
   */
  public function setFilterCriteria(Google_Service_Sheets_FilterCriteria $filterCriteria)
  {
    $this->filterCriteria = $filterCriteria;
  }
  /**
   * @return Google_Service_Sheets_FilterCriteria
   */
  public function getFilterCriteria()
  {
    return $this->filterCriteria;
  }
  public function setHorizontalAlignment($horizontalAlignment)
  {
    $this->horizontalAlignment = $horizontalAlignment;
  }
  public function getHorizontalAlignment()
  {
    return $this->horizontalAlignment;
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
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}
