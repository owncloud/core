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

class Google_Service_PhotosLibrary_MediaMetadata extends Google_Model
{
  public $creationTime;
  public $height;
  protected $photoType = 'Google_Service_PhotosLibrary_Photo';
  protected $photoDataType = '';
  protected $videoType = 'Google_Service_PhotosLibrary_Video';
  protected $videoDataType = '';
  public $width;

  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  public function setHeight($height)
  {
    $this->height = $height;
  }
  public function getHeight()
  {
    return $this->height;
  }
  /**
   * @param Google_Service_PhotosLibrary_Photo
   */
  public function setPhoto(Google_Service_PhotosLibrary_Photo $photo)
  {
    $this->photo = $photo;
  }
  /**
   * @return Google_Service_PhotosLibrary_Photo
   */
  public function getPhoto()
  {
    return $this->photo;
  }
  /**
   * @param Google_Service_PhotosLibrary_Video
   */
  public function setVideo(Google_Service_PhotosLibrary_Video $video)
  {
    $this->video = $video;
  }
  /**
   * @return Google_Service_PhotosLibrary_Video
   */
  public function getVideo()
  {
    return $this->video;
  }
  public function setWidth($width)
  {
    $this->width = $width;
  }
  public function getWidth()
  {
    return $this->width;
  }
}
