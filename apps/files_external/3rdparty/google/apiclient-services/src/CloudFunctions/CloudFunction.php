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
  /**
   * @var int
   */
  public $availableMemoryMb;
  /**
   * @var string[]
   */
  public $buildEnvironmentVariables;
  /**
   * @var string
   */
  public $buildId;
  /**
   * @var string
   */
  public $buildName;
  /**
   * @var string
   */
  public $buildWorkerPool;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $dockerRegistry;
  /**
   * @var string
   */
  public $dockerRepository;
  /**
   * @var string
   */
  public $entryPoint;
  /**
   * @var string[]
   */
  public $environmentVariables;
  protected $eventTriggerType = EventTrigger::class;
  protected $eventTriggerDataType = '';
  protected $httpsTriggerType = HttpsTrigger::class;
  protected $httpsTriggerDataType = '';
  /**
   * @var string
   */
  public $ingressSettings;
  /**
   * @var string
   */
  public $kmsKeyName;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var int
   */
  public $maxInstances;
  /**
   * @var int
   */
  public $minInstances;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $network;
  /**
   * @var string
   */
  public $runtime;
  protected $secretEnvironmentVariablesType = SecretEnvVar::class;
  protected $secretEnvironmentVariablesDataType = 'array';
  protected $secretVolumesType = SecretVolume::class;
  protected $secretVolumesDataType = 'array';
  /**
   * @var string
   */
  public $serviceAccountEmail;
  /**
   * @var string
   */
  public $sourceArchiveUrl;
  protected $sourceRepositoryType = SourceRepository::class;
  protected $sourceRepositoryDataType = '';
  /**
   * @var string
   */
  public $sourceToken;
  /**
   * @var string
   */
  public $sourceUploadUrl;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $timeout;
  /**
   * @var string
   */
  public $updateTime;
  /**
   * @var string
   */
  public $versionId;
  /**
   * @var string
   */
  public $vpcConnector;
  /**
   * @var string
   */
  public $vpcConnectorEgressSettings;

  /**
   * @param int
   */
  public function setAvailableMemoryMb($availableMemoryMb)
  {
    $this->availableMemoryMb = $availableMemoryMb;
  }
  /**
   * @return int
   */
  public function getAvailableMemoryMb()
  {
    return $this->availableMemoryMb;
  }
  /**
   * @param string[]
   */
  public function setBuildEnvironmentVariables($buildEnvironmentVariables)
  {
    $this->buildEnvironmentVariables = $buildEnvironmentVariables;
  }
  /**
   * @return string[]
   */
  public function getBuildEnvironmentVariables()
  {
    return $this->buildEnvironmentVariables;
  }
  /**
   * @param string
   */
  public function setBuildId($buildId)
  {
    $this->buildId = $buildId;
  }
  /**
   * @return string
   */
  public function getBuildId()
  {
    return $this->buildId;
  }
  /**
   * @param string
   */
  public function setBuildName($buildName)
  {
    $this->buildName = $buildName;
  }
  /**
   * @return string
   */
  public function getBuildName()
  {
    return $this->buildName;
  }
  /**
   * @param string
   */
  public function setBuildWorkerPool($buildWorkerPool)
  {
    $this->buildWorkerPool = $buildWorkerPool;
  }
  /**
   * @return string
   */
  public function getBuildWorkerPool()
  {
    return $this->buildWorkerPool;
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
  public function setDockerRegistry($dockerRegistry)
  {
    $this->dockerRegistry = $dockerRegistry;
  }
  /**
   * @return string
   */
  public function getDockerRegistry()
  {
    return $this->dockerRegistry;
  }
  /**
   * @param string
   */
  public function setDockerRepository($dockerRepository)
  {
    $this->dockerRepository = $dockerRepository;
  }
  /**
   * @return string
   */
  public function getDockerRepository()
  {
    return $this->dockerRepository;
  }
  /**
   * @param string
   */
  public function setEntryPoint($entryPoint)
  {
    $this->entryPoint = $entryPoint;
  }
  /**
   * @return string
   */
  public function getEntryPoint()
  {
    return $this->entryPoint;
  }
  /**
   * @param string[]
   */
  public function setEnvironmentVariables($environmentVariables)
  {
    $this->environmentVariables = $environmentVariables;
  }
  /**
   * @return string[]
   */
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
  /**
   * @param string
   */
  public function setIngressSettings($ingressSettings)
  {
    $this->ingressSettings = $ingressSettings;
  }
  /**
   * @return string
   */
  public function getIngressSettings()
  {
    return $this->ingressSettings;
  }
  /**
   * @param string
   */
  public function setKmsKeyName($kmsKeyName)
  {
    $this->kmsKeyName = $kmsKeyName;
  }
  /**
   * @return string
   */
  public function getKmsKeyName()
  {
    return $this->kmsKeyName;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param int
   */
  public function setMaxInstances($maxInstances)
  {
    $this->maxInstances = $maxInstances;
  }
  /**
   * @return int
   */
  public function getMaxInstances()
  {
    return $this->maxInstances;
  }
  /**
   * @param int
   */
  public function setMinInstances($minInstances)
  {
    $this->minInstances = $minInstances;
  }
  /**
   * @return int
   */
  public function getMinInstances()
  {
    return $this->minInstances;
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
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  /**
   * @return string
   */
  public function getNetwork()
  {
    return $this->network;
  }
  /**
   * @param string
   */
  public function setRuntime($runtime)
  {
    $this->runtime = $runtime;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setServiceAccountEmail($serviceAccountEmail)
  {
    $this->serviceAccountEmail = $serviceAccountEmail;
  }
  /**
   * @return string
   */
  public function getServiceAccountEmail()
  {
    return $this->serviceAccountEmail;
  }
  /**
   * @param string
   */
  public function setSourceArchiveUrl($sourceArchiveUrl)
  {
    $this->sourceArchiveUrl = $sourceArchiveUrl;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setSourceToken($sourceToken)
  {
    $this->sourceToken = $sourceToken;
  }
  /**
   * @return string
   */
  public function getSourceToken()
  {
    return $this->sourceToken;
  }
  /**
   * @param string
   */
  public function setSourceUploadUrl($sourceUploadUrl)
  {
    $this->sourceUploadUrl = $sourceUploadUrl;
  }
  /**
   * @return string
   */
  public function getSourceUploadUrl()
  {
    return $this->sourceUploadUrl;
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
   * @param string
   */
  public function setTimeout($timeout)
  {
    $this->timeout = $timeout;
  }
  /**
   * @return string
   */
  public function getTimeout()
  {
    return $this->timeout;
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
  public function setVersionId($versionId)
  {
    $this->versionId = $versionId;
  }
  /**
   * @return string
   */
  public function getVersionId()
  {
    return $this->versionId;
  }
  /**
   * @param string
   */
  public function setVpcConnector($vpcConnector)
  {
    $this->vpcConnector = $vpcConnector;
  }
  /**
   * @return string
   */
  public function getVpcConnector()
  {
    return $this->vpcConnector;
  }
  /**
   * @param string
   */
  public function setVpcConnectorEgressSettings($vpcConnectorEgressSettings)
  {
    $this->vpcConnectorEgressSettings = $vpcConnectorEgressSettings;
  }
  /**
   * @return string
   */
  public function getVpcConnectorEgressSettings()
  {
    return $this->vpcConnectorEgressSettings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CloudFunction::class, 'Google_Service_CloudFunctions_CloudFunction');
