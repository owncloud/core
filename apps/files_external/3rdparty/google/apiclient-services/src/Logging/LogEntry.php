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

class LogEntry extends \Google\Model
{
  protected $httpRequestType = HttpRequest::class;
  protected $httpRequestDataType = '';
  /**
   * @var string
   */
  public $insertId;
  /**
   * @var array[]
   */
  public $jsonPayload;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $logName;
  protected $metadataType = MonitoredResourceMetadata::class;
  protected $metadataDataType = '';
  protected $operationType = LogEntryOperation::class;
  protected $operationDataType = '';
  /**
   * @var array[]
   */
  public $protoPayload;
  /**
   * @var string
   */
  public $receiveTimestamp;
  protected $resourceType = MonitoredResource::class;
  protected $resourceDataType = '';
  /**
   * @var string
   */
  public $severity;
  protected $sourceLocationType = LogEntrySourceLocation::class;
  protected $sourceLocationDataType = '';
  /**
   * @var string
   */
  public $spanId;
  protected $splitType = LogSplit::class;
  protected $splitDataType = '';
  /**
   * @var string
   */
  public $textPayload;
  /**
   * @var string
   */
  public $timestamp;
  /**
   * @var string
   */
  public $trace;
  /**
   * @var bool
   */
  public $traceSampled;

  /**
   * @param HttpRequest
   */
  public function setHttpRequest(HttpRequest $httpRequest)
  {
    $this->httpRequest = $httpRequest;
  }
  /**
   * @return HttpRequest
   */
  public function getHttpRequest()
  {
    return $this->httpRequest;
  }
  /**
   * @param string
   */
  public function setInsertId($insertId)
  {
    $this->insertId = $insertId;
  }
  /**
   * @return string
   */
  public function getInsertId()
  {
    return $this->insertId;
  }
  /**
   * @param array[]
   */
  public function setJsonPayload($jsonPayload)
  {
    $this->jsonPayload = $jsonPayload;
  }
  /**
   * @return array[]
   */
  public function getJsonPayload()
  {
    return $this->jsonPayload;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string
   */
  public function setLogName($logName)
  {
    $this->logName = $logName;
  }
  /**
   * @return string
   */
  public function getLogName()
  {
    return $this->logName;
  }
  /**
   * @param MonitoredResourceMetadata
   */
  public function setMetadata(MonitoredResourceMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return MonitoredResourceMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param LogEntryOperation
   */
  public function setOperation(LogEntryOperation $operation)
  {
    $this->operation = $operation;
  }
  /**
   * @return LogEntryOperation
   */
  public function getOperation()
  {
    return $this->operation;
  }
  /**
   * @param array[]
   */
  public function setProtoPayload($protoPayload)
  {
    $this->protoPayload = $protoPayload;
  }
  /**
   * @return array[]
   */
  public function getProtoPayload()
  {
    return $this->protoPayload;
  }
  /**
   * @param string
   */
  public function setReceiveTimestamp($receiveTimestamp)
  {
    $this->receiveTimestamp = $receiveTimestamp;
  }
  /**
   * @return string
   */
  public function getReceiveTimestamp()
  {
    return $this->receiveTimestamp;
  }
  /**
   * @param MonitoredResource
   */
  public function setResource(MonitoredResource $resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return MonitoredResource
   */
  public function getResource()
  {
    return $this->resource;
  }
  /**
   * @param string
   */
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  /**
   * @return string
   */
  public function getSeverity()
  {
    return $this->severity;
  }
  /**
   * @param LogEntrySourceLocation
   */
  public function setSourceLocation(LogEntrySourceLocation $sourceLocation)
  {
    $this->sourceLocation = $sourceLocation;
  }
  /**
   * @return LogEntrySourceLocation
   */
  public function getSourceLocation()
  {
    return $this->sourceLocation;
  }
  /**
   * @param string
   */
  public function setSpanId($spanId)
  {
    $this->spanId = $spanId;
  }
  /**
   * @return string
   */
  public function getSpanId()
  {
    return $this->spanId;
  }
  /**
   * @param LogSplit
   */
  public function setSplit(LogSplit $split)
  {
    $this->split = $split;
  }
  /**
   * @return LogSplit
   */
  public function getSplit()
  {
    return $this->split;
  }
  /**
   * @param string
   */
  public function setTextPayload($textPayload)
  {
    $this->textPayload = $textPayload;
  }
  /**
   * @return string
   */
  public function getTextPayload()
  {
    return $this->textPayload;
  }
  /**
   * @param string
   */
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  /**
   * @return string
   */
  public function getTimestamp()
  {
    return $this->timestamp;
  }
  /**
   * @param string
   */
  public function setTrace($trace)
  {
    $this->trace = $trace;
  }
  /**
   * @return string
   */
  public function getTrace()
  {
    return $this->trace;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LogEntry::class, 'Google_Service_Logging_LogEntry');
