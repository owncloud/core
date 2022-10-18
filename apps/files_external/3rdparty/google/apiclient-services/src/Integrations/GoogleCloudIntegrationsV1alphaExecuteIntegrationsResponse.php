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

class GoogleCloudIntegrationsV1alphaExecuteIntegrationsResponse extends \Google\Collection
{
  protected $collection_key = 'parameterEntries';
  protected $eventParametersType = EnterpriseCrmFrontendsEventbusProtoEventParameters::class;
  protected $eventParametersDataType = '';
  /**
   * @var bool
   */
  public $executionFailed;
  /**
   * @var string
   */
  public $executionId;
  /**
   * @var array[]
   */
  public $outputParameters;
  protected $parameterEntriesType = EnterpriseCrmFrontendsEventbusProtoParameterEntry::class;
  protected $parameterEntriesDataType = 'array';

  /**
   * @param EnterpriseCrmFrontendsEventbusProtoEventParameters
   */
  public function setEventParameters(EnterpriseCrmFrontendsEventbusProtoEventParameters $eventParameters)
  {
    $this->eventParameters = $eventParameters;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoEventParameters
   */
  public function getEventParameters()
  {
    return $this->eventParameters;
  }
  /**
   * @param bool
   */
  public function setExecutionFailed($executionFailed)
  {
    $this->executionFailed = $executionFailed;
  }
  /**
   * @return bool
   */
  public function getExecutionFailed()
  {
    return $this->executionFailed;
  }
  /**
   * @param string
   */
  public function setExecutionId($executionId)
  {
    $this->executionId = $executionId;
  }
  /**
   * @return string
   */
  public function getExecutionId()
  {
    return $this->executionId;
  }
  /**
   * @param array[]
   */
  public function setOutputParameters($outputParameters)
  {
    $this->outputParameters = $outputParameters;
  }
  /**
   * @return array[]
   */
  public function getOutputParameters()
  {
    return $this->outputParameters;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaExecuteIntegrationsResponse::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaExecuteIntegrationsResponse');
