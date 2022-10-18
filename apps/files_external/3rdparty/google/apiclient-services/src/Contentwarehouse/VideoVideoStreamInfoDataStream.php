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

class VideoVideoStreamInfoDataStream extends \Google\Model
{
  /**
   * @var string
   */
  public $codecFourcc;
  /**
   * @var string
   */
  public $codecId;
  /**
   * @var string
   */
  public $streamCodecTag;
  /**
   * @var string
   */
  public $streamIndex;

  /**
   * @param string
   */
  public function setCodecFourcc($codecFourcc)
  {
    $this->codecFourcc = $codecFourcc;
  }
  /**
   * @return string
   */
  public function getCodecFourcc()
  {
    return $this->codecFourcc;
  }
  /**
   * @param string
   */
  public function setCodecId($codecId)
  {
    $this->codecId = $codecId;
  }
  /**
   * @return string
   */
  public function getCodecId()
  {
    return $this->codecId;
  }
  /**
   * @param string
   */
  public function setStreamCodecTag($streamCodecTag)
  {
    $this->streamCodecTag = $streamCodecTag;
  }
  /**
   * @return string
   */
  public function getStreamCodecTag()
  {
    return $this->streamCodecTag;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoVideoStreamInfoDataStream::class, 'Google_Service_Contentwarehouse_VideoVideoStreamInfoDataStream');
