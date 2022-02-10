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

class CommentSnippet extends \Google\Model
{
  protected $authorChannelIdType = CommentSnippetAuthorChannelId::class;
  protected $authorChannelIdDataType = '';
  /**
   * @var string
   */
  public $authorChannelUrl;
  /**
   * @var string
   */
  public $authorDisplayName;
  /**
   * @var string
   */
  public $authorProfileImageUrl;
  /**
   * @var bool
   */
  public $canRate;
  /**
   * @var string
   */
  public $channelId;
  /**
   * @var string
   */
  public $likeCount;
  /**
   * @var string
   */
  public $moderationStatus;
  /**
   * @var string
   */
  public $parentId;
  /**
   * @var string
   */
  public $publishedAt;
  /**
   * @var string
   */
  public $textDisplay;
  /**
   * @var string
   */
  public $textOriginal;
  /**
   * @var string
   */
  public $updatedAt;
  /**
   * @var string
   */
  public $videoId;
  /**
   * @var string
   */
  public $viewerRating;

  /**
   * @param CommentSnippetAuthorChannelId
   */
  public function setAuthorChannelId(CommentSnippetAuthorChannelId $authorChannelId)
  {
    $this->authorChannelId = $authorChannelId;
  }
  /**
   * @return CommentSnippetAuthorChannelId
   */
  public function getAuthorChannelId()
  {
    return $this->authorChannelId;
  }
  /**
   * @param string
   */
  public function setAuthorChannelUrl($authorChannelUrl)
  {
    $this->authorChannelUrl = $authorChannelUrl;
  }
  /**
   * @return string
   */
  public function getAuthorChannelUrl()
  {
    return $this->authorChannelUrl;
  }
  /**
   * @param string
   */
  public function setAuthorDisplayName($authorDisplayName)
  {
    $this->authorDisplayName = $authorDisplayName;
  }
  /**
   * @return string
   */
  public function getAuthorDisplayName()
  {
    return $this->authorDisplayName;
  }
  /**
   * @param string
   */
  public function setAuthorProfileImageUrl($authorProfileImageUrl)
  {
    $this->authorProfileImageUrl = $authorProfileImageUrl;
  }
  /**
   * @return string
   */
  public function getAuthorProfileImageUrl()
  {
    return $this->authorProfileImageUrl;
  }
  /**
   * @param bool
   */
  public function setCanRate($canRate)
  {
    $this->canRate = $canRate;
  }
  /**
   * @return bool
   */
  public function getCanRate()
  {
    return $this->canRate;
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
  public function setLikeCount($likeCount)
  {
    $this->likeCount = $likeCount;
  }
  /**
   * @return string
   */
  public function getLikeCount()
  {
    return $this->likeCount;
  }
  /**
   * @param string
   */
  public function setModerationStatus($moderationStatus)
  {
    $this->moderationStatus = $moderationStatus;
  }
  /**
   * @return string
   */
  public function getModerationStatus()
  {
    return $this->moderationStatus;
  }
  /**
   * @param string
   */
  public function setParentId($parentId)
  {
    $this->parentId = $parentId;
  }
  /**
   * @return string
   */
  public function getParentId()
  {
    return $this->parentId;
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
  public function setTextDisplay($textDisplay)
  {
    $this->textDisplay = $textDisplay;
  }
  /**
   * @return string
   */
  public function getTextDisplay()
  {
    return $this->textDisplay;
  }
  /**
   * @param string
   */
  public function setTextOriginal($textOriginal)
  {
    $this->textOriginal = $textOriginal;
  }
  /**
   * @return string
   */
  public function getTextOriginal()
  {
    return $this->textOriginal;
  }
  /**
   * @param string
   */
  public function setUpdatedAt($updatedAt)
  {
    $this->updatedAt = $updatedAt;
  }
  /**
   * @return string
   */
  public function getUpdatedAt()
  {
    return $this->updatedAt;
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
  public function setViewerRating($viewerRating)
  {
    $this->viewerRating = $viewerRating;
  }
  /**
   * @return string
   */
  public function getViewerRating()
  {
    return $this->viewerRating;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CommentSnippet::class, 'Google_Service_YouTube_CommentSnippet');
