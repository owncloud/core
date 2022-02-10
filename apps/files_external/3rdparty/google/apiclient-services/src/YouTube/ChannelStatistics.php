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

class ChannelStatistics extends \Google\Model
{
  /**
   * @var string
   */
  public $commentCount;
  /**
   * @var bool
   */
  public $hiddenSubscriberCount;
  /**
   * @var string
   */
  public $subscriberCount;
  /**
   * @var string
   */
  public $videoCount;
  /**
   * @var string
   */
  public $viewCount;

  /**
   * @param string
   */
  public function setCommentCount($commentCount)
  {
    $this->commentCount = $commentCount;
  }
  /**
   * @return string
   */
  public function getCommentCount()
  {
    return $this->commentCount;
  }
  /**
   * @param bool
   */
  public function setHiddenSubscriberCount($hiddenSubscriberCount)
  {
    $this->hiddenSubscriberCount = $hiddenSubscriberCount;
  }
  /**
   * @return bool
   */
  public function getHiddenSubscriberCount()
  {
    return $this->hiddenSubscriberCount;
  }
  /**
   * @param string
   */
  public function setSubscriberCount($subscriberCount)
  {
    $this->subscriberCount = $subscriberCount;
  }
  /**
   * @return string
   */
  public function getSubscriberCount()
  {
    return $this->subscriberCount;
  }
  /**
   * @param string
   */
  public function setVideoCount($videoCount)
  {
    $this->videoCount = $videoCount;
  }
  /**
   * @return string
   */
  public function getVideoCount()
  {
    return $this->videoCount;
  }
  /**
   * @param string
   */
  public function setViewCount($viewCount)
  {
    $this->viewCount = $viewCount;
  }
  /**
   * @return string
   */
  public function getViewCount()
  {
    return $this->viewCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChannelStatistics::class, 'Google_Service_YouTube_ChannelStatistics');
