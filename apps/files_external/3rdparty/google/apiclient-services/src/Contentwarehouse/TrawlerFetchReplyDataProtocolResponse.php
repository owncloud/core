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

class TrawlerFetchReplyDataProtocolResponse extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "code" => "Code",
        "contentType" => "ContentType",
        "cutoffSize" => "CutoffSize",
        "httpVersion" => "HttpVersion",
        "protocolVersionFallback" => "ProtocolVersionFallback",
        "unTruncatedSize" => "UnTruncatedSize",
  ];
  /**
   * @var int
   */
  public $code;
  /**
   * @var string
   */
  public $contentType;
  /**
   * @var string
   */
  public $cutoffSize;
  /**
   * @var string
   */
  public $httpVersion;
  /**
   * @var bool
   */
  public $protocolVersionFallback;
  /**
   * @var string
   */
  public $unTruncatedSize;

  /**
   * @param int
   */
  public function setCode($code)
  {
    $this->code = $code;
  }
  /**
   * @return int
   */
  public function getCode()
  {
    return $this->code;
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
  public function setCutoffSize($cutoffSize)
  {
    $this->cutoffSize = $cutoffSize;
  }
  /**
   * @return string
   */
  public function getCutoffSize()
  {
    return $this->cutoffSize;
  }
  /**
   * @param string
   */
  public function setHttpVersion($httpVersion)
  {
    $this->httpVersion = $httpVersion;
  }
  /**
   * @return string
   */
  public function getHttpVersion()
  {
    return $this->httpVersion;
  }
  /**
   * @param bool
   */
  public function setProtocolVersionFallback($protocolVersionFallback)
  {
    $this->protocolVersionFallback = $protocolVersionFallback;
  }
  /**
   * @return bool
   */
  public function getProtocolVersionFallback()
  {
    return $this->protocolVersionFallback;
  }
  /**
   * @param string
   */
  public function setUnTruncatedSize($unTruncatedSize)
  {
    $this->unTruncatedSize = $unTruncatedSize;
  }
  /**
   * @return string
   */
  public function getUnTruncatedSize()
  {
    return $this->unTruncatedSize;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrawlerFetchReplyDataProtocolResponse::class, 'Google_Service_Contentwarehouse_TrawlerFetchReplyDataProtocolResponse');
