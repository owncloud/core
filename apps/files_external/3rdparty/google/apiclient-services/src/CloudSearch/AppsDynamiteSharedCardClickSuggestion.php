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

class AppsDynamiteSharedCardClickSuggestion extends \Google\Model
{
  /**
   * @var string
   */
  public $actionId;
  protected $suggestionMessageIdType = MessageId::class;
  protected $suggestionMessageIdDataType = '';

  /**
   * @param string
   */
  public function setActionId($actionId)
  {
    $this->actionId = $actionId;
  }
  /**
   * @return string
   */
  public function getActionId()
  {
    return $this->actionId;
  }
  /**
   * @param MessageId
   */
  public function setSuggestionMessageId(MessageId $suggestionMessageId)
  {
    $this->suggestionMessageId = $suggestionMessageId;
  }
  /**
   * @return MessageId
   */
  public function getSuggestionMessageId()
  {
    return $this->suggestionMessageId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteSharedCardClickSuggestion::class, 'Google_Service_CloudSearch_AppsDynamiteSharedCardClickSuggestion');
