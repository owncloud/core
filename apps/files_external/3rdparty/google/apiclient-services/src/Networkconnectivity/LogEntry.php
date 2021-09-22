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

namespace Google\Service\Networkconnectivity;

class LogEntry extends \Google\Model
{
  protected $httpRequestType = HttpRequest::class;
  protected $httpRequestDataType = '';
  public $insertId;
  public $labels;
  public $name;
  protected $operationType = LogEntryOperation::class;
  protected $operationDataType = '';
  public $protoPayload;
  public $severity;
  protected $sourceLocationType = LogEntrySourceLocation::class;
  protected $sourceLocationDataType = '';
  public $structPayload;
  public $textPayload;
  public $timestamp;
  public $trace;

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
  public function setInsertId($insertId)
  {
    $this->insertId = $insertId;
  }
  public function getInsertId()
  {
    return $this->insertId;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
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
  public function setProtoPayload($protoPayload)
  {
    $this->protoPayload = $protoPayload;
  }
  public function getProtoPayload()
  {
    return $this->protoPayload;
  }
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
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
  public function setStructPayload($structPayload)
  {
    $this->structPayload = $structPayload;
  }
  public function getStructPayload()
  {
    return $this->structPayload;
  }
  public function setTextPayload($textPayload)
  {
    $this->textPayload = $textPayload;
  }
  public function getTextPayload()
  {
    return $this->textPayload;
  }
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  public function getTimestamp()
  {
    return $this->timestamp;
  }
  public function setTrace($trace)
  {
    $this->trace = $trace;
  }
  public function getTrace()
  {
    return $this->trace;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LogEntry::class, 'Google_Service_Networkconnectivity_LogEntry');
