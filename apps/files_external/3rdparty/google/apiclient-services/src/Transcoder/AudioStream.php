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

namespace Google\Service\Transcoder;

class AudioStream extends \Google\Collection
{
  protected $collection_key = 'mapping';
  /**
   * @var int
   */
  public $bitrateBps;
  /**
   * @var int
   */
  public $channelCount;
  /**
   * @var string[]
   */
  public $channelLayout;
  /**
   * @var string
   */
  public $codec;
  protected $mappingType = AudioMapping::class;
  protected $mappingDataType = 'array';
  /**
   * @var int
   */
  public $sampleRateHertz;

  /**
   * @param int
   */
  public function setBitrateBps($bitrateBps)
  {
    $this->bitrateBps = $bitrateBps;
  }
  /**
   * @return int
   */
  public function getBitrateBps()
  {
    return $this->bitrateBps;
  }
  /**
   * @param int
   */
  public function setChannelCount($channelCount)
  {
    $this->channelCount = $channelCount;
  }
  /**
   * @return int
   */
  public function getChannelCount()
  {
    return $this->channelCount;
  }
  /**
   * @param string[]
   */
  public function setChannelLayout($channelLayout)
  {
    $this->channelLayout = $channelLayout;
  }
  /**
   * @return string[]
   */
  public function getChannelLayout()
  {
    return $this->channelLayout;
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
   * @param AudioMapping[]
   */
  public function setMapping($mapping)
  {
    $this->mapping = $mapping;
  }
  /**
   * @return AudioMapping[]
   */
  public function getMapping()
  {
    return $this->mapping;
  }
  /**
   * @param int
   */
  public function setSampleRateHertz($sampleRateHertz)
  {
    $this->sampleRateHertz = $sampleRateHertz;
  }
  /**
   * @return int
   */
  public function getSampleRateHertz()
  {
    return $this->sampleRateHertz;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AudioStream::class, 'Google_Service_Transcoder_AudioStream');
