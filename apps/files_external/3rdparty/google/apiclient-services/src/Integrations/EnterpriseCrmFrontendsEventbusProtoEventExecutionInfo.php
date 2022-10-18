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

namespace Google\Service\Integrations;

class EnterpriseCrmFrontendsEventbusProtoEventExecutionInfo extends \Google\Collection
{
  protected $collection_key = 'errors';
  /**
   * @var string
   */
  public $clientId;
  /**
   * @var string
   */
  public $createTime;
  protected $errorCodeType = CrmlogErrorCode::class;
  protected $errorCodeDataType = '';
  protected $errorsType = EnterpriseCrmEventbusProtoErrorDetail::class;
  protected $errorsDataType = 'array';
  protected $eventExecutionDetailsType = EnterpriseCrmFrontendsEventbusProtoEventExecutionDetails::class;
  protected $eventExecutionDetailsDataType = '';
  /**
   * @var string
   */
  public $eventExecutionInfoId;
  protected $executionTraceInfoType = EnterpriseCrmEventbusProtoExecutionTraceInfo::class;
  protected $executionTraceInfoDataType = '';
  /**
   * @var string
   */
  public $lastModifiedTime;
  /**
   * @var string
   */
  public $postMethod;
  /**
   * @var string
   */
  public $product;
  /**
   * @var string
   */
  public $requestId;
  protected $requestParamsType = EnterpriseCrmFrontendsEventbusProtoEventParameters::class;
  protected $requestParamsDataType = '';
  protected $responseParamsType = EnterpriseCrmFrontendsEventbusProtoEventParameters::class;
  protected $responseParamsDataType = '';
  /**
   * @var string
   */
  public $snapshotNumber;
  /**
   * @var string
   */
  public $tenant;
  /**
   * @var string
   */
  public $triggerId;
  /**
   * @var string
   */
  public $workflowId;
  /**
   * @var string
   */
  public $workflowName;
  /**
   * @var string
   */
  public $workflowRetryBackoffIntervalSeconds;

  /**
   * @param string
   */
  public function setClientId($clientId)
  {
    $this->clientId = $clientId;
  }
  /**
   * @return string
   */
  public function getClientId()
  {
    return $this->clientId;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param CrmlogErrorCode
   */
  public function setErrorCode(CrmlogErrorCode $errorCode)
  {
    $this->errorCode = $errorCode;
  }
  /**
   * @return CrmlogErrorCode
   */
  public function getErrorCode()
  {
    return $this->errorCode;
  }
  /**
   * @param EnterpriseCrmEventbusProtoErrorDetail[]
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return EnterpriseCrmEventbusProtoErrorDetail[]
   */
  public function getErrors()
  {
    return $this->errors;
  }
  /**
   * @param EnterpriseCrmFrontendsEventbusProtoEventExecutionDetails
   */
  public function setEventExecutionDetails(EnterpriseCrmFrontendsEventbusProtoEventExecutionDetails $eventExecutionDetails)
  {
    $this->eventExecutionDetails = $eventExecutionDetails;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoEventExecutionDetails
   */
  public function getEventExecutionDetails()
  {
    return $this->eventExecutionDetails;
  }
  /**
   * @param string
   */
  public function setEventExecutionInfoId($eventExecutionInfoId)
  {
    $this->eventExecutionInfoId = $eventExecutionInfoId;
  }
  /**
   * @return string
   */
  public function getEventExecutionInfoId()
  {
    return $this->eventExecutionInfoId;
  }
  /**
   * @param EnterpriseCrmEventbusProtoExecutionTraceInfo
   */
  public function setExecutionTraceInfo(EnterpriseCrmEventbusProtoExecutionTraceInfo $executionTraceInfo)
  {
    $this->executionTraceInfo = $executionTraceInfo;
  }
  /**
   * @return EnterpriseCrmEventbusProtoExecutionTraceInfo
   */
  public function getExecutionTraceInfo()
  {
    return $this->executionTraceInfo;
  }
  /**
   * @param string
   */
  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }
  /**
   * @return string
   */
  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
  }
  /**
   * @param string
   */
  public function setPostMethod($postMethod)
  {
    $this->postMethod = $postMethod;
  }
  /**
   * @return string
   */
  public function getPostMethod()
  {
    return $this->postMethod;
  }
  /**
   * @param string
   */
  public function setProduct($product)
  {
    $this->product = $product;
  }
  /**
   * @return string
   */
  public function getProduct()
  {
    return $this->product;
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
   * @param EnterpriseCrmFrontendsEventbusProtoEventParameters
   */
  public function setRequestParams(EnterpriseCrmFrontendsEventbusProtoEventParameters $requestParams)
  {
    $this->requestParams = $requestParams;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoEventParameters
   */
  public function getRequestParams()
  {
    return $this->requestParams;
  }
  /**
   * @param EnterpriseCrmFrontendsEventbusProtoEventParameters
   */
  public function setResponseParams(EnterpriseCrmFrontendsEventbusProtoEventParameters $responseParams)
  {
    $this->responseParams = $responseParams;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoEventParameters
   */
  public function getResponseParams()
  {
    return $this->responseParams;
  }
  /**
   * @param string
   */
  public function setSnapshotNumber($snapshotNumber)
  {
    $this->snapshotNumber = $snapshotNumber;
  }
  /**
   * @return string
   */
  public function getSnapshotNumber()
  {
    return $this->snapshotNumber;
  }
  /**
   * @param string
   */
  public function setTenant($tenant)
  {
    $this->tenant = $tenant;
  }
  /**
   * @return string
   */
  public function getTenant()
  {
    return $this->tenant;
  }
  /**
   * @param string
   */
  public function setTriggerId($triggerId)
  {
    $this->triggerId = $triggerId;
  }
  /**
   * @return string
   */
  public function getTriggerId()
  {
    return $this->triggerId;
  }
  /**
   * @param string
   */
  public function setWorkflowId($workflowId)
  {
    $this->workflowId = $workflowId;
  }
  /**
   * @return string
   */
  public function getWorkflowId()
  {
    return $this->workflowId;
  }
  /**
   * @param string
   */
  public function setWorkflowName($workflowName)
  {
    $this->workflowName = $workflowName;
  }
  /**
   * @return string
   */
  public function getWorkflowName()
  {
    return $this->workflowName;
  }
  /**
   * @param string
   */
  public function setWorkflowRetryBackoffIntervalSeconds($workflowRetryBackoffIntervalSeconds)
  {
    $this->workflowRetryBackoffIntervalSeconds = $workflowRetryBackoffIntervalSeconds;
  }
  /**
   * @return string
   */
  public function getWorkflowRetryBackoffIntervalSeconds()
  {
    return $this->workflowRetryBackoffIntervalSeconds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmFrontendsEventbusProtoEventExecutionInfo::class, 'Google_Service_Integrations_EnterpriseCrmFrontendsEventbusProtoEventExecutionInfo');
