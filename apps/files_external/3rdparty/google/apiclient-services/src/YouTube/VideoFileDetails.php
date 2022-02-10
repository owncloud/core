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

class VideoFileDetails extends \Google\Collection
{
  protected $collection_key = 'videoStreams';
  protected $audioStreamsType = VideoFileDetailsAudioStream::class;
  protected $audioStreamsDataType = 'array';
  /**
   * @var string
   */
  public $bitrateBps;
  /**
   * @var string
   */
  public $container;
  /**
   * @var string
   */
  public $creationTime;
  /**
   * @var string
   */
  public $durationMs;
  /**
   * @var string
   */
  public $fileName;
  /**
   * @var string
   */
  public $fileSize;
  /**
   * @var string
   */
  public $fileType;
  protected $videoStreamsType = VideoFileDetailsVideoStream::class;
  protected $videoStreamsDataType = 'array';

  /**
   * @param VideoFileDetailsAudioStream[]
   */
  public function setAudioStreams($audioStreams)
  {
    $this->audioStreams = $audioStreams;
  }
  /**
   * @return VideoFileDetailsAudioStream[]
   */
  public function getAudioStreams()
  {
    return $this->audioStreams;
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
  public function setContainer($container)
  {
    $this->container = $container;
  }
  /**
   * @return string
   */
  public function getContainer()
  {
    return $this->container;
  }
  /**
   * @param string
   */
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  /**
   * @return string
   */
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  /**
   * @param string
   */
  public function setDurationMs($durationMs)
  {
    $this->durationMs = $durationMs;
  }
  /**
   * @return string
   */
  public function getDurationMs()
  {
    return $this->durationMs;
  }
  /**
   * @param string
   */
  public function setFileName($fileName)
  {
    $this->fileName = $fileName;
  }
  /**
   * @return string
   */
  public function getFileName()
  {
    return $this->fileName;
  }
  /**
   * @param string
   */
  public function setFileSize($fileSize)
  {
    $this->fileSize = $fileSize;
  }
  /**
   * @return string
   */
  public function getFileSize()
  {
    return $this->fileSize;
  }
  /**
   * @param string
   */
  public function setFileType($fileType)
  {
    $this->fileType = $fileType;
  }
  /**
   * @return string
   */
  public function getFileType()
  {
    return $this->fileType;
  }
  /**
   * @param VideoFileDetailsVideoStream[]
   */
  public function setVideoStreams($videoStreams)
  {
    $this->videoStreams = $videoStreams;
  }
  /**
   * @return VideoFileDetailsVideoStream[]
   */
  public function getVideoStreams()
  {
    return $this->videoStreams;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoFileDetails::class, 'Google_Service_YouTube_VideoFileDetails');
