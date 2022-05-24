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

class GdataCompositeMedia extends \Google\Model
{
  /**
   * @var string
   */
  public $blobRef;
  protected $blobstore2InfoType = GdataBlobstore2Info::class;
  protected $blobstore2InfoDataType = '';
  /**
   * @var string
   */
  public $cosmoBinaryReference;
  /**
   * @var string
   */
  public $crc32cHash;
  /**
   * @var string
   */
  public $inline;
  /**
   * @var string
   */
  public $length;
  /**
   * @var string
   */
  public $md5Hash;
  protected $objectIdType = GdataObjectId::class;
  protected $objectIdDataType = '';
  /**
   * @var string
   */
  public $path;
  /**
   * @var string
   */
  public $referenceType;
  /**
   * @var string
   */
  public $sha1Hash;

  /**
   * @param string
   */
  public function setBlobRef($blobRef)
  {
    $this->blobRef = $blobRef;
  }
  /**
   * @return string
   */
  public function getBlobRef()
  {
    return $this->blobRef;
  }
  /**
   * @param GdataBlobstore2Info
   */
  public function setBlobstore2Info(GdataBlobstore2Info $blobstore2Info)
  {
    $this->blobstore2Info = $blobstore2Info;
  }
  /**
   * @return GdataBlobstore2Info
   */
  public function getBlobstore2Info()
  {
    return $this->blobstore2Info;
  }
  /**
   * @param string
   */
  public function setCosmoBinaryReference($cosmoBinaryReference)
  {
    $this->cosmoBinaryReference = $cosmoBinaryReference;
  }
  /**
   * @return string
   */
  public function getCosmoBinaryReference()
  {
    return $this->cosmoBinaryReference;
  }
  /**
   * @param string
   */
  public function setCrc32cHash($crc32cHash)
  {
    $this->crc32cHash = $crc32cHash;
  }
  /**
   * @return string
   */
  public function getCrc32cHash()
  {
    return $this->crc32cHash;
  }
  /**
   * @param string
   */
  public function setInline($inline)
  {
    $this->inline = $inline;
  }
  /**
   * @return string
   */
  public function getInline()
  {
    return $this->inline;
  }
  /**
   * @param string
   */
  public function setLength($length)
  {
    $this->length = $length;
  }
  /**
   * @return string
   */
  public function getLength()
  {
    return $this->length;
  }
  /**
   * @param string
   */
  public function setMd5Hash($md5Hash)
  {
    $this->md5Hash = $md5Hash;
  }
  /**
   * @return string
   */
  public function getMd5Hash()
  {
    return $this->md5Hash;
  }
  /**
   * @param GdataObjectId
   */
  public function setObjectId(GdataObjectId $objectId)
  {
    $this->objectId = $objectId;
  }
  /**
   * @return GdataObjectId
   */
  public function getObjectId()
  {
    return $this->objectId;
  }
  /**
   * @param string
   */
  public function setPath($path)
  {
    $this->path = $path;
  }
  /**
   * @return string
   */
  public function getPath()
  {
    return $this->path;
  }
  /**
   * @param string
   */
  public function setReferenceType($referenceType)
  {
    $this->referenceType = $referenceType;
  }
  /**
   * @return string
   */
  public function getReferenceType()
  {
    return $this->referenceType;
  }
  /**
   * @param string
   */
  public function setSha1Hash($sha1Hash)
  {
    $this->sha1Hash = $sha1Hash;
  }
  /**
   * @return string
   */
  public function getSha1Hash()
  {
    return $this->sha1Hash;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GdataCompositeMedia::class, 'Google_Service_YouTubeReporting_GdataCompositeMedia');
