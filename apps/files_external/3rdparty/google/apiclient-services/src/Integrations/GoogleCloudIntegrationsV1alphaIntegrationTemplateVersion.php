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

class GoogleCloudIntegrationsV1alphaIntegrationTemplateVersion extends \Google\Collection
{
  protected $collection_key = 'triggerConfigs';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $databasePersistencePolicy;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $lastModifierEmail;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $parentIntegrationVersionId;
  /**
   * @var string
   */
  public $snapshotNumber;
  /**
   * @var string
   */
  public $status;
  protected $taskConfigsType = EnterpriseCrmFrontendsEventbusProtoTaskConfig::class;
  protected $taskConfigsDataType = 'array';
  protected $teardownType = EnterpriseCrmEventbusProtoTeardown::class;
  protected $teardownDataType = '';
  protected $templateParametersType = EnterpriseCrmFrontendsEventbusProtoWorkflowParameters::class;
  protected $templateParametersDataType = '';
  protected $triggerConfigsType = EnterpriseCrmFrontendsEventbusProtoTriggerConfig::class;
  protected $triggerConfigsDataType = 'array';
  /**
   * @var string
   */
  public $updateTime;
  /**
   * @var string
   */
  public $userLabel;

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
  public function setDatabasePersistencePolicy($databasePersistencePolicy)
  {
    $this->databasePersistencePolicy = $databasePersistencePolicy;
  }
  /**
   * @return string
   */
  public function getDatabasePersistencePolicy()
  {
    return $this->databasePersistencePolicy;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setLastModifierEmail($lastModifierEmail)
  {
    $this->lastModifierEmail = $lastModifierEmail;
  }
  /**
   * @return string
   */
  public function getLastModifierEmail()
  {
    return $this->lastModifierEmail;
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
  public function setParentIntegrationVersionId($parentIntegrationVersionId)
  {
    $this->parentIntegrationVersionId = $parentIntegrationVersionId;
  }
  /**
   * @return string
   */
  public function getParentIntegrationVersionId()
  {
    return $this->parentIntegrationVersionId;
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
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param EnterpriseCrmFrontendsEventbusProtoTaskConfig[]
   */
  public function setTaskConfigs($taskConfigs)
  {
    $this->taskConfigs = $taskConfigs;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoTaskConfig[]
   */
  public function getTaskConfigs()
  {
    return $this->taskConfigs;
  }
  /**
   * @param EnterpriseCrmEventbusProtoTeardown
   */
  public function setTeardown(EnterpriseCrmEventbusProtoTeardown $teardown)
  {
    $this->teardown = $teardown;
  }
  /**
   * @return EnterpriseCrmEventbusProtoTeardown
   */
  public function getTeardown()
  {
    return $this->teardown;
  }
  /**
   * @param EnterpriseCrmFrontendsEventbusProtoWorkflowParameters
   */
  public function setTemplateParameters(EnterpriseCrmFrontendsEventbusProtoWorkflowParameters $templateParameters)
  {
    $this->templateParameters = $templateParameters;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoWorkflowParameters
   */
  public function getTemplateParameters()
  {
    return $this->templateParameters;
  }
  /**
   * @param EnterpriseCrmFrontendsEventbusProtoTriggerConfig[]
   */
  public function setTriggerConfigs($triggerConfigs)
  {
    $this->triggerConfigs = $triggerConfigs;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoTriggerConfig[]
   */
  public function getTriggerConfigs()
  {
    return $this->triggerConfigs;
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
  /**
   * @param string
   */
  public function setUserLabel($userLabel)
  {
    $this->userLabel = $userLabel;
  }
  /**
   * @return string
   */
  public function getUserLabel()
  {
    return $this->userLabel;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaIntegrationTemplateVersion::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaIntegrationTemplateVersion');
