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

class EnterpriseCrmEventbusProtoScatterResponse extends \Google\Collection
{
  protected $collection_key = 'responseParams';
  /**
   * @var string
   */
  public $errorMsg;
  /**
   * @var string[]
   */
  public $executionIds;
  /**
   * @var bool
   */
  public $isSuccessful;
  protected $responseParamsType = EnterpriseCrmEventbusProtoParameterEntry::class;
  protected $responseParamsDataType = 'array';
  protected $scatterElementType = EnterpriseCrmEventbusProtoParameterValueType::class;
  protected $scatterElementDataType = '';

  /**
   * @param string
   */
  public function setErrorMsg($errorMsg)
  {
    $this->errorMsg = $errorMsg;
  }
  /**
   * @return string
   */
  public function getErrorMsg()
  {
    return $this->errorMsg;
  }
  /**
   * @param string[]
   */
  public function setExecutionIds($executionIds)
  {
    $this->executionIds = $executionIds;
  }
  /**
   * @return string[]
   */
  public function getExecutionIds()
  {
    return $this->executionIds;
  }
  /**
   * @param bool
   */
  public function setIsSuccessful($isSuccessful)
  {
    $this->isSuccessful = $isSuccessful;
  }
  /**
   * @return bool
   */
  public function getIsSuccessful()
  {
    return $this->isSuccessful;
  }
  /**
   * @param EnterpriseCrmEventbusProtoParameterEntry[]
   */
  public function setResponseParams($responseParams)
  {
    $this->responseParams = $responseParams;
  }
  /**
   * @return EnterpriseCrmEventbusProtoParameterEntry[]
   */
  public function getResponseParams()
  {
    return $this->responseParams;
  }
  /**
   * @param EnterpriseCrmEventbusProtoParameterValueType
   */
  public function setScatterElement(EnterpriseCrmEventbusProtoParameterValueType $scatterElement)
  {
    $this->scatterElement = $scatterElement;
  }
  /**
   * @return EnterpriseCrmEventbusProtoParameterValueType
   */
  public function getScatterElement()
  {
    return $this->scatterElement;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmEventbusProtoScatterResponse::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoScatterResponse');
