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

class H264CodecSettings extends \Google\Model
{
  /**
   * @var bool
   */
  public $allowOpenGop;
  public $aqStrength;
  /**
   * @var int
   */
  public $bFrameCount;
  /**
   * @var bool
   */
  public $bPyramid;
  /**
   * @var int
   */
  public $bitrateBps;
  /**
   * @var int
   */
  public $crfLevel;
  /**
   * @var bool
   */
  public $enableTwoPass;
  /**
   * @var string
   */
  public $entropyCoder;
  public $frameRate;
  /**
   * @var string
   */
  public $gopDuration;
  /**
   * @var int
   */
  public $gopFrameCount;
  /**
   * @var int
   */
  public $heightPixels;
  /**
   * @var string
   */
  public $pixelFormat;
  /**
   * @var string
   */
  public $preset;
  /**
   * @var string
   */
  public $profile;
  /**
   * @var string
   */
  public $rateControlMode;
  /**
   * @var string
   */
  public $tune;
  /**
   * @var int
   */
  public $vbvFullnessBits;
  /**
   * @var int
   */
  public $vbvSizeBits;
  /**
   * @var int
   */
  public $widthPixels;

  /**
   * @param bool
   */
  public function setAllowOpenGop($allowOpenGop)
  {
    $this->allowOpenGop = $allowOpenGop;
  }
  /**
   * @return bool
   */
  public function getAllowOpenGop()
  {
    return $this->allowOpenGop;
  }
  public function setAqStrength($aqStrength)
  {
    $this->aqStrength = $aqStrength;
  }
  public function getAqStrength()
  {
    return $this->aqStrength;
  }
  /**
   * @param int
   */
  public function setBFrameCount($bFrameCount)
  {
    $this->bFrameCount = $bFrameCount;
  }
  /**
   * @return int
   */
  public function getBFrameCount()
  {
    return $this->bFrameCount;
  }
  /**
   * @param bool
   */
  public function setBPyramid($bPyramid)
  {
    $this->bPyramid = $bPyramid;
  }
  /**
   * @return bool
   */
  public function getBPyramid()
  {
    return $this->bPyramid;
  }
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
  public function setCrfLevel($crfLevel)
  {
    $this->crfLevel = $crfLevel;
  }
  /**
   * @return int
   */
  public function getCrfLevel()
  {
    return $this->crfLevel;
  }
  /**
   * @param bool
   */
  public function setEnableTwoPass($enableTwoPass)
  {
    $this->enableTwoPass = $enableTwoPass;
  }
  /**
   * @return bool
   */
  public function getEnableTwoPass()
  {
    return $this->enableTwoPass;
  }
  /**
   * @param string
   */
  public function setEntropyCoder($entropyCoder)
  {
    $this->entropyCoder = $entropyCoder;
  }
  /**
   * @return string
   */
  public function getEntropyCoder()
  {
    return $this->entropyCoder;
  }
  public function setFrameRate($frameRate)
  {
    $this->frameRate = $frameRate;
  }
  public function getFrameRate()
  {
    return $this->frameRate;
  }
  /**
   * @param string
   */
  public function setGopDuration($gopDuration)
  {
    $this->gopDuration = $gopDuration;
  }
  /**
   * @return string
   */
  public function getGopDuration()
  {
    return $this->gopDuration;
  }
  /**
   * @param int
   */
  public function setGopFrameCount($gopFrameCount)
  {
    $this->gopFrameCount = $gopFrameCount;
  }
  /**
   * @return int
   */
  public function getGopFrameCount()
  {
    return $this->gopFrameCount;
  }
  /**
   * @param int
   */
  public function setHeightPixels($heightPixels)
  {
    $this->heightPixels = $heightPixels;
  }
  /**
   * @return int
   */
  public function getHeightPixels()
  {
    return $this->heightPixels;
  }
  /**
   * @param string
   */
  public function setPixelFormat($pixelFormat)
  {
    $this->pixelFormat = $pixelFormat;
  }
  /**
   * @return string
   */
  public function getPixelFormat()
  {
    return $this->pixelFormat;
  }
  /**
   * @param string
   */
  public function setPreset($preset)
  {
    $this->preset = $preset;
  }
  /**
   * @return string
   */
  public function getPreset()
  {
    return $this->preset;
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
  public function setRateControlMode($rateControlMode)
  {
    $this->rateControlMode = $rateControlMode;
  }
  /**
   * @return string
   */
  public function getRateControlMode()
  {
    return $this->rateControlMode;
  }
  /**
   * @param string
   */
  public function setTune($tune)
  {
    $this->tune = $tune;
  }
  /**
   * @return string
   */
  public function getTune()
  {
    return $this->tune;
  }
  /**
   * @param int
   */
  public function setVbvFullnessBits($vbvFullnessBits)
  {
    $this->vbvFullnessBits = $vbvFullnessBits;
  }
  /**
   * @return int
   */
  public function getVbvFullnessBits()
  {
    return $this->vbvFullnessBits;
  }
  /**
   * @param int
   */
  public function setVbvSizeBits($vbvSizeBits)
  {
    $this->vbvSizeBits = $vbvSizeBits;
  }
  /**
   * @return int
   */
  public function getVbvSizeBits()
  {
    return $this->vbvSizeBits;
  }
  /**
   * @param int
   */
  public function setWidthPixels($widthPixels)
  {
    $this->widthPixels = $widthPixels;
  }
  /**
   * @return int
   */
  public function getWidthPixels()
  {
    return $this->widthPixels;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(H264CodecSettings::class, 'Google_Service_Transcoder_H264CodecSettings');
