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

class Google_Service_Docs_BulletSuggestionState extends Google_Model
{
  public $listIdSuggested;
  public $nestingLevelSuggested;
  protected $textStyleSuggestionStateType = 'Google_Service_Docs_TextStyleSuggestionState';
  protected $textStyleSuggestionStateDataType = '';

  public function setListIdSuggested($listIdSuggested)
  {
    $this->listIdSuggested = $listIdSuggested;
  }
  public function getListIdSuggested()
  {
    return $this->listIdSuggested;
  }
  public function setNestingLevelSuggested($nestingLevelSuggested)
  {
    $this->nestingLevelSuggested = $nestingLevelSuggested;
  }
  public function getNestingLevelSuggested()
  {
    return $this->nestingLevelSuggested;
  }
  /**
   * @param Google_Service_Docs_TextStyleSuggestionState
   */
  public function setTextStyleSuggestionState(Google_Service_Docs_TextStyleSuggestionState $textStyleSuggestionState)
  {
    $this->textStyleSuggestionState = $textStyleSuggestionState;
  }
  /**
   * @return Google_Service_Docs_TextStyleSuggestionState
   */
  public function getTextStyleSuggestionState()
  {
    return $this->textStyleSuggestionState;
  }
}
