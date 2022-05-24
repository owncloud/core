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

class LiveBroadcastSnippet extends \Google\Model
{
  /**
   * @var string
   */
  public $actualEndTime;
  /**
   * @var string
   */
  public $actualStartTime;
  /**
   * @var string
   */
  public $channelId;
  /**
   * @var string
   */
  public $description;
  /**
   * @var bool
   */
  public $isDefaultBroadcast;
  /**
   * @var string
   */
  public $liveChatId;
  /**
   * @var string
   */
  public $publishedAt;
  /**
   * @var string
   */
  public $scheduledEndTime;
  /**
   * @var string
   */
  public $scheduledStartTime;
  protected $thumbnailsType = ThumbnailDetails::class;
  protected $thumbnailsDataType = '';
  /**
   * @var string
   */
  public $title;

  /**
   * @param string
   */
  public function setActualEndTime($actualEndTime)
  {
    $this->actualEndTime = $actualEndTime;
  }
  /**
   * @return string
   */
  public function getActualEndTime()
  {
    return $this->actualEndTime;
  }
  /**
   * @param string
   */
  public function setActualStartTime($actualStartTime)
  {
    $this->actualStartTime = $actualStartTime;
  }
  /**
   * @return string
   */
  public function getActualStartTime()
  {
    return $this->actualStartTime;
  }
  /**
   * @param string
   */
  public function setChannelId($channelId)
  {
    $this->channelId = $channelId;
  }
  /**
   * @return string
   */
  public function getChannelId()
  {
    return $this->channelId;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param bool
   */
  public function setIsDefaultBroadcast($isDefaultBroadcast)
  {
    $this->isDefaultBroadcast = $isDefaultBroadcast;
  }
  /**
   * @return bool
   */
  public function getIsDefaultBroadcast()
  {
    return $this->isDefaultBroadcast;
  }
  /**
   * @param string
   */
  public function setLiveChatId($liveChatId)
  {
    $this->liveChatId = $liveChatId;
  }
  /**
   * @return string
   */
  public function getLiveChatId()
  {
    return $this->liveChatId;
  }
  /**
   * @param string
   */
  public function setPublishedAt($publishedAt)
  {
    $this->publishedAt = $publishedAt;
  }
  /**
   * @return string
   */
  public function getPublishedAt()
  {
    return $this->publishedAt;
  }
  /**
   * @param string
   */
  public function setScheduledEndTime($scheduledEndTime)
  {
    $this->scheduledEndTime = $scheduledEndTime;
  }
  /**
   * @return string
   */
  public function getScheduledEndTime()
  {
    return $this->scheduledEndTime;
  }
  /**
   * @param string
   */
  public function setScheduledStartTime($scheduledStartTime)
  {
    $this->scheduledStartTime = $scheduledStartTime;
  }
  /**
   * @return string
   */
  public function getScheduledStartTime()
  {
    return $this->scheduledStartTime;
  }
  /**
   * @param ThumbnailDetails
   */
  public function setThumbnails(ThumbnailDetails $thumbnails)
  {
    $this->thumbnails = $thumbnails;
  }
  /**
   * @return ThumbnailDetails
   */
  public function getThumbnails()
  {
    return $this->thumbnails;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LiveBroadcastSnippet::class, 'Google_Service_YouTube_LiveBroadcastSnippet');
