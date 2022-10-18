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

class VideoVideoStreamInfoAudioStream extends \Google\Collection
{
  protected $collection_key = 'metadata';
  protected $ambisonicsType = VideoAmbisonicsAmbisonicsMetadata::class;
  protected $ambisonicsDataType = '';
  /**
   * @var string
   */
  public $bitrate;
  /**
   * @var string[]
   */
  public $channelPosition;
  /**
   * @var int
   */
  public $channels;
  /**
   * @var string
   */
  public $clockDiscontinuityUs;
  /**
   * @var string
   */
  public $codecFourcc;
  /**
   * @var string
   */
  public $codecId;
  /**
   * @var string
   */
  public $codecString;
  /**
   * @var string
   */
  public $contentType;
  /**
   * @var string
   */
  public $decodeOffset;
  /**
   * @var string
   */
  public $endTimestamp;
  /**
   * @var string
   */
  public $frameSize;
  /**
   * @var string
   */
  public $language;
  public $length;
  protected $metadataType = VideoClipInfo::class;
  protected $metadataDataType = 'array';
  /**
   * @var string
   */
  public $numberOfFrames;
  /**
   * @var string
   */
  public $profile;
  /**
   * @var string
   */
  public $sampleRate;
  /**
   * @var int
   */
  public $sampleSize;
  /**
   * @var string
   */
  public $startTimestamp;
  /**
   * @var string
   */
  public $streamCodecTag;
  /**
   * @var string
   */
  public $streamIndex;

  /**
   * @param VideoAmbisonicsAmbisonicsMetadata
   */
  public function setAmbisonics(VideoAmbisonicsAmbisonicsMetadata $ambisonics)
  {
    $this->ambisonics = $ambisonics;
  }
  /**
   * @return VideoAmbisonicsAmbisonicsMetadata
   */
  public function getAmbisonics()
  {
    return $this->ambisonics;
  }
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
   * @param string[]
   */
  public function setChannelPosition($channelPosition)
  {
    $this->channelPosition = $channelPosition;
  }
  /**
   * @return string[]
   */
  public function getChannelPosition()
  {
    return $this->channelPosition;
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
   * @param string
   */
  public function setClockDiscontinuityUs($clockDiscontinuityUs)
  {
    $this->clockDiscontinuityUs = $clockDiscontinuityUs;
  }
  /**
   * @return string
   */
  public function getClockDiscontinuityUs()
  {
    return $this->clockDiscontinuityUs;
  }
  /**
   * @param string
   */
  public function setCodecFourcc($codecFourcc)
  {
    $this->codecFourcc = $codecFourcc;
  }
  /**
   * @return string
   */
  public function getCodecFourcc()
  {
    return $this->codecFourcc;
  }
  /**
   * @param string
   */
  public function setCodecId($codecId)
  {
    $this->codecId = $codecId;
  }
  /**
   * @return string
   */
  public function getCodecId()
  {
    return $this->codecId;
  }
  /**
   * @param string
   */
  public function setCodecString($codecString)
  {
    $this->codecString = $codecString;
  }
  /**
   * @return string
   */
  public function getCodecString()
  {
    return $this->codecString;
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
  public function setDecodeOffset($decodeOffset)
  {
    $this->decodeOffset = $decodeOffset;
  }
  /**
   * @return string
   */
  public function getDecodeOffset()
  {
    return $this->decodeOffset;
  }
  /**
   * @param string
   */
  public function setEndTimestamp($endTimestamp)
  {
    $this->endTimestamp = $endTimestamp;
  }
  /**
   * @return string
   */
  public function getEndTimestamp()
  {
    return $this->endTimestamp;
  }
  /**
   * @param string
   */
  public function setFrameSize($frameSize)
  {
    $this->frameSize = $frameSize;
  }
  /**
   * @return string
   */
  public function getFrameSize()
  {
    return $this->frameSize;
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
  public function setLength($length)
  {
    $this->length = $length;
  }
  public function getLength()
  {
    return $this->length;
  }
  /**
   * @param VideoClipInfo[]
   */
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return VideoClipInfo[]
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param string
   */
  public function setNumberOfFrames($numberOfFrames)
  {
    $this->numberOfFrames = $numberOfFrames;
  }
  /**
   * @return string
   */
  public function getNumberOfFrames()
  {
    return $this->numberOfFrames;
  }
  /**
   * @param string
   */
  public function setProfile($profile)
  {
    $this->profile = $profile;
  }
  /**
   * @return string
   */
  public function getProfile()
  {
    return $this->profile;
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
   * @param int
   */
  public function setSampleSize($sampleSize)
  {
    $this->sampleSize = $sampleSize;
  }
  /**
   * @return int
   */
  public function getSampleSize()
  {
    return $this->sampleSize;
  }
  /**
   * @param string
   */
  public function setStartTimestamp($startTimestamp)
  {
    $this->startTimestamp = $startTimestamp;
  }
  /**
   * @return string
   */
  public function getStartTimestamp()
  {
    return $this->startTimestamp;
  }
  /**
   * @param string
   */
  public function setStreamCodecTag($streamCodecTag)
  {
    $this->streamCodecTag = $streamCodecTag;
  }
  /**
   * @return string
   */
  public function getStreamCodecTag()
  {
    return $this->streamCodecTag;
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
class_alias(VideoVideoStreamInfoAudioStream::class, 'Google_Service_Contentwarehouse_VideoVideoStreamInfoAudioStream');
