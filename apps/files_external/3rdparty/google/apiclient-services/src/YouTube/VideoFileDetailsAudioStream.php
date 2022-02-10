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

class VideoFileDetailsAudioStream extends \Google\Model
{
  /**
   * @var string
   */
  public $bitrateBps;
  /**
   * @var string
   */
  public $channelCount;
  /**
   * @var string
   */
  public $codec;
  /**
   * @var string
   */
  public $vendor;

  /**
   * @param string
   */
  public function setBitrateBps($bitrateBps)
  {
    $this->bitrateBps = $bitrateBps;
  }
  /**
   * @return string
   */
  public function getBitrateBps()
  {
    return $this->bitrateBps;
  }
  /**
   * @param string
   */
  public function setChannelCount($channelCount)
  {
    $this->channelCount = $channelCount;
  }
  /**
   * @return string
   */
  public function getChannelCount()
  {
    return $this->channelCount;
  }
  /**
   * @param string
   */
  public function setCodec($codec)
  {
    $this->codec = $codec;
  }
  /**
   * @return string
   */
  public function getCodec()
  {
    return $this->codec;
  }
  /**
   * @param string
   */
  public function setVendor($vendor)
  {
    $this->vendor = $vendor;
  }
  /**
   * @return string
   */
  public function getVendor()
  {
    return $this->vendor;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoFileDetailsAudioStream::class, 'Google_Service_YouTube_VideoFileDetailsAudioStream');
