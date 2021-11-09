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

namespace Google\Service\CloudSupport;

class Media extends \Google\Collection
{
  protected $collection_key = 'compositeMedia';
  public $algorithm;
  public $bigstoreObjectRef;
  public $blobRef;
  protected $blobstore2InfoType = Blobstore2Info::class;
  protected $blobstore2InfoDataType = '';
  protected $compositeMediaType = CompositeMedia::class;
  protected $compositeMediaDataType = 'array';
  public $contentType;
  protected $contentTypeInfoType = ContentTypeInfo::class;
  protected $contentTypeInfoDataType = '';
  public $cosmoBinaryReference;
  public $crc32cHash;
  protected $diffChecksumsResponseType = DiffChecksumsResponse::class;
  protected $diffChecksumsResponseDataType = '';
  protected $diffDownloadResponseType = DiffDownloadResponse::class;
  protected $diffDownloadResponseDataType = '';
  protected $diffUploadRequestType = DiffUploadRequest::class;
  protected $diffUploadRequestDataType = '';
  protected $diffUploadResponseType = DiffUploadResponse::class;
  protected $diffUploadResponseDataType = '';
  protected $diffVersionResponseType = DiffVersionResponse::class;
  protected $diffVersionResponseDataType = '';
  protected $downloadParametersType = DownloadParameters::class;
  protected $downloadParametersDataType = '';
  public $filename;
  public $hash;
  public $hashVerified;
  public $inline;
  public $isPotentialRetry;
  public $length;
  public $md5Hash;
  public $mediaId;
  protected $objectIdType = ObjectId::class;
  protected $objectIdDataType = '';
  public $path;
  public $referenceType;
  public $sha1Hash;
  public $sha256Hash;
  public $timestamp;
  public $token;

  public function setAlgorithm($algorithm)
  {
    $this->algorithm = $algorithm;
  }
  public function getAlgorithm()
  {
    return $this->algorithm;
  }
  public function setBigstoreObjectRef($bigstoreObjectRef)
  {
    $this->bigstoreObjectRef = $bigstoreObjectRef;
  }
  public function getBigstoreObjectRef()
  {
    return $this->bigstoreObjectRef;
  }
  public function setBlobRef($blobRef)
  {
    $this->blobRef = $blobRef;
  }
  public function getBlobRef()
  {
    return $this->blobRef;
  }
  /**
   * @param Blobstore2Info
   */
  public function setBlobstore2Info(Blobstore2Info $blobstore2Info)
  {
    $this->blobstore2Info = $blobstore2Info;
  }
  /**
   * @return Blobstore2Info
   */
  public function getBlobstore2Info()
  {
    return $this->blobstore2Info;
  }
  /**
   * @param CompositeMedia[]
   */
  public function setCompositeMedia($compositeMedia)
  {
    $this->compositeMedia = $compositeMedia;
  }
  /**
   * @return CompositeMedia[]
   */
  public function getCompositeMedia()
  {
    return $this->compositeMedia;
  }
  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }
  public function getContentType()
  {
    return $this->contentType;
  }
  /**
   * @param ContentTypeInfo
   */
  public function setContentTypeInfo(ContentTypeInfo $contentTypeInfo)
  {
    $this->contentTypeInfo = $contentTypeInfo;
  }
  /**
   * @return ContentTypeInfo
   */
  public function getContentTypeInfo()
  {
    return $this->contentTypeInfo;
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
  /**
   * @param DiffChecksumsResponse
   */
  public function setDiffChecksumsResponse(DiffChecksumsResponse $diffChecksumsResponse)
  {
    $this->diffChecksumsResponse = $diffChecksumsResponse;
  }
  /**
   * @return DiffChecksumsResponse
   */
  public function getDiffChecksumsResponse()
  {
    return $this->diffChecksumsResponse;
  }
  /**
   * @param DiffDownloadResponse
   */
  public function setDiffDownloadResponse(DiffDownloadResponse $diffDownloadResponse)
  {
    $this->diffDownloadResponse = $diffDownloadResponse;
  }
  /**
   * @return DiffDownloadResponse
   */
  public function getDiffDownloadResponse()
  {
    return $this->diffDownloadResponse;
  }
  /**
   * @param DiffUploadRequest
   */
  public function setDiffUploadRequest(DiffUploadRequest $diffUploadRequest)
  {
    $this->diffUploadRequest = $diffUploadRequest;
  }
  /**
   * @return DiffUploadRequest
   */
  public function getDiffUploadRequest()
  {
    return $this->diffUploadRequest;
  }
  /**
   * @param DiffUploadResponse
   */
  public function setDiffUploadResponse(DiffUploadResponse $diffUploadResponse)
  {
    $this->diffUploadResponse = $diffUploadResponse;
  }
  /**
   * @return DiffUploadResponse
   */
  public function getDiffUploadResponse()
  {
    return $this->diffUploadResponse;
  }
  /**
   * @param DiffVersionResponse
   */
  public function setDiffVersionResponse(DiffVersionResponse $diffVersionResponse)
  {
    $this->diffVersionResponse = $diffVersionResponse;
  }
  /**
   * @return DiffVersionResponse
   */
  public function getDiffVersionResponse()
  {
    return $this->diffVersionResponse;
  }
  /**
   * @param DownloadParameters
   */
  public function setDownloadParameters(DownloadParameters $downloadParameters)
  {
    $this->downloadParameters = $downloadParameters;
  }
  /**
   * @return DownloadParameters
   */
  public function getDownloadParameters()
  {
    return $this->downloadParameters;
  }
  public function setFilename($filename)
  {
    $this->filename = $filename;
  }
  public function getFilename()
  {
    return $this->filename;
  }
  public function setHash($hash)
  {
    $this->hash = $hash;
  }
  public function getHash()
  {
    return $this->hash;
  }
  public function setHashVerified($hashVerified)
  {
    $this->hashVerified = $hashVerified;
  }
  public function getHashVerified()
  {
    return $this->hashVerified;
  }
  public function setInline($inline)
  {
    $this->inline = $inline;
  }
  public function getInline()
  {
    return $this->inline;
  }
  public function setIsPotentialRetry($isPotentialRetry)
  {
    $this->isPotentialRetry = $isPotentialRetry;
  }
  public function getIsPotentialRetry()
  {
    return $this->isPotentialRetry;
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
  public function setMediaId($mediaId)
  {
    $this->mediaId = $mediaId;
  }
  public function getMediaId()
  {
    return $this->mediaId;
  }
  /**
   * @param ObjectId
   */
  public function setObjectId(ObjectId $objectId)
  {
    $this->objectId = $objectId;
  }
  /**
   * @return ObjectId
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
  public function setSha256Hash($sha256Hash)
  {
    $this->sha256Hash = $sha256Hash;
  }
  public function getSha256Hash()
  {
    return $this->sha256Hash;
  }
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  public function getTimestamp()
  {
    return $this->timestamp;
  }
  public function setToken($token)
  {
    $this->token = $token;
  }
  public function getToken()
  {
    return $this->token;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Media::class, 'Google_Service_CloudSupport_Media');
