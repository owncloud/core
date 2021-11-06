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

class SuggestedListProperties extends \Google\Model
{
  protected $listPropertiesType = ListProperties::class;
  protected $listPropertiesDataType = '';
  protected $listPropertiesSuggestionStateType = ListPropertiesSuggestionState::class;
  protected $listPropertiesSuggestionStateDataType = '';

  /**
   * @param ListProperties
   */
  public function setListProperties(ListProperties $listProperties)
  {
    $this->listProperties = $listProperties;
  }
  /**
   * @return ListProperties
   */
  public function getListProperties()
  {
    return $this->listProperties;
  }
  /**
   * @param ListPropertiesSuggestionState
   */
  public function setListPropertiesSuggestionState(ListPropertiesSuggestionState $listPropertiesSuggestionState)
  {
    $this->listPropertiesSuggestionState = $listPropertiesSuggestionState;
  }
  /**
   * @return ListPropertiesSuggestionState
   */
  public function getListPropertiesSuggestionState()
  {
    return $this->listPropertiesSuggestionState;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SuggestedListProperties::class, 'Google_Service_Docs_SuggestedListProperties');
