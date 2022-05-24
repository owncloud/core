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

class PositionedObjectPositioningSuggestionState extends \Google\Model
{
  /**
   * @var bool
   */
  public $layoutSuggested;
  /**
   * @var bool
   */
  public $leftOffsetSuggested;
  /**
   * @var bool
   */
  public $topOffsetSuggested;

  /**
   * @param bool
   */
  public function setLayoutSuggested($layoutSuggested)
  {
    $this->layoutSuggested = $layoutSuggested;
  }
  /**
   * @return bool
   */
  public function getLayoutSuggested()
  {
    return $this->layoutSuggested;
  }
  /**
   * @param bool
   */
  public function setLeftOffsetSuggested($leftOffsetSuggested)
  {
    $this->leftOffsetSuggested = $leftOffsetSuggested;
  }
  /**
   * @return bool
   */
  public function getLeftOffsetSuggested()
  {
    return $this->leftOffsetSuggested;
  }
  /**
   * @param bool
   */
  public function setTopOffsetSuggested($topOffsetSuggested)
  {
    $this->topOffsetSuggested = $topOffsetSuggested;
  }
  /**
   * @return bool
   */
  public function getTopOffsetSuggested()
  {
    return $this->topOffsetSuggested;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PositionedObjectPositioningSuggestionState::class, 'Google_Service_Docs_PositionedObjectPositioningSuggestionState');
