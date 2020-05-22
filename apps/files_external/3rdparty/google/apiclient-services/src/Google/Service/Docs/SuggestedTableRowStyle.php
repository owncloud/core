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

class Google_Service_Docs_SuggestedTableRowStyle extends Google_Model
{
  protected $tableRowStyleType = 'Google_Service_Docs_TableRowStyle';
  protected $tableRowStyleDataType = '';
  protected $tableRowStyleSuggestionStateType = 'Google_Service_Docs_TableRowStyleSuggestionState';
  protected $tableRowStyleSuggestionStateDataType = '';

  /**
   * @param Google_Service_Docs_TableRowStyle
   */
  public function setTableRowStyle(Google_Service_Docs_TableRowStyle $tableRowStyle)
  {
    $this->tableRowStyle = $tableRowStyle;
  }
  /**
   * @return Google_Service_Docs_TableRowStyle
   */
  public function getTableRowStyle()
  {
    return $this->tableRowStyle;
  }
  /**
   * @param Google_Service_Docs_TableRowStyleSuggestionState
   */
  public function setTableRowStyleSuggestionState(Google_Service_Docs_TableRowStyleSuggestionState $tableRowStyleSuggestionState)
  {
    $this->tableRowStyleSuggestionState = $tableRowStyleSuggestionState;
  }
  /**
   * @return Google_Service_Docs_TableRowStyleSuggestionState
   */
  public function getTableRowStyleSuggestionState()
  {
    return $this->tableRowStyleSuggestionState;
  }
}
