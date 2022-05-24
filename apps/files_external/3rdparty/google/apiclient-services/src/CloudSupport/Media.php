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
  /**
   * @var string
   */
  public $algorithm;
  /**
   * @var string
   */
  public $bigstoreObjectRef;
  /**
   * @var string
   */
  public $blobRef;
  protected $blobstore2InfoType = Blobstore2Info::class;
  protected $blobstore2InfoDataType = '';
  protected $compositeMediaType = CompositeMedia::class;
  protected $compositeMediaDataType = 'array';
  /**
   * @var string
   */
  public $contentType;
  protected $contentTypeInfoType = ContentTypeInfo::class;
  protected $contentTypeInfoDataType = '';
  /**
   * @var string
   */
  public $cosmoBinaryReference;
  /**
   * @var string
   */
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
  /**
   * @var string
   */
  public $filename;
  /**
   * @var string
   */
  public $hash;
  /**
   * @var bool
   */
  public $hashVerified;
  /**
   * @var string
   */
  public $inline;
  /**
   * @var bool
   */
  public $isPotentialRetry;
  /**
   * @var string
   */
  public $length;
  /**
   * @var string
   */
  public $md5Hash;
  /**
   * @var string
   */
  public $mediaId;
  protected $objectIdType = ObjectId::class;
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
   * @var string
   */
  public $sha256Hash;
  /**
   * @var string
   */
  public $timestamp;
  /**
   * @var string
   */
  public $token;

  /**
   * @param string
   */
  public function setAlgorithm($algorithm)
  {
    $this->algorithm = $algorithm;
  }
  /**
   * @return string
   */
  public function getAlgorithm()
  {
    return $this->algorithm;
  }
  /**
   * @param string
   */
  public function setBigstoreObjectRef($bigstoreObjectRef)
  {
    $this->bigstoreObjectRef = $bigstoreObjectRef;
  }
  /**
   * @return string
   */
  public function getBigstoreObjectRef()
  {
    return $this->bigstoreObjectRef;
  }
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
  /**
   * @param string
   */
  public function setFilename($filename)
  {
    $this->filename = $filename;
  }
  /**
   * @return string
   */
  public function getFilename()
  {
    return $this->filename;
  }
  /**
   * @param string
   */
  public function setHash($hash)
  {
    $this->hash = $hash;
  }
  /**
   * @return string
   */
  public function getHash()
  {
    return $this->hash;
  }
  /**
   * @param bool
   */
  public function setHashVerified($hashVerified)
  {
    $this->hashVerified = $hashVerified;
  }
  /**
   * @return bool
   */
  public function getHashVerified()
  {
    return $this->hashVerified;
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
   * @param bool
   */
  public function setIsPotentialRetry($isPotentialRetry)
  {
    $this->isPotentialRetry = $isPotentialRetry;
  }
  /**
   * @return bool
   */
  public function getIsPotentialRetry()
  {
    return $this->isPotentialRetry;
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
   * @param string
   */
  public function setMediaId($mediaId)
  {
    $this->mediaId = $mediaId;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setSha256Hash($sha256Hash)
  {
    $this->sha256Hash = $sha256Hash;
  }
  /**
   * @return string
   */
  public function getSha256Hash()
  {
    return $this->sha256Hash;
  }
  /**
   * @param string
   */
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  /**
   * @return string
   */
  public function getTimestamp()
  {
    return $this->timestamp;
  }
  /**
   * @param string
   */
  public function setToken($token)
  {
    $this->token = $token;
  }
  /**
   * @return string
   */
  public function getToken()
  {
    return $this->token;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Media::class, 'Google_Service_CloudSupport_Media');
