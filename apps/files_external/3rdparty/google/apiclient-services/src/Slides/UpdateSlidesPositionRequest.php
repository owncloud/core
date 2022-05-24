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

namespace Google\Service\Slides;

class UpdateSlidesPositionRequest extends \Google\Collection
{
  protected $collection_key = 'slideObjectIds';
  /**
   * @var int
   */
  public $insertionIndex;
  /**
   * @var string[]
   */
  public $slideObjectIds;

  /**
   * @param int
   */
  public function setInsertionIndex($insertionIndex)
  {
    $this->insertionIndex = $insertionIndex;
  }
  /**
   * @return int
   */
  public function getInsertionIndex()
  {
    return $this->insertionIndex;
  }
  /**
   * @param string[]
   */
  public function setSlideObjectIds($slideObjectIds)
  {
    $this->slideObjectIds = $slideObjectIds;
  }
  /**
   * @return string[]
   */
  public function getSlideObjectIds()
  {
    return $this->slideObjectIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpdateSlidesPositionRequest::class, 'Google_Service_Slides_UpdateSlidesPositionRequest');
