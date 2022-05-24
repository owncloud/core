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

namespace Google\Service\RealTimeBidding;

class VideoContent extends \Google\Model
{
  protected $videoMetadataType = VideoMetadata::class;
  protected $videoMetadataDataType = '';
  /**
   * @var string
   */
  public $videoUrl;
  /**
   * @var string
   */
  public $videoVastXml;

  /**
   * @param VideoMetadata
   */
  public function setVideoMetadata(VideoMetadata $videoMetadata)
  {
    $this->videoMetadata = $videoMetadata;
  }
  /**
   * @return VideoMetadata
   */
  public function getVideoMetadata()
  {
    return $this->videoMetadata;
  }
  /**
   * @param string
   */
  public function setVideoUrl($videoUrl)
  {
    $this->videoUrl = $videoUrl;
  }
  /**
   * @return string
   */
  public function getVideoUrl()
  {
    return $this->videoUrl;
  }
  /**
   * @param string
   */
  public function setVideoVastXml($videoVastXml)
  {
    $this->videoVastXml = $videoVastXml;
  }
  /**
   * @return string
   */
  public function getVideoVastXml()
  {
    return $this->videoVastXml;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContent::class, 'Google_Service_RealTimeBidding_VideoContent');
