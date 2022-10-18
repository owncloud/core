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

class GoogleCloudIntegrationsV1alphaExecution extends \Google\Collection
{
  protected $collection_key = 'responseParams';
  /**
   * @var string
   */
  public $createTime;
  protected $directSubExecutionsType = GoogleCloudIntegrationsV1alphaExecution::class;
  protected $directSubExecutionsDataType = 'array';
  protected $eventExecutionDetailsType = EnterpriseCrmEventbusProtoEventExecutionDetails::class;
  protected $eventExecutionDetailsDataType = '';
  protected $executionDetailsType = GoogleCloudIntegrationsV1alphaExecutionDetails::class;
  protected $executionDetailsDataType = '';
  /**
   * @var string
   */
  public $executionMethod;
  /**
   * @var string
   */
  public $name;
  protected $requestParametersType = GoogleCloudIntegrationsV1alphaValueType::class;
  protected $requestParametersDataType = 'map';
  protected $requestParamsType = EnterpriseCrmFrontendsEventbusProtoParameterEntry::class;
  protected $requestParamsDataType = 'array';
  protected $responseParametersType = GoogleCloudIntegrationsV1alphaValueType::class;
  protected $responseParametersDataType = 'map';
  protected $responseParamsType = EnterpriseCrmFrontendsEventbusProtoParameterEntry::class;
  protected $responseParamsDataType = 'array';
  /**
   * @var string
   */
  public $triggerId;
  /**
   * @var string
   */
  public $updateTime;

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
   * @param GoogleCloudIntegrationsV1alphaExecution[]
   */
  public function setDirectSubExecutions($directSubExecutions)
  {
    $this->directSubExecutions = $directSubExecutions;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaExecution[]
   */
  public function getDirectSubExecutions()
  {
    return $this->directSubExecutions;
  }
  /**
   * @param EnterpriseCrmEventbusProtoEventExecutionDetails
   */
  public function setEventExecutionDetails(EnterpriseCrmEventbusProtoEventExecutionDetails $eventExecutionDetails)
  {
    $this->eventExecutionDetails = $eventExecutionDetails;
  }
  /**
   * @return EnterpriseCrmEventbusProtoEventExecutionDetails
   */
  public function getEventExecutionDetails()
  {
    return $this->eventExecutionDetails;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaExecutionDetails
   */
  public function setExecutionDetails(GoogleCloudIntegrationsV1alphaExecutionDetails $executionDetails)
  {
    $this->executionDetails = $executionDetails;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaExecutionDetails
   */
  public function getExecutionDetails()
  {
    return $this->executionDetails;
  }
  /**
   * @param string
   */
  public function setExecutionMethod($executionMethod)
  {
    $this->executionMethod = $executionMethod;
  }
  /**
   * @return string
   */
  public function getExecutionMethod()
  {
    return $this->executionMethod;
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
   * @param GoogleCloudIntegrationsV1alphaValueType[]
   */
  public function setRequestParameters($requestParameters)
  {
    $this->requestParameters = $requestParameters;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaValueType[]
   */
  public function getRequestParameters()
  {
    return $this->requestParameters;
  }
  /**
   * @param EnterpriseCrmFrontendsEventbusProtoParameterEntry[]
   */
  public function setRequestParams($requestParams)
  {
    $this->requestParams = $requestParams;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoParameterEntry[]
   */
  public function getRequestParams()
  {
    return $this->requestParams;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaValueType[]
   */
  public function setResponseParameters($responseParameters)
  {
    $this->responseParameters = $responseParameters;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaValueType[]
   */
  public function getResponseParameters()
  {
    return $this->responseParameters;
  }
  /**
   * @param EnterpriseCrmFrontendsEventbusProtoParameterEntry[]
   */
  public function setResponseParams($responseParams)
  {
    $this->responseParams = $responseParams;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoParameterEntry[]
   */
  public function getResponseParams()
  {
    return $this->responseParams;
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
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaExecution::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaExecution');
