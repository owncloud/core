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

class Google_Service_ServiceControl_LogEntry extends Google_Model
{
  protected $httpRequestType = 'Google_Service_ServiceControl_HttpRequest';
  protected $httpRequestDataType = '';
  public $insertId;
  public $labels;
  public $name;
  protected $operationType = 'Google_Service_ServiceControl_LogEntryOperation';
  protected $operationDataType = '';
  public $protoPayload;
  public $severity;
  protected $sourceLocationType = 'Google_Service_ServiceControl_LogEntrySourceLocation';
  protected $sourceLocationDataType = '';
  public $structPayload;
  public $textPayload;
  public $timestamp;
  public $trace;

  /**
   * @param Google_Service_ServiceControl_HttpRequest
   */
  public function setHttpRequest(Google_Service_ServiceControl_HttpRequest $httpRequest)
  {
    $this->httpRequest = $httpRequest;
  }
  /**
   * @return Google_Service_ServiceControl_HttpRequest
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
   * @param Google_Service_ServiceControl_LogEntryOperation
   */
  public function setOperation(Google_Service_ServiceControl_LogEntryOperation $operation)
  {
    $this->operation = $operation;
  }
  /**
   * @return Google_Service_ServiceControl_LogEntryOperation
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
   * @param Google_Service_ServiceControl_LogEntrySourceLocation
   */
  public function setSourceLocation(Google_Service_ServiceControl_LogEntrySourceLocation $sourceLocation)
  {
    $this->sourceLocation = $sourceLocation;
  }
  /**
   * @return Google_Service_ServiceControl_LogEntrySourceLocation
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
