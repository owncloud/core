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

class Google_Service_Docs_SuggestedListProperties extends Google_Model
{
  protected $listPropertiesType = 'Google_Service_Docs_ListProperties';
  protected $listPropertiesDataType = '';
  protected $listPropertiesSuggestionStateType = 'Google_Service_Docs_ListPropertiesSuggestionState';
  protected $listPropertiesSuggestionStateDataType = '';

  /**
   * @param Google_Service_Docs_ListProperties
   */
  public function setListProperties(Google_Service_Docs_ListProperties $listProperties)
  {
    $this->listProperties = $listProperties;
  }
  /**
   * @return Google_Service_Docs_ListProperties
   */
  public function getListProperties()
  {
    return $this->listProperties;
  }
  /**
   * @param Google_Service_Docs_ListPropertiesSuggestionState
   */
  public function setListPropertiesSuggestionState(Google_Service_Docs_ListPropertiesSuggestionState $listPropertiesSuggestionState)
  {
    $this->listPropertiesSuggestionState = $listPropertiesSuggestionState;
  }
  /**
   * @return Google_Service_Docs_ListPropertiesSuggestionState
   */
  public function getListPropertiesSuggestionState()
  {
    return $this->listPropertiesSuggestionState;
  }
}
