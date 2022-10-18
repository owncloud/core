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

class HtmlrenderWebkitHeadlessProtoReferencedResource extends \Google\Collection
{
  protected $collection_key = 'timing';
  /**
   * @var bool
   */
  public $canceled;
  /**
   * @var int
   */
  public $contentType;
  /**
   * @var int[]
   */
  public $domTreeNodeIndex;
  /**
   * @var bool
   */
  public $failedHttpAccessControlCheck;
  protected $fetchSourceInfoType = WirelessTranscoderFetchFetchSourceInfo::class;
  protected $fetchSourceInfoDataType = 'array';
  /**
   * @var string
   */
  public $fetchStatus;
  protected $httpHeaderType = HtmlrenderWebkitHeadlessProtoReferencedResourceHttpHeader::class;
  protected $httpHeaderDataType = 'array';
  /**
   * @var int
   */
  public $httpResponseCode;
  protected $metadataType = WirelessTranscoderFetchFetchMetadata::class;
  protected $metadataDataType = 'array';
  /**
   * @var string
   */
  public $postData;
  /**
   * @var string
   */
  public $redirectTarget;
  /**
   * @var int
   */
  public $referencedResourceContentIndex;
  protected $requestHeaderType = HtmlrenderWebkitHeadlessProtoReferencedResourceHttpHeader::class;
  protected $requestHeaderDataType = 'array';
  /**
   * @var int
   */
  public $requestMethod;
  /**
   * @var int[]
   */
  public $styleIndex;
  /**
   * @var bool
   */
  public $synchronouslyFetched;
  protected $timingType = HtmlrenderWebkitHeadlessProtoReferencedResourceFetchTiming::class;
  protected $timingDataType = 'array';
  /**
   * @var string
   */
  public $url;
  protected $webkitMetadataType = HtmlrenderWebkitHeadlessProtoWebKitFetchMetadata::class;
  protected $webkitMetadataDataType = '';

  /**
   * @param bool
   */
  public function setCanceled($canceled)
  {
    $this->canceled = $canceled;
  }
  /**
   * @return bool
   */
  public function getCanceled()
  {
    return $this->canceled;
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
   * @param int[]
   */
  public function setDomTreeNodeIndex($domTreeNodeIndex)
  {
    $this->domTreeNodeIndex = $domTreeNodeIndex;
  }
  /**
   * @return int[]
   */
  public function getDomTreeNodeIndex()
  {
    return $this->domTreeNodeIndex;
  }
  /**
   * @param bool
   */
  public function setFailedHttpAccessControlCheck($failedHttpAccessControlCheck)
  {
    $this->failedHttpAccessControlCheck = $failedHttpAccessControlCheck;
  }
  /**
   * @return bool
   */
  public function getFailedHttpAccessControlCheck()
  {
    return $this->failedHttpAccessControlCheck;
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
   * @param string
   */
  public function setFetchStatus($fetchStatus)
  {
    $this->fetchStatus = $fetchStatus;
  }
  /**
   * @return string
   */
  public function getFetchStatus()
  {
    return $this->fetchStatus;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoReferencedResourceHttpHeader[]
   */
  public function setHttpHeader($httpHeader)
  {
    $this->httpHeader = $httpHeader;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoReferencedResourceHttpHeader[]
   */
  public function getHttpHeader()
  {
    return $this->httpHeader;
  }
  /**
   * @param int
   */
  public function setHttpResponseCode($httpResponseCode)
  {
    $this->httpResponseCode = $httpResponseCode;
  }
  /**
   * @return int
   */
  public function getHttpResponseCode()
  {
    return $this->httpResponseCode;
  }
  /**
   * @param WirelessTranscoderFetchFetchMetadata[]
   */
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return WirelessTranscoderFetchFetchMetadata[]
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param string
   */
  public function setPostData($postData)
  {
    $this->postData = $postData;
  }
  /**
   * @return string
   */
  public function getPostData()
  {
    return $this->postData;
  }
  /**
   * @param string
   */
  public function setRedirectTarget($redirectTarget)
  {
    $this->redirectTarget = $redirectTarget;
  }
  /**
   * @return string
   */
  public function getRedirectTarget()
  {
    return $this->redirectTarget;
  }
  /**
   * @param int
   */
  public function setReferencedResourceContentIndex($referencedResourceContentIndex)
  {
    $this->referencedResourceContentIndex = $referencedResourceContentIndex;
  }
  /**
   * @return int
   */
  public function getReferencedResourceContentIndex()
  {
    return $this->referencedResourceContentIndex;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoReferencedResourceHttpHeader[]
   */
  public function setRequestHeader($requestHeader)
  {
    $this->requestHeader = $requestHeader;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoReferencedResourceHttpHeader[]
   */
  public function getRequestHeader()
  {
    return $this->requestHeader;
  }
  /**
   * @param int
   */
  public function setRequestMethod($requestMethod)
  {
    $this->requestMethod = $requestMethod;
  }
  /**
   * @return int
   */
  public function getRequestMethod()
  {
    return $this->requestMethod;
  }
  /**
   * @param int[]
   */
  public function setStyleIndex($styleIndex)
  {
    $this->styleIndex = $styleIndex;
  }
  /**
   * @return int[]
   */
  public function getStyleIndex()
  {
    return $this->styleIndex;
  }
  /**
   * @param bool
   */
  public function setSynchronouslyFetched($synchronouslyFetched)
  {
    $this->synchronouslyFetched = $synchronouslyFetched;
  }
  /**
   * @return bool
   */
  public function getSynchronouslyFetched()
  {
    return $this->synchronouslyFetched;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoReferencedResourceFetchTiming[]
   */
  public function setTiming($timing)
  {
    $this->timing = $timing;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoReferencedResourceFetchTiming[]
   */
  public function getTiming()
  {
    return $this->timing;
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
  public function setWebkitMetadata(HtmlrenderWebkitHeadlessProtoWebKitFetchMetadata $webkitMetadata)
  {
    $this->webkitMetadata = $webkitMetadata;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoWebKitFetchMetadata
   */
  public function getWebkitMetadata()
  {
    return $this->webkitMetadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HtmlrenderWebkitHeadlessProtoReferencedResource::class, 'Google_Service_Contentwarehouse_HtmlrenderWebkitHeadlessProtoReferencedResource');
