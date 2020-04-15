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

class Google_Service_PhotosLibrary_BatchCreateMediaItemsRequest extends Google_Collection
{
  protected $collection_key = 'newMediaItems';
  public $albumId;
  protected $albumPositionType = 'Google_Service_PhotosLibrary_AlbumPosition';
  protected $albumPositionDataType = '';
  protected $newMediaItemsType = 'Google_Service_PhotosLibrary_NewMediaItem';
  protected $newMediaItemsDataType = 'array';

  public function setAlbumId($albumId)
  {
    $this->albumId = $albumId;
  }
  public function getAlbumId()
  {
    return $this->albumId;
  }
  /**
   * @param Google_Service_PhotosLibrary_AlbumPosition
   */
  public function setAlbumPosition(Google_Service_PhotosLibrary_AlbumPosition $albumPosition)
  {
    $this->albumPosition = $albumPosition;
  }
  /**
   * @return Google_Service_PhotosLibrary_AlbumPosition
   */
  public function getAlbumPosition()
  {
    return $this->albumPosition;
  }
  /**
   * @param Google_Service_PhotosLibrary_NewMediaItem
   */
  public function setNewMediaItems($newMediaItems)
  {
    $this->newMediaItems = $newMediaItems;
  }
  /**
   * @return Google_Service_PhotosLibrary_NewMediaItem
   */
  public function getNewMediaItems()
  {
    return $this->newMediaItems;
  }
}
