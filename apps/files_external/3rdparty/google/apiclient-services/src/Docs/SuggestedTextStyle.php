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

class SuggestedTextStyle extends \Google\Model
{
  protected $textStyleType = TextStyle::class;
  protected $textStyleDataType = '';
  protected $textStyleSuggestionStateType = TextStyleSuggestionState::class;
  protected $textStyleSuggestionStateDataType = '';

  /**
   * @param TextStyle
   */
  public function setTextStyle(TextStyle $textStyle)
  {
    $this->textStyle = $textStyle;
  }
  /**
   * @return TextStyle
   */
  public function getTextStyle()
  {
    return $this->textStyle;
  }
  /**
   * @param TextStyleSuggestionState
   */
  public function setTextStyleSuggestionState(TextStyleSuggestionState $textStyleSuggestionState)
  {
    $this->textStyleSuggestionState = $textStyleSuggestionState;
  }
  /**
   * @return TextStyleSuggestionState
   */
  public function getTextStyleSuggestionState()
  {
    return $this->textStyleSuggestionState;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SuggestedTextStyle::class, 'Google_Service_Docs_SuggestedTextStyle');
