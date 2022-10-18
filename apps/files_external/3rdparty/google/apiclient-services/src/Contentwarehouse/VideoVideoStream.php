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

namespace Google\Service\Contentwarehouse;

class VideoVideoStream extends \Google\Model
{
  /**
   * @var string
   */
  public $bitrate;
  /**
   * @var int
   */
  public $codecId;
  public $fps;
  /**
   * @var int
   */
  public $height;
  public $lengthSec;
  /**
   * @var string
   */
  public $streamIndex;
  /**
   * @var int
   */
  public $width;

  /**
   * @param string
   */
  public function setBitrate($bitrate)
  {
    $this->bitrate = $bitrate;
  }
  /**
   * @return string
   */
  public function getBitrate()
  {
    return $this->bitrate;
  }
  /**
   * @param int
   */
  public function setCodecId($codecId)
  {
    $this->codecId = $codecId;
  }
  /**
   * @return int
   */
  public function getCodecId()
  {
    return $this->codecId;
  }
  public function setFps($fps)
  {
    $this->fps = $fps;
  }
  public function getFps()
  {
    return $this->fps;
  }
  /**
   * @param int
   */
  public function setHeight($height)
  {
    $this->height = $height;
  }
  /**
   * @return int
   */
  public function getHeight()
  {
    return $this->height;
  }
  public function setLengthSec($lengthSec)
  {
    $this->lengthSec = $lengthSec;
  }
  public function getLengthSec()
  {
    return $this->lengthSec;
  }
  /**
   * @param string
   */
  public function setStreamIndex($streamIndex)
  {
    $this->streamIndex = $streamIndex;
  }
  /**
   * @return string
   */
  public function getStreamIndex()
  {
    return $this->streamIndex;
  }
  /**
   * @param int
   */
  public function setWidth($width)
  {
    $this->width = $width;
  }
  /**
   * @return int
   */
  public function getWidth()
  {
    return $this->width;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoVideoStream::class, 'Google_Service_Contentwarehouse_VideoVideoStream');
