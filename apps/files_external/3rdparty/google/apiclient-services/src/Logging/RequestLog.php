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

namespace Google\Service\Logging;

class RequestLog extends \Google\Collection
{
  protected $collection_key = 'sourceReference';
  /**
   * @var string
   */
  public $appEngineRelease;
  /**
   * @var string
   */
  public $appId;
  public $cost;
  /**
   * @var string
   */
  public $endTime;
  /**
   * @var bool
   */
  public $finished;
  /**
   * @var bool
   */
  public $first;
  /**
   * @var string
   */
  public $host;
  /**
   * @var string
   */
  public $httpVersion;
  /**
   * @var string
   */
  public $instanceId;
  /**
   * @var int
   */
  public $instanceIndex;
  /**
   * @var string
   */
  public $ip;
  /**
   * @var string
   */
  public $latency;
  protected $lineType = LogLine::class;
  protected $lineDataType = 'array';
  /**
   * @var string
   */
  public $megaCycles;
  /**
   * @var string
   */
  public $method;
  /**
   * @var string
   */
  public $moduleId;
  /**
   * @var string
   */
  public $nickname;
  /**
   * @var string
   */
  public $pendingTime;
  /**
   * @var string
   */
  public $referrer;
  /**
   * @var string
   */
  public $requestId;
  /**
   * @var string
   */
  public $resource;
  /**
   * @var string
   */
  public $responseSize;
  protected $sourceReferenceType = SourceReference::class;
  protected $sourceReferenceDataType = 'array';
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var int
   */
  public $status;
  /**
   * @var string
   */
  public $taskName;
  /**
   * @var string
   */
  public $taskQueueName;
  /**
   * @var string
   */
  public $traceId;
  /**
   * @var bool
   */
  public $traceSampled;
  /**
   * @var string
   */
  public $urlMapEntry;
  /**
   * @var string
   */
  public $userAgent;
  /**
   * @var string
   */
  public $versionId;
  /**
   * @var bool
   */
  public $wasLoadingRequest;

  /**
   * @param string
   */
  public function setAppEngineRelease($appEngineRelease)
  {
    $this->appEngineRelease = $appEngineRelease;
  }
  /**
   * @return string
   */
  public function getAppEngineRelease()
  {
    return $this->appEngineRelease;
  }
  /**
   * @param string
   */
  public function setAppId($appId)
  {
    $this->appId = $appId;
  }
  /**
   * @return string
   */
  public function getAppId()
  {
    return $this->appId;
  }
  public function setCost($cost)
  {
    $this->cost = $cost;
  }
  public function getCost()
  {
    return $this->cost;
  }
  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param bool
   */
  public function setFinished($finished)
  {
    $this->finished = $finished;
  }
  /**
   * @return bool
   */
  public function getFinished()
  {
    return $this->finished;
  }
  /**
   * @param bool
   */
  public function setFirst($first)
  {
    $this->first = $first;
  }
  /**
   * @return bool
   */
  public function getFirst()
  {
    return $this->first;
  }
  /**
   * @param string
   */
  public function setHost($host)
  {
    $this->host = $host;
  }
  /**
   * @return string
   */
  public function getHost()
  {
    return $this->host;
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
  public function setInstanceId($instanceId)
  {
    $this->instanceId = $instanceId;
  }
  /**
   * @return string
   */
  public function getInstanceId()
  {
    return $this->instanceId;
  }
  /**
   * @param int
   */
  public function setInstanceIndex($instanceIndex)
  {
    $this->instanceIndex = $instanceIndex;
  }
  /**
   * @return int
   */
  public function getInstanceIndex()
  {
    return $this->instanceIndex;
  }
  /**
   * @param string
   */
  public function setIp($ip)
  {
    $this->ip = $ip;
  }
  /**
   * @return string
   */
  public function getIp()
  {
    return $this->ip;
  }
  /**
   * @param string
   */
  public function setLatency($latency)
  {
    $this->latency = $latency;
  }
  /**
   * @return string
   */
  public function getLatency()
  {
    return $this->latency;
  }
  /**
   * @param LogLine[]
   */
  public function setLine($line)
  {
    $this->line = $line;
  }
  /**
   * @return LogLine[]
   */
  public function getLine()
  {
    return $this->line;
  }
  /**
   * @param string
   */
  public function setMegaCycles($megaCycles)
  {
    $this->megaCycles = $megaCycles;
  }
  /**
   * @return string
   */
  public function getMegaCycles()
  {
    return $this->megaCycles;
  }
  /**
   * @param string
   */
  public function setMethod($method)
  {
    $this->method = $method;
  }
  /**
   * @return string
   */
  public function getMethod()
  {
    return $this->method;
  }
  /**
   * @param string
   */
  public function setModuleId($moduleId)
  {
    $this->moduleId = $moduleId;
  }
  /**
   * @return string
   */
  public function getModuleId()
  {
    return $this->moduleId;
  }
  /**
   * @param string
   */
  public function setNickname($nickname)
  {
    $this->nickname = $nickname;
  }
  /**
   * @return string
   */
  public function getNickname()
  {
    return $this->nickname;
  }
  /**
   * @param string
   */
  public function setPendingTime($pendingTime)
  {
    $this->pendingTime = $pendingTime;
  }
  /**
   * @return string
   */
  public function getPendingTime()
  {
    return $this->pendingTime;
  }
  /**
   * @param string
   */
  public function setReferrer($referrer)
  {
    $this->referrer = $referrer;
  }
  /**
   * @return string
   */
  public function getReferrer()
  {
    return $this->referrer;
  }
  /**
   * @param string
   */
  public function setRequestId($requestId)
  {
    $this->requestId = $requestId;
  }
  /**
   * @return string
   */
  public function getRequestId()
  {
    return $this->requestId;
  }
  /**
   * @param string
   */
  public function setResource($resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return string
   */
  public function getResource()
  {
    return $this->resource;
  }
  /**
   * @param string
   */
  public function setResponseSize($responseSize)
  {
    $this->responseSize = $responseSize;
  }
  /**
   * @return string
   */
  public function getResponseSize()
  {
    return $this->responseSize;
  }
  /**
   * @param SourceReference[]
   */
  public function setSourceReference($sourceReference)
  {
    $this->sourceReference = $sourceReference;
  }
  /**
   * @return SourceReference[]
   */
  public function getSourceReference()
  {
    return $this->sourceReference;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param int
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return int
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setTaskName($taskName)
  {
    $this->taskName = $taskName;
  }
  /**
   * @return string
   */
  public function getTaskName()
  {
    return $this->taskName;
  }
  /**
   * @param string
   */
  public function setTaskQueueName($taskQueueName)
  {
    $this->taskQueueName = $taskQueueName;
  }
  /**
   * @return string
   */
  public function getTaskQueueName()
  {
    return $this->taskQueueName;
  }
  /**
   * @param string
   */
  public function setTraceId($traceId)
  {
    $this->traceId = $traceId;
  }
  /**
   * @return string
   */
  public function getTraceId()
  {
    return $this->traceId;
  }
  /**
   * @param bool
   */
  public function setTraceSampled($traceSampled)
  {
    $this->traceSampled = $traceSampled;
  }
  /**
   * @return bool
   */
  public function getTraceSampled()
  {
    return $this->traceSampled;
  }
  /**
   * @param string
   */
  public function setUrlMapEntry($urlMapEntry)
  {
    $this->urlMapEntry = $urlMapEntry;
  }
  /**
   * @return string
   */
  public function getUrlMapEntry()
  {
    return $this->urlMapEntry;
  }
  /**
   * @param string
   */
  public function setUserAgent($userAgent)
  {
    $this->userAgent = $userAgent;
  }
  /**
   * @return string
   */
  public function getUserAgent()
  {
    return $this->userAgent;
  }
  /**
   * @param string
   */
  public function setVersionId($versionId)
  {
    $this->versionId = $versionId;
  }
  /**
   * @return string
   */
  public function getVersionId()
  {
    return $this->versionId;
  }
  /**
   * @param bool
   */
  public function setWasLoadingRequest($wasLoadingRequest)
  {
    $this->wasLoadingRequest = $wasLoadingRequest;
  }
  /**
   * @return bool
   */
  public function getWasLoadingRequest()
  {
    return $this->wasLoadingRequest;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RequestLog::class, 'Google_Service_Logging_RequestLog');
