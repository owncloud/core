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

class GoogleCloudIntegrationsV1alphaScheduleIntegrationsRequest extends \Google\Collection
{
  protected $collection_key = 'parameterEntries';
  protected $inputParametersType = GoogleCloudIntegrationsV1alphaValueType::class;
  protected $inputParametersDataType = 'map';
  protected $parameterEntriesType = EnterpriseCrmFrontendsEventbusProtoParameterEntry::class;
  protected $parameterEntriesDataType = 'array';
  protected $parametersType = EnterpriseCrmEventbusProtoEventParameters::class;
  protected $parametersDataType = '';
  /**
   * @var string
   */
  public $requestId;
  /**
   * @var string
   */
  public $scheduleTime;
  /**
   * @var string
   */
  public $triggerId;

  /**
   * @param GoogleCloudIntegrationsV1alphaValueType[]
   */
  public function setInputParameters($inputParameters)
  {
    $this->inputParameters = $inputParameters;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaValueType[]
   */
  public function getInputParameters()
  {
    return $this->inputParameters;
  }
  /**
   * @param EnterpriseCrmFrontendsEventbusProtoParameterEntry[]
   */
  public function setParameterEntries($parameterEntries)
  {
    $this->parameterEntries = $parameterEntries;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoParameterEntry[]
   */
  public function getParameterEntries()
  {
    return $this->parameterEntries;
  }
  /**
   * @param EnterpriseCrmEventbusProtoEventParameters
   */
  public function setParameters(EnterpriseCrmEventbusProtoEventParameters $parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return EnterpriseCrmEventbusProtoEventParameters
   */
  public function getParameters()
  {
    return $this->parameters;
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
  public function setScheduleTime($scheduleTime)
  {
    $this->scheduleTime = $scheduleTime;
  }
  /**
   * @return string
   */
  public function getScheduleTime()
  {
    return $this->scheduleTime;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaScheduleIntegrationsRequest::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaScheduleIntegrationsRequest');
