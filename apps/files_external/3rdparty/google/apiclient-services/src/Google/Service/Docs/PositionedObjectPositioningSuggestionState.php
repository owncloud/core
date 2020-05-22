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

class Google_Service_Docs_PositionedObjectPositioningSuggestionState extends Google_Model
{
  public $layoutSuggested;
  public $leftOffsetSuggested;
  public $topOffsetSuggested;

  public function setLayoutSuggested($layoutSuggested)
  {
    $this->layoutSuggested = $layoutSuggested;
  }
  public function getLayoutSuggested()
  {
    return $this->layoutSuggested;
  }
  public function setLeftOffsetSuggested($leftOffsetSuggested)
  {
    $this->leftOffsetSuggested = $leftOffsetSuggested;
  }
  public function getLeftOffsetSuggested()
  {
    return $this->leftOffsetSuggested;
  }
  public function setTopOffsetSuggested($topOffsetSuggested)
  {
    $this->topOffsetSuggested = $topOffsetSuggested;
  }
  public function getTopOffsetSuggested()
  {
    return $this->topOffsetSuggested;
  }
}
