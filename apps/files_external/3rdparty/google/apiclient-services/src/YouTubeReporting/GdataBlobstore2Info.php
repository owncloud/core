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

namespace Google\Service\YouTubeReporting;

class GdataBlobstore2Info extends \Google\Model
{
  public $blobGeneration;
  public $blobId;
  public $downloadReadHandle;
  public $readToken;
  public $uploadMetadataContainer;

  public function setBlobGeneration($blobGeneration)
  {
    $this->blobGeneration = $blobGeneration;
  }
  public function getBlobGeneration()
  {
    return $this->blobGeneration;
  }
  public function setBlobId($blobId)
  {
    $this->blobId = $blobId;
  }
  public function getBlobId()
  {
    return $this->blobId;
  }
  public function setDownloadReadHandle($downloadReadHandle)
  {
    $this->downloadReadHandle = $downloadReadHandle;
  }
  public function getDownloadReadHandle()
  {
    return $this->downloadReadHandle;
  }
  public function setReadToken($readToken)
  {
    $this->readToken = $readToken;
  }
  public function getReadToken()
  {
    return $this->readToken;
  }
  public function setUploadMetadataContainer($uploadMetadataContainer)
  {
    $this->uploadMetadataContainer = $uploadMetadataContainer;
  }
  public function getUploadMetadataContainer()
  {
    return $this->uploadMetadataContainer;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GdataBlobstore2Info::class, 'Google_Service_YouTubeReporting_GdataBlobstore2Info');
