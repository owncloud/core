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

namespace Google\Service\StreetViewPublish;

class Photo extends \Google\Collection
{
  protected $collection_key = 'places';
  public $captureTime;
  protected $connectionsType = Connection::class;
  protected $connectionsDataType = 'array';
  public $downloadUrl;
  public $mapsPublishStatus;
  protected $photoIdType = PhotoId::class;
  protected $photoIdDataType = '';
  protected $placesType = Place::class;
  protected $placesDataType = 'array';
  protected $poseType = Pose::class;
  protected $poseDataType = '';
  public $shareLink;
  public $thumbnailUrl;
  public $transferStatus;
  protected $uploadReferenceType = UploadRef::class;
  protected $uploadReferenceDataType = '';
  public $uploadTime;
  public $viewCount;

  public function setCaptureTime($captureTime)
  {
    $this->captureTime = $captureTime;
  }
  public function getCaptureTime()
  {
    return $this->captureTime;
  }
  /**
   * @param Connection[]
   */
  public function setConnections($connections)
  {
    $this->connections = $connections;
  }
  /**
   * @return Connection[]
   */
  public function getConnections()
  {
    return $this->connections;
  }
  public function setDownloadUrl($downloadUrl)
  {
    $this->downloadUrl = $downloadUrl;
  }
  public function getDownloadUrl()
  {
    return $this->downloadUrl;
  }
  public function setMapsPublishStatus($mapsPublishStatus)
  {
    $this->mapsPublishStatus = $mapsPublishStatus;
  }
  public function getMapsPublishStatus()
  {
    return $this->mapsPublishStatus;
  }
  /**
   * @param PhotoId
   */
  public function setPhotoId(PhotoId $photoId)
  {
    $this->photoId = $photoId;
  }
  /**
   * @return PhotoId
   */
  public function getPhotoId()
  {
    return $this->photoId;
  }
  /**
   * @param Place[]
   */
  public function setPlaces($places)
  {
    $this->places = $places;
  }
  /**
   * @return Place[]
   */
  public function getPlaces()
  {
    return $this->places;
  }
  /**
   * @param Pose
   */
  public function setPose(Pose $pose)
  {
    $this->pose = $pose;
  }
  /**
   * @return Pose
   */
  public function getPose()
  {
    return $this->pose;
  }
  public function setShareLink($shareLink)
  {
    $this->shareLink = $shareLink;
  }
  public function getShareLink()
  {
    return $this->shareLink;
  }
  public function setThumbnailUrl($thumbnailUrl)
  {
    $this->thumbnailUrl = $thumbnailUrl;
  }
  public function getThumbnailUrl()
  {
    return $this->thumbnailUrl;
  }
  public function setTransferStatus($transferStatus)
  {
    $this->transferStatus = $transferStatus;
  }
  public function getTransferStatus()
  {
    return $this->transferStatus;
  }
  /**
   * @param UploadRef
   */
  public function setUploadReference(UploadRef $uploadReference)
  {
    $this->uploadReference = $uploadReference;
  }
  /**
   * @return UploadRef
   */
  public function getUploadReference()
  {
    return $this->uploadReference;
  }
  public function setUploadTime($uploadTime)
  {
    $this->uploadTime = $uploadTime;
  }
  public function getUploadTime()
  {
    return $this->uploadTime;
  }
  public function setViewCount($viewCount)
  {
    $this->viewCount = $viewCount;
  }
  public function getViewCount()
  {
    return $this->viewCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Photo::class, 'Google_Service_StreetViewPublish_Photo');
