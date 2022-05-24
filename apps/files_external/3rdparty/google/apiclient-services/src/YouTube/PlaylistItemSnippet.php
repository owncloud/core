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

class PlaylistItemSnippet extends \Google\Model
{
  /**
   * @var string
   */
  public $channelId;
  /**
   * @var string
   */
  public $channelTitle;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $playlistId;
  /**
   * @var string
   */
  public $position;
  /**
   * @var string
   */
  public $publishedAt;
  protected $resourceIdType = ResourceId::class;
  protected $resourceIdDataType = '';
  protected $thumbnailsType = ThumbnailDetails::class;
  protected $thumbnailsDataType = '';
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $videoOwnerChannelId;
  /**
   * @var string
   */
  public $videoOwnerChannelTitle;

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
  public function setChannelTitle($channelTitle)
  {
    $this->channelTitle = $channelTitle;
  }
  /**
   * @return string
   */
  public function getChannelTitle()
  {
    return $this->channelTitle;
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
   * @param string
   */
  public function setPlaylistId($playlistId)
  {
    $this->playlistId = $playlistId;
  }
  /**
   * @return string
   */
  public function getPlaylistId()
  {
    return $this->playlistId;
  }
  /**
   * @param string
   */
  public function setPosition($position)
  {
    $this->position = $position;
  }
  /**
   * @return string
   */
  public function getPosition()
  {
    return $this->position;
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
   * @param ResourceId
   */
  public function setResourceId(ResourceId $resourceId)
  {
    $this->resourceId = $resourceId;
  }
  /**
   * @return ResourceId
   */
  public function getResourceId()
  {
    return $this->resourceId;
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
  /**
   * @param string
   */
  public function setVideoOwnerChannelId($videoOwnerChannelId)
  {
    $this->videoOwnerChannelId = $videoOwnerChannelId;
  }
  /**
   * @return string
   */
  public function getVideoOwnerChannelId()
  {
    return $this->videoOwnerChannelId;
  }
  /**
   * @param string
   */
  public function setVideoOwnerChannelTitle($videoOwnerChannelTitle)
  {
    $this->videoOwnerChannelTitle = $videoOwnerChannelTitle;
  }
  /**
   * @return string
   */
  public function getVideoOwnerChannelTitle()
  {
    return $this->videoOwnerChannelTitle;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PlaylistItemSnippet::class, 'Google_Service_YouTube_PlaylistItemSnippet');
