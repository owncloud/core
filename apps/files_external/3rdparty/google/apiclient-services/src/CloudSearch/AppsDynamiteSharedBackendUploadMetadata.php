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

namespace Google\Service\CloudSearch;

class AppsDynamiteSharedBackendUploadMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $blobPath;
  /**
   * @var string
   */
  public $contentName;
  /**
   * @var string
   */
  public $contentSize;
  /**
   * @var string
   */
  public $contentType;
  /**
   * @var string
   */
  public $dlpScanOutcome;
  protected $dlpScanSummaryType = DlpScanSummary::class;
  protected $dlpScanSummaryDataType = '';
  protected $groupIdType = GroupId::class;
  protected $groupIdDataType = '';
  protected $originalDimensionType = AppsDynamiteSharedDimension::class;
  protected $originalDimensionDataType = '';
  protected $quoteReplyMessageIdType = MessageId::class;
  protected $quoteReplyMessageIdDataType = '';
  /**
   * @var string
   */
  public $sha256;
  /**
   * @var string
   */
  public $uploadIp;
  /**
   * @var string
   */
  public $uploadTimestampUsec;
  /**
   * @var string
   */
  public $videoId;
  /**
   * @var string
   */
  public $videoThumbnailBlobId;
  /**
   * @var string
   */
  public $virusScanResult;

  /**
   * @param string
   */
  public function setBlobPath($blobPath)
  {
    $this->blobPath = $blobPath;
  }
  /**
   * @return string
   */
  public function getBlobPath()
  {
    return $this->blobPath;
  }
  /**
   * @param string
   */
  public function setContentName($contentName)
  {
    $this->contentName = $contentName;
  }
  /**
   * @return string
   */
  public function getContentName()
  {
    return $this->contentName;
  }
  /**
   * @param string
   */
  public function setContentSize($contentSize)
  {
    $this->contentSize = $contentSize;
  }
  /**
   * @return string
   */
  public function getContentSize()
  {
    return $this->contentSize;
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
  public function setDlpScanOutcome($dlpScanOutcome)
  {
    $this->dlpScanOutcome = $dlpScanOutcome;
  }
  /**
   * @return string
   */
  public function getDlpScanOutcome()
  {
    return $this->dlpScanOutcome;
  }
  /**
   * @param DlpScanSummary
   */
  public function setDlpScanSummary(DlpScanSummary $dlpScanSummary)
  {
    $this->dlpScanSummary = $dlpScanSummary;
  }
  /**
   * @return DlpScanSummary
   */
  public function getDlpScanSummary()
  {
    return $this->dlpScanSummary;
  }
  /**
   * @param GroupId
   */
  public function setGroupId(GroupId $groupId)
  {
    $this->groupId = $groupId;
  }
  /**
   * @return GroupId
   */
  public function getGroupId()
  {
    return $this->groupId;
  }
  /**
   * @param AppsDynamiteSharedDimension
   */
  public function setOriginalDimension(AppsDynamiteSharedDimension $originalDimension)
  {
    $this->originalDimension = $originalDimension;
  }
  /**
   * @return AppsDynamiteSharedDimension
   */
  public function getOriginalDimension()
  {
    return $this->originalDimension;
  }
  /**
   * @param MessageId
   */
  public function setQuoteReplyMessageId(MessageId $quoteReplyMessageId)
  {
    $this->quoteReplyMessageId = $quoteReplyMessageId;
  }
  /**
   * @return MessageId
   */
  public function getQuoteReplyMessageId()
  {
    return $this->quoteReplyMessageId;
  }
  /**
   * @param string
   */
  public function setSha256($sha256)
  {
    $this->sha256 = $sha256;
  }
  /**
   * @return string
   */
  public function getSha256()
  {
    return $this->sha256;
  }
  /**
   * @param string
   */
  public function setUploadIp($uploadIp)
  {
    $this->uploadIp = $uploadIp;
  }
  /**
   * @return string
   */
  public function getUploadIp()
  {
    return $this->uploadIp;
  }
  /**
   * @param string
   */
  public function setUploadTimestampUsec($uploadTimestampUsec)
  {
    $this->uploadTimestampUsec = $uploadTimestampUsec;
  }
  /**
   * @return string
   */
  public function getUploadTimestampUsec()
  {
    return $this->uploadTimestampUsec;
  }
  /**
   * @param string
   */
  public function setVideoId($videoId)
  {
    $this->videoId = $videoId;
  }
  /**
   * @return string
   */
  public function getVideoId()
  {
    return $this->videoId;
  }
  /**
   * @param string
   */
  public function setVideoThumbnailBlobId($videoThumbnailBlobId)
  {
    $this->videoThumbnailBlobId = $videoThumbnailBlobId;
  }
  /**
   * @return string
   */
  public function getVideoThumbnailBlobId()
  {
    return $this->videoThumbnailBlobId;
  }
  /**
   * @param string
   */
  public function setVirusScanResult($virusScanResult)
  {
    $this->virusScanResult = $virusScanResult;
  }
  /**
   * @return string
   */
  public function getVirusScanResult()
  {
    return $this->virusScanResult;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteSharedBackendUploadMetadata::class, 'Google_Service_CloudSearch_AppsDynamiteSharedBackendUploadMetadata');
