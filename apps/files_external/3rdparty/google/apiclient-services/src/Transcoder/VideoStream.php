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

class VideoStream extends \Google\Model
{
  public $allowOpenGop;
  public $aqStrength;
  public $bFrameCount;
  public $bPyramid;
  public $bitrateBps;
  public $codec;
  public $crfLevel;
  public $enableTwoPass;
  public $entropyCoder;
  public $frameRate;
  public $gopDuration;
  public $gopFrameCount;
  public $heightPixels;
  public $pixelFormat;
  public $preset;
  public $profile;
  public $rateControlMode;
  public $tune;
  public $vbvFullnessBits;
  public $vbvSizeBits;
  public $widthPixels;

  public function setAllowOpenGop($allowOpenGop)
  {
    $this->allowOpenGop = $allowOpenGop;
  }
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
  public function setBFrameCount($bFrameCount)
  {
    $this->bFrameCount = $bFrameCount;
  }
  public function getBFrameCount()
  {
    return $this->bFrameCount;
  }
  public function setBPyramid($bPyramid)
  {
    $this->bPyramid = $bPyramid;
  }
  public function getBPyramid()
  {
    return $this->bPyramid;
  }
  public function setBitrateBps($bitrateBps)
  {
    $this->bitrateBps = $bitrateBps;
  }
  public function getBitrateBps()
  {
    return $this->bitrateBps;
  }
  public function setCodec($codec)
  {
    $this->codec = $codec;
  }
  public function getCodec()
  {
    return $this->codec;
  }
  public function setCrfLevel($crfLevel)
  {
    $this->crfLevel = $crfLevel;
  }
  public function getCrfLevel()
  {
    return $this->crfLevel;
  }
  public function setEnableTwoPass($enableTwoPass)
  {
    $this->enableTwoPass = $enableTwoPass;
  }
  public function getEnableTwoPass()
  {
    return $this->enableTwoPass;
  }
  public function setEntropyCoder($entropyCoder)
  {
    $this->entropyCoder = $entropyCoder;
  }
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
  public function setGopDuration($gopDuration)
  {
    $this->gopDuration = $gopDuration;
  }
  public function getGopDuration()
  {
    return $this->gopDuration;
  }
  public function setGopFrameCount($gopFrameCount)
  {
    $this->gopFrameCount = $gopFrameCount;
  }
  public function getGopFrameCount()
  {
    return $this->gopFrameCount;
  }
  public function setHeightPixels($heightPixels)
  {
    $this->heightPixels = $heightPixels;
  }
  public function getHeightPixels()
  {
    return $this->heightPixels;
  }
  public function setPixelFormat($pixelFormat)
  {
    $this->pixelFormat = $pixelFormat;
  }
  public function getPixelFormat()
  {
    return $this->pixelFormat;
  }
  public function setPreset($preset)
  {
    $this->preset = $preset;
  }
  public function getPreset()
  {
    return $this->preset;
  }
  public function setProfile($profile)
  {
    $this->profile = $profile;
  }
  public function getProfile()
  {
    return $this->profile;
  }
  public function setRateControlMode($rateControlMode)
  {
    $this->rateControlMode = $rateControlMode;
  }
  public function getRateControlMode()
  {
    return $this->rateControlMode;
  }
  public function setTune($tune)
  {
    $this->tune = $tune;
  }
  public function getTune()
  {
    return $this->tune;
  }
  public function setVbvFullnessBits($vbvFullnessBits)
  {
    $this->vbvFullnessBits = $vbvFullnessBits;
  }
  public function getVbvFullnessBits()
  {
    return $this->vbvFullnessBits;
  }
  public function setVbvSizeBits($vbvSizeBits)
  {
    $this->vbvSizeBits = $vbvSizeBits;
  }
  public function getVbvSizeBits()
  {
    return $this->vbvSizeBits;
  }
  public function setWidthPixels($widthPixels)
  {
    $this->widthPixels = $widthPixels;
  }
  public function getWidthPixels()
  {
    return $this->widthPixels;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoStream::class, 'Google_Service_Transcoder_VideoStream');
