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

class TrawlerFetchReplyDataPartialResponse extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "bodyLocation" => "BodyLocation",
        "chunkNumber" => "ChunkNumber",
        "contentRange" => "ContentRange",
        "eTag" => "ETag",
        "fetchID" => "FetchID",
        "isFinalResponse" => "IsFinalResponse",
  ];
  /**
   * @var string
   */
  public $bodyLocation;
  /**
   * @var int
   */
  public $chunkNumber;
  protected $contentRangeType = TrawlerContentRangeInfo::class;
  protected $contentRangeDataType = '';
  /**
   * @var string
   */
  public $eTag;
  /**
   * @var string
   */
  public $fetchID;
  /**
   * @var bool
   */
  public $isFinalResponse;

  /**
   * @param string
   */
  public function setBodyLocation($bodyLocation)
  {
    $this->bodyLocation = $bodyLocation;
  }
  /**
   * @return string
   */
  public function getBodyLocation()
  {
    return $this->bodyLocation;
  }
  /**
   * @param int
   */
  public function setChunkNumber($chunkNumber)
  {
    $this->chunkNumber = $chunkNumber;
  }
  /**
   * @return int
   */
  public function getChunkNumber()
  {
    return $this->chunkNumber;
  }
  /**
   * @param TrawlerContentRangeInfo
   */
  public function setContentRange(TrawlerContentRangeInfo $contentRange)
  {
    $this->contentRange = $contentRange;
  }
  /**
   * @return TrawlerContentRangeInfo
   */
  public function getContentRange()
  {
    return $this->contentRange;
  }
  /**
   * @param string
   */
  public function setETag($eTag)
  {
    $this->eTag = $eTag;
  }
  /**
   * @return string
   */
  public function getETag()
  {
    return $this->eTag;
  }
  /**
   * @param string
   */
  public function setFetchID($fetchID)
  {
    $this->fetchID = $fetchID;
  }
  /**
   * @return string
   */
  public function getFetchID()
  {
    return $this->fetchID;
  }
  /**
   * @param bool
   */
  public function setIsFinalResponse($isFinalResponse)
  {
    $this->isFinalResponse = $isFinalResponse;
  }
  /**
   * @return bool
   */
  public function getIsFinalResponse()
  {
    return $this->isFinalResponse;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrawlerFetchReplyDataPartialResponse::class, 'Google_Service_Contentwarehouse_TrawlerFetchReplyDataPartialResponse');
