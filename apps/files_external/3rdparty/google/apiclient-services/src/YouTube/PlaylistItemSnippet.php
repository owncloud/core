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
  public $channelId;
  public $channelTitle;
  public $description;
  public $playlistId;
  public $position;
  public $publishedAt;
  protected $resourceIdType = ResourceId::class;
  protected $resourceIdDataType = '';
  protected $thumbnailsType = ThumbnailDetails::class;
  protected $thumbnailsDataType = '';
  public $title;
  public $videoOwnerChannelId;
  public $videoOwnerChannelTitle;

  public function setChannelId($channelId)
  {
    $this->channelId = $channelId;
  }
  public function getChannelId()
  {
    return $this->channelId;
  }
  public function setChannelTitle($channelTitle)
  {
    $this->channelTitle = $channelTitle;
  }
  public function getChannelTitle()
  {
    return $this->channelTitle;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setPlaylistId($playlistId)
  {
    $this->playlistId = $playlistId;
  }
  public function getPlaylistId()
  {
    return $this->playlistId;
  }
  public function setPosition($position)
  {
    $this->position = $position;
  }
  public function getPosition()
  {
    return $this->position;
  }
  public function setPublishedAt($publishedAt)
  {
    $this->publishedAt = $publishedAt;
  }
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
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setVideoOwnerChannelId($videoOwnerChannelId)
  {
    $this->videoOwnerChannelId = $videoOwnerChannelId;
  }
  public function getVideoOwnerChannelId()
  {
    return $this->videoOwnerChannelId;
  }
  public function setVideoOwnerChannelTitle($videoOwnerChannelTitle)
  {
    $this->videoOwnerChannelTitle = $videoOwnerChannelTitle;
  }
  public function getVideoOwnerChannelTitle()
  {
    return $this->videoOwnerChannelTitle;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PlaylistItemSnippet::class, 'Google_Service_YouTube_PlaylistItemSnippet');
