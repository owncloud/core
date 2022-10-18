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

class TrawlerTrawlerPrivateFetchReplyData extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "botGroupName" => "BotGroupName",
        "botHostname" => "BotHostname",
        "cacheRequestorID" => "CacheRequestorID",
        "fetcherTaskNumber" => "FetcherTaskNumber",
        "hSTSHeaderValue" => "HSTSHeaderValue",
        "hadInMemCacheHit" => "HadInMemCacheHit",
        "hintIPAddress" => "HintIPAddress",
        "is5xxHostId" => "Is5xxHostId",
        "isRobotsFetch" => "IsRobotsFetch",
        "postDataSize" => "PostDataSize",
        "producer" => "Producer",
        "proxyInstance" => "ProxyInstance",
        "requestUserName" => "RequestUserName",
        "responseBytes" => "ResponseBytes",
        "robotsBody" => "RobotsBody",
        "rpcEndDeadlineLeftMs" => "RpcEndDeadlineLeftMs",
        "rpcStartDeadlineLeftMs" => "RpcStartDeadlineLeftMs",
        "serverSignature" => "ServerSignature",
        "trawlerInstance" => "TrawlerInstance",
        "userAgentSent" => "UserAgentSent",
        "userAgentSentFp" => "UserAgentSentFp",
  ];
  /**
   * @var string
   */
  public $botGroupName;
  /**
   * @var string
   */
  public $botHostname;
  /**
   * @var string
   */
  public $cacheRequestorID;
  /**
   * @var int
   */
  public $fetcherTaskNumber;
  /**
   * @var string
   */
  public $hSTSHeaderValue;
  /**
   * @var bool
   */
  public $hadInMemCacheHit;
  /**
   * @var string
   */
  public $hintIPAddress;
  /**
   * @var bool
   */
  public $is5xxHostId;
  /**
   * @var bool
   */
  public $isRobotsFetch;
  /**
   * @var string
   */
  public $postDataSize;
  /**
   * @var string
   */
  public $producer;
  /**
   * @var string
   */
  public $proxyInstance;
  /**
   * @var string
   */
  public $requestUserName;
  /**
   * @var string
   */
  public $responseBytes;
  /**
   * @var string
   */
  public $robotsBody;
  /**
   * @var int
   */
  public $rpcEndDeadlineLeftMs;
  /**
   * @var int
   */
  public $rpcStartDeadlineLeftMs;
  /**
   * @var string
   */
  public $serverSignature;
  /**
   * @var string
   */
  public $trawlerInstance;
  /**
   * @var string
   */
  public $userAgentSent;
  /**
   * @var string
   */
  public $userAgentSentFp;
  /**
   * @var string
   */
  public $authenticationInfo;
  /**
   * @var int
   */
  public $cacheAcceptableAfterDate;
  /**
   * @var int
   */
  public $cacheAcceptableAge;
  /**
   * @var string
   */
  public $cacheHitType;
  /**
   * @var string
   */
  public $cdnProvider;
  /**
   * @var string
   */
  public $concurrentStreamNum;
  /**
   * @var string
   */
  public $dependentFetchType;
  /**
   * @var string
   */
  public $downloadFileName;
  /**
   * @var string
   */
  public $httpVersion;
  /**
   * @var bool
   */
  public $isBidiStreamingFetch;
  /**
   * @var bool
   */
  public $isFloonetFetch;
  /**
   * @var bool
   */
  public $isFromGrpcProxy;
  /**
   * @var bool
   */
  public $isVpcTraffic;
  /**
   * @var string
   */
  public $largeStoreHitLocation;
  protected $multiverseClientIdentifierType = TrawlerMultiverseClientIdentifier::class;
  protected $multiverseClientIdentifierDataType = '';
  /**
   * @var string
   */
  public $numDroppedReplies;
  protected $originalClientParamsType = TrawlerOriginalClientParams::class;
  protected $originalClientParamsDataType = '';
  /**
   * @var string
   */
  public $resourceBucket;
  /**
   * @var string
   */
  public $subResourceBucket;
  /**
   * @var string
   */
  public $tier;
  protected $vpcDestinationType = TrawlerLoggedVPCDestination::class;
  protected $vpcDestinationDataType = '';

  /**
   * @param string
   */
  public function setBotGroupName($botGroupName)
  {
    $this->botGroupName = $botGroupName;
  }
  /**
   * @return string
   */
  public function getBotGroupName()
  {
    return $this->botGroupName;
  }
  /**
   * @param string
   */
  public function setBotHostname($botHostname)
  {
    $this->botHostname = $botHostname;
  }
  /**
   * @return string
   */
  public function getBotHostname()
  {
    return $this->botHostname;
  }
  /**
   * @param string
   */
  public function setCacheRequestorID($cacheRequestorID)
  {
    $this->cacheRequestorID = $cacheRequestorID;
  }
  /**
   * @return string
   */
  public function getCacheRequestorID()
  {
    return $this->cacheRequestorID;
  }
  /**
   * @param int
   */
  public function setFetcherTaskNumber($fetcherTaskNumber)
  {
    $this->fetcherTaskNumber = $fetcherTaskNumber;
  }
  /**
   * @return int
   */
  public function getFetcherTaskNumber()
  {
    return $this->fetcherTaskNumber;
  }
  /**
   * @param string
   */
  public function setHSTSHeaderValue($hSTSHeaderValue)
  {
    $this->hSTSHeaderValue = $hSTSHeaderValue;
  }
  /**
   * @return string
   */
  public function getHSTSHeaderValue()
  {
    return $this->hSTSHeaderValue;
  }
  /**
   * @param bool
   */
  public function setHadInMemCacheHit($hadInMemCacheHit)
  {
    $this->hadInMemCacheHit = $hadInMemCacheHit;
  }
  /**
   * @return bool
   */
  public function getHadInMemCacheHit()
  {
    return $this->hadInMemCacheHit;
  }
  /**
   * @param string
   */
  public function setHintIPAddress($hintIPAddress)
  {
    $this->hintIPAddress = $hintIPAddress;
  }
  /**
   * @return string
   */
  public function getHintIPAddress()
  {
    return $this->hintIPAddress;
  }
  /**
   * @param bool
   */
  public function setIs5xxHostId($is5xxHostId)
  {
    $this->is5xxHostId = $is5xxHostId;
  }
  /**
   * @return bool
   */
  public function getIs5xxHostId()
  {
    return $this->is5xxHostId;
  }
  /**
   * @param bool
   */
  public function setIsRobotsFetch($isRobotsFetch)
  {
    $this->isRobotsFetch = $isRobotsFetch;
  }
  /**
   * @return bool
   */
  public function getIsRobotsFetch()
  {
    return $this->isRobotsFetch;
  }
  /**
   * @param string
   */
  public function setPostDataSize($postDataSize)
  {
    $this->postDataSize = $postDataSize;
  }
  /**
   * @return string
   */
  public function getPostDataSize()
  {
    return $this->postDataSize;
  }
  /**
   * @param string
   */
  public function setProducer($producer)
  {
    $this->producer = $producer;
  }
  /**
   * @return string
   */
  public function getProducer()
  {
    return $this->producer;
  }
  /**
   * @param string
   */
  public function setProxyInstance($proxyInstance)
  {
    $this->proxyInstance = $proxyInstance;
  }
  /**
   * @return string
   */
  public function getProxyInstance()
  {
    return $this->proxyInstance;
  }
  /**
   * @param string
   */
  public function setRequestUserName($requestUserName)
  {
    $this->requestUserName = $requestUserName;
  }
  /**
   * @return string
   */
  public function getRequestUserName()
  {
    return $this->requestUserName;
  }
  /**
   * @param string
   */
  public function setResponseBytes($responseBytes)
  {
    $this->responseBytes = $responseBytes;
  }
  /**
   * @return string
   */
  public function getResponseBytes()
  {
    return $this->responseBytes;
  }
  /**
   * @param string
   */
  public function setRobotsBody($robotsBody)
  {
    $this->robotsBody = $robotsBody;
  }
  /**
   * @return string
   */
  public function getRobotsBody()
  {
    return $this->robotsBody;
  }
  /**
   * @param int
   */
  public function setRpcEndDeadlineLeftMs($rpcEndDeadlineLeftMs)
  {
    $this->rpcEndDeadlineLeftMs = $rpcEndDeadlineLeftMs;
  }
  /**
   * @return int
   */
  public function getRpcEndDeadlineLeftMs()
  {
    return $this->rpcEndDeadlineLeftMs;
  }
  /**
   * @param int
   */
  public function setRpcStartDeadlineLeftMs($rpcStartDeadlineLeftMs)
  {
    $this->rpcStartDeadlineLeftMs = $rpcStartDeadlineLeftMs;
  }
  /**
   * @return int
   */
  public function getRpcStartDeadlineLeftMs()
  {
    return $this->rpcStartDeadlineLeftMs;
  }
  /**
   * @param string
   */
  public function setServerSignature($serverSignature)
  {
    $this->serverSignature = $serverSignature;
  }
  /**
   * @return string
   */
  public function getServerSignature()
  {
    return $this->serverSignature;
  }
  /**
   * @param string
   */
  public function setTrawlerInstance($trawlerInstance)
  {
    $this->trawlerInstance = $trawlerInstance;
  }
  /**
   * @return string
   */
  public function getTrawlerInstance()
  {
    return $this->trawlerInstance;
  }
  /**
   * @param string
   */
  public function setUserAgentSent($userAgentSent)
  {
    $this->userAgentSent = $userAgentSent;
  }
  /**
   * @return string
   */
  public function getUserAgentSent()
  {
    return $this->userAgentSent;
  }
  /**
   * @param string
   */
  public function setUserAgentSentFp($userAgentSentFp)
  {
    $this->userAgentSentFp = $userAgentSentFp;
  }
  /**
   * @return string
   */
  public function getUserAgentSentFp()
  {
    return $this->userAgentSentFp;
  }
  /**
   * @param string
   */
  public function setAuthenticationInfo($authenticationInfo)
  {
    $this->authenticationInfo = $authenticationInfo;
  }
  /**
   * @return string
   */
  public function getAuthenticationInfo()
  {
    return $this->authenticationInfo;
  }
  /**
   * @param int
   */
  public function setCacheAcceptableAfterDate($cacheAcceptableAfterDate)
  {
    $this->cacheAcceptableAfterDate = $cacheAcceptableAfterDate;
  }
  /**
   * @return int
   */
  public function getCacheAcceptableAfterDate()
  {
    return $this->cacheAcceptableAfterDate;
  }
  /**
   * @param int
   */
  public function setCacheAcceptableAge($cacheAcceptableAge)
  {
    $this->cacheAcceptableAge = $cacheAcceptableAge;
  }
  /**
   * @return int
   */
  public function getCacheAcceptableAge()
  {
    return $this->cacheAcceptableAge;
  }
  /**
   * @param string
   */
  public function setCacheHitType($cacheHitType)
  {
    $this->cacheHitType = $cacheHitType;
  }
  /**
   * @return string
   */
  public function getCacheHitType()
  {
    return $this->cacheHitType;
  }
  /**
   * @param string
   */
  public function setCdnProvider($cdnProvider)
  {
    $this->cdnProvider = $cdnProvider;
  }
  /**
   * @return string
   */
  public function getCdnProvider()
  {
    return $this->cdnProvider;
  }
  /**
   * @param string
   */
  public function setConcurrentStreamNum($concurrentStreamNum)
  {
    $this->concurrentStreamNum = $concurrentStreamNum;
  }
  /**
   * @return string
   */
  public function getConcurrentStreamNum()
  {
    return $this->concurrentStreamNum;
  }
  /**
   * @param string
   */
  public function setDependentFetchType($dependentFetchType)
  {
    $this->dependentFetchType = $dependentFetchType;
  }
  /**
   * @return string
   */
  public function getDependentFetchType()
  {
    return $this->dependentFetchType;
  }
  /**
   * @param string
   */
  public function setDownloadFileName($downloadFileName)
  {
    $this->downloadFileName = $downloadFileName;
  }
  /**
   * @return string
   */
  public function getDownloadFileName()
  {
    return $this->downloadFileName;
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
  public function setIsBidiStreamingFetch($isBidiStreamingFetch)
  {
    $this->isBidiStreamingFetch = $isBidiStreamingFetch;
  }
  /**
   * @return bool
   */
  public function getIsBidiStreamingFetch()
  {
    return $this->isBidiStreamingFetch;
  }
  /**
   * @param bool
   */
  public function setIsFloonetFetch($isFloonetFetch)
  {
    $this->isFloonetFetch = $isFloonetFetch;
  }
  /**
   * @return bool
   */
  public function getIsFloonetFetch()
  {
    return $this->isFloonetFetch;
  }
  /**
   * @param bool
   */
  public function setIsFromGrpcProxy($isFromGrpcProxy)
  {
    $this->isFromGrpcProxy = $isFromGrpcProxy;
  }
  /**
   * @return bool
   */
  public function getIsFromGrpcProxy()
  {
    return $this->isFromGrpcProxy;
  }
  /**
   * @param bool
   */
  public function setIsVpcTraffic($isVpcTraffic)
  {
    $this->isVpcTraffic = $isVpcTraffic;
  }
  /**
   * @return bool
   */
  public function getIsVpcTraffic()
  {
    return $this->isVpcTraffic;
  }
  /**
   * @param string
   */
  public function setLargeStoreHitLocation($largeStoreHitLocation)
  {
    $this->largeStoreHitLocation = $largeStoreHitLocation;
  }
  /**
   * @return string
   */
  public function getLargeStoreHitLocation()
  {
    return $this->largeStoreHitLocation;
  }
  /**
   * @param TrawlerMultiverseClientIdentifier
   */
  public function setMultiverseClientIdentifier(TrawlerMultiverseClientIdentifier $multiverseClientIdentifier)
  {
    $this->multiverseClientIdentifier = $multiverseClientIdentifier;
  }
  /**
   * @return TrawlerMultiverseClientIdentifier
   */
  public function getMultiverseClientIdentifier()
  {
    return $this->multiverseClientIdentifier;
  }
  /**
   * @param string
   */
  public function setNumDroppedReplies($numDroppedReplies)
  {
    $this->numDroppedReplies = $numDroppedReplies;
  }
  /**
   * @return string
   */
  public function getNumDroppedReplies()
  {
    return $this->numDroppedReplies;
  }
  /**
   * @param TrawlerOriginalClientParams
   */
  public function setOriginalClientParams(TrawlerOriginalClientParams $originalClientParams)
  {
    $this->originalClientParams = $originalClientParams;
  }
  /**
   * @return TrawlerOriginalClientParams
   */
  public function getOriginalClientParams()
  {
    return $this->originalClientParams;
  }
  /**
   * @param string
   */
  public function setResourceBucket($resourceBucket)
  {
    $this->resourceBucket = $resourceBucket;
  }
  /**
   * @return string
   */
  public function getResourceBucket()
  {
    return $this->resourceBucket;
  }
  /**
   * @param string
   */
  public function setSubResourceBucket($subResourceBucket)
  {
    $this->subResourceBucket = $subResourceBucket;
  }
  /**
   * @return string
   */
  public function getSubResourceBucket()
  {
    return $this->subResourceBucket;
  }
  /**
   * @param string
   */
  public function setTier($tier)
  {
    $this->tier = $tier;
  }
  /**
   * @return string
   */
  public function getTier()
  {
    return $this->tier;
  }
  /**
   * @param TrawlerLoggedVPCDestination
   */
  public function setVpcDestination(TrawlerLoggedVPCDestination $vpcDestination)
  {
    $this->vpcDestination = $vpcDestination;
  }
  /**
   * @return TrawlerLoggedVPCDestination
   */
  public function getVpcDestination()
  {
    return $this->vpcDestination;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrawlerTrawlerPrivateFetchReplyData::class, 'Google_Service_Contentwarehouse_TrawlerTrawlerPrivateFetchReplyData');
