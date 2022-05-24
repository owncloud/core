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

class VideoSnippet extends \Google\Collection
{
  protected $collection_key = 'tags';
  /**
   * @var string
   */
  public $categoryId;
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
  public $defaultAudioLanguage;
  /**
   * @var string
   */
  public $defaultLanguage;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $liveBroadcastContent;
  protected $localizedType = VideoLocalization::class;
  protected $localizedDataType = '';
  /**
   * @var string
   */
  public $publishedAt;
  /**
   * @var string[]
   */
  public $tags;
  protected $thumbnailsType = ThumbnailDetails::class;
  protected $thumbnailsDataType = '';
  /**
   * @var string
   */
  public $title;

  /**
   * @param string
   */
  public function setCategoryId($categoryId)
  {
    $this->categoryId = $categoryId;
  }
  /**
   * @return string
   */
  public function getCategoryId()
  {
    return $this->categoryId;
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
  public function setDefaultAudioLanguage($defaultAudioLanguage)
  {
    $this->defaultAudioLanguage = $defaultAudioLanguage;
  }
  /**
   * @return string
   */
  public function getDefaultAudioLanguage()
  {
    return $this->defaultAudioLanguage;
  }
  /**
   * @param string
   */
  public function setDefaultLanguage($defaultLanguage)
  {
    $this->defaultLanguage = $defaultLanguage;
  }
  /**
   * @return string
   */
  public function getDefaultLanguage()
  {
    return $this->defaultLanguage;
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
  public function setLiveBroadcastContent($liveBroadcastContent)
  {
    $this->liveBroadcastContent = $liveBroadcastContent;
  }
  /**
   * @return string
   */
  public function getLiveBroadcastContent()
  {
    return $this->liveBroadcastContent;
  }
  /**
   * @param VideoLocalization
   */
  public function setLocalized(VideoLocalization $localized)
  {
    $this->localized = $localized;
  }
  /**
   * @return VideoLocalization
   */
  public function getLocalized()
  {
    return $this->localized;
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
   * @param string[]
   */
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  /**
   * @return string[]
   */
  public function getTags()
  {
    return $this->tags;
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
class_alias(VideoSnippet::class, 'Google_Service_YouTube_VideoSnippet');
