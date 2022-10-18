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

namespace Google\Service\Contentwarehouse;

class IndexingEmbeddedContentLinkInfo extends \Google\Collection
{
  protected $collection_key = 'fetchSourceInfo';
  /**
   * @var int
   */
  public $contentLength;
  /**
   * @var int
   */
  public $contentType;
  /**
   * @var int
   */
  public $crawlDuration;
  /**
   * @var int
   */
  public $crawlStatus;
  /**
   * @var int
   */
  public $crawlTimestamp;
  /**
   * @var string[]
   */
  public $deprecatedRedirect;
  protected $fetchSourceInfoType = WirelessTranscoderFetchFetchSourceInfo::class;
  protected $fetchSourceInfoDataType = 'array';
  protected $fetchStatusType = TrawlerFetchStatus::class;
  protected $fetchStatusDataType = '';
  protected $fetchUrlResponseMetadataType = IndexingEmbeddedContentFetchUrlResponseMetadata::class;
  protected $fetchUrlResponseMetadataDataType = '';
  protected $frdType = TrawlerFetchReplyData::class;
  protected $frdDataType = '';
  /**
   * @var int
   */
  public $httpResponseLength;
  /**
   * @var bool
   */
  public $isCacheable;
  /**
   * @var bool
   */
  public $isRobotedContentFromFastnet;
  /**
   * @var int
   */
  public $uncompressedContentLength;
  /**
   * @var string
   */
  public $url;
  protected $webkitFetchMetadataType = HtmlrenderWebkitHeadlessProtoWebKitFetchMetadata::class;
  protected $webkitFetchMetadataDataType = '';

  /**
   * @param int
   */
  public function setContentLength($contentLength)
  {
    $this->contentLength = $contentLength;
  }
  /**
   * @return int
   */
  public function getContentLength()
  {
    return $this->contentLength;
  }
  /**
   * @param int
   */
  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }
  /**
   * @return int
   */
  public function getContentType()
  {
    return $this->contentType;
  }
  /**
   * @param int
   */
  public function setCrawlDuration($crawlDuration)
  {
    $this->crawlDuration = $crawlDuration;
  }
  /**
   * @return int
   */
  public function getCrawlDuration()
  {
    return $this->crawlDuration;
  }
  /**
   * @param int
   */
  public function setCrawlStatus($crawlStatus)
  {
    $this->crawlStatus = $crawlStatus;
  }
  /**
   * @return int
   */
  public function getCrawlStatus()
  {
    return $this->crawlStatus;
  }
  /**
   * @param int
   */
  public function setCrawlTimestamp($crawlTimestamp)
  {
    $this->crawlTimestamp = $crawlTimestamp;
  }
  /**
   * @return int
   */
  public function getCrawlTimestamp()
  {
    return $this->crawlTimestamp;
  }
  /**
   * @param string[]
   */
  public function setDeprecatedRedirect($deprecatedRedirect)
  {
    $this->deprecatedRedirect = $deprecatedRedirect;
  }
  /**
   * @return string[]
   */
  public function getDeprecatedRedirect()
  {
    return $this->deprecatedRedirect;
  }
  /**
   * @param WirelessTranscoderFetchFetchSourceInfo[]
   */
  public function setFetchSourceInfo($fetchSourceInfo)
  {
    $this->fetchSourceInfo = $fetchSourceInfo;
  }
  /**
   * @return WirelessTranscoderFetchFetchSourceInfo[]
   */
  public function getFetchSourceInfo()
  {
    return $this->fetchSourceInfo;
  }
  /**
   * @param TrawlerFetchStatus
   */
  public function setFetchStatus(TrawlerFetchStatus $fetchStatus)
  {
    $this->fetchStatus = $fetchStatus;
  }
  /**
   * @return TrawlerFetchStatus
   */
  public function getFetchStatus()
  {
    return $this->fetchStatus;
  }
  /**
   * @param IndexingEmbeddedContentFetchUrlResponseMetadata
   */
  public function setFetchUrlResponseMetadata(IndexingEmbeddedContentFetchUrlResponseMetadata $fetchUrlResponseMetadata)
  {
    $this->fetchUrlResponseMetadata = $fetchUrlResponseMetadata;
  }
  /**
   * @return IndexingEmbeddedContentFetchUrlResponseMetadata
   */
  public function getFetchUrlResponseMetadata()
  {
    return $this->fetchUrlResponseMetadata;
  }
  /**
   * @param TrawlerFetchReplyData
   */
  public function setFrd(TrawlerFetchReplyData $frd)
  {
    $this->frd = $frd;
  }
  /**
   * @return TrawlerFetchReplyData
   */
  public function getFrd()
  {
    return $this->frd;
  }
  /**
   * @param int
   */
  public function setHttpResponseLength($httpResponseLength)
  {
    $this->httpResponseLength = $httpResponseLength;
  }
  /**
   * @return int
   */
  public function getHttpResponseLength()
  {
    return $this->httpResponseLength;
  }
  /**
   * @param bool
   */
  public function setIsCacheable($isCacheable)
  {
    $this->isCacheable = $isCacheable;
  }
  /**
   * @return bool
   */
  public function getIsCacheable()
  {
    return $this->isCacheable;
  }
  /**
   * @param bool
   */
  public function setIsRobotedContentFromFastnet($isRobotedContentFromFastnet)
  {
    $this->isRobotedContentFromFastnet = $isRobotedContentFromFastnet;
  }
  /**
   * @return bool
   */
  public function getIsRobotedContentFromFastnet()
  {
    return $this->isRobotedContentFromFastnet;
  }
  /**
   * @param int
   */
  public function setUncompressedContentLength($uncompressedContentLength)
  {
    $this->uncompressedContentLength = $uncompressedContentLength;
  }
  /**
   * @return int
   */
  public function getUncompressedContentLength()
  {
    return $this->uncompressedContentLength;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoWebKitFetchMetadata
   */
  public function setWebkitFetchMetadata(HtmlrenderWebkitHeadlessProtoWebKitFetchMetadata $webkitFetchMetadata)
  {
    $this->webkitFetchMetadata = $webkitFetchMetadata;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoWebKitFetchMetadata
   */
  public function getWebkitFetchMetadata()
  {
    return $this->webkitFetchMetadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingEmbeddedContentLinkInfo::class, 'Google_Service_Contentwarehouse_IndexingEmbeddedContentLinkInfo');
