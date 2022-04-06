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

class Emoji extends \Google\Model
{
  protected $customEmojiType = CustomEmoji::class;
  protected $customEmojiDataType = '';
  /**
   * @var string
   */
  public $unicode;

  /**
   * @param CustomEmoji
   */
  public function setCustomEmoji(CustomEmoji $customEmoji)
  {
    $this->customEmoji = $customEmoji;
  }
  /**
   * @return CustomEmoji
   */
  public function getCustomEmoji()
  {
    return $this->customEmoji;
  }
  /**
   * @param string
   */
  public function setUnicode($unicode)
  {
    $this->unicode = $unicode;
  }
  /**
   * @return string
   */
  public function getUnicode()
  {
    return $this->unicode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Emoji::class, 'Google_Service_CloudSearch_Emoji');
