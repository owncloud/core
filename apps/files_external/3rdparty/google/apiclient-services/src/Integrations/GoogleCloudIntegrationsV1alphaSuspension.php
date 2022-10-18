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

class GoogleCloudIntegrationsV1alphaSuspension extends \Google\Model
{
  protected $approvalConfigType = GoogleCloudIntegrationsV1alphaSuspensionApprovalConfig::class;
  protected $approvalConfigDataType = '';
  protected $auditType = GoogleCloudIntegrationsV1alphaSuspensionAudit::class;
  protected $auditDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $eventExecutionInfoId;
  /**
   * @var string
   */
  public $integration;
  /**
   * @var string
   */
  public $lastModifyTime;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $state;
  protected $suspensionConfigType = EnterpriseCrmEventbusProtoSuspensionConfig::class;
  protected $suspensionConfigDataType = '';
  /**
   * @var string
   */
  public $taskId;

  /**
   * @param GoogleCloudIntegrationsV1alphaSuspensionApprovalConfig
   */
  public function setApprovalConfig(GoogleCloudIntegrationsV1alphaSuspensionApprovalConfig $approvalConfig)
  {
    $this->approvalConfig = $approvalConfig;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaSuspensionApprovalConfig
   */
  public function getApprovalConfig()
  {
    return $this->approvalConfig;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaSuspensionAudit
   */
  public function setAudit(GoogleCloudIntegrationsV1alphaSuspensionAudit $audit)
  {
    $this->audit = $audit;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaSuspensionAudit
   */
  public function getAudit()
  {
    return $this->audit;
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
   * @param string
   */
  public function setIntegration($integration)
  {
    $this->integration = $integration;
  }
  /**
   * @return string
   */
  public function getIntegration()
  {
    return $this->integration;
  }
  /**
   * @param string
   */
  public function setLastModifyTime($lastModifyTime)
  {
    $this->lastModifyTime = $lastModifyTime;
  }
  /**
   * @return string
   */
  public function getLastModifyTime()
  {
    return $this->lastModifyTime;
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
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param EnterpriseCrmEventbusProtoSuspensionConfig
   */
  public function setSuspensionConfig(EnterpriseCrmEventbusProtoSuspensionConfig $suspensionConfig)
  {
    $this->suspensionConfig = $suspensionConfig;
  }
  /**
   * @return EnterpriseCrmEventbusProtoSuspensionConfig
   */
  public function getSuspensionConfig()
  {
    return $this->suspensionConfig;
  }
  /**
   * @param string
   */
  public function setTaskId($taskId)
  {
    $this->taskId = $taskId;
  }
  /**
   * @return string
   */
  public function getTaskId()
  {
    return $this->taskId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaSuspension::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaSuspension');
