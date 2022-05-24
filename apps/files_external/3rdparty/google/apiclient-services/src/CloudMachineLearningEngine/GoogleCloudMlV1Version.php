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

namespace Google\Service\CloudMachineLearningEngine;

class GoogleCloudMlV1Version extends \Google\Collection
{
  protected $collection_key = 'packageUris';
  protected $acceleratorConfigType = GoogleCloudMlV1AcceleratorConfig::class;
  protected $acceleratorConfigDataType = '';
  protected $autoScalingType = GoogleCloudMlV1AutoScaling::class;
  protected $autoScalingDataType = '';
  protected $containerType = GoogleCloudMlV1ContainerSpec::class;
  protected $containerDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $deploymentUri;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $errorMessage;
  /**
   * @var string
   */
  public $etag;
  protected $explanationConfigType = GoogleCloudMlV1ExplanationConfig::class;
  protected $explanationConfigDataType = '';
  /**
   * @var string
   */
  public $framework;
  /**
   * @var bool
   */
  public $isDefault;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $lastMigrationModelId;
  /**
   * @var string
   */
  public $lastMigrationTime;
  /**
   * @var string
   */
  public $lastUseTime;
  /**
   * @var string
   */
  public $machineType;
  protected $manualScalingType = GoogleCloudMlV1ManualScaling::class;
  protected $manualScalingDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $packageUris;
  /**
   * @var string
   */
  public $predictionClass;
  /**
   * @var string
   */
  public $pythonVersion;
  protected $requestLoggingConfigType = GoogleCloudMlV1RequestLoggingConfig::class;
  protected $requestLoggingConfigDataType = '';
  protected $routesType = GoogleCloudMlV1RouteMap::class;
  protected $routesDataType = '';
  /**
   * @var string
   */
  public $runtimeVersion;
  /**
   * @var string
   */
  public $serviceAccount;
  /**
   * @var string
   */
  public $state;

  /**
   * @param GoogleCloudMlV1AcceleratorConfig
   */
  public function setAcceleratorConfig(GoogleCloudMlV1AcceleratorConfig $acceleratorConfig)
  {
    $this->acceleratorConfig = $acceleratorConfig;
  }
  /**
   * @return GoogleCloudMlV1AcceleratorConfig
   */
  public function getAcceleratorConfig()
  {
    return $this->acceleratorConfig;
  }
  /**
   * @param GoogleCloudMlV1AutoScaling
   */
  public function setAutoScaling(GoogleCloudMlV1AutoScaling $autoScaling)
  {
    $this->autoScaling = $autoScaling;
  }
  /**
   * @return GoogleCloudMlV1AutoScaling
   */
  public function getAutoScaling()
  {
    return $this->autoScaling;
  }
  /**
   * @param GoogleCloudMlV1ContainerSpec
   */
  public function setContainer(GoogleCloudMlV1ContainerSpec $container)
  {
    $this->container = $container;
  }
  /**
   * @return GoogleCloudMlV1ContainerSpec
   */
  public function getContainer()
  {
    return $this->container;
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
  public function setDeploymentUri($deploymentUri)
  {
    $this->deploymentUri = $deploymentUri;
  }
  /**
   * @return string
   */
  public function getDeploymentUri()
  {
    return $this->deploymentUri;
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
  public function setErrorMessage($errorMessage)
  {
    $this->errorMessage = $errorMessage;
  }
  /**
   * @return string
   */
  public function getErrorMessage()
  {
    return $this->errorMessage;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param GoogleCloudMlV1ExplanationConfig
   */
  public function setExplanationConfig(GoogleCloudMlV1ExplanationConfig $explanationConfig)
  {
    $this->explanationConfig = $explanationConfig;
  }
  /**
   * @return GoogleCloudMlV1ExplanationConfig
   */
  public function getExplanationConfig()
  {
    return $this->explanationConfig;
  }
  /**
   * @param string
   */
  public function setFramework($framework)
  {
    $this->framework = $framework;
  }
  /**
   * @return string
   */
  public function getFramework()
  {
    return $this->framework;
  }
  /**
   * @param bool
   */
  public function setIsDefault($isDefault)
  {
    $this->isDefault = $isDefault;
  }
  /**
   * @return bool
   */
  public function getIsDefault()
  {
    return $this->isDefault;
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
   * @param string
   */
  public function setLastMigrationModelId($lastMigrationModelId)
  {
    $this->lastMigrationModelId = $lastMigrationModelId;
  }
  /**
   * @return string
   */
  public function getLastMigrationModelId()
  {
    return $this->lastMigrationModelId;
  }
  /**
   * @param string
   */
  public function setLastMigrationTime($lastMigrationTime)
  {
    $this->lastMigrationTime = $lastMigrationTime;
  }
  /**
   * @return string
   */
  public function getLastMigrationTime()
  {
    return $this->lastMigrationTime;
  }
  /**
   * @param string
   */
  public function setLastUseTime($lastUseTime)
  {
    $this->lastUseTime = $lastUseTime;
  }
  /**
   * @return string
   */
  public function getLastUseTime()
  {
    return $this->lastUseTime;
  }
  /**
   * @param string
   */
  public function setMachineType($machineType)
  {
    $this->machineType = $machineType;
  }
  /**
   * @return string
   */
  public function getMachineType()
  {
    return $this->machineType;
  }
  /**
   * @param GoogleCloudMlV1ManualScaling
   */
  public function setManualScaling(GoogleCloudMlV1ManualScaling $manualScaling)
  {
    $this->manualScaling = $manualScaling;
  }
  /**
   * @return GoogleCloudMlV1ManualScaling
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
   * @param string[]
   */
  public function setPackageUris($packageUris)
  {
    $this->packageUris = $packageUris;
  }
  /**
   * @return string[]
   */
  public function getPackageUris()
  {
    return $this->packageUris;
  }
  /**
   * @param string
   */
  public function setPredictionClass($predictionClass)
  {
    $this->predictionClass = $predictionClass;
  }
  /**
   * @return string
   */
  public function getPredictionClass()
  {
    return $this->predictionClass;
  }
  /**
   * @param string
   */
  public function setPythonVersion($pythonVersion)
  {
    $this->pythonVersion = $pythonVersion;
  }
  /**
   * @return string
   */
  public function getPythonVersion()
  {
    return $this->pythonVersion;
  }
  /**
   * @param GoogleCloudMlV1RequestLoggingConfig
   */
  public function setRequestLoggingConfig(GoogleCloudMlV1RequestLoggingConfig $requestLoggingConfig)
  {
    $this->requestLoggingConfig = $requestLoggingConfig;
  }
  /**
   * @return GoogleCloudMlV1RequestLoggingConfig
   */
  public function getRequestLoggingConfig()
  {
    return $this->requestLoggingConfig;
  }
  /**
   * @param GoogleCloudMlV1RouteMap
   */
  public function setRoutes(GoogleCloudMlV1RouteMap $routes)
  {
    $this->routes = $routes;
  }
  /**
   * @return GoogleCloudMlV1RouteMap
   */
  public function getRoutes()
  {
    return $this->routes;
  }
  /**
   * @param string
   */
  public function setRuntimeVersion($runtimeVersion)
  {
    $this->runtimeVersion = $runtimeVersion;
  }
  /**
   * @return string
   */
  public function getRuntimeVersion()
  {
    return $this->runtimeVersion;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1Version::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Version');
