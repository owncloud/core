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

class Google_Service_Docs_PositionedObjectPropertiesSuggestionState extends Google_Model
{
  protected $embeddedObjectSuggestionStateType = 'Google_Service_Docs_EmbeddedObjectSuggestionState';
  protected $embeddedObjectSuggestionStateDataType = '';
  protected $positioningSuggestionStateType = 'Google_Service_Docs_PositionedObjectPositioningSuggestionState';
  protected $positioningSuggestionStateDataType = '';

  /**
   * @param Google_Service_Docs_EmbeddedObjectSuggestionState
   */
  public function setEmbeddedObjectSuggestionState(Google_Service_Docs_EmbeddedObjectSuggestionState $embeddedObjectSuggestionState)
  {
    $this->embeddedObjectSuggestionState = $embeddedObjectSuggestionState;
  }
  /**
   * @return Google_Service_Docs_EmbeddedObjectSuggestionState
   */
  public function getEmbeddedObjectSuggestionState()
  {
    return $this->embeddedObjectSuggestionState;
  }
  /**
   * @param Google_Service_Docs_PositionedObjectPositioningSuggestionState
   */
  public function setPositioningSuggestionState(Google_Service_Docs_PositionedObjectPositioningSuggestionState $positioningSuggestionState)
  {
    $this->positioningSuggestionState = $positioningSuggestionState;
  }
  /**
   * @return Google_Service_Docs_PositionedObjectPositioningSuggestionState
   */
  public function getPositioningSuggestionState()
  {
    return $this->positioningSuggestionState;
  }
}
