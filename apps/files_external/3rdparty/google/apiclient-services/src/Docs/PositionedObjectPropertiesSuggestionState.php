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

class PositionedObjectPropertiesSuggestionState extends \Google\Model
{
  protected $embeddedObjectSuggestionStateType = EmbeddedObjectSuggestionState::class;
  protected $embeddedObjectSuggestionStateDataType = '';
  protected $positioningSuggestionStateType = PositionedObjectPositioningSuggestionState::class;
  protected $positioningSuggestionStateDataType = '';

  /**
   * @param EmbeddedObjectSuggestionState
   */
  public function setEmbeddedObjectSuggestionState(EmbeddedObjectSuggestionState $embeddedObjectSuggestionState)
  {
    $this->embeddedObjectSuggestionState = $embeddedObjectSuggestionState;
  }
  /**
   * @return EmbeddedObjectSuggestionState
   */
  public function getEmbeddedObjectSuggestionState()
  {
    return $this->embeddedObjectSuggestionState;
  }
  /**
   * @param PositionedObjectPositioningSuggestionState
   */
  public function setPositioningSuggestionState(PositionedObjectPositioningSuggestionState $positioningSuggestionState)
  {
    $this->positioningSuggestionState = $positioningSuggestionState;
  }
  /**
   * @return PositionedObjectPositioningSuggestionState
   */
  public function getPositioningSuggestionState()
  {
    return $this->positioningSuggestionState;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PositionedObjectPropertiesSuggestionState::class, 'Google_Service_Docs_PositionedObjectPropertiesSuggestionState');
