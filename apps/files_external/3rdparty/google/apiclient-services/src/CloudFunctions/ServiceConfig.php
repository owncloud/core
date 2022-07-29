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

class ServiceConfig extends \Google\Collection
{
  protected $collection_key = 'secretVolumes';
  /**
   * @var bool
   */
  public $allTrafficOnLatestRevision;
  /**
   * @var string
   */
  public $availableMemory;
  /**
   * @var string[]
   */
  public $environmentVariables;
  /**
   * @var string
   */
  public $ingressSettings;
  /**
   * @var int
   */
  public $maxInstanceCount;
  /**
   * @var int
   */
  public $minInstanceCount;
  /**
   * @var string
   */
  public $revision;
  protected $secretEnvironmentVariablesType = SecretEnvVar::class;
  protected $secretEnvironmentVariablesDataType = 'array';
  protected $secretVolumesType = SecretVolume::class;
  protected $secretVolumesDataType = 'array';
  /**
   * @var string
   */
  public $service;
  /**
   * @var string
   */
  public $serviceAccountEmail;
  /**
   * @var int
   */
  public $timeoutSeconds;
  /**
   * @var string
   */
  public $uri;
  /**
   * @var string
   */
  public $vpcConnector;
  /**
   * @var string
   */
  public $vpcConnectorEgressSettings;

  /**
   * @param bool
   */
  public function setAllTrafficOnLatestRevision($allTrafficOnLatestRevision)
  {
    $this->allTrafficOnLatestRevision = $allTrafficOnLatestRevision;
  }
  /**
   * @return bool
   */
  public function getAllTrafficOnLatestRevision()
  {
    return $this->allTrafficOnLatestRevision;
  }
  /**
   * @param string
   */
  public function setAvailableMemory($availableMemory)
  {
    $this->availableMemory = $availableMemory;
  }
  /**
   * @return string
   */
  public function getAvailableMemory()
  {
    return $this->availableMemory;
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
   * @param int
   */
  public function setMaxInstanceCount($maxInstanceCount)
  {
    $this->maxInstanceCount = $maxInstanceCount;
  }
  /**
   * @return int
   */
  public function getMaxInstanceCount()
  {
    return $this->maxInstanceCount;
  }
  /**
   * @param int
   */
  public function setMinInstanceCount($minInstanceCount)
  {
    $this->minInstanceCount = $minInstanceCount;
  }
  /**
   * @return int
   */
  public function getMinInstanceCount()
  {
    return $this->minInstanceCount;
  }
  /**
   * @param string
   */
  public function setRevision($revision)
  {
    $this->revision = $revision;
  }
  /**
   * @return string
   */
  public function getRevision()
  {
    return $this->revision;
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
  public function setService($service)
  {
    $this->service = $service;
  }
  /**
   * @return string
   */
  public function getService()
  {
    return $this->service;
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
   * @param int
   */
  public function setTimeoutSeconds($timeoutSeconds)
  {
    $this->timeoutSeconds = $timeoutSeconds;
  }
  /**
   * @return int
   */
  public function getTimeoutSeconds()
  {
    return $this->timeoutSeconds;
  }
  /**
   * @param string
   */
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  /**
   * @return string
   */
  public function getUri()
  {
    return $this->uri;
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
class_alias(ServiceConfig::class, 'Google_Service_CloudFunctions_ServiceConfig');
