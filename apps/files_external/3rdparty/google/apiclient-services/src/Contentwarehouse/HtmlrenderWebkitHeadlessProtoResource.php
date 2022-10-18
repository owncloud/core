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

class HtmlrenderWebkitHeadlessProtoResource extends \Google\Collection
{
  protected $collection_key = 'requestHeader';
  /**
   * @var string
   */
  public $content;
  protected $fetchSourceInfoType = WirelessTranscoderFetchFetchSourceInfo::class;
  protected $fetchSourceInfoDataType = 'array';
  /**
   * @var string
   */
  public $finalContentUrl;
  protected $metadataType = WirelessTranscoderFetchFetchMetadata::class;
  protected $metadataDataType = 'array';
  /**
   * @var int
   */
  public $method;
  /**
   * @var string
   */
  public $postData;
  protected $requestHeaderType = HtmlrenderWebkitHeadlessProtoResourceHttpHeader::class;
  protected $requestHeaderDataType = 'array';
  /**
   * @var string
   */
  public $url;

  /**
   * @param string
   */
  public function setContent($content)
  {
    $this->content = $content;
  }
  /**
   * @return string
   */
  public function getContent()
  {
    return $this->content;
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
  public function setFinalContentUrl($finalContentUrl)
  {
    $this->finalContentUrl = $finalContentUrl;
  }
  /**
   * @return string
   */
  public function getFinalContentUrl()
  {
    return $this->finalContentUrl;
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
   * @param int
   */
  public function setMethod($method)
  {
    $this->method = $method;
  }
  /**
   * @return int
   */
  public function getMethod()
  {
    return $this->method;
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
   * @param HtmlrenderWebkitHeadlessProtoResourceHttpHeader[]
   */
  public function setRequestHeader($requestHeader)
  {
    $this->requestHeader = $requestHeader;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoResourceHttpHeader[]
   */
  public function getRequestHeader()
  {
    return $this->requestHeader;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HtmlrenderWebkitHeadlessProtoResource::class, 'Google_Service_Contentwarehouse_HtmlrenderWebkitHeadlessProtoResource');
