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

class Google_Service_Transcoder_ElementaryStream extends Google_Model
{
  protected $audioStreamType = 'Google_Service_Transcoder_AudioStream';
  protected $audioStreamDataType = '';
  public $key;
  protected $textStreamType = 'Google_Service_Transcoder_TextStream';
  protected $textStreamDataType = '';
  protected $videoStreamType = 'Google_Service_Transcoder_VideoStream';
  protected $videoStreamDataType = '';

  /**
   * @param Google_Service_Transcoder_AudioStream
   */
  public function setAudioStream(Google_Service_Transcoder_AudioStream $audioStream)
  {
    $this->audioStream = $audioStream;
  }
  /**
   * @return Google_Service_Transcoder_AudioStream
   */
  public function getAudioStream()
  {
    return $this->audioStream;
  }
  public function setKey($key)
  {
    $this->key = $key;
  }
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param Google_Service_Transcoder_TextStream
   */
  public function setTextStream(Google_Service_Transcoder_TextStream $textStream)
  {
    $this->textStream = $textStream;
  }
  /**
   * @return Google_Service_Transcoder_TextStream
   */
  public function getTextStream()
  {
    return $this->textStream;
  }
  /**
   * @param Google_Service_Transcoder_VideoStream
   */
  public function setVideoStream(Google_Service_Transcoder_VideoStream $videoStream)
  {
    $this->videoStream = $videoStream;
  }
  /**
   * @return Google_Service_Transcoder_VideoStream
   */
  public function getVideoStream()
  {
    return $this->videoStream;
  }
}
