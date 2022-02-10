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

class VideoAbuseReport extends \Google\Model
{
  /**
   * @var string
   */
  public $comments;
  /**
   * @var string
   */
  public $language;
  /**
   * @var string
   */
  public $reasonId;
  /**
   * @var string
   */
  public $secondaryReasonId;
  /**
   * @var string
   */
  public $videoId;

  /**
   * @param string
   */
  public function setComments($comments)
  {
    $this->comments = $comments;
  }
  /**
   * @return string
   */
  public function getComments()
  {
    return $this->comments;
  }
  /**
   * @param string
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param string
   */
  public function setReasonId($reasonId)
  {
    $this->reasonId = $reasonId;
  }
  /**
   * @return string
   */
  public function getReasonId()
  {
    return $this->reasonId;
  }
  /**
   * @param string
   */
  public function setSecondaryReasonId($secondaryReasonId)
  {
    $this->secondaryReasonId = $secondaryReasonId;
  }
  /**
   * @return string
   */
  public function getSecondaryReasonId()
  {
    return $this->secondaryReasonId;
  }
  /**
   * @param string
   */
  public function setVideoId($videoId)
  {
    $this->videoId = $videoId;
  }
  /**
   * @return string
   */
  public function getVideoId()
  {
    return $this->videoId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoAbuseReport::class, 'Google_Service_YouTube_VideoAbuseReport');
