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
  /**
   * @var string
   */
  public $blobGeneration;
  /**
   * @var string
   */
  public $blobId;
  /**
   * @var string
   */
  public $downloadReadHandle;
  /**
   * @var string
   */
  public $readToken;
  /**
   * @var string
   */
  public $uploadMetadataContainer;

  /**
   * @param string
   */
  public function setBlobGeneration($blobGeneration)
  {
    $this->blobGeneration = $blobGeneration;
  }
  /**
   * @return string
   */
  public function getBlobGeneration()
  {
    return $this->blobGeneration;
  }
  /**
   * @param string
   */
  public function setBlobId($blobId)
  {
    $this->blobId = $blobId;
  }
  /**
   * @return string
   */
  public function getBlobId()
  {
    return $this->blobId;
  }
  /**
   * @param string
   */
  public function setDownloadReadHandle($downloadReadHandle)
  {
    $this->downloadReadHandle = $downloadReadHandle;
  }
  /**
   * @return string
   */
  public function getDownloadReadHandle()
  {
    return $this->downloadReadHandle;
  }
  /**
   * @param string
   */
  public function setReadToken($readToken)
  {
    $this->readToken = $readToken;
  }
  /**
   * @return string
   */
  public function getReadToken()
  {
    return $this->readToken;
  }
  /**
   * @param string
   */
  public function setUploadMetadataContainer($uploadMetadataContainer)
  {
    $this->uploadMetadataContainer = $uploadMetadataContainer;
  }
  /**
   * @return string
   */
  public function getUploadMetadataContainer()
  {
    return $this->uploadMetadataContainer;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GdataBlobstore2Info::class, 'Google_Service_YouTubeReporting_GdataBlobstore2Info');
