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

class ElementaryStream extends \Google\Model
{
  protected $audioStreamType = AudioStream::class;
  protected $audioStreamDataType = '';
  /**
   * @var string
   */
  public $key;
  protected $textStreamType = TextStream::class;
  protected $textStreamDataType = '';
  protected $videoStreamType = VideoStream::class;
  protected $videoStreamDataType = '';

  /**
   * @param AudioStream
   */
  public function setAudioStream(AudioStream $audioStream)
  {
    $this->audioStream = $audioStream;
  }
  /**
   * @return AudioStream
   */
  public function getAudioStream()
  {
    return $this->audioStream;
  }
  /**
   * @param string
   */
  public function setKey($key)
  {
    $this->key = $key;
  }
  /**
   * @return string
   */
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param TextStream
   */
  public function setTextStream(TextStream $textStream)
  {
    $this->textStream = $textStream;
  }
  /**
   * @return TextStream
   */
  public function getTextStream()
  {
    return $this->textStream;
  }
  /**
   * @param VideoStream
   */
  public function setVideoStream(VideoStream $videoStream)
  {
    $this->videoStream = $videoStream;
  }
  /**
   * @return VideoStream
   */
  public function getVideoStream()
  {
    return $this->videoStream;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ElementaryStream::class, 'Google_Service_Transcoder_ElementaryStream');
