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

class Google_Service_Games_SnapshotRevision extends Google_Model
{
  protected $blobType = 'Google_Service_Games_SnapshotDataResource';
  protected $blobDataType = '';
  protected $coverImageType = 'Google_Service_Games_SnapshotCoverImageResource';
  protected $coverImageDataType = '';
  public $id;
  protected $metadataType = 'Google_Service_Games_SnapshotMetadata';
  protected $metadataDataType = '';

  /**
   * @param Google_Service_Games_SnapshotDataResource
   */
  public function setBlob(Google_Service_Games_SnapshotDataResource $blob)
  {
    $this->blob = $blob;
  }
  /**
   * @return Google_Service_Games_SnapshotDataResource
   */
  public function getBlob()
  {
    return $this->blob;
  }
  /**
   * @param Google_Service_Games_SnapshotCoverImageResource
   */
  public function setCoverImage(Google_Service_Games_SnapshotCoverImageResource $coverImage)
  {
    $this->coverImage = $coverImage;
  }
  /**
   * @return Google_Service_Games_SnapshotCoverImageResource
   */
  public function getCoverImage()
  {
    return $this->coverImage;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Google_Service_Games_SnapshotMetadata
   */
  public function setMetadata(Google_Service_Games_SnapshotMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_Games_SnapshotMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
}
