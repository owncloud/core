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

class GoogleCloudIntegrationsV1alphaIntegrationVersion extends \Google\Collection
{
  protected $collection_key = 'triggerConfigsInternal';
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
  protected $integrationParametersType = GoogleCloudIntegrationsV1alphaIntegrationParameter::class;
  protected $integrationParametersDataType = 'array';
  protected $integrationParametersInternalType = EnterpriseCrmFrontendsEventbusProtoWorkflowParameters::class;
  protected $integrationParametersInternalDataType = '';
  /**
   * @var string
   */
  public $lastModifierEmail;
  /**
   * @var string
   */
  public $lockHolder;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $origin;
  /**
   * @var string
   */
  public $parentTemplateId;
  /**
   * @var string
   */
  public $snapshotNumber;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $status;
  protected $taskConfigsType = GoogleCloudIntegrationsV1alphaTaskConfig::class;
  protected $taskConfigsDataType = 'array';
  protected $taskConfigsInternalType = EnterpriseCrmFrontendsEventbusProtoTaskConfig::class;
  protected $taskConfigsInternalDataType = 'array';
  protected $teardownType = EnterpriseCrmEventbusProtoTeardown::class;
  protected $teardownDataType = '';
  protected $triggerConfigsType = GoogleCloudIntegrationsV1alphaTriggerConfig::class;
  protected $triggerConfigsDataType = 'array';
  protected $triggerConfigsInternalType = EnterpriseCrmFrontendsEventbusProtoTriggerConfig::class;
  protected $triggerConfigsInternalDataType = 'array';
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
   * @param GoogleCloudIntegrationsV1alphaIntegrationParameter[]
   */
  public function setIntegrationParameters($integrationParameters)
  {
    $this->integrationParameters = $integrationParameters;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaIntegrationParameter[]
   */
  public function getIntegrationParameters()
  {
    return $this->integrationParameters;
  }
  /**
   * @param EnterpriseCrmFrontendsEventbusProtoWorkflowParameters
   */
  public function setIntegrationParametersInternal(EnterpriseCrmFrontendsEventbusProtoWorkflowParameters $integrationParametersInternal)
  {
    $this->integrationParametersInternal = $integrationParametersInternal;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoWorkflowParameters
   */
  public function getIntegrationParametersInternal()
  {
    return $this->integrationParametersInternal;
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
  public function setLockHolder($lockHolder)
  {
    $this->lockHolder = $lockHolder;
  }
  /**
   * @return string
   */
  public function getLockHolder()
  {
    return $this->lockHolder;
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
  public function setOrigin($origin)
  {
    $this->origin = $origin;
  }
  /**
   * @return string
   */
  public function getOrigin()
  {
    return $this->origin;
  }
  /**
   * @param string
   */
  public function setParentTemplateId($parentTemplateId)
  {
    $this->parentTemplateId = $parentTemplateId;
  }
  /**
   * @return string
   */
  public function getParentTemplateId()
  {
    return $this->parentTemplateId;
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
   * @param GoogleCloudIntegrationsV1alphaTaskConfig[]
   */
  public function setTaskConfigs($taskConfigs)
  {
    $this->taskConfigs = $taskConfigs;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaTaskConfig[]
   */
  public function getTaskConfigs()
  {
    return $this->taskConfigs;
  }
  /**
   * @param EnterpriseCrmFrontendsEventbusProtoTaskConfig[]
   */
  public function setTaskConfigsInternal($taskConfigsInternal)
  {
    $this->taskConfigsInternal = $taskConfigsInternal;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoTaskConfig[]
   */
  public function getTaskConfigsInternal()
  {
    return $this->taskConfigsInternal;
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
   * @param GoogleCloudIntegrationsV1alphaTriggerConfig[]
   */
  public function setTriggerConfigs($triggerConfigs)
  {
    $this->triggerConfigs = $triggerConfigs;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaTriggerConfig[]
   */
  public function getTriggerConfigs()
  {
    return $this->triggerConfigs;
  }
  /**
   * @param EnterpriseCrmFrontendsEventbusProtoTriggerConfig[]
   */
  public function setTriggerConfigsInternal($triggerConfigsInternal)
  {
    $this->triggerConfigsInternal = $triggerConfigsInternal;
  }
  /**
   * @return EnterpriseCrmFrontendsEventbusProtoTriggerConfig[]
   */
  public function getTriggerConfigsInternal()
  {
    return $this->triggerConfigsInternal;
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
class_alias(GoogleCloudIntegrationsV1alphaIntegrationVersion::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaIntegrationVersion');
