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

namespace Google\Service\CloudFunctions;

class CloudFunction extends \Google\Collection
{
  protected $collection_key = 'secretVolumes';
  public $availableMemoryMb;
  public $buildEnvironmentVariables;
  public $buildId;
  public $buildName;
  public $buildWorkerPool;
  public $description;
  public $entryPoint;
  public $environmentVariables;
  protected $eventTriggerType = EventTrigger::class;
  protected $eventTriggerDataType = '';
  protected $httpsTriggerType = HttpsTrigger::class;
  protected $httpsTriggerDataType = '';
  public $ingressSettings;
  public $labels;
  public $maxInstances;
  public $minInstances;
  public $name;
  public $network;
  public $runtime;
  protected $secretEnvironmentVariablesType = SecretEnvVar::class;
  protected $secretEnvironmentVariablesDataType = 'array';
  protected $secretVolumesType = SecretVolume::class;
  protected $secretVolumesDataType = 'array';
  public $serviceAccountEmail;
  public $sourceArchiveUrl;
  protected $sourceRepositoryType = SourceRepository::class;
  protected $sourceRepositoryDataType = '';
  public $sourceToken;
  public $sourceUploadUrl;
  public $status;
  public $timeout;
  public $updateTime;
  public $versionId;
  public $vpcConnector;
  public $vpcConnectorEgressSettings;

  public function setAvailableMemoryMb($availableMemoryMb)
  {
    $this->availableMemoryMb = $availableMemoryMb;
  }
  public function getAvailableMemoryMb()
  {
    return $this->availableMemoryMb;
  }
  public function setBuildEnvironmentVariables($buildEnvironmentVariables)
  {
    $this->buildEnvironmentVariables = $buildEnvironmentVariables;
  }
  public function getBuildEnvironmentVariables()
  {
    return $this->buildEnvironmentVariables;
  }
  public function setBuildId($buildId)
  {
    $this->buildId = $buildId;
  }
  public function getBuildId()
  {
    return $this->buildId;
  }
  public function setBuildName($buildName)
  {
    $this->buildName = $buildName;
  }
  public function getBuildName()
  {
    return $this->buildName;
  }
  public function setBuildWorkerPool($buildWorkerPool)
  {
    $this->buildWorkerPool = $buildWorkerPool;
  }
  public function getBuildWorkerPool()
  {
    return $this->buildWorkerPool;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEntryPoint($entryPoint)
  {
    $this->entryPoint = $entryPoint;
  }
  public function getEntryPoint()
  {
    return $this->entryPoint;
  }
  public function setEnvironmentVariables($environmentVariables)
  {
    $this->environmentVariables = $environmentVariables;
  }
  public function getEnvironmentVariables()
  {
    return $this->environmentVariables;
  }
  /**
   * @param EventTrigger
   */
  public function setEventTrigger(EventTrigger $eventTrigger)
  {
    $this->eventTrigger = $eventTrigger;
  }
  /**
   * @return EventTrigger
   */
  public function getEventTrigger()
  {
    return $this->eventTrigger;
  }
  /**
   * @param HttpsTrigger
   */
  public function setHttpsTrigger(HttpsTrigger $httpsTrigger)
  {
    $this->httpsTrigger = $httpsTrigger;
  }
  /**
   * @return HttpsTrigger
   */
  public function getHttpsTrigger()
  {
    return $this->httpsTrigger;
  }
  public function setIngressSettings($ingressSettings)
  {
    $this->ingressSettings = $ingressSettings;
  }
  public function getIngressSettings()
  {
    return $this->ingressSettings;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setMaxInstances($maxInstances)
  {
    $this->maxInstances = $maxInstances;
  }
  public function getMaxInstances()
  {
    return $this->maxInstances;
  }
  public function setMinInstances($minInstances)
  {
    $this->minInstances = $minInstances;
  }
  public function getMinInstances()
  {
    return $this->minInstances;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  public function getNetwork()
  {
    return $this->network;
  }
  public function setRuntime($runtime)
  {
    $this->runtime = $runtime;
  }
  public function getRuntime()
  {
    return $this->runtime;
  }
  /**
   * @param SecretEnvVar[]
   */
  public function setSecretEnvironmentVariables($secretEnvironmentVariables)
  {
    $this->secretEnvironmentVariables = $secretEnvironmentVariables;
  }
  /**
   * @return SecretEnvVar[]
   */
  public function getSecretEnvironmentVariables()
  {
    return $this->secretEnvironmentVariables;
  }
  /**
   * @param SecretVolume[]
   */
  public function setSecretVolumes($secretVolumes)
  {
    $this->secretVolumes = $secretVolumes;
  }
  /**
   * @return SecretVolume[]
   */
  public function getSecretVolumes()
  {
    return $this->secretVolumes;
  }
  public function setServiceAccountEmail($serviceAccountEmail)
  {
    $this->serviceAccountEmail = $serviceAccountEmail;
  }
  public function getServiceAccountEmail()
  {
    return $this->serviceAccountEmail;
  }
  public function setSourceArchiveUrl($sourceArchiveUrl)
  {
    $this->sourceArchiveUrl = $sourceArchiveUrl;
  }
  public function getSourceArchiveUrl()
  {
    return $this->sourceArchiveUrl;
  }
  /**
   * @param SourceRepository
   */
  public function setSourceRepository(SourceRepository $sourceRepository)
  {
    $this->sourceRepository = $sourceRepository;
  }
  /**
   * @return SourceRepository
   */
  public function getSourceRepository()
  {
    return $this->sourceRepository;
  }
  public function setSourceToken($sourceToken)
  {
    $this->sourceToken = $sourceToken;
  }
  public function getSourceToken()
  {
    return $this->sourceToken;
  }
  public function setSourceUploadUrl($sourceUploadUrl)
  {
    $this->sourceUploadUrl = $sourceUploadUrl;
  }
  public function getSourceUploadUrl()
  {
    return $this->sourceUploadUrl;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setTimeout($timeout)
  {
    $this->timeout = $timeout;
  }
  public function getTimeout()
  {
    return $this->timeout;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  public function setVersionId($versionId)
  {
    $this->versionId = $versionId;
  }
  public function getVersionId()
  {
    return $this->versionId;
  }
  public function setVpcConnector($vpcConnector)
  {
    $this->vpcConnector = $vpcConnector;
  }
  public function getVpcConnector()
  {
    return $this->vpcConnector;
  }
  public function setVpcConnectorEgressSettings($vpcConnectorEgressSettings)
  {
    $this->vpcConnectorEgressSettings = $vpcConnectorEgressSettings;
  }
  public function getVpcConnectorEgressSettings()
  {
    return $this->vpcConnectorEgressSettings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CloudFunction::class, 'Google_Service_CloudFunctions_CloudFunction');
