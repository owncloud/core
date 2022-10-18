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

namespace Google\Service\Contentwarehouse;

class AssistantApiSupportedClientOp extends \Google\Model
{
  /**
   * @var string
   */
  public $clientOpName;
  protected $clientOpPropertiesType = AssistantApiProtobuf::class;
  protected $clientOpPropertiesDataType = '';
  protected $supportedExecutionType = AssistantApiSupportedClientOpSupportedExecution::class;
  protected $supportedExecutionDataType = '';
  /**
   * @var int
   */
  public $version;

  /**
   * @param string
   */
  public function setClientOpName($clientOpName)
  {
    $this->clientOpName = $clientOpName;
  }
  /**
   * @return string
   */
  public function getClientOpName()
  {
    return $this->clientOpName;
  }
  /**
   * @param AssistantApiProtobuf
   */
  public function setClientOpProperties(AssistantApiProtobuf $clientOpProperties)
  {
    $this->clientOpProperties = $clientOpProperties;
  }
  /**
   * @return AssistantApiProtobuf
   */
  public function getClientOpProperties()
  {
    return $this->clientOpProperties;
  }
  /**
   * @param AssistantApiSupportedClientOpSupportedExecution
   */
  public function setSupportedExecution(AssistantApiSupportedClientOpSupportedExecution $supportedExecution)
  {
    $this->supportedExecution = $supportedExecution;
  }
  /**
   * @return AssistantApiSupportedClientOpSupportedExecution
   */
  public function getSupportedExecution()
  {
    return $this->supportedExecution;
  }
  /**
   * @param int
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return int
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiSupportedClientOp::class, 'Google_Service_Contentwarehouse_AssistantApiSupportedClientOp');
