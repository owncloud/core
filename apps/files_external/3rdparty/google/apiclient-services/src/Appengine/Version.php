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

namespace Google\Service\Appengine;

class Version extends \Google\Collection
{
  protected $collection_key = 'zones';
  protected $apiConfigType = ApiConfigHandler::class;
  protected $apiConfigDataType = '';
  protected $automaticScalingType = AutomaticScaling::class;
  protected $automaticScalingDataType = '';
  protected $basicScalingType = BasicScaling::class;
  protected $basicScalingDataType = '';
  public $betaSettings;
  public $buildEnvVariables;
  public $createTime;
  public $createdBy;
  public $defaultExpiration;
  protected $deploymentType = Deployment::class;
  protected $deploymentDataType = '';
  public $diskUsageBytes;
  protected $endpointsApiServiceType = EndpointsApiService::class;
  protected $endpointsApiServiceDataType = '';
  protected $entrypointType = Entrypoint::class;
  protected $entrypointDataType = '';
  public $env;
  public $envVariables;
  protected $errorHandlersType = ErrorHandler::class;
  protected $errorHandlersDataType = 'array';
  protected $handlersType = UrlMap::class;
  protected $handlersDataType = 'array';
  protected $healthCheckType = HealthCheck::class;
  protected $healthCheckDataType = '';
  public $id;
  public $inboundServices;
  public $instanceClass;
  protected $librariesType = Library::class;
  protected $librariesDataType = 'array';
  protected $livenessCheckType = LivenessCheck::class;
  protected $livenessCheckDataType = '';
  protected $manualScalingType = ManualScaling::class;
  protected $manualScalingDataType = '';
  public $name;
  protected $networkType = Network::class;
  protected $networkDataType = '';
  public $nobuildFilesRegex;
  protected $readinessCheckType = ReadinessCheck::class;
  protected $readinessCheckDataType = '';
  protected $resourcesType = Resources::class;
  protected $resourcesDataType = '';
  public $runtime;
  public $runtimeApiVersion;
  public $runtimeChannel;
  public $runtimeMainExecutablePath;
  public $serviceAccount;
  public $servingStatus;
  public $threadsafe;
  public $versionUrl;
  public $vm;
  protected $vpcAccessConnectorType = VpcAccessConnector::class;
  protected $vpcAccessConnectorDataType = '';
  public $zones;

  /**
   * @param ApiConfigHandler
   */
  public function setApiConfig(ApiConfigHandler $apiConfig)
  {
    $this->apiConfig = $apiConfig;
  }
  /**
   * @return ApiConfigHandler
   */
  public function getApiConfig()
  {
    return $this->apiConfig;
  }
  /**
   * @param AutomaticScaling
   */
  public function setAutomaticScaling(AutomaticScaling $automaticScaling)
  {
    $this->automaticScaling = $automaticScaling;
  }
  /**
   * @return AutomaticScaling
   */
  public function getAutomaticScaling()
  {
    return $this->automaticScaling;
  }
  /**
   * @param BasicScaling
   */
  public function setBasicScaling(BasicScaling $basicScaling)
  {
    $this->basicScaling = $basicScaling;
  }
  /**
   * @return BasicScaling
   */
  public function getBasicScaling()
  {
    return $this->basicScaling;
  }
  public function setBetaSettings($betaSettings)
  {
    $this->betaSettings = $betaSettings;
  }
  public function getBetaSettings()
  {
    return $this->betaSettings;
  }
  public function setBuildEnvVariables($buildEnvVariables)
  {
    $this->buildEnvVariables = $buildEnvVariables;
  }
  public function getBuildEnvVariables()
  {
    return $this->buildEnvVariables;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setCreatedBy($createdBy)
  {
    $this->createdBy = $createdBy;
  }
  public function getCreatedBy()
  {
    return $this->createdBy;
  }
  public function setDefaultExpiration($defaultExpiration)
  {
    $this->defaultExpiration = $defaultExpiration;
  }
  public function getDefaultExpiration()
  {
    return $this->defaultExpiration;
  }
  /**
   * @param Deployment
   */
  public function setDeployment(Deployment $deployment)
  {
    $this->deployment = $deployment;
  }
  /**
   * @return Deployment
   */
  public function getDeployment()
  {
    return $this->deployment;
  }
  public function setDiskUsageBytes($diskUsageBytes)
  {
    $this->diskUsageBytes = $diskUsageBytes;
  }
  public function getDiskUsageBytes()
  {
    return $this->diskUsageBytes;
  }
  /**
   * @param EndpointsApiService
   */
  public function setEndpointsApiService(EndpointsApiService $endpointsApiService)
  {
    $this->endpointsApiService = $endpointsApiService;
  }
  /**
   * @return EndpointsApiService
   */
  public function getEndpointsApiService()
  {
    return $this->endpointsApiService;
  }
  /**
   * @param Entrypoint
   */
  public function setEntrypoint(Entrypoint $entrypoint)
  {
    $this->entrypoint = $entrypoint;
  }
  /**
   * @return Entrypoint
   */
  public function getEntrypoint()
  {
    return $this->entrypoint;
  }
  public function setEnv($env)
  {
    $this->env = $env;
  }
  public function getEnv()
  {
    return $this->env;
  }
  public function setEnvVariables($envVariables)
  {
    $this->envVariables = $envVariables;
  }
  public function getEnvVariables()
  {
    return $this->envVariables;
  }
  /**
   * @param ErrorHandler[]
   */
  public function setErrorHandlers($errorHandlers)
  {
    $this->errorHandlers = $errorHandlers;
  }
  /**
   * @return ErrorHandler[]
   */
  public function getErrorHandlers()
  {
    return $this->errorHandlers;
  }
  /**
   * @param UrlMap[]
   */
  public function setHandlers($handlers)
  {
    $this->handlers = $handlers;
  }
  /**
   * @return UrlMap[]
   */
  public function getHandlers()
  {
    return $this->handlers;
  }
  /**
   * @param HealthCheck
   */
  public function setHealthCheck(HealthCheck $healthCheck)
  {
    $this->healthCheck = $healthCheck;
  }
  /**
   * @return HealthCheck
   */
  public function getHealthCheck()
  {
    return $this->healthCheck;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setInboundServices($inboundServices)
  {
    $this->inboundServices = $inboundServices;
  }
  public function getInboundServices()
  {
    return $this->inboundServices;
  }
  public function setInstanceClass($instanceClass)
  {
    $this->instanceClass = $instanceClass;
  }
  public function getInstanceClass()
  {
    return $this->instanceClass;
  }
  /**
   * @param Library[]
   */
  public function setLibraries($libraries)
  {
    $this->libraries = $libraries;
  }
  /**
   * @return Library[]
   */
  public function getLibraries()
  {
    return $this->libraries;
  }
  /**
   * @param LivenessCheck
   */
  public function setLivenessCheck(LivenessCheck $livenessCheck)
  {
    $this->livenessCheck = $livenessCheck;
  }
  /**
   * @return LivenessCheck
   */
  public function getLivenessCheck()
  {
    return $this->livenessCheck;
  }
  /**
   * @param ManualScaling
   */
  public function setManualScaling(ManualScaling $manualScaling)
  {
    $this->manualScaling = $manualScaling;
  }
  /**
   * @return ManualScaling
   */
  public function getManualScaling()
  {
    return $this->manualScaling;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Network
   */
  public function setNetwork(Network $network)
  {
    $this->network = $network;
  }
  /**
   * @return Network
   */
  public function getNetwork()
  {
    return $this->network;
  }
  public function setNobuildFilesRegex($nobuildFilesRegex)
  {
    $this->nobuildFilesRegex = $nobuildFilesRegex;
  }
  public function getNobuildFilesRegex()
  {
    return $this->nobuildFilesRegex;
  }
  /**
   * @param ReadinessCheck
   */
  public function setReadinessCheck(ReadinessCheck $readinessCheck)
  {
    $this->readinessCheck = $readinessCheck;
  }
  /**
   * @return ReadinessCheck
   */
  public function getReadinessCheck()
  {
    return $this->readinessCheck;
  }
  /**
   * @param Resources
   */
  public function setResources(Resources $resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return Resources
   */
  public function getResources()
  {
    return $this->resources;
  }
  public function setRuntime($runtime)
  {
    $this->runtime = $runtime;
  }
  public function getRuntime()
  {
    return $this->runtime;
  }
  public function setRuntimeApiVersion($runtimeApiVersion)
  {
    $this->runtimeApiVersion = $runtimeApiVersion;
  }
  public function getRuntimeApiVersion()
  {
    return $this->runtimeApiVersion;
  }
  public function setRuntimeChannel($runtimeChannel)
  {
    $this->runtimeChannel = $runtimeChannel;
  }
  public function getRuntimeChannel()
  {
    return $this->runtimeChannel;
  }
  public function setRuntimeMainExecutablePath($runtimeMainExecutablePath)
  {
    $this->runtimeMainExecutablePath = $runtimeMainExecutablePath;
  }
  public function getRuntimeMainExecutablePath()
  {
    return $this->runtimeMainExecutablePath;
  }
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  public function setServingStatus($servingStatus)
  {
    $this->servingStatus = $servingStatus;
  }
  public function getServingStatus()
  {
    return $this->servingStatus;
  }
  public function setThreadsafe($threadsafe)
  {
    $this->threadsafe = $threadsafe;
  }
  public function getThreadsafe()
  {
    return $this->threadsafe;
  }
  public function setVersionUrl($versionUrl)
  {
    $this->versionUrl = $versionUrl;
  }
  public function getVersionUrl()
  {
    return $this->versionUrl;
  }
  public function setVm($vm)
  {
    $this->vm = $vm;
  }
  public function getVm()
  {
    return $this->vm;
  }
  /**
   * @param VpcAccessConnector
   */
  public function setVpcAccessConnector(VpcAccessConnector $vpcAccessConnector)
  {
    $this->vpcAccessConnector = $vpcAccessConnector;
  }
  /**
   * @return VpcAccessConnector
   */
  public function getVpcAccessConnector()
  {
    return $this->vpcAccessConnector;
  }
  public function setZones($zones)
  {
    $this->zones = $zones;
  }
  public function getZones()
  {
    return $this->zones;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Version::class, 'Google_Service_Appengine_Version');
