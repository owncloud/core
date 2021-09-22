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

class PreprocessingConfig extends \Google\Model
{
  protected $audioType = Audio::class;
  protected $audioDataType = '';
  protected $colorType = Color::class;
  protected $colorDataType = '';
  protected $cropType = Crop::class;
  protected $cropDataType = '';
  protected $deblockType = Deblock::class;
  protected $deblockDataType = '';
  protected $denoiseType = Denoise::class;
  protected $denoiseDataType = '';
  protected $padType = Pad::class;
  protected $padDataType = '';

  /**
   * @param Audio
   */
  public function setAudio(Audio $audio)
  {
    $this->audio = $audio;
  }
  /**
   * @return Audio
   */
  public function getAudio()
  {
    return $this->audio;
  }
  /**
   * @param Color
   */
  public function setColor(Color $color)
  {
    $this->color = $color;
  }
  /**
   * @return Color
   */
  public function getColor()
  {
    return $this->color;
  }
  /**
   * @param Crop
   */
  public function setCrop(Crop $crop)
  {
    $this->crop = $crop;
  }
  /**
   * @return Crop
   */
  public function getCrop()
  {
    return $this->crop;
  }
  /**
   * @param Deblock
   */
  public function setDeblock(Deblock $deblock)
  {
    $this->deblock = $deblock;
  }
  /**
   * @return Deblock
   */
  public function getDeblock()
  {
    return $this->deblock;
  }
  /**
   * @param Denoise
   */
  public function setDenoise(Denoise $denoise)
  {
    $this->denoise = $denoise;
  }
  /**
   * @return Denoise
   */
  public function getDenoise()
  {
    return $this->denoise;
  }
  /**
   * @param Pad
   */
  public function setPad(Pad $pad)
  {
    $this->pad = $pad;
  }
  /**
   * @return Pad
   */
  public function getPad()
  {
    return $this->pad;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PreprocessingConfig::class, 'Google_Service_Transcoder_PreprocessingConfig');
