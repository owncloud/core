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

class VideoMediaInfo extends \Google\Collection
{
  protected $collection_key = 'videoStream';
  protected $audioStreamType = VideoAudioStream::class;
  protected $audioStreamDataType = 'array';
  /**
   * @var int
   */
  public $containerId;
  /**
   * @var string
   */
  public $fileSize;
  protected $overviewType = VideoMediaOverview::class;
  protected $overviewDataType = '';
  protected $videoStreamType = VideoVideoStream::class;
  protected $videoStreamDataType = 'array';

  /**
   * @param VideoAudioStream[]
   */
  public function setAudioStream($audioStream)
  {
    $this->audioStream = $audioStream;
  }
  /**
   * @return VideoAudioStream[]
   */
  public function getAudioStream()
  {
    return $this->audioStream;
  }
  /**
   * @param int
   */
  public function setContainerId($containerId)
  {
    $this->containerId = $containerId;
  }
  /**
   * @return int
   */
  public function getContainerId()
  {
    return $this->containerId;
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
   * @param VideoMediaOverview
   */
  public function setOverview(VideoMediaOverview $overview)
  {
    $this->overview = $overview;
  }
  /**
   * @return VideoMediaOverview
   */
  public function getOverview()
  {
    return $this->overview;
  }
  /**
   * @param VideoVideoStream[]
   */
  public function setVideoStream($videoStream)
  {
    $this->videoStream = $videoStream;
  }
  /**
   * @return VideoVideoStream[]
   */
  public function getVideoStream()
  {
    return $this->videoStream;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoMediaInfo::class, 'Google_Service_Contentwarehouse_VideoMediaInfo');
