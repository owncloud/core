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

namespace Google\Service\Contentwarehouse;

class ImageRepositoryVideoProperties extends \Google\Model
{
  /**
   * @var bool
   */
  public $audioOnly;
  protected $contentBasedMetadataType = ImageRepositoryContentBasedVideoMetadata::class;
  protected $contentBasedMetadataDataType = '';
  protected $crawlStateType = ImageMoosedogCrawlState::class;
  protected $crawlStateDataType = '';
  /**
   * @var string
   */
  public $firstCrawlTimestampSec;
  /**
   * @var string
   */
  public $firstProcessingTimestampSec;
  protected $inlinePlaybackType = VideoCrawlVideoInlinePlaybackMetadata::class;
  protected $inlinePlaybackDataType = '';
  /**
   * @var string
   */
  public $lastCrawlRequestTimestampSec;
  /**
   * @var string
   */
  public $lastProcessingTimestampSec;
  /**
   * @var string
   */
  public $url;

  /**
   * @param bool
   */
  public function setAudioOnly($audioOnly)
  {
    $this->audioOnly = $audioOnly;
  }
  /**
   * @return bool
   */
  public function getAudioOnly()
  {
    return $this->audioOnly;
  }
  /**
   * @param ImageRepositoryContentBasedVideoMetadata
   */
  public function setContentBasedMetadata(ImageRepositoryContentBasedVideoMetadata $contentBasedMetadata)
  {
    $this->contentBasedMetadata = $contentBasedMetadata;
  }
  /**
   * @return ImageRepositoryContentBasedVideoMetadata
   */
  public function getContentBasedMetadata()
  {
    return $this->contentBasedMetadata;
  }
  /**
   * @param ImageMoosedogCrawlState
   */
  public function setCrawlState(ImageMoosedogCrawlState $crawlState)
  {
    $this->crawlState = $crawlState;
  }
  /**
   * @return ImageMoosedogCrawlState
   */
  public function getCrawlState()
  {
    return $this->crawlState;
  }
  /**
   * @param string
   */
  public function setFirstCrawlTimestampSec($firstCrawlTimestampSec)
  {
    $this->firstCrawlTimestampSec = $firstCrawlTimestampSec;
  }
  /**
   * @return string
   */
  public function getFirstCrawlTimestampSec()
  {
    return $this->firstCrawlTimestampSec;
  }
  /**
   * @param string
   */
  public function setFirstProcessingTimestampSec($firstProcessingTimestampSec)
  {
    $this->firstProcessingTimestampSec = $firstProcessingTimestampSec;
  }
  /**
   * @return string
   */
  public function getFirstProcessingTimestampSec()
  {
    return $this->firstProcessingTimestampSec;
  }
  /**
   * @param VideoCrawlVideoInlinePlaybackMetadata
   */
  public function setInlinePlayback(VideoCrawlVideoInlinePlaybackMetadata $inlinePlayback)
  {
    $this->inlinePlayback = $inlinePlayback;
  }
  /**
   * @return VideoCrawlVideoInlinePlaybackMetadata
   */
  public function getInlinePlayback()
  {
    return $this->inlinePlayback;
  }
  /**
   * @param string
   */
  public function setLastCrawlRequestTimestampSec($lastCrawlRequestTimestampSec)
  {
    $this->lastCrawlRequestTimestampSec = $lastCrawlRequestTimestampSec;
  }
  /**
   * @return string
   */
  public function getLastCrawlRequestTimestampSec()
  {
    return $this->lastCrawlRequestTimestampSec;
  }
  /**
   * @param string
   */
  public function setLastProcessingTimestampSec($lastProcessingTimestampSec)
  {
    $this->lastProcessingTimestampSec = $lastProcessingTimestampSec;
  }
  /**
   * @return string
   */
  public function getLastProcessingTimestampSec()
  {
    return $this->lastProcessingTimestampSec;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageRepositoryVideoProperties::class, 'Google_Service_Contentwarehouse_ImageRepositoryVideoProperties');
