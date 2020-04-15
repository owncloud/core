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

class Google_Service_Docs_SuggestedPositionedObjectProperties extends Google_Model
{
  protected $positionedObjectPropertiesType = 'Google_Service_Docs_PositionedObjectProperties';
  protected $positionedObjectPropertiesDataType = '';
  protected $positionedObjectPropertiesSuggestionStateType = 'Google_Service_Docs_PositionedObjectPropertiesSuggestionState';
  protected $positionedObjectPropertiesSuggestionStateDataType = '';

  /**
   * @param Google_Service_Docs_PositionedObjectProperties
   */
  public function setPositionedObjectProperties(Google_Service_Docs_PositionedObjectProperties $positionedObjectProperties)
  {
    $this->positionedObjectProperties = $positionedObjectProperties;
  }
  /**
   * @return Google_Service_Docs_PositionedObjectProperties
   */
  public function getPositionedObjectProperties()
  {
    return $this->positionedObjectProperties;
  }
  /**
   * @param Google_Service_Docs_PositionedObjectPropertiesSuggestionState
   */
  public function setPositionedObjectPropertiesSuggestionState(Google_Service_Docs_PositionedObjectPropertiesSuggestionState $positionedObjectPropertiesSuggestionState)
  {
    $this->positionedObjectPropertiesSuggestionState = $positionedObjectPropertiesSuggestionState;
  }
  /**
   * @return Google_Service_Docs_PositionedObjectPropertiesSuggestionState
   */
  public function getPositionedObjectPropertiesSuggestionState()
  {
    return $this->positionedObjectPropertiesSuggestionState;
  }
}
