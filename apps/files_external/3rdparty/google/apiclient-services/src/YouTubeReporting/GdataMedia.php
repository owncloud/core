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
  protected $blobstore2InfoType = GdataBlobstore2Info::class;
  protected $blobstore2InfoDataType = '';
  protected $compositeMediaType = GdataCompositeMedia::class;
  protected $compositeMediaDataType = 'array';
  /**
   * @var string
   */
  public $contentType;
  protected $contentTypeInfoType = GdataContentTypeInfo::class;
  protected $contentTypeInfoDataType = '';
  /**
   * @var string
   */
  public $cosmoBinaryReference;
  /**
   * @var string
   */
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
class_alias(GdataMedia::class, 'Google_Service_YouTubeReporting_GdataMedia');
