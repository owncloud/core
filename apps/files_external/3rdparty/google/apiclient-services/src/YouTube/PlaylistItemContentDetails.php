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

class PlaylistItemContentDetails extends \Google\Model
{
  /**
   * @var string
   */
  public $endAt;
  /**
   * @var string
   */
  public $note;
  /**
   * @var string
   */
  public $startAt;
  /**
   * @var string
   */
  public $videoId;
  /**
   * @var string
   */
  public $videoPublishedAt;

  /**
   * @param string
   */
  public function setEndAt($endAt)
  {
    $this->endAt = $endAt;
  }
  /**
   * @return string
   */
  public function getEndAt()
  {
    return $this->endAt;
  }
  /**
   * @param string
   */
  public function setNote($note)
  {
    $this->note = $note;
  }
  /**
   * @return string
   */
  public function getNote()
  {
    return $this->note;
  }
  /**
   * @param string
   */
  public function setStartAt($startAt)
  {
    $this->startAt = $startAt;
  }
  /**
   * @return string
   */
  public function getStartAt()
  {
    return $this->startAt;
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
  /**
   * @param string
   */
  public function setVideoPublishedAt($videoPublishedAt)
  {
    $this->videoPublishedAt = $videoPublishedAt;
  }
  /**
   * @return string
   */
  public function getVideoPublishedAt()
  {
    return $this->videoPublishedAt;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PlaylistItemContentDetails::class, 'Google_Service_YouTube_PlaylistItemContentDetails');
