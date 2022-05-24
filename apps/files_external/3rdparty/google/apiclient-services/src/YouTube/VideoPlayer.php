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

class VideoPlayer extends \Google\Model
{
  /**
   * @var string
   */
  public $embedHeight;
  /**
   * @var string
   */
  public $embedHtml;
  /**
   * @var string
   */
  public $embedWidth;

  /**
   * @param string
   */
  public function setEmbedHeight($embedHeight)
  {
    $this->embedHeight = $embedHeight;
  }
  /**
   * @return string
   */
  public function getEmbedHeight()
  {
    return $this->embedHeight;
  }
  /**
   * @param string
   */
  public function setEmbedHtml($embedHtml)
  {
    $this->embedHtml = $embedHtml;
  }
  /**
   * @return string
   */
  public function getEmbedHtml()
  {
    return $this->embedHtml;
  }
  /**
   * @param string
   */
  public function setEmbedWidth($embedWidth)
  {
    $this->embedWidth = $embedWidth;
  }
  /**
   * @return string
   */
  public function getEmbedWidth()
  {
    return $this->embedWidth;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoPlayer::class, 'Google_Service_YouTube_VideoPlayer');
