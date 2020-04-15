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

class Google_Service_PhotosLibrary_NewMediaItemResult extends Google_Model
{
  protected $mediaItemType = 'Google_Service_PhotosLibrary_MediaItem';
  protected $mediaItemDataType = '';
  protected $statusType = 'Google_Service_PhotosLibrary_Status';
  protected $statusDataType = '';
  public $uploadToken;

  /**
   * @param Google_Service_PhotosLibrary_MediaItem
   */
  public function setMediaItem(Google_Service_PhotosLibrary_MediaItem $mediaItem)
  {
    $this->mediaItem = $mediaItem;
  }
  /**
   * @return Google_Service_PhotosLibrary_MediaItem
   */
  public function getMediaItem()
  {
    return $this->mediaItem;
  }
  /**
   * @param Google_Service_PhotosLibrary_Status
   */
  public function setStatus(Google_Service_PhotosLibrary_Status $status)
  {
    $this->status = $status;
  }
  /**
   * @return Google_Service_PhotosLibrary_Status
   */
  public function getStatus()
  {
    return $this->status;
  }
  public function setUploadToken($uploadToken)
  {
    $this->uploadToken = $uploadToken;
  }
  public function getUploadToken()
  {
    return $this->uploadToken;
  }
}
