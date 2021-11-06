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

class SuggestedTableRowStyle extends \Google\Model
{
  protected $tableRowStyleType = TableRowStyle::class;
  protected $tableRowStyleDataType = '';
  protected $tableRowStyleSuggestionStateType = TableRowStyleSuggestionState::class;
  protected $tableRowStyleSuggestionStateDataType = '';

  /**
   * @param TableRowStyle
   */
  public function setTableRowStyle(TableRowStyle $tableRowStyle)
  {
    $this->tableRowStyle = $tableRowStyle;
  }
  /**
   * @return TableRowStyle
   */
  public function getTableRowStyle()
  {
    return $this->tableRowStyle;
  }
  /**
   * @param TableRowStyleSuggestionState
   */
  public function setTableRowStyleSuggestionState(TableRowStyleSuggestionState $tableRowStyleSuggestionState)
  {
    $this->tableRowStyleSuggestionState = $tableRowStyleSuggestionState;
  }
  /**
   * @return TableRowStyleSuggestionState
   */
  public function getTableRowStyleSuggestionState()
  {
    return $this->tableRowStyleSuggestionState;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SuggestedTableRowStyle::class, 'Google_Service_Docs_SuggestedTableRowStyle');
