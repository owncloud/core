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

class TrawlerFetchReplyDataRedirects extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "badSSLCertificate" => "BadSSLCertificate",
        "crawlTimes" => "CrawlTimes",
        "downloadTime" => "DownloadTime",
        "endpoints" => "Endpoints",
        "hSTSInfo" => "HSTSInfo",
        "hTTPResponseCode" => "HTTPResponseCode",
        "hopPageNoIndexInfo" => "HopPageNoIndexInfo",
        "hopReuseInfo" => "HopReuseInfo",
        "hopRobotsInfo" => "HopRobotsInfo",
        "hostId" => "HostId",
        "httpRequestHeaders" => "HttpRequestHeaders",
        "httpResponseHeaders" => "HttpResponseHeaders",
        "rawTargetUrl" => "RawTargetUrl",
        "refreshTime" => "RefreshTime",
        "robotsTxt" => "RobotsTxt",
        "sourceBody" => "SourceBody",
        "targetUrl" => "TargetUrl",
        "type" => "Type",
  ];
  /**
   * @var string
   */
  public $badSSLCertificate;
  protected $crawlTimesType = TrawlerCrawlTimes::class;
  protected $crawlTimesDataType = '';
  /**
   * @var int
   */
  public $downloadTime;
  protected $endpointsType = TrawlerTCPIPInfo::class;
  protected $endpointsDataType = '';
  /**
   * @var string
   */
  public $hSTSInfo;
  /**
   * @var int
   */
  public $hTTPResponseCode;
  /**
   * @var int
   */
  public $hopPageNoIndexInfo;
  /**
   * @var string
   */
  public $hopReuseInfo;
  /**
   * @var int
   */
  public $hopRobotsInfo;
  /**
   * @var string
   */
  public $hostId;
  /**
   * @var string
   */
  public $httpRequestHeaders;
  /**
   * @var string
   */
  public $httpResponseHeaders;
  /**
   * @var string
   */
  public $rawTargetUrl;
  /**
   * @var int
   */
  public $refreshTime;
  /**
   * @var string
   */
  public $robotsTxt;
  protected $sourceBodyType = TrawlerFetchBodyData::class;
  protected $sourceBodyDataType = '';
  /**
   * @var string
   */
  public $targetUrl;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setBadSSLCertificate($badSSLCertificate)
  {
    $this->badSSLCertificate = $badSSLCertificate;
  }
  /**
   * @return string
   */
  public function getBadSSLCertificate()
  {
    return $this->badSSLCertificate;
  }
  /**
   * @param TrawlerCrawlTimes
   */
  public function setCrawlTimes(TrawlerCrawlTimes $crawlTimes)
  {
    $this->crawlTimes = $crawlTimes;
  }
  /**
   * @return TrawlerCrawlTimes
   */
  public function getCrawlTimes()
  {
    return $this->crawlTimes;
  }
  /**
   * @param int
   */
  public function setDownloadTime($downloadTime)
  {
    $this->downloadTime = $downloadTime;
  }
  /**
   * @return int
   */
  public function getDownloadTime()
  {
    return $this->downloadTime;
  }
  /**
   * @param TrawlerTCPIPInfo
   */
  public function setEndpoints(TrawlerTCPIPInfo $endpoints)
  {
    $this->endpoints = $endpoints;
  }
  /**
   * @return TrawlerTCPIPInfo
   */
  public function getEndpoints()
  {
    return $this->endpoints;
  }
  /**
   * @param string
   */
  public function setHSTSInfo($hSTSInfo)
  {
    $this->hSTSInfo = $hSTSInfo;
  }
  /**
   * @return string
   */
  public function getHSTSInfo()
  {
    return $this->hSTSInfo;
  }
  /**
   * @param int
   */
  public function setHTTPResponseCode($hTTPResponseCode)
  {
    $this->hTTPResponseCode = $hTTPResponseCode;
  }
  /**
   * @return int
   */
  public function getHTTPResponseCode()
  {
    return $this->hTTPResponseCode;
  }
  /**
   * @param int
   */
  public function setHopPageNoIndexInfo($hopPageNoIndexInfo)
  {
    $this->hopPageNoIndexInfo = $hopPageNoIndexInfo;
  }
  /**
   * @return int
   */
  public function getHopPageNoIndexInfo()
  {
    return $this->hopPageNoIndexInfo;
  }
  /**
   * @param string
   */
  public function setHopReuseInfo($hopReuseInfo)
  {
    $this->hopReuseInfo = $hopReuseInfo;
  }
  /**
   * @return string
   */
  public function getHopReuseInfo()
  {
    return $this->hopReuseInfo;
  }
  /**
   * @param int
   */
  public function setHopRobotsInfo($hopRobotsInfo)
  {
    $this->hopRobotsInfo = $hopRobotsInfo;
  }
  /**
   * @return int
   */
  public function getHopRobotsInfo()
  {
    return $this->hopRobotsInfo;
  }
  /**
   * @param string
   */
  public function setHostId($hostId)
  {
    $this->hostId = $hostId;
  }
  /**
   * @return string
   */
  public function getHostId()
  {
    return $this->hostId;
  }
  /**
   * @param string
   */
  public function setHttpRequestHeaders($httpRequestHeaders)
  {
    $this->httpRequestHeaders = $httpRequestHeaders;
  }
  /**
   * @return string
   */
  public function getHttpRequestHeaders()
  {
    return $this->httpRequestHeaders;
  }
  /**
   * @param string
   */
  public function setHttpResponseHeaders($httpResponseHeaders)
  {
    $this->httpResponseHeaders = $httpResponseHeaders;
  }
  /**
   * @return string
   */
  public function getHttpResponseHeaders()
  {
    return $this->httpResponseHeaders;
  }
  /**
   * @param string
   */
  public function setRawTargetUrl($rawTargetUrl)
  {
    $this->rawTargetUrl = $rawTargetUrl;
  }
  /**
   * @return string
   */
  public function getRawTargetUrl()
  {
    return $this->rawTargetUrl;
  }
  /**
   * @param int
   */
  public function setRefreshTime($refreshTime)
  {
    $this->refreshTime = $refreshTime;
  }
  /**
   * @return int
   */
  public function getRefreshTime()
  {
    return $this->refreshTime;
  }
  /**
   * @param string
   */
  public function setRobotsTxt($robotsTxt)
  {
    $this->robotsTxt = $robotsTxt;
  }
  /**
   * @return string
   */
  public function getRobotsTxt()
  {
    return $this->robotsTxt;
  }
  /**
   * @param TrawlerFetchBodyData
   */
  public function setSourceBody(TrawlerFetchBodyData $sourceBody)
  {
    $this->sourceBody = $sourceBody;
  }
  /**
   * @return TrawlerFetchBodyData
   */
  public function getSourceBody()
  {
    return $this->sourceBody;
  }
  /**
   * @param string
   */
  public function setTargetUrl($targetUrl)
  {
    $this->targetUrl = $targetUrl;
  }
  /**
   * @return string
   */
  public function getTargetUrl()
  {
    return $this->targetUrl;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrawlerFetchReplyDataRedirects::class, 'Google_Service_Contentwarehouse_TrawlerFetchReplyDataRedirects');
