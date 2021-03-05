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

class Google_Service_YouTubeReporting_GdataMedia extends Google_Collection
{
  protected $collection_key = 'compositeMedia';
  public $algorithm;
  public $bigstoreObjectRef;
  public $blobRef;
  protected $blobstore2InfoType = 'Google_Service_YouTubeReporting_GdataBlobstore2Info';
  protected $blobstore2InfoDataType = '';
  protected $compositeMediaType = 'Google_Service_YouTubeReporting_GdataCompositeMedia';
  protected $compositeMediaDataType = 'array';
  public $contentType;
  protected $contentTypeInfoType = 'Google_Service_YouTubeReporting_GdataContentTypeInfo';
  protected $contentTypeInfoDataType = '';
  public $cosmoBinaryReference;
  public $crc32cHash;
  protected $diffChecksumsResponseType = 'Google_Service_YouTubeReporting_GdataDiffChecksumsResponse';
  protected $diffChecksumsResponseDataType = '';
  protected $diffDownloadResponseType = 'Google_Service_YouTubeReporting_GdataDiffDownloadResponse';
  protected $diffDownloadResponseDataType = '';
  protected $diffUploadRequestType = 'Google_Service_YouTubeReporting_GdataDiffUploadRequest';
  protected $diffUploadRequestDataType = '';
  protected $diffUploadResponseType = 'Google_Service_YouTubeReporting_GdataDiffUploadResponse';
  protected $diffUploadResponseDataType = '';
  protected $diffVersionResponseType = 'Google_Service_YouTubeReporting_GdataDiffVersionResponse';
  protected $diffVersionResponseDataType = '';
  protected $downloadParametersType = 'Google_Service_YouTubeReporting_GdataDownloadParameters';
  protected $downloadParametersDataType = '';
  public $filename;
  public $hash;
  public $hashVerified;
  public $inline;
  public $isPotentialRetry;
  public $length;
  public $md5Hash;
  public $mediaId;
  protected $objectIdType = 'Google_Service_YouTubeReporting_GdataObjectId';
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
  /**
   * @param Google_Service_YouTubeReporting_GdataCompositeMedia[]
   */
  public function setCompositeMedia($compositeMedia)
  {
    $this->compositeMedia = $compositeMedia;
  }
  /**
   * @return Google_Service_YouTubeReporting_GdataCompositeMedia[]
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
   * @param Google_Service_YouTubeReporting_GdataContentTypeInfo
   */
  public function setContentTypeInfo(Google_Service_YouTubeReporting_GdataContentTypeInfo $contentTypeInfo)
  {
    $this->contentTypeInfo = $contentTypeInfo;
  }
  /**
   * @return Google_Service_YouTubeReporting_GdataContentTypeInfo
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
   * @param Google_Service_YouTubeReporting_GdataDiffChecksumsResponse
   */
  public function setDiffChecksumsResponse(Google_Service_YouTubeReporting_GdataDiffChecksumsResponse $diffChecksumsResponse)
  {
    $this->diffChecksumsResponse = $diffChecksumsResponse;
  }
  /**
   * @return Google_Service_YouTubeReporting_GdataDiffChecksumsResponse
   */
  public function getDiffChecksumsResponse()
  {
    return $this->diffChecksumsResponse;
  }
  /**
   * @param Google_Service_YouTubeReporting_GdataDiffDownloadResponse
   */
  public function setDiffDownloadResponse(Google_Service_YouTubeReporting_GdataDiffDownloadResponse $diffDownloadResponse)
  {
    $this->diffDownloadResponse = $diffDownloadResponse;
  }
  /**
   * @return Google_Service_YouTubeReporting_GdataDiffDownloadResponse
   */
  public function getDiffDownloadResponse()
  {
    return $this->diffDownloadResponse;
  }
  /**
   * @param Google_Service_YouTubeReporting_GdataDiffUploadRequest
   */
  public function setDiffUploadRequest(Google_Service_YouTubeReporting_GdataDiffUploadRequest $diffUploadRequest)
  {
    $this->diffUploadRequest = $diffUploadRequest;
  }
  /**
   * @return Google_Service_YouTubeReporting_GdataDiffUploadRequest
   */
  public function getDiffUploadRequest()
  {
    return $this->diffUploadRequest;
  }
  /**
   * @param Google_Service_YouTubeReporting_GdataDiffUploadResponse
   */
  public function setDiffUploadResponse(Google_Service_YouTubeReporting_GdataDiffUploadResponse $diffUploadResponse)
  {
    $this->diffUploadResponse = $diffUploadResponse;
  }
  /**
   * @return Google_Service_YouTubeReporting_GdataDiffUploadResponse
   */
  public function getDiffUploadResponse()
  {
    return $this->diffUploadResponse;
  }
  /**
   * @param Google_Service_YouTubeReporting_GdataDiffVersionResponse
   */
  public function setDiffVersionResponse(Google_Service_YouTubeReporting_GdataDiffVersionResponse $diffVersionResponse)
  {
    $this->diffVersionResponse = $diffVersionResponse;
  }
  /**
   * @return Google_Service_YouTubeReporting_GdataDiffVersionResponse
   */
  public function getDiffVersionResponse()
  {
    return $this->diffVersionResponse;
  }
  /**
   * @param Google_Service_YouTubeReporting_GdataDownloadParameters
   */
  public function setDownloadParameters(Google_Service_YouTubeReporting_GdataDownloadParameters $downloadParameters)
  {
    $this->downloadParameters = $downloadParameters;
  }
  /**
   * @return Google_Service_YouTubeReporting_GdataDownloadParameters
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
