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

class VideoMediaOverviewAudioOverview extends \Google\Model
{
  /**
   * @var int
   */
  public $channels;
  /**
   * @var string
   */
  public $contentType;
  /**
   * @var string
   */
  public $language;
  public $loudness1770Lkfs;
  /**
   * @var int
   */
  public $roundedUpOriginalDurationSec;
  /**
   * @var string
   */
  public $spatialAudioMode;

  /**
   * @param int
   */
  public function setChannels($channels)
  {
    $this->channels = $channels;
  }
  /**
   * @return int
   */
  public function getChannels()
  {
    return $this->channels;
  }
  /**
   * @param string
   */
  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }
  /**
   * @return string
   */
  public function getContentType()
  {
    return $this->contentType;
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
  public function setLoudness1770Lkfs($loudness1770Lkfs)
  {
    $this->loudness1770Lkfs = $loudness1770Lkfs;
  }
  public function getLoudness1770Lkfs()
  {
    return $this->loudness1770Lkfs;
  }
  /**
   * @param int
   */
  public function setRoundedUpOriginalDurationSec($roundedUpOriginalDurationSec)
  {
    $this->roundedUpOriginalDurationSec = $roundedUpOriginalDurationSec;
  }
  /**
   * @return int
   */
  public function getRoundedUpOriginalDurationSec()
  {
    return $this->roundedUpOriginalDurationSec;
  }
  /**
   * @param string
   */
  public function setSpatialAudioMode($spatialAudioMode)
  {
    $this->spatialAudioMode = $spatialAudioMode;
  }
  /**
   * @return string
   */
  public function getSpatialAudioMode()
  {
    return $this->spatialAudioMode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoMediaOverviewAudioOverview::class, 'Google_Service_Contentwarehouse_VideoMediaOverviewAudioOverview');
