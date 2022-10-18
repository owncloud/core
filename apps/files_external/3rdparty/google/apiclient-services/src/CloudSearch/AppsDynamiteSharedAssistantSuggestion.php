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

namespace Google\Service\CloudSearch;

class AppsDynamiteSharedAssistantSuggestion extends \Google\Model
{
  protected $debugContextType = AppsDynamiteSharedAssistantDebugContext::class;
  protected $debugContextDataType = '';
  protected $feedbackContextType = AppsDynamiteSharedAssistantFeedbackContext::class;
  protected $feedbackContextDataType = '';
  protected $findDocumentSuggestionType = AppsDynamiteSharedFindDocumentSuggestion::class;
  protected $findDocumentSuggestionDataType = '';
  /**
   * @var string
   */
  public $serializedSuggestions;
  protected $sessionContextType = AppsDynamiteSharedAssistantSessionContext::class;
  protected $sessionContextDataType = '';

  /**
   * @param AppsDynamiteSharedAssistantDebugContext
   */
  public function setDebugContext(AppsDynamiteSharedAssistantDebugContext $debugContext)
  {
    $this->debugContext = $debugContext;
  }
  /**
   * @return AppsDynamiteSharedAssistantDebugContext
   */
  public function getDebugContext()
  {
    return $this->debugContext;
  }
  /**
   * @param AppsDynamiteSharedAssistantFeedbackContext
   */
  public function setFeedbackContext(AppsDynamiteSharedAssistantFeedbackContext $feedbackContext)
  {
    $this->feedbackContext = $feedbackContext;
  }
  /**
   * @return AppsDynamiteSharedAssistantFeedbackContext
   */
  public function getFeedbackContext()
  {
    return $this->feedbackContext;
  }
  /**
   * @param AppsDynamiteSharedFindDocumentSuggestion
   */
  public function setFindDocumentSuggestion(AppsDynamiteSharedFindDocumentSuggestion $findDocumentSuggestion)
  {
    $this->findDocumentSuggestion = $findDocumentSuggestion;
  }
  /**
   * @return AppsDynamiteSharedFindDocumentSuggestion
   */
  public function getFindDocumentSuggestion()
  {
    return $this->findDocumentSuggestion;
  }
  /**
   * @param string
   */
  public function setSerializedSuggestions($serializedSuggestions)
  {
    $this->serializedSuggestions = $serializedSuggestions;
  }
  /**
   * @return string
   */
  public function getSerializedSuggestions()
  {
    return $this->serializedSuggestions;
  }
  /**
   * @param AppsDynamiteSharedAssistantSessionContext
   */
  public function setSessionContext(AppsDynamiteSharedAssistantSessionContext $sessionContext)
  {
    $this->sessionContext = $sessionContext;
  }
  /**
   * @return AppsDynamiteSharedAssistantSessionContext
   */
  public function getSessionContext()
  {
    return $this->sessionContext;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteSharedAssistantSuggestion::class, 'Google_Service_CloudSearch_AppsDynamiteSharedAssistantSuggestion');
