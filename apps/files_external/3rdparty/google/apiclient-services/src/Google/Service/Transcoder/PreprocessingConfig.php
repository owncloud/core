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

class Google_Service_Transcoder_PreprocessingConfig extends Google_Model
{
  protected $audioType = 'Google_Service_Transcoder_Audio';
  protected $audioDataType = '';
  protected $colorType = 'Google_Service_Transcoder_Color';
  protected $colorDataType = '';
  protected $cropType = 'Google_Service_Transcoder_Crop';
  protected $cropDataType = '';
  protected $deblockType = 'Google_Service_Transcoder_Deblock';
  protected $deblockDataType = '';
  protected $denoiseType = 'Google_Service_Transcoder_Denoise';
  protected $denoiseDataType = '';

  /**
   * @param Google_Service_Transcoder_Audio
   */
  public function setAudio(Google_Service_Transcoder_Audio $audio)
  {
    $this->audio = $audio;
  }
  /**
   * @return Google_Service_Transcoder_Audio
   */
  public function getAudio()
  {
    return $this->audio;
  }
  /**
   * @param Google_Service_Transcoder_Color
   */
  public function setColor(Google_Service_Transcoder_Color $color)
  {
    $this->color = $color;
  }
  /**
   * @return Google_Service_Transcoder_Color
   */
  public function getColor()
  {
    return $this->color;
  }
  /**
   * @param Google_Service_Transcoder_Crop
   */
  public function setCrop(Google_Service_Transcoder_Crop $crop)
  {
    $this->crop = $crop;
  }
  /**
   * @return Google_Service_Transcoder_Crop
   */
  public function getCrop()
  {
    return $this->crop;
  }
  /**
   * @param Google_Service_Transcoder_Deblock
   */
  public function setDeblock(Google_Service_Transcoder_Deblock $deblock)
  {
    $this->deblock = $deblock;
  }
  /**
   * @return Google_Service_Transcoder_Deblock
   */
  public function getDeblock()
  {
    return $this->deblock;
  }
  /**
   * @param Google_Service_Transcoder_Denoise
   */
  public function setDenoise(Google_Service_Transcoder_Denoise $denoise)
  {
    $this->denoise = $denoise;
  }
  /**
   * @return Google_Service_Transcoder_Denoise
   */
  public function getDenoise()
  {
    return $this->denoise;
  }
}
