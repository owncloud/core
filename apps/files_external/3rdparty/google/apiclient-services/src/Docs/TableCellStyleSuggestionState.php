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

class TableCellStyleSuggestionState extends \Google\Model
{
  /**
   * @var bool
   */
  public $backgroundColorSuggested;
  /**
   * @var bool
   */
  public $borderBottomSuggested;
  /**
   * @var bool
   */
  public $borderLeftSuggested;
  /**
   * @var bool
   */
  public $borderRightSuggested;
  /**
   * @var bool
   */
  public $borderTopSuggested;
  /**
   * @var bool
   */
  public $columnSpanSuggested;
  /**
   * @var bool
   */
  public $contentAlignmentSuggested;
  /**
   * @var bool
   */
  public $paddingBottomSuggested;
  /**
   * @var bool
   */
  public $paddingLeftSuggested;
  /**
   * @var bool
   */
  public $paddingRightSuggested;
  /**
   * @var bool
   */
  public $paddingTopSuggested;
  /**
   * @var bool
   */
  public $rowSpanSuggested;

  /**
   * @param bool
   */
  public function setBackgroundColorSuggested($backgroundColorSuggested)
  {
    $this->backgroundColorSuggested = $backgroundColorSuggested;
  }
  /**
   * @return bool
   */
  public function getBackgroundColorSuggested()
  {
    return $this->backgroundColorSuggested;
  }
  /**
   * @param bool
   */
  public function setBorderBottomSuggested($borderBottomSuggested)
  {
    $this->borderBottomSuggested = $borderBottomSuggested;
  }
  /**
   * @return bool
   */
  public function getBorderBottomSuggested()
  {
    return $this->borderBottomSuggested;
  }
  /**
   * @param bool
   */
  public function setBorderLeftSuggested($borderLeftSuggested)
  {
    $this->borderLeftSuggested = $borderLeftSuggested;
  }
  /**
   * @return bool
   */
  public function getBorderLeftSuggested()
  {
    return $this->borderLeftSuggested;
  }
  /**
   * @param bool
   */
  public function setBorderRightSuggested($borderRightSuggested)
  {
    $this->borderRightSuggested = $borderRightSuggested;
  }
  /**
   * @return bool
   */
  public function getBorderRightSuggested()
  {
    return $this->borderRightSuggested;
  }
  /**
   * @param bool
   */
  public function setBorderTopSuggested($borderTopSuggested)
  {
    $this->borderTopSuggested = $borderTopSuggested;
  }
  /**
   * @return bool
   */
  public function getBorderTopSuggested()
  {
    return $this->borderTopSuggested;
  }
  /**
   * @param bool
   */
  public function setColumnSpanSuggested($columnSpanSuggested)
  {
    $this->columnSpanSuggested = $columnSpanSuggested;
  }
  /**
   * @return bool
   */
  public function getColumnSpanSuggested()
  {
    return $this->columnSpanSuggested;
  }
  /**
   * @param bool
   */
  public function setContentAlignmentSuggested($contentAlignmentSuggested)
  {
    $this->contentAlignmentSuggested = $contentAlignmentSuggested;
  }
  /**
   * @return bool
   */
  public function getContentAlignmentSuggested()
  {
    return $this->contentAlignmentSuggested;
  }
  /**
   * @param bool
   */
  public function setPaddingBottomSuggested($paddingBottomSuggested)
  {
    $this->paddingBottomSuggested = $paddingBottomSuggested;
  }
  /**
   * @return bool
   */
  public function getPaddingBottomSuggested()
  {
    return $this->paddingBottomSuggested;
  }
  /**
   * @param bool
   */
  public function setPaddingLeftSuggested($paddingLeftSuggested)
  {
    $this->paddingLeftSuggested = $paddingLeftSuggested;
  }
  /**
   * @return bool
   */
  public function getPaddingLeftSuggested()
  {
    return $this->paddingLeftSuggested;
  }
  /**
   * @param bool
   */
  public function setPaddingRightSuggested($paddingRightSuggested)
  {
    $this->paddingRightSuggested = $paddingRightSuggested;
  }
  /**
   * @return bool
   */
  public function getPaddingRightSuggested()
  {
    return $this->paddingRightSuggested;
  }
  /**
   * @param bool
   */
  public function setPaddingTopSuggested($paddingTopSuggested)
  {
    $this->paddingTopSuggested = $paddingTopSuggested;
  }
  /**
   * @return bool
   */
  public function getPaddingTopSuggested()
  {
    return $this->paddingTopSuggested;
  }
  /**
   * @param bool
   */
  public function setRowSpanSuggested($rowSpanSuggested)
  {
    $this->rowSpanSuggested = $rowSpanSuggested;
  }
  /**
   * @return bool
   */
  public function getRowSpanSuggested()
  {
    return $this->rowSpanSuggested;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TableCellStyleSuggestionState::class, 'Google_Service_Docs_TableCellStyleSuggestionState');
