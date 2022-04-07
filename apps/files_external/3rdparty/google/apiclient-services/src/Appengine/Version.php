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
  /**
   * @var bool
   */
  public $appEngineApis;
  protected $automaticScalingType = AutomaticScaling::class;
  protected $automaticScalingDataType = '';
  protected $basicScalingType = BasicScaling::class;
  protected $basicScalingDataType = '';
  /**
   * @var string[]
   */
  public $betaSettings;
  /**
   * @var string[]
   */
  public $buildEnvVariables;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $createdBy;
  /**
   * @var string
   */
  public $defaultExpiration;
  protected $deploymentType = Deployment::class;
  protected $deploymentDataType = '';
  /**
   * @var string
   */
  public $diskUsageBytes;
  protected $endpointsApiServiceType = EndpointsApiService::class;
  protected $endpointsApiServiceDataType = '';
  protected $entrypointType = Entrypoint::class;
  protected $entrypointDataType = '';
  /**
   * @var string
   */
  public $env;
  /**
   * @var string[]
   */
  public $envVariables;
  protected $errorHandlersType = ErrorHandler::class;
  protected $errorHandlersDataType = 'array';
  protected $handlersType = UrlMap::class;
  protected $handlersDataType = 'array';
  protected $healthCheckType = HealthCheck::class;
  protected $healthCheckDataType = '';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string[]
   */
  public $inboundServices;
  /**
   * @var string
   */
  public $instanceClass;
  protected $librariesType = Library::class;
  protected $librariesDataType = 'array';
  protected $livenessCheckType = LivenessCheck::class;
  protected $livenessCheckDataType = '';
  protected $manualScalingType = ManualScaling::class;
  protected $manualScalingDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $networkType = Network::class;
  protected $networkDataType = '';
  /**
   * @var string
   */
  public $nobuildFilesRegex;
  protected $readinessCheckType = ReadinessCheck::class;
  protected $readinessCheckDataType = '';
  protected $resourcesType = Resources::class;
  protected $resourcesDataType = '';
  /**
   * @var string
   */
  public $runtime;
  /**
   * @var string
   */
  public $runtimeApiVersion;
  /**
   * @var string
   */
  public $runtimeChannel;
  /**
   * @var string
   */
  public $runtimeMainExecutablePath;
  /**
   * @var string
   */
  public $serviceAccount;
  /**
   * @var string
   */
  public $servingStatus;
  /**
   * @var bool
   */
  public $threadsafe;
  /**
   * @var string
   */
  public $versionUrl;
  /**
   * @var bool
   */
  public $vm;
  protected $vpcAccessConnectorType = VpcAccessConnector::class;
  protected $vpcAccessConnectorDataType = '';
  /**
   * @var string[]
   */
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
   * @param bool
   */
  public function setAppEngineApis($appEngineApis)
  {
    $this->appEngineApis = $appEngineApis;
  }
  /**
   * @return bool
   */
  public function getAppEngineApis()
  {
    return $this->appEngineApis;
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
  /**
   * @param string[]
   */
  public function setBetaSettings($betaSettings)
  {
    $this->betaSettings = $betaSettings;
  }
  /**
   * @return string[]
   */
  public function getBetaSettings()
  {
    return $this->betaSettings;
  }
  /**
   * @param string[]
   */
  public function setBuildEnvVariables($buildEnvVariables)
  {
    $this->buildEnvVariables = $buildEnvVariables;
  }
  /**
   * @return string[]
   */
  public function getBuildEnvVariables()
  {
    return $this->buildEnvVariables;
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
  public function setCreatedBy($createdBy)
  {
    $this->createdBy = $createdBy;
  }
  /**
   * @return string
   */
  public function getCreatedBy()
  {
    return $this->createdBy;
  }
  /**
   * @param string
   */
  public function setDefaultExpiration($defaultExpiration)
  {
    $this->defaultExpiration = $defaultExpiration;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setDiskUsageBytes($diskUsageBytes)
  {
    $this->diskUsageBytes = $diskUsageBytes;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setEnv($env)
  {
    $this->env = $env;
  }
  /**
   * @return string
   */
  public function getEnv()
  {
    return $this->env;
  }
  /**
   * @param string[]
   */
  public function setEnvVariables($envVariables)
  {
    $this->envVariables = $envVariables;
  }
  /**
   * @return string[]
   */
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
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string[]
   */
  public function setInboundServices($inboundServices)
  {
    $this->inboundServices = $inboundServices;
  }
  /**
   * @return string[]
   */
  public function getInboundServices()
  {
    return $this->inboundServices;
  }
  /**
   * @param string
   */
  public function setInstanceClass($instanceClass)
  {
    $this->instanceClass = $instanceClass;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setNobuildFilesRegex($nobuildFilesRegex)
  {
    $this->nobuildFilesRegex = $nobuildFilesRegex;
  }
  /**
   * @return string
   */
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
   * @param string
   */
  public function setRuntimeApiVersion($runtimeApiVersion)
  {
    $this->runtimeApiVersion = $runtimeApiVersion;
  }
  /**
   * @return string
   */
  public function getRuntimeApiVersion()
  {
    return $this->runtimeApiVersion;
  }
  /**
   * @param string
   */
  public function setRuntimeChannel($runtimeChannel)
  {
    $this->runtimeChannel = $runtimeChannel;
  }
  /**
   * @return string
   */
  public function getRuntimeChannel()
  {
    return $this->runtimeChannel;
  }
  /**
   * @param string
   */
  public function setRuntimeMainExecutablePath($runtimeMainExecutablePath)
  {
    $this->runtimeMainExecutablePath = $runtimeMainExecutablePath;
  }
  /**
   * @return string
   */
  public function getRuntimeMainExecutablePath()
  {
    return $this->runtimeMainExecutablePath;
  }
  /**
   * @param string
   */
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  /**
   * @return string
   */
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  /**
   * @param string
   */
  public function setServingStatus($servingStatus)
  {
    $this->servingStatus = $servingStatus;
  }
  /**
   * @return string
   */
  public function getServingStatus()
  {
    return $this->servingStatus;
  }
  /**
   * @param bool
   */
  public function setThreadsafe($threadsafe)
  {
    $this->threadsafe = $threadsafe;
  }
  /**
   * @return bool
   */
  public function getThreadsafe()
  {
    return $this->threadsafe;
  }
  /**
   * @param string
   */
  public function setVersionUrl($versionUrl)
  {
    $this->versionUrl = $versionUrl;
  }
  /**
   * @return string
   */
  public function getVersionUrl()
  {
    return $this->versionUrl;
  }
  /**
   * @param bool
   */
  public function setVm($vm)
  {
    $this->vm = $vm;
  }
  /**
   * @return bool
   */
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
  /**
   * @param string[]
   */
  public function setZones($zones)
  {
    $this->zones = $zones;
  }
  /**
   * @return string[]
   */
  public function getZones()
  {
    return $this->zones;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Version::class, 'Google_Service_Appengine_Version');
