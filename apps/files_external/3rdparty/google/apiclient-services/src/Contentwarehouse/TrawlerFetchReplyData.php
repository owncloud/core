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

class TrawlerFetchReplyData extends \Google\Collection
{
  protected $collection_key = 'redirects';
  protected $internal_gapi_mappings = [
        "badSSLCertificate" => "BadSSLCertificate",
        "clientServiceInfo" => "ClientServiceInfo",
        "compressedBody" => "CompressedBody",
        "crawlTimes" => "CrawlTimes",
        "dNSHost" => "DNSHost",
        "downloadTime" => "DownloadTime",
        "egressRegion" => "EgressRegion",
        "eligibleGeoCrawlEgressRegion" => "EligibleGeoCrawlEgressRegion",
        "endpoints" => "Endpoints",
        "events" => "Events",
        "fetchPatternFp" => "FetchPatternFp",
        "flooEgressRegion" => "FlooEgressRegion",
        "geoCrawlEgressRegion" => "GeoCrawlEgressRegion",
        "geoCrawlFallback" => "GeoCrawlFallback",
        "geoCrawlLocationAttempted" => "GeoCrawlLocationAttempted",
        "hSTSInfo" => "HSTSInfo",
        "hTTPTrailers" => "HTTPTrailers",
        "hopCacheKeyForLookup" => "HopCacheKeyForLookup",
        "hopCacheKeyForUpdate" => "HopCacheKeyForUpdate",
        "hopReuseInfo" => "HopReuseInfo",
        "hopRobotsInfo" => "HopRobotsInfo",
        "hostBucketData" => "HostBucketData",
        "hostId" => "HostId",
        "httpProtocol" => "HttpProtocol",
        "httpRequestHeaders" => "HttpRequestHeaders",
        "httpResponseHeaders" => "HttpResponseHeaders",
        "httpVersion" => "HttpVersion",
        "iD" => "ID",
        "lastUrlStatus" => "LastUrlStatus",
        "policyData" => "PolicyData",
        "postData" => "PostData",
        "predictedDownloadTimeMs" => "PredictedDownloadTimeMs",
        "protocolVersionFallback" => "ProtocolVersionFallback",
        "redirectSourceFetchId" => "RedirectSourceFetchId",
        "requestorID" => "RequestorID",
        "requestorIPAddressPacked" => "RequestorIPAddressPacked",
        "reuseInfo" => "ReuseInfo",
        "robotsInfo" => "RobotsInfo",
        "robotsStatus" => "RobotsStatus",
        "robotsTxt" => "RobotsTxt",
        "status" => "Status",
        "throttleClient" => "ThrottleClient",
        "thrownAwayBytes" => "ThrownAwayBytes",
        "timestampInMS" => "TimestampInMS",
        "totalFetchedSize" => "TotalFetchedSize",
        "transparentRewrites" => "TransparentRewrites",
        "trawlerPrivate" => "TrawlerPrivate",
        "url" => "Url",
        "urlEncoding" => "UrlEncoding",
        "useHtmlCompressDictionary" => "UseHtmlCompressDictionary",
  ];
  /**
   * @var string
   */
  public $badSSLCertificate;
  protected $clientServiceInfoType = TrawlerClientServiceInfo::class;
  protected $clientServiceInfoDataType = '';
  /**
   * @var bool
   */
  public $compressedBody;
  protected $crawlTimesType = TrawlerCrawlTimes::class;
  protected $crawlTimesDataType = '';
  /**
   * @var string
   */
  public $dNSHost;
  /**
   * @var int
   */
  public $downloadTime;
  /**
   * @var string
   */
  public $egressRegion;
  /**
   * @var string
   */
  public $eligibleGeoCrawlEgressRegion;
  protected $endpointsType = TrawlerTCPIPInfo::class;
  protected $endpointsDataType = '';
  protected $eventsType = TrawlerEvent::class;
  protected $eventsDataType = 'array';
  /**
   * @var string
   */
  public $fetchPatternFp;
  /**
   * @var string
   */
  public $flooEgressRegion;
  /**
   * @var string
   */
  public $geoCrawlEgressRegion;
  /**
   * @var bool
   */
  public $geoCrawlFallback;
  /**
   * @var string
   */
  public $geoCrawlLocationAttempted;
  /**
   * @var string
   */
  public $hSTSInfo;
  protected $hTTPTrailersType = TrawlerFetchReplyDataHTTPHeader::class;
  protected $hTTPTrailersDataType = 'array';
  /**
   * @var string
   */
  public $hopCacheKeyForLookup;
  /**
   * @var string
   */
  public $hopCacheKeyForUpdate;
  /**
   * @var string
   */
  public $hopReuseInfo;
  /**
   * @var int
   */
  public $hopRobotsInfo;
  protected $hostBucketDataType = TrawlerHostBucketData::class;
  protected $hostBucketDataDataType = '';
  /**
   * @var string
   */
  public $hostId;
  /**
   * @var string
   */
  public $httpProtocol;
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
  public $httpVersion;
  /**
   * @var string
   */
  public $iD;
  protected $lastUrlStatusType = TrawlerFetchStatus::class;
  protected $lastUrlStatusDataType = '';
  protected $policyDataType = TrawlerPolicyData::class;
  protected $policyDataDataType = 'array';
  /**
   * @var string
   */
  public $postData;
  /**
   * @var int
   */
  public $predictedDownloadTimeMs;
  /**
   * @var bool
   */
  public $protocolVersionFallback;
  /**
   * @var string
   */
  public $redirectSourceFetchId;
  /**
   * @var string
   */
  public $requestorID;
  /**
   * @var string
   */
  public $requestorIPAddressPacked;
  /**
   * @var string
   */
  public $reuseInfo;
  /**
   * @var int
   */
  public $robotsInfo;
  protected $robotsStatusType = TrawlerFetchStatus::class;
  protected $robotsStatusDataType = '';
  /**
   * @var string
   */
  public $robotsTxt;
  protected $statusType = TrawlerFetchStatus::class;
  protected $statusDataType = '';
  protected $throttleClientType = TrawlerThrottleClientData::class;
  protected $throttleClientDataType = '';
  /**
   * @var string
   */
  public $thrownAwayBytes;
  /**
   * @var string
   */
  public $timestampInMS;
  /**
   * @var string
   */
  public $totalFetchedSize;
  /**
   * @var string[]
   */
  public $transparentRewrites;
  protected $trawlerPrivateType = TrawlerTrawlerPrivateFetchReplyData::class;
  protected $trawlerPrivateDataType = '';
  /**
   * @var string
   */
  public $url;
  /**
   * @var int
   */
  public $urlEncoding;
  /**
   * @var bool
   */
  public $useHtmlCompressDictionary;
  protected $crawldatesType = TrawlerFetchReplyDataCrawlDates::class;
  protected $crawldatesDataType = '';
  protected $deliveryReportType = TrawlerFetchReplyDataDeliveryReport::class;
  protected $deliveryReportDataType = '';
  protected $fetchstatsType = TrawlerFetchReplyDataFetchStats::class;
  protected $fetchstatsDataType = '';
  /**
   * @var string
   */
  public $originalProtocolUrl;
  protected $partialresponseType = TrawlerFetchReplyDataPartialResponse::class;
  protected $partialresponseDataType = '';
  protected $protocolresponseType = TrawlerFetchReplyDataProtocolResponse::class;
  protected $protocolresponseDataType = '';
  protected $redirectsType = TrawlerFetchReplyDataRedirects::class;
  protected $redirectsDataType = 'array';
  /**
   * @var string
   */
  public $trafficType;

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
   * @param TrawlerClientServiceInfo
   */
  public function setClientServiceInfo(TrawlerClientServiceInfo $clientServiceInfo)
  {
    $this->clientServiceInfo = $clientServiceInfo;
  }
  /**
   * @return TrawlerClientServiceInfo
   */
  public function getClientServiceInfo()
  {
    return $this->clientServiceInfo;
  }
  /**
   * @param bool
   */
  public function setCompressedBody($compressedBody)
  {
    $this->compressedBody = $compressedBody;
  }
  /**
   * @return bool
   */
  public function getCompressedBody()
  {
    return $this->compressedBody;
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
   * @param string
   */
  public function setDNSHost($dNSHost)
  {
    $this->dNSHost = $dNSHost;
  }
  /**
   * @return string
   */
  public function getDNSHost()
  {
    return $this->dNSHost;
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
   * @param string
   */
  public function setEgressRegion($egressRegion)
  {
    $this->egressRegion = $egressRegion;
  }
  /**
   * @return string
   */
  public function getEgressRegion()
  {
    return $this->egressRegion;
  }
  /**
   * @param string
   */
  public function setEligibleGeoCrawlEgressRegion($eligibleGeoCrawlEgressRegion)
  {
    $this->eligibleGeoCrawlEgressRegion = $eligibleGeoCrawlEgressRegion;
  }
  /**
   * @return string
   */
  public function getEligibleGeoCrawlEgressRegion()
  {
    return $this->eligibleGeoCrawlEgressRegion;
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
   * @param TrawlerEvent[]
   */
  public function setEvents($events)
  {
    $this->events = $events;
  }
  /**
   * @return TrawlerEvent[]
   */
  public function getEvents()
  {
    return $this->events;
  }
  /**
   * @param string
   */
  public function setFetchPatternFp($fetchPatternFp)
  {
    $this->fetchPatternFp = $fetchPatternFp;
  }
  /**
   * @return string
   */
  public function getFetchPatternFp()
  {
    return $this->fetchPatternFp;
  }
  /**
   * @param string
   */
  public function setFlooEgressRegion($flooEgressRegion)
  {
    $this->flooEgressRegion = $flooEgressRegion;
  }
  /**
   * @return string
   */
  public function getFlooEgressRegion()
  {
    return $this->flooEgressRegion;
  }
  /**
   * @param string
   */
  public function setGeoCrawlEgressRegion($geoCrawlEgressRegion)
  {
    $this->geoCrawlEgressRegion = $geoCrawlEgressRegion;
  }
  /**
   * @return string
   */
  public function getGeoCrawlEgressRegion()
  {
    return $this->geoCrawlEgressRegion;
  }
  /**
   * @param bool
   */
  public function setGeoCrawlFallback($geoCrawlFallback)
  {
    $this->geoCrawlFallback = $geoCrawlFallback;
  }
  /**
   * @return bool
   */
  public function getGeoCrawlFallback()
  {
    return $this->geoCrawlFallback;
  }
  /**
   * @param string
   */
  public function setGeoCrawlLocationAttempted($geoCrawlLocationAttempted)
  {
    $this->geoCrawlLocationAttempted = $geoCrawlLocationAttempted;
  }
  /**
   * @return string
   */
  public function getGeoCrawlLocationAttempted()
  {
    return $this->geoCrawlLocationAttempted;
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
   * @param TrawlerFetchReplyDataHTTPHeader[]
   */
  public function setHTTPTrailers($hTTPTrailers)
  {
    $this->hTTPTrailers = $hTTPTrailers;
  }
  /**
   * @return TrawlerFetchReplyDataHTTPHeader[]
   */
  public function getHTTPTrailers()
  {
    return $this->hTTPTrailers;
  }
  /**
   * @param string
   */
  public function setHopCacheKeyForLookup($hopCacheKeyForLookup)
  {
    $this->hopCacheKeyForLookup = $hopCacheKeyForLookup;
  }
  /**
   * @return string
   */
  public function getHopCacheKeyForLookup()
  {
    return $this->hopCacheKeyForLookup;
  }
  /**
   * @param string
   */
  public function setHopCacheKeyForUpdate($hopCacheKeyForUpdate)
  {
    $this->hopCacheKeyForUpdate = $hopCacheKeyForUpdate;
  }
  /**
   * @return string
   */
  public function getHopCacheKeyForUpdate()
  {
    return $this->hopCacheKeyForUpdate;
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
   * @param TrawlerHostBucketData
   */
  public function setHostBucketData(TrawlerHostBucketData $hostBucketData)
  {
    $this->hostBucketData = $hostBucketData;
  }
  /**
   * @return TrawlerHostBucketData
   */
  public function getHostBucketData()
  {
    return $this->hostBucketData;
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
  public function setHttpProtocol($httpProtocol)
  {
    $this->httpProtocol = $httpProtocol;
  }
  /**
   * @return string
   */
  public function getHttpProtocol()
  {
    return $this->httpProtocol;
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
   * @param string
   */
  public function setID($iD)
  {
    $this->iD = $iD;
  }
  /**
   * @return string
   */
  public function getID()
  {
    return $this->iD;
  }
  /**
   * @param TrawlerFetchStatus
   */
  public function setLastUrlStatus(TrawlerFetchStatus $lastUrlStatus)
  {
    $this->lastUrlStatus = $lastUrlStatus;
  }
  /**
   * @return TrawlerFetchStatus
   */
  public function getLastUrlStatus()
  {
    return $this->lastUrlStatus;
  }
  /**
   * @param TrawlerPolicyData[]
   */
  public function setPolicyData($policyData)
  {
    $this->policyData = $policyData;
  }
  /**
   * @return TrawlerPolicyData[]
   */
  public function getPolicyData()
  {
    return $this->policyData;
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
   * @param int
   */
  public function setPredictedDownloadTimeMs($predictedDownloadTimeMs)
  {
    $this->predictedDownloadTimeMs = $predictedDownloadTimeMs;
  }
  /**
   * @return int
   */
  public function getPredictedDownloadTimeMs()
  {
    return $this->predictedDownloadTimeMs;
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
  public function setRedirectSourceFetchId($redirectSourceFetchId)
  {
    $this->redirectSourceFetchId = $redirectSourceFetchId;
  }
  /**
   * @return string
   */
  public function getRedirectSourceFetchId()
  {
    return $this->redirectSourceFetchId;
  }
  /**
   * @param string
   */
  public function setRequestorID($requestorID)
  {
    $this->requestorID = $requestorID;
  }
  /**
   * @return string
   */
  public function getRequestorID()
  {
    return $this->requestorID;
  }
  /**
   * @param string
   */
  public function setRequestorIPAddressPacked($requestorIPAddressPacked)
  {
    $this->requestorIPAddressPacked = $requestorIPAddressPacked;
  }
  /**
   * @return string
   */
  public function getRequestorIPAddressPacked()
  {
    return $this->requestorIPAddressPacked;
  }
  /**
   * @param string
   */
  public function setReuseInfo($reuseInfo)
  {
    $this->reuseInfo = $reuseInfo;
  }
  /**
   * @return string
   */
  public function getReuseInfo()
  {
    return $this->reuseInfo;
  }
  /**
   * @param int
   */
  public function setRobotsInfo($robotsInfo)
  {
    $this->robotsInfo = $robotsInfo;
  }
  /**
   * @return int
   */
  public function getRobotsInfo()
  {
    return $this->robotsInfo;
  }
  /**
   * @param TrawlerFetchStatus
   */
  public function setRobotsStatus(TrawlerFetchStatus $robotsStatus)
  {
    $this->robotsStatus = $robotsStatus;
  }
  /**
   * @return TrawlerFetchStatus
   */
  public function getRobotsStatus()
  {
    return $this->robotsStatus;
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
   * @param TrawlerFetchStatus
   */
  public function setStatus(TrawlerFetchStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return TrawlerFetchStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param TrawlerThrottleClientData
   */
  public function setThrottleClient(TrawlerThrottleClientData $throttleClient)
  {
    $this->throttleClient = $throttleClient;
  }
  /**
   * @return TrawlerThrottleClientData
   */
  public function getThrottleClient()
  {
    return $this->throttleClient;
  }
  /**
   * @param string
   */
  public function setThrownAwayBytes($thrownAwayBytes)
  {
    $this->thrownAwayBytes = $thrownAwayBytes;
  }
  /**
   * @return string
   */
  public function getThrownAwayBytes()
  {
    return $this->thrownAwayBytes;
  }
  /**
   * @param string
   */
  public function setTimestampInMS($timestampInMS)
  {
    $this->timestampInMS = $timestampInMS;
  }
  /**
   * @return string
   */
  public function getTimestampInMS()
  {
    return $this->timestampInMS;
  }
  /**
   * @param string
   */
  public function setTotalFetchedSize($totalFetchedSize)
  {
    $this->totalFetchedSize = $totalFetchedSize;
  }
  /**
   * @return string
   */
  public function getTotalFetchedSize()
  {
    return $this->totalFetchedSize;
  }
  /**
   * @param string[]
   */
  public function setTransparentRewrites($transparentRewrites)
  {
    $this->transparentRewrites = $transparentRewrites;
  }
  /**
   * @return string[]
   */
  public function getTransparentRewrites()
  {
    return $this->transparentRewrites;
  }
  /**
   * @param TrawlerTrawlerPrivateFetchReplyData
   */
  public function setTrawlerPrivate(TrawlerTrawlerPrivateFetchReplyData $trawlerPrivate)
  {
    $this->trawlerPrivate = $trawlerPrivate;
  }
  /**
   * @return TrawlerTrawlerPrivateFetchReplyData
   */
  public function getTrawlerPrivate()
  {
    return $this->trawlerPrivate;
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
   * @param int
   */
  public function setUrlEncoding($urlEncoding)
  {
    $this->urlEncoding = $urlEncoding;
  }
  /**
   * @return int
   */
  public function getUrlEncoding()
  {
    return $this->urlEncoding;
  }
  /**
   * @param bool
   */
  public function setUseHtmlCompressDictionary($useHtmlCompressDictionary)
  {
    $this->useHtmlCompressDictionary = $useHtmlCompressDictionary;
  }
  /**
   * @return bool
   */
  public function getUseHtmlCompressDictionary()
  {
    return $this->useHtmlCompressDictionary;
  }
  /**
   * @param TrawlerFetchReplyDataCrawlDates
   */
  public function setCrawldates(TrawlerFetchReplyDataCrawlDates $crawldates)
  {
    $this->crawldates = $crawldates;
  }
  /**
   * @return TrawlerFetchReplyDataCrawlDates
   */
  public function getCrawldates()
  {
    return $this->crawldates;
  }
  /**
   * @param TrawlerFetchReplyDataDeliveryReport
   */
  public function setDeliveryReport(TrawlerFetchReplyDataDeliveryReport $deliveryReport)
  {
    $this->deliveryReport = $deliveryReport;
  }
  /**
   * @return TrawlerFetchReplyDataDeliveryReport
   */
  public function getDeliveryReport()
  {
    return $this->deliveryReport;
  }
  /**
   * @param TrawlerFetchReplyDataFetchStats
   */
  public function setFetchstats(TrawlerFetchReplyDataFetchStats $fetchstats)
  {
    $this->fetchstats = $fetchstats;
  }
  /**
   * @return TrawlerFetchReplyDataFetchStats
   */
  public function getFetchstats()
  {
    return $this->fetchstats;
  }
  /**
   * @param string
   */
  public function setOriginalProtocolUrl($originalProtocolUrl)
  {
    $this->originalProtocolUrl = $originalProtocolUrl;
  }
  /**
   * @return string
   */
  public function getOriginalProtocolUrl()
  {
    return $this->originalProtocolUrl;
  }
  /**
   * @param TrawlerFetchReplyDataPartialResponse
   */
  public function setPartialresponse(TrawlerFetchReplyDataPartialResponse $partialresponse)
  {
    $this->partialresponse = $partialresponse;
  }
  /**
   * @return TrawlerFetchReplyDataPartialResponse
   */
  public function getPartialresponse()
  {
    return $this->partialresponse;
  }
  /**
   * @param TrawlerFetchReplyDataProtocolResponse
   */
  public function setProtocolresponse(TrawlerFetchReplyDataProtocolResponse $protocolresponse)
  {
    $this->protocolresponse = $protocolresponse;
  }
  /**
   * @return TrawlerFetchReplyDataProtocolResponse
   */
  public function getProtocolresponse()
  {
    return $this->protocolresponse;
  }
  /**
   * @param TrawlerFetchReplyDataRedirects[]
   */
  public function setRedirects($redirects)
  {
    $this->redirects = $redirects;
  }
  /**
   * @return TrawlerFetchReplyDataRedirects[]
   */
  public function getRedirects()
  {
    return $this->redirects;
  }
  /**
   * @param string
   */
  public function setTrafficType($trafficType)
  {
    $this->trafficType = $trafficType;
  }
  /**
   * @return string
   */
  public function getTrafficType()
  {
    return $this->trafficType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrawlerFetchReplyData::class, 'Google_Service_Contentwarehouse_TrawlerFetchReplyData');
