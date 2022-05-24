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

class SuggestedDocumentStyle extends \Google\Model
{
  protected $documentStyleType = DocumentStyle::class;
  protected $documentStyleDataType = '';
  protected $documentStyleSuggestionStateType = DocumentStyleSuggestionState::class;
  protected $documentStyleSuggestionStateDataType = '';

  /**
   * @param DocumentStyle
   */
  public function setDocumentStyle(DocumentStyle $documentStyle)
  {
    $this->documentStyle = $documentStyle;
  }
  /**
   * @return DocumentStyle
   */
  public function getDocumentStyle()
  {
    return $this->documentStyle;
  }
  /**
   * @param DocumentStyleSuggestionState
   */
  public function setDocumentStyleSuggestionState(DocumentStyleSuggestionState $documentStyleSuggestionState)
  {
    $this->documentStyleSuggestionState = $documentStyleSuggestionState;
  }
  /**
   * @return DocumentStyleSuggestionState
   */
  public function getDocumentStyleSuggestionState()
  {
    return $this->documentStyleSuggestionState;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SuggestedDocumentStyle::class, 'Google_Service_Docs_SuggestedDocumentStyle');
