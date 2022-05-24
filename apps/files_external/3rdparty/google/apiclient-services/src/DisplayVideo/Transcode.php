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

namespace Google\Service\DisplayVideo;

class Transcode extends \Google\Model
{
  /**
   * @var string
   */
  public $audioBitRateKbps;
  /**
   * @var string
   */
  public $audioSampleRateHz;
  /**
   * @var string
   */
  public $bitRateKbps;
  protected $dimensionsType = Dimensions::class;
  protected $dimensionsDataType = '';
  /**
   * @var string
   */
  public $fileSizeBytes;
  /**
   * @var float
   */
  public $frameRate;
  /**
   * @var string
   */
  public $mimeType;
  /**
   * @var string
   */
  public $name;
  /**
   * @var bool
   */
  public $transcoded;

  /**
   * @param string
   */
  public function setAudioBitRateKbps($audioBitRateKbps)
  {
    $this->audioBitRateKbps = $audioBitRateKbps;
  }
  /**
   * @return string
   */
  public function getAudioBitRateKbps()
  {
    return $this->audioBitRateKbps;
  }
  /**
   * @param string
   */
  public function setAudioSampleRateHz($audioSampleRateHz)
  {
    $this->audioSampleRateHz = $audioSampleRateHz;
  }
  /**
   * @return string
   */
  public function getAudioSampleRateHz()
  {
    return $this->audioSampleRateHz;
  }
  /**
   * @param string
   */
  public function setBitRateKbps($bitRateKbps)
  {
    $this->bitRateKbps = $bitRateKbps;
  }
  /**
   * @return string
   */
  public function getBitRateKbps()
  {
    return $this->bitRateKbps;
  }
  /**
   * @param Dimensions
   */
  public function setDimensions(Dimensions $dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return Dimensions
   */
  public function getDimensions()
  {
    return $this->dimensions;
  }
  /**
   * @param string
   */
  public function setFileSizeBytes($fileSizeBytes)
  {
    $this->fileSizeBytes = $fileSizeBytes;
  }
  /**
   * @return string
   */
  public function getFileSizeBytes()
  {
    return $this->fileSizeBytes;
  }
  /**
   * @param float
   */
  public function setFrameRate($frameRate)
  {
    $this->frameRate = $frameRate;
  }
  /**
   * @return float
   */
  public function getFrameRate()
  {
    return $this->frameRate;
  }
  /**
   * @param string
   */
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  /**
   * @return string
   */
  public function getMimeType()
  {
    return $this->mimeType;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param bool
   */
  public function setTranscoded($transcoded)
  {
    $this->transcoded = $transcoded;
  }
  /**
   * @return bool
   */
  public function getTranscoded()
  {
    return $this->transcoded;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Transcode::class, 'Google_Service_DisplayVideo_Transcode');
