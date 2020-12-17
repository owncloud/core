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

class Google_Service_Transcoder_AudioStream extends Google_Collection
{
  protected $collection_key = 'mapping';
  public $bitrateBps;
  public $channelCount;
  public $channelLayout;
  public $codec;
  protected $mappingType = 'Google_Service_Transcoder_AudioAtom';
  protected $mappingDataType = 'array';
  public $sampleRateHertz;

  public function setBitrateBps($bitrateBps)
  {
    $this->bitrateBps = $bitrateBps;
  }
  public function getBitrateBps()
  {
    return $this->bitrateBps;
  }
  public function setChannelCount($channelCount)
  {
    $this->channelCount = $channelCount;
  }
  public function getChannelCount()
  {
    return $this->channelCount;
  }
  public function setChannelLayout($channelLayout)
  {
    $this->channelLayout = $channelLayout;
  }
  public function getChannelLayout()
  {
    return $this->channelLayout;
  }
  public function setCodec($codec)
  {
    $this->codec = $codec;
  }
  public function getCodec()
  {
    return $this->codec;
  }
  /**
   * @param Google_Service_Transcoder_AudioAtom[]
   */
  public function setMapping($mapping)
  {
    $this->mapping = $mapping;
  }
  /**
   * @return Google_Service_Transcoder_AudioAtom[]
   */
  public function getMapping()
  {
    return $this->mapping;
  }
  public function setSampleRateHertz($sampleRateHertz)
  {
    $this->sampleRateHertz = $sampleRateHertz;
  }
  public function getSampleRateHertz()
  {
    return $this->sampleRateHertz;
  }
}
