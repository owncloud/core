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

class Google_Service_Docs_SuggestedInlineObjectProperties extends Google_Model
{
  protected $inlineObjectPropertiesType = 'Google_Service_Docs_InlineObjectProperties';
  protected $inlineObjectPropertiesDataType = '';
  protected $inlineObjectPropertiesSuggestionStateType = 'Google_Service_Docs_InlineObjectPropertiesSuggestionState';
  protected $inlineObjectPropertiesSuggestionStateDataType = '';

  /**
   * @param Google_Service_Docs_InlineObjectProperties
   */
  public function setInlineObjectProperties(Google_Service_Docs_InlineObjectProperties $inlineObjectProperties)
  {
    $this->inlineObjectProperties = $inlineObjectProperties;
  }
  /**
   * @return Google_Service_Docs_InlineObjectProperties
   */
  public function getInlineObjectProperties()
  {
    return $this->inlineObjectProperties;
  }
  /**
   * @param Google_Service_Docs_InlineObjectPropertiesSuggestionState
   */
  public function setInlineObjectPropertiesSuggestionState(Google_Service_Docs_InlineObjectPropertiesSuggestionState $inlineObjectPropertiesSuggestionState)
  {
    $this->inlineObjectPropertiesSuggestionState = $inlineObjectPropertiesSuggestionState;
  }
  /**
   * @return Google_Service_Docs_InlineObjectPropertiesSuggestionState
   */
  public function getInlineObjectPropertiesSuggestionState()
  {
    return $this->inlineObjectPropertiesSuggestionState;
  }
}
