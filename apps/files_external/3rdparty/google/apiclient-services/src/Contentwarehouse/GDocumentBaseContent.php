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

class GDocumentBaseContent extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "authMethod" => "AuthMethod",
        "contentLength" => "ContentLength",
        "contentType" => "ContentType",
        "crawlTime" => "CrawlTime",
        "encoding" => "Encoding",
        "hasHttpHeader" => "HasHttpHeader",
        "language" => "Language",
        "originalEncoding" => "OriginalEncoding",
        "representation" => "Representation",
        "uncompressedLength" => "UncompressedLength",
        "visualType" => "VisualType",
  ];
  /**
   * @var int
   */
  public $authMethod;
  /**
   * @var int
   */
  public $contentLength;
  /**
   * @var int
   */
  public $contentType;
  /**
   * @var string
   */
  public $crawlTime;
  /**
   * @var int
   */
  public $encoding;
  /**
   * @var bool
   */
  public $hasHttpHeader;
  /**
   * @var int
   */
  public $language;
  /**
   * @var int
   */
  public $originalEncoding;
  /**
   * @var string
   */
  public $representation;
  /**
   * @var int
   */
  public $uncompressedLength;
  /**
   * @var int
   */
  public $visualType;
  /**
   * @var int
   */
  public $crawledFileSize;
  /**
   * @var string
   */
  public $encodedGeometryAnnotations;

  /**
   * @param int
   */
  public function setAuthMethod($authMethod)
  {
    $this->authMethod = $authMethod;
  }
  /**
   * @return int
   */
  public function getAuthMethod()
  {
    return $this->authMethod;
  }
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
   * @param string
   */
  public function setCrawlTime($crawlTime)
  {
    $this->crawlTime = $crawlTime;
  }
  /**
   * @return string
   */
  public function getCrawlTime()
  {
    return $this->crawlTime;
  }
  /**
   * @param int
   */
  public function setEncoding($encoding)
  {
    $this->encoding = $encoding;
  }
  /**
   * @return int
   */
  public function getEncoding()
  {
    return $this->encoding;
  }
  /**
   * @param bool
   */
  public function setHasHttpHeader($hasHttpHeader)
  {
    $this->hasHttpHeader = $hasHttpHeader;
  }
  /**
   * @return bool
   */
  public function getHasHttpHeader()
  {
    return $this->hasHttpHeader;
  }
  /**
   * @param int
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return int
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param int
   */
  public function setOriginalEncoding($originalEncoding)
  {
    $this->originalEncoding = $originalEncoding;
  }
  /**
   * @return int
   */
  public function getOriginalEncoding()
  {
    return $this->originalEncoding;
  }
  /**
   * @param string
   */
  public function setRepresentation($representation)
  {
    $this->representation = $representation;
  }
  /**
   * @return string
   */
  public function getRepresentation()
  {
    return $this->representation;
  }
  /**
   * @param int
   */
  public function setUncompressedLength($uncompressedLength)
  {
    $this->uncompressedLength = $uncompressedLength;
  }
  /**
   * @return int
   */
  public function getUncompressedLength()
  {
    return $this->uncompressedLength;
  }
  /**
   * @param int
   */
  public function setVisualType($visualType)
  {
    $this->visualType = $visualType;
  }
  /**
   * @return int
   */
  public function getVisualType()
  {
    return $this->visualType;
  }
  /**
   * @param int
   */
  public function setCrawledFileSize($crawledFileSize)
  {
    $this->crawledFileSize = $crawledFileSize;
  }
  /**
   * @return int
   */
  public function getCrawledFileSize()
  {
    return $this->crawledFileSize;
  }
  /**
   * @param string
   */
  public function setEncodedGeometryAnnotations($encodedGeometryAnnotations)
  {
    $this->encodedGeometryAnnotations = $encodedGeometryAnnotations;
  }
  /**
   * @return string
   */
  public function getEncodedGeometryAnnotations()
  {
    return $this->encodedGeometryAnnotations;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GDocumentBaseContent::class, 'Google_Service_Contentwarehouse_GDocumentBaseContent');
