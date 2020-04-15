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

class Google_Service_PhotosLibrary_MediaItem extends Google_Model
{
  public $baseUrl;
  protected $contributorInfoType = 'Google_Service_PhotosLibrary_ContributorInfo';
  protected $contributorInfoDataType = '';
  public $description;
  public $id;
  protected $mediaMetadataType = 'Google_Service_PhotosLibrary_MediaMetadata';
  protected $mediaMetadataDataType = '';
  public $mimeType;
  public $productUrl;

  public function setBaseUrl($baseUrl)
  {
    $this->baseUrl = $baseUrl;
  }
  public function getBaseUrl()
  {
    return $this->baseUrl;
  }
  /**
   * @param Google_Service_PhotosLibrary_ContributorInfo
   */
  public function setContributorInfo(Google_Service_PhotosLibrary_ContributorInfo $contributorInfo)
  {
    $this->contributorInfo = $contributorInfo;
  }
  /**
   * @return Google_Service_PhotosLibrary_ContributorInfo
   */
  public function getContributorInfo()
  {
    return $this->contributorInfo;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
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
   * @param Google_Service_PhotosLibrary_MediaMetadata
   */
  public function setMediaMetadata(Google_Service_PhotosLibrary_MediaMetadata $mediaMetadata)
  {
    $this->mediaMetadata = $mediaMetadata;
  }
  /**
   * @return Google_Service_PhotosLibrary_MediaMetadata
   */
  public function getMediaMetadata()
  {
    return $this->mediaMetadata;
  }
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  public function getMimeType()
  {
    return $this->mimeType;
  }
  public function setProductUrl($productUrl)
  {
    $this->productUrl = $productUrl;
  }
  public function getProductUrl()
  {
    return $this->productUrl;
  }
}
