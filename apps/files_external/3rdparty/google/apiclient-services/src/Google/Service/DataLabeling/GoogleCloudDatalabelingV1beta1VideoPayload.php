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

class Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoPayload extends Google_Collection
{
  protected $collection_key = 'videoThumbnails';
  public $frameRate;
  public $mimeType;
  public $signedUri;
  protected $videoThumbnailsType = 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoThumbnail';
  protected $videoThumbnailsDataType = 'array';
  public $videoUri;

  public function setFrameRate($frameRate)
  {
    $this->frameRate = $frameRate;
  }
  public function getFrameRate()
  {
    return $this->frameRate;
  }
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  public function getMimeType()
  {
    return $this->mimeType;
  }
  public function setSignedUri($signedUri)
  {
    $this->signedUri = $signedUri;
  }
  public function getSignedUri()
  {
    return $this->signedUri;
  }
  /**
   * @param Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoThumbnail[]
   */
  public function setVideoThumbnails($videoThumbnails)
  {
    $this->videoThumbnails = $videoThumbnails;
  }
  /**
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1VideoThumbnail[]
   */
  public function getVideoThumbnails()
  {
    return $this->videoThumbnails;
  }
  public function setVideoUri($videoUri)
  {
    $this->videoUri = $videoUri;
  }
  public function getVideoUri()
  {
    return $this->videoUri;
  }
}
