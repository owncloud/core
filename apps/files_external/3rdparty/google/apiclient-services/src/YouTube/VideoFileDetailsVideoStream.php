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

class VideoFileDetailsVideoStream extends \Google\Model
{
  public $aspectRatio;
  /**
   * @var string
   */
  public $bitrateBps;
  /**
   * @var string
   */
  public $codec;
  public $frameRateFps;
  /**
   * @var string
   */
  public $heightPixels;
  /**
   * @var string
   */
  public $rotation;
  /**
   * @var string
   */
  public $vendor;
  /**
   * @var string
   */
  public $widthPixels;

  public function setAspectRatio($aspectRatio)
  {
    $this->aspectRatio = $aspectRatio;
  }
  public function getAspectRatio()
  {
    return $this->aspectRatio;
  }
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
  public function setFrameRateFps($frameRateFps)
  {
    $this->frameRateFps = $frameRateFps;
  }
  public function getFrameRateFps()
  {
    return $this->frameRateFps;
  }
  /**
   * @param string
   */
  public function setHeightPixels($heightPixels)
  {
    $this->heightPixels = $heightPixels;
  }
  /**
   * @return string
   */
  public function getHeightPixels()
  {
    return $this->heightPixels;
  }
  /**
   * @param string
   */
  public function setRotation($rotation)
  {
    $this->rotation = $rotation;
  }
  /**
   * @return string
   */
  public function getRotation()
  {
    return $this->rotation;
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
  /**
   * @param string
   */
  public function setWidthPixels($widthPixels)
  {
    $this->widthPixels = $widthPixels;
  }
  /**
   * @return string
   */
  public function getWidthPixels()
  {
    return $this->widthPixels;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoFileDetailsVideoStream::class, 'Google_Service_YouTube_VideoFileDetailsVideoStream');
