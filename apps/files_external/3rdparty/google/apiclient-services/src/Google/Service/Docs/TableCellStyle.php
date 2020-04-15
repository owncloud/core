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

class Google_Service_Docs_TableCellStyle extends Google_Model
{
  protected $backgroundColorType = 'Google_Service_Docs_OptionalColor';
  protected $backgroundColorDataType = '';
  protected $borderBottomType = 'Google_Service_Docs_TableCellBorder';
  protected $borderBottomDataType = '';
  protected $borderLeftType = 'Google_Service_Docs_TableCellBorder';
  protected $borderLeftDataType = '';
  protected $borderRightType = 'Google_Service_Docs_TableCellBorder';
  protected $borderRightDataType = '';
  protected $borderTopType = 'Google_Service_Docs_TableCellBorder';
  protected $borderTopDataType = '';
  public $columnSpan;
  public $contentAlignment;
  protected $paddingBottomType = 'Google_Service_Docs_Dimension';
  protected $paddingBottomDataType = '';
  protected $paddingLeftType = 'Google_Service_Docs_Dimension';
  protected $paddingLeftDataType = '';
  protected $paddingRightType = 'Google_Service_Docs_Dimension';
  protected $paddingRightDataType = '';
  protected $paddingTopType = 'Google_Service_Docs_Dimension';
  protected $paddingTopDataType = '';
  public $rowSpan;

  /**
   * @param Google_Service_Docs_OptionalColor
   */
  public function setBackgroundColor(Google_Service_Docs_OptionalColor $backgroundColor)
  {
    $this->backgroundColor = $backgroundColor;
  }
  /**
   * @return Google_Service_Docs_OptionalColor
   */
  public function getBackgroundColor()
  {
    return $this->backgroundColor;
  }
  /**
   * @param Google_Service_Docs_TableCellBorder
   */
  public function setBorderBottom(Google_Service_Docs_TableCellBorder $borderBottom)
  {
    $this->borderBottom = $borderBottom;
  }
  /**
   * @return Google_Service_Docs_TableCellBorder
   */
  public function getBorderBottom()
  {
    return $this->borderBottom;
  }
  /**
   * @param Google_Service_Docs_TableCellBorder
   */
  public function setBorderLeft(Google_Service_Docs_TableCellBorder $borderLeft)
  {
    $this->borderLeft = $borderLeft;
  }
  /**
   * @return Google_Service_Docs_TableCellBorder
   */
  public function getBorderLeft()
  {
    return $this->borderLeft;
  }
  /**
   * @param Google_Service_Docs_TableCellBorder
   */
  public function setBorderRight(Google_Service_Docs_TableCellBorder $borderRight)
  {
    $this->borderRight = $borderRight;
  }
  /**
   * @return Google_Service_Docs_TableCellBorder
   */
  public function getBorderRight()
  {
    return $this->borderRight;
  }
  /**
   * @param Google_Service_Docs_TableCellBorder
   */
  public function setBorderTop(Google_Service_Docs_TableCellBorder $borderTop)
  {
    $this->borderTop = $borderTop;
  }
  /**
   * @return Google_Service_Docs_TableCellBorder
   */
  public function getBorderTop()
  {
    return $this->borderTop;
  }
  public function setColumnSpan($columnSpan)
  {
    $this->columnSpan = $columnSpan;
  }
  public function getColumnSpan()
  {
    return $this->columnSpan;
  }
  public function setContentAlignment($contentAlignment)
  {
    $this->contentAlignment = $contentAlignment;
  }
  public function getContentAlignment()
  {
    return $this->contentAlignment;
  }
  /**
   * @param Google_Service_Docs_Dimension
   */
  public function setPaddingBottom(Google_Service_Docs_Dimension $paddingBottom)
  {
    $this->paddingBottom = $paddingBottom;
  }
  /**
   * @return Google_Service_Docs_Dimension
   */
  public function getPaddingBottom()
  {
    return $this->paddingBottom;
  }
  /**
   * @param Google_Service_Docs_Dimension
   */
  public function setPaddingLeft(Google_Service_Docs_Dimension $paddingLeft)
  {
    $this->paddingLeft = $paddingLeft;
  }
  /**
   * @return Google_Service_Docs_Dimension
   */
  public function getPaddingLeft()
  {
    return $this->paddingLeft;
  }
  /**
   * @param Google_Service_Docs_Dimension
   */
  public function setPaddingRight(Google_Service_Docs_Dimension $paddingRight)
  {
    $this->paddingRight = $paddingRight;
  }
  /**
   * @return Google_Service_Docs_Dimension
   */
  public function getPaddingRight()
  {
    return $this->paddingRight;
  }
  /**
   * @param Google_Service_Docs_Dimension
   */
  public function setPaddingTop(Google_Service_Docs_Dimension $paddingTop)
  {
    $this->paddingTop = $paddingTop;
  }
  /**
   * @return Google_Service_Docs_Dimension
   */
  public function getPaddingTop()
  {
    return $this->paddingTop;
  }
  public function setRowSpan($rowSpan)
  {
    $this->rowSpan = $rowSpan;
  }
  public function getRowSpan()
  {
    return $this->rowSpan;
  }
}
