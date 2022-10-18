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

class VideoCrawlVideoInlinePlaybackMetadata extends \Google\Collection
{
  protected $collection_key = 'transcodeItags';
  /**
   * @var string
   */
  public $expirationTimestampSec;
  /**
   * @var string
   */
  public $googleAnalyticsId;
  /**
   * @var string[]
   */
  public $playbackCountryBlacklist;
  /**
   * @var string[]
   */
  public $playbackCountryWhitelist;
  /**
   * @var int[]
   */
  public $transcodeItags;
  /**
   * @var string
   */
  public $vastTag;
  /**
   * @var string
   */
  public $videoId;
  /**
   * @var string
   */
  public $videoUrlOnExternalCdn;

  /**
   * @param string
   */
  public function setExpirationTimestampSec($expirationTimestampSec)
  {
    $this->expirationTimestampSec = $expirationTimestampSec;
  }
  /**
   * @return string
   */
  public function getExpirationTimestampSec()
  {
    return $this->expirationTimestampSec;
  }
  /**
   * @param string
   */
  public function setGoogleAnalyticsId($googleAnalyticsId)
  {
    $this->googleAnalyticsId = $googleAnalyticsId;
  }
  /**
   * @return string
   */
  public function getGoogleAnalyticsId()
  {
    return $this->googleAnalyticsId;
  }
  /**
   * @param string[]
   */
  public function setPlaybackCountryBlacklist($playbackCountryBlacklist)
  {
    $this->playbackCountryBlacklist = $playbackCountryBlacklist;
  }
  /**
   * @return string[]
   */
  public function getPlaybackCountryBlacklist()
  {
    return $this->playbackCountryBlacklist;
  }
  /**
   * @param string[]
   */
  public function setPlaybackCountryWhitelist($playbackCountryWhitelist)
  {
    $this->playbackCountryWhitelist = $playbackCountryWhitelist;
  }
  /**
   * @return string[]
   */
  public function getPlaybackCountryWhitelist()
  {
    return $this->playbackCountryWhitelist;
  }
  /**
   * @param int[]
   */
  public function setTranscodeItags($transcodeItags)
  {
    $this->transcodeItags = $transcodeItags;
  }
  /**
   * @return int[]
   */
  public function getTranscodeItags()
  {
    return $this->transcodeItags;
  }
  /**
   * @param string
   */
  public function setVastTag($vastTag)
  {
    $this->vastTag = $vastTag;
  }
  /**
   * @return string
   */
  public function getVastTag()
  {
    return $this->vastTag;
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
  public function setVideoUrlOnExternalCdn($videoUrlOnExternalCdn)
  {
    $this->videoUrlOnExternalCdn = $videoUrlOnExternalCdn;
  }
  /**
   * @return string
   */
  public function getVideoUrlOnExternalCdn()
  {
    return $this->videoUrlOnExternalCdn;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoCrawlVideoInlinePlaybackMetadata::class, 'Google_Service_Contentwarehouse_VideoCrawlVideoInlinePlaybackMetadata');
