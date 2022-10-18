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

class TrawlerHostBucketDataUrlList extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "clientCanCrawl" => "ClientCanCrawl",
        "isDefaultNode" => "IsDefaultNode",
        "isListForUrl" => "IsListForUrl",
        "numCurrentFetches" => "NumCurrentFetches",
        "numUrls" => "NumUrls",
        "requestType" => "RequestType",
        "requestorFp" => "RequestorFp",
  ];
  /**
   * @var bool
   */
  public $clientCanCrawl;
  /**
   * @var bool
   */
  public $isDefaultNode;
  /**
   * @var bool
   */
  public $isListForUrl;
  /**
   * @var int
   */
  public $numCurrentFetches;
  /**
   * @var int
   */
  public $numUrls;
  /**
   * @var string
   */
  public $requestType;
  /**
   * @var string
   */
  public $requestorFp;

  /**
   * @param bool
   */
  public function setClientCanCrawl($clientCanCrawl)
  {
    $this->clientCanCrawl = $clientCanCrawl;
  }
  /**
   * @return bool
   */
  public function getClientCanCrawl()
  {
    return $this->clientCanCrawl;
  }
  /**
   * @param bool
   */
  public function setIsDefaultNode($isDefaultNode)
  {
    $this->isDefaultNode = $isDefaultNode;
  }
  /**
   * @return bool
   */
  public function getIsDefaultNode()
  {
    return $this->isDefaultNode;
  }
  /**
   * @param bool
   */
  public function setIsListForUrl($isListForUrl)
  {
    $this->isListForUrl = $isListForUrl;
  }
  /**
   * @return bool
   */
  public function getIsListForUrl()
  {
    return $this->isListForUrl;
  }
  /**
   * @param int
   */
  public function setNumCurrentFetches($numCurrentFetches)
  {
    $this->numCurrentFetches = $numCurrentFetches;
  }
  /**
   * @return int
   */
  public function getNumCurrentFetches()
  {
    return $this->numCurrentFetches;
  }
  /**
   * @param int
   */
  public function setNumUrls($numUrls)
  {
    $this->numUrls = $numUrls;
  }
  /**
   * @return int
   */
  public function getNumUrls()
  {
    return $this->numUrls;
  }
  /**
   * @param string
   */
  public function setRequestType($requestType)
  {
    $this->requestType = $requestType;
  }
  /**
   * @return string
   */
  public function getRequestType()
  {
    return $this->requestType;
  }
  /**
   * @param string
   */
  public function setRequestorFp($requestorFp)
  {
    $this->requestorFp = $requestorFp;
  }
  /**
   * @return string
   */
  public function getRequestorFp()
  {
    return $this->requestorFp;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrawlerHostBucketDataUrlList::class, 'Google_Service_Contentwarehouse_TrawlerHostBucketDataUrlList');
