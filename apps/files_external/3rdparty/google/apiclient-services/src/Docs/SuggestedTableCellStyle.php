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

class SuggestedTableCellStyle extends \Google\Model
{
  protected $tableCellStyleType = TableCellStyle::class;
  protected $tableCellStyleDataType = '';
  protected $tableCellStyleSuggestionStateType = TableCellStyleSuggestionState::class;
  protected $tableCellStyleSuggestionStateDataType = '';

  /**
   * @param TableCellStyle
   */
  public function setTableCellStyle(TableCellStyle $tableCellStyle)
  {
    $this->tableCellStyle = $tableCellStyle;
  }
  /**
   * @return TableCellStyle
   */
  public function getTableCellStyle()
  {
    return $this->tableCellStyle;
  }
  /**
   * @param TableCellStyleSuggestionState
   */
  public function setTableCellStyleSuggestionState(TableCellStyleSuggestionState $tableCellStyleSuggestionState)
  {
    $this->tableCellStyleSuggestionState = $tableCellStyleSuggestionState;
  }
  /**
   * @return TableCellStyleSuggestionState
   */
  public function getTableCellStyleSuggestionState()
  {
    return $this->tableCellStyleSuggestionState;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SuggestedTableCellStyle::class, 'Google_Service_Docs_SuggestedTableCellStyle');
