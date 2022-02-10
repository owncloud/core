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

namespace Google\Service\Storage;

class StorageObject extends \Google\Collection
{
  protected $collection_key = 'acl';
  protected $aclType = ObjectAccessControl::class;
  protected $aclDataType = 'array';
  /**
   * @var string
   */
  public $bucket;
  /**
   * @var string
   */
  public $cacheControl;
  /**
   * @var int
   */
  public $componentCount;
  /**
   * @var string
   */
  public $contentDisposition;
  /**
   * @var string
   */
  public $contentEncoding;
  /**
   * @var string
   */
  public $contentLanguage;
  /**
   * @var string
   */
  public $contentType;
  /**
   * @var string
   */
  public $crc32c;
  /**
   * @var string
   */
  public $customTime;
  protected $customerEncryptionType = StorageObjectCustomerEncryption::class;
  protected $customerEncryptionDataType = '';
  /**
   * @var string
   */
  public $etag;
  /**
   * @var bool
   */
  public $eventBasedHold;
  /**
   * @var string
   */
  public $generation;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $kmsKeyName;
  /**
   * @var string
   */
  public $md5Hash;
  /**
   * @var string
   */
  public $mediaLink;
  /**
   * @var string[]
   */
  public $metadata;
  /**
   * @var string
   */
  public $metageneration;
  /**
   * @var string
   */
  public $name;
  protected $ownerType = StorageObjectOwner::class;
  protected $ownerDataType = '';
  /**
   * @var string
   */
  public $retentionExpirationTime;
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $size;
  /**
   * @var string
   */
  public $storageClass;
  /**
   * @var bool
   */
  public $temporaryHold;
  /**
   * @var string
   */
  public $timeCreated;
  /**
   * @var string
   */
  public $timeDeleted;
  /**
   * @var string
   */
  public $timeStorageClassUpdated;
  /**
   * @var string
   */
  public $updated;

  /**
   * @param ObjectAccessControl[]
   */
  public function setAcl($acl)
  {
    $this->acl = $acl;
  }
  /**
   * @return ObjectAccessControl[]
   */
  public function getAcl()
  {
    return $this->acl;
  }
  /**
   * @param string
   */
  public function setBucket($bucket)
  {
    $this->bucket = $bucket;
  }
  /**
   * @return string
   */
  public function getBucket()
  {
    return $this->bucket;
  }
  /**
   * @param string
   */
  public function setCacheControl($cacheControl)
  {
    $this->cacheControl = $cacheControl;
  }
  /**
   * @return string
   */
  public function getCacheControl()
  {
    return $this->cacheControl;
  }
  /**
   * @param int
   */
  public function setComponentCount($componentCount)
  {
    $this->componentCount = $componentCount;
  }
  /**
   * @return int
   */
  public function getComponentCount()
  {
    return $this->componentCount;
  }
  /**
   * @param string
   */
  public function setContentDisposition($contentDisposition)
  {
    $this->contentDisposition = $contentDisposition;
  }
  /**
   * @return string
   */
  public function getContentDisposition()
  {
    return $this->contentDisposition;
  }
  /**
   * @param string
   */
  public function setContentEncoding($contentEncoding)
  {
    $this->contentEncoding = $contentEncoding;
  }
  /**
   * @return string
   */
  public function getContentEncoding()
  {
    return $this->contentEncoding;
  }
  /**
   * @param string
   */
  public function setContentLanguage($contentLanguage)
  {
    $this->contentLanguage = $contentLanguage;
  }
  /**
   * @return string
   */
  public function getContentLanguage()
  {
    return $this->contentLanguage;
  }
  /**
   * @param string
   */
  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }
  /**
   * @return string
   */
  public function getContentType()
  {
    return $this->contentType;
  }
  /**
   * @param string
   */
  public function setCrc32c($crc32c)
  {
    $this->crc32c = $crc32c;
  }
  /**
   * @return string
   */
  public function getCrc32c()
  {
    return $this->crc32c;
  }
  /**
   * @param string
   */
  public function setCustomTime($customTime)
  {
    $this->customTime = $customTime;
  }
  /**
   * @return string
   */
  public function getCustomTime()
  {
    return $this->customTime;
  }
  /**
   * @param StorageObjectCustomerEncryption
   */
  public function setCustomerEncryption(StorageObjectCustomerEncryption $customerEncryption)
  {
    $this->customerEncryption = $customerEncryption;
  }
  /**
   * @return StorageObjectCustomerEncryption
   */
  public function getCustomerEncryption()
  {
    return $this->customerEncryption;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param bool
   */
  public function setEventBasedHold($eventBasedHold)
  {
    $this->eventBasedHold = $eventBasedHold;
  }
  /**
   * @return bool
   */
  public function getEventBasedHold()
  {
    return $this->eventBasedHold;
  }
  /**
   * @param string
   */
  public function setGeneration($generation)
  {
    $this->generation = $generation;
  }
  /**
   * @return string
   */
  public function getGeneration()
  {
    return $this->generation;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setKmsKeyName($kmsKeyName)
  {
    $this->kmsKeyName = $kmsKeyName;
  }
  /**
   * @return string
   */
  public function getKmsKeyName()
  {
    return $this->kmsKeyName;
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
   * @param string
   */
  public function setMediaLink($mediaLink)
  {
    $this->mediaLink = $mediaLink;
  }
  /**
   * @return string
   */
  public function getMediaLink()
  {
    return $this->mediaLink;
  }
  /**
   * @param string[]
   */
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return string[]
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param string
   */
  public function setMetageneration($metageneration)
  {
    $this->metageneration = $metageneration;
  }
  /**
   * @return string
   */
  public function getMetageneration()
  {
    return $this->metageneration;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param StorageObjectOwner
   */
  public function setOwner(StorageObjectOwner $owner)
  {
    $this->owner = $owner;
  }
  /**
   * @return StorageObjectOwner
   */
  public function getOwner()
  {
    return $this->owner;
  }
  /**
   * @param string
   */
  public function setRetentionExpirationTime($retentionExpirationTime)
  {
    $this->retentionExpirationTime = $retentionExpirationTime;
  }
  /**
   * @return string
   */
  public function getRetentionExpirationTime()
  {
    return $this->retentionExpirationTime;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param string
   */
  public function setSize($size)
  {
    $this->size = $size;
  }
  /**
   * @return string
   */
  public function getSize()
  {
    return $this->size;
  }
  /**
   * @param string
   */
  public function setStorageClass($storageClass)
  {
    $this->storageClass = $storageClass;
  }
  /**
   * @return string
   */
  public function getStorageClass()
  {
    return $this->storageClass;
  }
  /**
   * @param bool
   */
  public function setTemporaryHold($temporaryHold)
  {
    $this->temporaryHold = $temporaryHold;
  }
  /**
   * @return bool
   */
  public function getTemporaryHold()
  {
    return $this->temporaryHold;
  }
  /**
   * @param string
   */
  public function setTimeCreated($timeCreated)
  {
    $this->timeCreated = $timeCreated;
  }
  /**
   * @return string
   */
  public function getTimeCreated()
  {
    return $this->timeCreated;
  }
  /**
   * @param string
   */
  public function setTimeDeleted($timeDeleted)
  {
    $this->timeDeleted = $timeDeleted;
  }
  /**
   * @return string
   */
  public function getTimeDeleted()
  {
    return $this->timeDeleted;
  }
  /**
   * @param string
   */
  public function setTimeStorageClassUpdated($timeStorageClassUpdated)
  {
    $this->timeStorageClassUpdated = $timeStorageClassUpdated;
  }
  /**
   * @return string
   */
  public function getTimeStorageClassUpdated()
  {
    return $this->timeStorageClassUpdated;
  }
  /**
   * @param string
   */
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  /**
   * @return string
   */
  public function getUpdated()
  {
    return $this->updated;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StorageObject::class, 'Google_Service_Storage_StorageObject');
