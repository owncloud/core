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

class Google_Service_YouTubeReporting_GdataCompositeMedia extends Google_Model
{
  public $blobRef;
  protected $blobstore2InfoType = 'Google_Service_YouTubeReporting_GdataBlobstore2Info';
  protected $blobstore2InfoDataType = '';
  public $cosmoBinaryReference;
  public $crc32cHash;
  public $inline;
  public $length;
  public $md5Hash;
  protected $objectIdType = 'Google_Service_YouTubeReporting_GdataObjectId';
  protected $objectIdDataType = '';
  public $path;
  public $referenceType;
  public $sha1Hash;

  public function setBlobRef($blobRef)
  {
    $this->blobRef = $blobRef;
  }
  public function getBlobRef()
  {
    return $this->blobRef;
  }
  /**
   * @param Google_Service_YouTubeReporting_GdataBlobstore2Info
   */
  public function setBlobstore2Info(Google_Service_YouTubeReporting_GdataBlobstore2Info $blobstore2Info)
  {
    $this->blobstore2Info = $blobstore2Info;
  }
  /**
   * @return Google_Service_YouTubeReporting_GdataBlobstore2Info
   */
  public function getBlobstore2Info()
  {
    return $this->blobstore2Info;
  }
  public function setCosmoBinaryReference($cosmoBinaryReference)
  {
    $this->cosmoBinaryReference = $cosmoBinaryReference;
  }
  public function getCosmoBinaryReference()
  {
    return $this->cosmoBinaryReference;
  }
  public function setCrc32cHash($crc32cHash)
  {
    $this->crc32cHash = $crc32cHash;
  }
  public function getCrc32cHash()
  {
    return $this->crc32cHash;
  }
  public function setInline($inline)
  {
    $this->inline = $inline;
  }
  public function getInline()
  {
    return $this->inline;
  }
  public function setLength($length)
  {
    $this->length = $length;
  }
  public function getLength()
  {
    return $this->length;
  }
  public function setMd5Hash($md5Hash)
  {
    $this->md5Hash = $md5Hash;
  }
  public function getMd5Hash()
  {
    return $this->md5Hash;
  }
  /**
   * @param Google_Service_YouTubeReporting_GdataObjectId
   */
  public function setObjectId(Google_Service_YouTubeReporting_GdataObjectId $objectId)
  {
    $this->objectId = $objectId;
  }
  /**
   * @return Google_Service_YouTubeReporting_GdataObjectId
   */
  public function getObjectId()
  {
    return $this->objectId;
  }
  public function setPath($path)
  {
    $this->path = $path;
  }
  public function getPath()
  {
    return $this->path;
  }
  public function setReferenceType($referenceType)
  {
    $this->referenceType = $referenceType;
  }
  public function getReferenceType()
  {
    return $this->referenceType;
  }
  public function setSha1Hash($sha1Hash)
  {
    $this->sha1Hash = $sha1Hash;
  }
  public function getSha1Hash()
  {
    return $this->sha1Hash;
  }
}
