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

namespace Google\Service\Docs;

class TableCellStyle extends \Google\Model
{
  protected $backgroundColorType = OptionalColor::class;
  protected $backgroundColorDataType = '';
  protected $borderBottomType = TableCellBorder::class;
  protected $borderBottomDataType = '';
  protected $borderLeftType = TableCellBorder::class;
  protected $borderLeftDataType = '';
  protected $borderRightType = TableCellBorder::class;
  protected $borderRightDataType = '';
  protected $borderTopType = TableCellBorder::class;
  protected $borderTopDataType = '';
  public $columnSpan;
  public $contentAlignment;
  protected $paddingBottomType = Dimension::class;
  protected $paddingBottomDataType = '';
  protected $paddingLeftType = Dimension::class;
  protected $paddingLeftDataType = '';
  protected $paddingRightType = Dimension::class;
  protected $paddingRightDataType = '';
  protected $paddingTopType = Dimension::class;
  protected $paddingTopDataType = '';
  public $rowSpan;

  /**
   * @param OptionalColor
   */
  public function setBackgroundColor(OptionalColor $backgroundColor)
  {
    $this->backgroundColor = $backgroundColor;
  }
  /**
   * @return OptionalColor
   */
  public function getBackgroundColor()
  {
    return $this->backgroundColor;
  }
  /**
   * @param TableCellBorder
   */
  public function setBorderBottom(TableCellBorder $borderBottom)
  {
    $this->borderBottom = $borderBottom;
  }
  /**
   * @return TableCellBorder
   */
  public function getBorderBottom()
  {
    return $this->borderBottom;
  }
  /**
   * @param TableCellBorder
   */
  public function setBorderLeft(TableCellBorder $borderLeft)
  {
    $this->borderLeft = $borderLeft;
  }
  /**
   * @return TableCellBorder
   */
  public function getBorderLeft()
  {
    return $this->borderLeft;
  }
  /**
   * @param TableCellBorder
   */
  public function setBorderRight(TableCellBorder $borderRight)
  {
    $this->borderRight = $borderRight;
  }
  /**
   * @return TableCellBorder
   */
  public function getBorderRight()
  {
    return $this->borderRight;
  }
  /**
   * @param TableCellBorder
   */
  public function setBorderTop(TableCellBorder $borderTop)
  {
    $this->borderTop = $borderTop;
  }
  /**
   * @return TableCellBorder
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
   * @param Dimension
   */
  public function setPaddingBottom(Dimension $paddingBottom)
  {
    $this->paddingBottom = $paddingBottom;
  }
  /**
   * @return Dimension
   */
  public function getPaddingBottom()
  {
    return $this->paddingBottom;
  }
  /**
   * @param Dimension
   */
  public function setPaddingLeft(Dimension $paddingLeft)
  {
    $this->paddingLeft = $paddingLeft;
  }
  /**
   * @return Dimension
   */
  public function getPaddingLeft()
  {
    return $this->paddingLeft;
  }
  /**
   * @param Dimension
   */
  public function setPaddingRight(Dimension $paddingRight)
  {
    $this->paddingRight = $paddingRight;
  }
  /**
   * @return Dimension
   */
  public function getPaddingRight()
  {
    return $this->paddingRight;
  }
  /**
   * @param Dimension
   */
  public function setPaddingTop(Dimension $paddingTop)
  {
    $this->paddingTop = $paddingTop;
  }
  /**
   * @return Dimension
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TableCellStyle::class, 'Google_Service_Docs_TableCellStyle');
