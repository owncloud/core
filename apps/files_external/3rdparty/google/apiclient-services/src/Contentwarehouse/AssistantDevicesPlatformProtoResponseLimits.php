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

namespace Google\Service\Contentwarehouse;

class AssistantDevicesPlatformProtoResponseLimits extends \Google\Model
{
  /**
   * @var int
   */
  public $maxAssistResponseSizeBytes;
  /**
   * @var int
   */
  public $maxDisplayLinesBytes;
  /**
   * @var int
   */
  public $maxSuggestionChipBytes;
  /**
   * @var int
   */
  public $maxSuggestionChips;

  /**
   * @param int
   */
  public function setMaxAssistResponseSizeBytes($maxAssistResponseSizeBytes)
  {
    $this->maxAssistResponseSizeBytes = $maxAssistResponseSizeBytes;
  }
  /**
   * @return int
   */
  public function getMaxAssistResponseSizeBytes()
  {
    return $this->maxAssistResponseSizeBytes;
  }
  /**
   * @param int
   */
  public function setMaxDisplayLinesBytes($maxDisplayLinesBytes)
  {
    $this->maxDisplayLinesBytes = $maxDisplayLinesBytes;
  }
  /**
   * @return int
   */
  public function getMaxDisplayLinesBytes()
  {
    return $this->maxDisplayLinesBytes;
  }
  /**
   * @param int
   */
  public function setMaxSuggestionChipBytes($maxSuggestionChipBytes)
  {
    $this->maxSuggestionChipBytes = $maxSuggestionChipBytes;
  }
  /**
   * @return int
   */
  public function getMaxSuggestionChipBytes()
  {
    return $this->maxSuggestionChipBytes;
  }
  /**
   * @param int
   */
  public function setMaxSuggestionChips($maxSuggestionChips)
  {
    $this->maxSuggestionChips = $maxSuggestionChips;
  }
  /**
   * @return int
   */
  public function getMaxSuggestionChips()
  {
    return $this->maxSuggestionChips;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantDevicesPlatformProtoResponseLimits::class, 'Google_Service_Contentwarehouse_AssistantDevicesPlatformProtoResponseLimits');
