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

class Google_Service_DisplayVideo_Transcode extends Google_Model
{
  public $audioBitRateKbps;
  public $audioSampleRateHz;
  public $bitRateKbps;
  protected $dimensionsType = 'Google_Service_DisplayVideo_Dimensions';
  protected $dimensionsDataType = '';
  public $fileSizeBytes;
  public $frameRate;
  public $mimeType;
  public $name;
  public $transcoded;

  public function setAudioBitRateKbps($audioBitRateKbps)
  {
    $this->audioBitRateKbps = $audioBitRateKbps;
  }
  public function getAudioBitRateKbps()
  {
    return $this->audioBitRateKbps;
  }
  public function setAudioSampleRateHz($audioSampleRateHz)
  {
    $this->audioSampleRateHz = $audioSampleRateHz;
  }
  public function getAudioSampleRateHz()
  {
    return $this->audioSampleRateHz;
  }
  public function setBitRateKbps($bitRateKbps)
  {
    $this->bitRateKbps = $bitRateKbps;
  }
  public function getBitRateKbps()
  {
    return $this->bitRateKbps;
  }
  /**
   * @param Google_Service_DisplayVideo_Dimensions
   */
  public function setDimensions(Google_Service_DisplayVideo_Dimensions $dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return Google_Service_DisplayVideo_Dimensions
   */
  public function getDimensions()
  {
    return $this->dimensions;
  }
  public function setFileSizeBytes($fileSizeBytes)
  {
    $this->fileSizeBytes = $fileSizeBytes;
  }
  public function getFileSizeBytes()
  {
    return $this->fileSizeBytes;
  }
  public function setFrameRate($frameRate)
  {
    $this->frameRate = $frameRate;
  }
  public function getFrameRate()
  {
    return $this->frameRate;
  }
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  public function getMimeType()
  {
    return $this->mimeType;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setTranscoded($transcoded)
  {
    $this->transcoded = $transcoded;
  }
  public function getTranscoded()
  {
    return $this->transcoded;
  }
}
