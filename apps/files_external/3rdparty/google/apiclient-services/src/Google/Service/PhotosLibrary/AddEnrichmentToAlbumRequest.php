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

class Google_Service_PhotosLibrary_AddEnrichmentToAlbumRequest extends Google_Model
{
  protected $albumPositionType = 'Google_Service_PhotosLibrary_AlbumPosition';
  protected $albumPositionDataType = '';
  protected $newEnrichmentItemType = 'Google_Service_PhotosLibrary_NewEnrichmentItem';
  protected $newEnrichmentItemDataType = '';

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
   * @param Google_Service_PhotosLibrary_NewEnrichmentItem
   */
  public function setNewEnrichmentItem(Google_Service_PhotosLibrary_NewEnrichmentItem $newEnrichmentItem)
  {
    $this->newEnrichmentItem = $newEnrichmentItem;
  }
  /**
   * @return Google_Service_PhotosLibrary_NewEnrichmentItem
   */
  public function getNewEnrichmentItem()
  {
    return $this->newEnrichmentItem;
  }
}
