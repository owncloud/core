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

namespace Google\Service\CloudRetail;

class GoogleCloudRetailV2CompletionDetail extends \Google\Model
{
  public $completionAttributionToken;
  public $selectedPosition;
  public $selectedSuggestion;

  public function setCompletionAttributionToken($completionAttributionToken)
  {
    $this->completionAttributionToken = $completionAttributionToken;
  }
  public function getCompletionAttributionToken()
  {
    return $this->completionAttributionToken;
  }
  public function setSelectedPosition($selectedPosition)
  {
    $this->selectedPosition = $selectedPosition;
  }
  public function getSelectedPosition()
  {
    return $this->selectedPosition;
  }
  public function setSelectedSuggestion($selectedSuggestion)
  {
    $this->selectedSuggestion = $selectedSuggestion;
  }
  public function getSelectedSuggestion()
  {
    return $this->selectedSuggestion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2CompletionDetail::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2CompletionDetail');
