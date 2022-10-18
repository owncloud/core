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

class EnterpriseCrmFrontendsEventbusProtoTaskEntity extends \Google\Model
{
  /**
   * @var bool
   */
  public $disabledForVpcSc;
  protected $metadataType = EnterpriseCrmEventbusProtoTaskMetadata::class;
  protected $metadataDataType = '';
  protected $paramSpecsType = EnterpriseCrmFrontendsEventbusProtoParamSpecsMessage::class;
  protected $paramSpecsDataType = '';
  protected $statsType = EnterpriseCrmEventbusStats::class;
  protected $statsDataType = '';
  /**
   * @var string
   */
  public $taskType;
  protected $uiConfigType = EnterpriseCrmEventbusProtoTaskUiConfig::class;
  protected $uiConfigDataType = '';

  /**
   * @param bool
   */
  public function setDisabledForVpcSc($disabledForVpcSc)
  {
    $this->disabledForVpcSc = $disabledForVpcSc;
  }
  /**
   * @return bool
   */
  public function getDisabledForVpcSc()
  {
    return $this->disabledForVpcSc;
  }
  /**
   * @param EnterpriseCrmEventbusProtoTaskMetadata
   */
  public function setMetadata(EnterpriseCrmEventbusProtoTaskMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return EnterpriseCrmEventbusProtoTaskMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param EnterpriseCrmFrontendsEventbusProtoParamSpecsMessage
   */
  public function setParamSpecs(EnterpriseCrmFrontendsEventbusProtoParamSpecsMessage $paramSpecs)
  {
    $this->paramSpecs = $paramSpecs;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoParamSpecsMessage
   */
  public function getParamSpecs()
  {
    return $this->paramSpecs;
  }
  /**
   * @param EnterpriseCrmEventbusStats
   */
  public function setStats(EnterpriseCrmEventbusStats $stats)
  {
    $this->stats = $stats;
  }
  /**
   * @return EnterpriseCrmEventbusStats
   */
  public function getStats()
  {
    return $this->stats;
  }
  /**
   * @param string
   */
  public function setTaskType($taskType)
  {
    $this->taskType = $taskType;
  }
  /**
   * @return string
   */
  public function getTaskType()
  {
    return $this->taskType;
  }
  /**
   * @param EnterpriseCrmEventbusProtoTaskUiConfig
   */
  public function setUiConfig(EnterpriseCrmEventbusProtoTaskUiConfig $uiConfig)
  {
    $this->uiConfig = $uiConfig;
  }
  /**
   * @return EnterpriseCrmEventbusProtoTaskUiConfig
   */
  public function getUiConfig()
  {
    return $this->uiConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmFrontendsEventbusProtoTaskEntity::class, 'Google_Service_Integrations_EnterpriseCrmFrontendsEventbusProtoTaskEntity');
