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

namespace Google\Service\ServiceControl;

class V2LogEntry extends \Google\Model
{
  protected $httpRequestType = V2HttpRequest::class;
  protected $httpRequestDataType = '';
  /**
   * @var string
   */
  public $insertId;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string[]
   */
  public $monitoredResourceLabels;
  /**
   * @var string
   */
  public $name;
  protected $operationType = V2LogEntryOperation::class;
  protected $operationDataType = '';
  /**
   * @var array[]
   */
  public $protoPayload;
  /**
   * @var string
   */
  public $severity;
  protected $sourceLocationType = V2LogEntrySourceLocation::class;
  protected $sourceLocationDataType = '';
  /**
   * @var array[]
   */
  public $structPayload;
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
   * @param V2HttpRequest
   */
  public function setHttpRequest(V2HttpRequest $httpRequest)
  {
    $this->httpRequest = $httpRequest;
  }
  /**
   * @return V2HttpRequest
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
   * @param string[]
   */
  public function setMonitoredResourceLabels($monitoredResourceLabels)
  {
    $this->monitoredResourceLabels = $monitoredResourceLabels;
  }
  /**
   * @return string[]
   */
  public function getMonitoredResourceLabels()
  {
    return $this->monitoredResourceLabels;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param V2LogEntryOperation
   */
  public function setOperation(V2LogEntryOperation $operation)
  {
    $this->operation = $operation;
  }
  /**
   * @return V2LogEntryOperation
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
   * @param V2LogEntrySourceLocation
   */
  public function setSourceLocation(V2LogEntrySourceLocation $sourceLocation)
  {
    $this->sourceLocation = $sourceLocation;
  }
  /**
   * @return V2LogEntrySourceLocation
   */
  public function getSourceLocation()
  {
    return $this->sourceLocation;
  }
  /**
   * @param array[]
   */
  public function setStructPayload($structPayload)
  {
    $this->structPayload = $structPayload;
  }
  /**
   * @return array[]
   */
  public function getStructPayload()
  {
    return $this->structPayload;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(V2LogEntry::class, 'Google_Service_ServiceControl_V2LogEntry');
