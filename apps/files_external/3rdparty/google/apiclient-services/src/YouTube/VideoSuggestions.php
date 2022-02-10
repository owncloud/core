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

namespace Google\Service\YouTube;

class VideoSuggestions extends \Google\Collection
{
  protected $collection_key = 'tagSuggestions';
  /**
   * @var string[]
   */
  public $editorSuggestions;
  /**
   * @var string[]
   */
  public $processingErrors;
  /**
   * @var string[]
   */
  public $processingHints;
  /**
   * @var string[]
   */
  public $processingWarnings;
  protected $tagSuggestionsType = VideoSuggestionsTagSuggestion::class;
  protected $tagSuggestionsDataType = 'array';

  /**
   * @param string[]
   */
  public function setEditorSuggestions($editorSuggestions)
  {
    $this->editorSuggestions = $editorSuggestions;
  }
  /**
   * @return string[]
   */
  public function getEditorSuggestions()
  {
    return $this->editorSuggestions;
  }
  /**
   * @param string[]
   */
  public function setProcessingErrors($processingErrors)
  {
    $this->processingErrors = $processingErrors;
  }
  /**
   * @return string[]
   */
  public function getProcessingErrors()
  {
    return $this->processingErrors;
  }
  /**
   * @param string[]
   */
  public function setProcessingHints($processingHints)
  {
    $this->processingHints = $processingHints;
  }
  /**
   * @return string[]
   */
  public function getProcessingHints()
  {
    return $this->processingHints;
  }
  /**
   * @param string[]
   */
  public function setProcessingWarnings($processingWarnings)
  {
    $this->processingWarnings = $processingWarnings;
  }
  /**
   * @return string[]
   */
  public function getProcessingWarnings()
  {
    return $this->processingWarnings;
  }
  /**
   * @param VideoSuggestionsTagSuggestion[]
   */
  public function setTagSuggestions($tagSuggestions)
  {
    $this->tagSuggestions = $tagSuggestions;
  }
  /**
   * @return VideoSuggestionsTagSuggestion[]
   */
  public function getTagSuggestions()
  {
    return $this->tagSuggestions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoSuggestions::class, 'Google_Service_YouTube_VideoSuggestions');
