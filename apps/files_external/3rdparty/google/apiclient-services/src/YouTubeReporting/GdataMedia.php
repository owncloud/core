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

class GdataMedia extends \Google\Collection
{
  protected $collection_key = 'compositeMedia';
  public $algorithm;
  public $bigstoreObjectRef;
  public $blobRef;
  protected $blobstore2InfoType = GdataBlobstore2Info::class;
  protected $blobstore2InfoDataType = '';
  protected $compositeMediaType = GdataCompositeMedia::class;
  protected $compositeMediaDataType = 'array';
  public $contentType;
  protected $contentTypeInfoType = GdataContentTypeInfo::class;
  protected $contentTypeInfoDataType = '';
  public $cosmoBinaryReference;
  public $crc32cHash;
  protected $diffChecksumsResponseType = GdataDiffChecksumsResponse::class;
  protected $diffChecksumsResponseDataType = '';
  protected $diffDownloadResponseType = GdataDiffDownloadResponse::class;
  protected $diffDownloadResponseDataType = '';
  protected $diffUploadRequestType = GdataDiffUploadRequest::class;
  protected $diffUploadRequestDataType = '';
  protected $diffUploadResponseType = GdataDiffUploadResponse::class;
  protected $diffUploadResponseDataType = '';
  protected $diffVersionResponseType = GdataDiffVersionResponse::class;
  protected $diffVersionResponseDataType = '';
  protected $downloadParametersType = GdataDownloadParameters::class;
  protected $downloadParametersDataType = '';
  public $filename;
  public $hash;
  public $hashVerified;
  public $inline;
  public $isPotentialRetry;
  public $length;
  public $md5Hash;
  public $mediaId;
  protected $objectIdType = GdataObjectId::class;
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
   * @param GdataCompositeMedia[]
   */
  public function setCompositeMedia($compositeMedia)
  {
    $this->compositeMedia = $compositeMedia;
  }
  /**
   * @return GdataCompositeMedia[]
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
   * @param GdataContentTypeInfo
   */
  public function setContentTypeInfo(GdataContentTypeInfo $contentTypeInfo)
  {
    $this->contentTypeInfo = $contentTypeInfo;
  }
  /**
   * @return GdataContentTypeInfo
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
   * @param GdataDiffChecksumsResponse
   */
  public function setDiffChecksumsResponse(GdataDiffChecksumsResponse $diffChecksumsResponse)
  {
    $this->diffChecksumsResponse = $diffChecksumsResponse;
  }
  /**
   * @return GdataDiffChecksumsResponse
   */
  public function getDiffChecksumsResponse()
  {
    return $this->diffChecksumsResponse;
  }
  /**
   * @param GdataDiffDownloadResponse
   */
  public function setDiffDownloadResponse(GdataDiffDownloadResponse $diffDownloadResponse)
  {
    $this->diffDownloadResponse = $diffDownloadResponse;
  }
  /**
   * @return GdataDiffDownloadResponse
   */
  public function getDiffDownloadResponse()
  {
    return $this->diffDownloadResponse;
  }
  /**
   * @param GdataDiffUploadRequest
   */
  public function setDiffUploadRequest(GdataDiffUploadRequest $diffUploadRequest)
  {
    $this->diffUploadRequest = $diffUploadRequest;
  }
  /**
   * @return GdataDiffUploadRequest
   */
  public function getDiffUploadRequest()
  {
    return $this->diffUploadRequest;
  }
  /**
   * @param GdataDiffUploadResponse
   */
  public function setDiffUploadResponse(GdataDiffUploadResponse $diffUploadResponse)
  {
    $this->diffUploadResponse = $diffUploadResponse;
  }
  /**
   * @return GdataDiffUploadResponse
   */
  public function getDiffUploadResponse()
  {
    return $this->diffUploadResponse;
  }
  /**
   * @param GdataDiffVersionResponse
   */
  public function setDiffVersionResponse(GdataDiffVersionResponse $diffVersionResponse)
  {
    $this->diffVersionResponse = $diffVersionResponse;
  }
  /**
   * @return GdataDiffVersionResponse
   */
  public function getDiffVersionResponse()
  {
    return $this->diffVersionResponse;
  }
  /**
   * @param GdataDownloadParameters
   */
  public function setDownloadParameters(GdataDownloadParameters $downloadParameters)
  {
    $this->downloadParameters = $downloadParameters;
  }
  /**
   * @return GdataDownloadParameters
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
class_alias(GdataMedia::class, 'Google_Service_YouTubeReporting_GdataMedia');
