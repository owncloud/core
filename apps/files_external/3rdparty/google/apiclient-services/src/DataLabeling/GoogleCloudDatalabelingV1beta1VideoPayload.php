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

namespace Google\Service\DataLabeling;

class GoogleCloudDatalabelingV1beta1VideoPayload extends \Google\Collection
{
  protected $collection_key = 'videoThumbnails';
  /**
   * @var float
   */
  public $frameRate;
  /**
   * @var string
   */
  public $mimeType;
  /**
   * @var string
   */
  public $signedUri;
  protected $videoThumbnailsType = GoogleCloudDatalabelingV1beta1VideoThumbnail::class;
  protected $videoThumbnailsDataType = 'array';
  /**
   * @var string
   */
  public $videoUri;

  /**
   * @param float
   */
  public function setFrameRate($frameRate)
  {
    $this->frameRate = $frameRate;
  }
  /**
   * @return float
   */
  public function getFrameRate()
  {
    return $this->frameRate;
  }
  /**
   * @param string
   */
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  /**
   * @return string
   */
  public function getMimeType()
  {
    return $this->mimeType;
  }
  /**
   * @param string
   */
  public function setSignedUri($signedUri)
  {
    $this->signedUri = $signedUri;
  }
  /**
   * @return string
   */
  public function getSignedUri()
  {
    return $this->signedUri;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1VideoThumbnail[]
   */
  public function setVideoThumbnails($videoThumbnails)
  {
    $this->videoThumbnails = $videoThumbnails;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1VideoThumbnail[]
   */
  public function getVideoThumbnails()
  {
    return $this->videoThumbnails;
  }
  /**
   * @param string
   */
  public function setVideoUri($videoUri)
  {
    $this->videoUri = $videoUri;
  }
  /**
   * @return string
   */
  public function getVideoUri()
  {
    return $this->videoUri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1VideoPayload::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoPayload');
