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

class AppsDynamiteSharedReaction extends \Google\Model
{
  /**
   * @var int
   */
  public $count;
  /**
   * @var string
   */
  public $createTimestamp;
  /**
   * @var bool
   */
  public $currentUserParticipated;
  protected $emojiType = AppsDynamiteSharedEmoji::class;
  protected $emojiDataType = '';

  /**
   * @param int
   */
  public function setCount($count)
  {
    $this->count = $count;
  }
  /**
   * @return int
   */
  public function getCount()
  {
    return $this->count;
  }
  /**
   * @param string
   */
  public function setCreateTimestamp($createTimestamp)
  {
    $this->createTimestamp = $createTimestamp;
  }
  /**
   * @return string
   */
  public function getCreateTimestamp()
  {
    return $this->createTimestamp;
  }
  /**
   * @param bool
   */
  public function setCurrentUserParticipated($currentUserParticipated)
  {
    $this->currentUserParticipated = $currentUserParticipated;
  }
  /**
   * @return bool
   */
  public function getCurrentUserParticipated()
  {
    return $this->currentUserParticipated;
  }
  /**
   * @param AppsDynamiteSharedEmoji
   */
  public function setEmoji(AppsDynamiteSharedEmoji $emoji)
  {
    $this->emoji = $emoji;
  }
  /**
   * @return AppsDynamiteSharedEmoji
   */
  public function getEmoji()
  {
    return $this->emoji;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteSharedReaction::class, 'Google_Service_CloudSearch_AppsDynamiteSharedReaction');
