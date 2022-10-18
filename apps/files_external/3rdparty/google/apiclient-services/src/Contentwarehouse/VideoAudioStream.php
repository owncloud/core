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

class VideoAudioStream extends \Google\Model
{
  /**
   * @var string
   */
  public $bitrate;
  /**
   * @var int
   */
  public $channels;
  /**
   * @var int
   */
  public $codecId;
  /**
   * @var string
   */
  public $contentType;
  /**
   * @var string
   */
  public $language;
  public $lengthSec;
  /**
   * @var float
   */
  public $loudness1770Lkfs;
  /**
   * @var string
   */
  public $sampleRate;
  /**
   * @var string
   */
  public $streamIndex;

  /**
   * @param string
   */
  public function setBitrate($bitrate)
  {
    $this->bitrate = $bitrate;
  }
  /**
   * @return string
   */
  public function getBitrate()
  {
    return $this->bitrate;
  }
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
   * @param int
   */
  public function setCodecId($codecId)
  {
    $this->codecId = $codecId;
  }
  /**
   * @return int
   */
  public function getCodecId()
  {
    return $this->codecId;
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
  public function setLengthSec($lengthSec)
  {
    $this->lengthSec = $lengthSec;
  }
  public function getLengthSec()
  {
    return $this->lengthSec;
  }
  /**
   * @param float
   */
  public function setLoudness1770Lkfs($loudness1770Lkfs)
  {
    $this->loudness1770Lkfs = $loudness1770Lkfs;
  }
  /**
   * @return float
   */
  public function getLoudness1770Lkfs()
  {
    return $this->loudness1770Lkfs;
  }
  /**
   * @param string
   */
  public function setSampleRate($sampleRate)
  {
    $this->sampleRate = $sampleRate;
  }
  /**
   * @return string
   */
  public function getSampleRate()
  {
    return $this->sampleRate;
  }
  /**
   * @param string
   */
  public function setStreamIndex($streamIndex)
  {
    $this->streamIndex = $streamIndex;
  }
  /**
   * @return string
   */
  public function getStreamIndex()
  {
    return $this->streamIndex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoAudioStream::class, 'Google_Service_Contentwarehouse_VideoAudioStream');
