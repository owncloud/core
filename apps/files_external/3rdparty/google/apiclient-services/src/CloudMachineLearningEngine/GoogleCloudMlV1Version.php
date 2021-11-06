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
  public $createTime;
  public $deploymentUri;
  public $description;
  public $errorMessage;
  public $etag;
  protected $explanationConfigType = GoogleCloudMlV1ExplanationConfig::class;
  protected $explanationConfigDataType = '';
  public $framework;
  public $isDefault;
  public $labels;
  public $lastMigrationModelId;
  public $lastMigrationTime;
  public $lastUseTime;
  public $machineType;
  protected $manualScalingType = GoogleCloudMlV1ManualScaling::class;
  protected $manualScalingDataType = '';
  public $name;
  public $packageUris;
  public $predictionClass;
  public $pythonVersion;
  protected $requestLoggingConfigType = GoogleCloudMlV1RequestLoggingConfig::class;
  protected $requestLoggingConfigDataType = '';
  protected $routesType = GoogleCloudMlV1RouteMap::class;
  protected $routesDataType = '';
  public $runtimeVersion;
  public $serviceAccount;
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
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDeploymentUri($deploymentUri)
  {
    $this->deploymentUri = $deploymentUri;
  }
  public function getDeploymentUri()
  {
    return $this->deploymentUri;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setErrorMessage($errorMessage)
  {
    $this->errorMessage = $errorMessage;
  }
  public function getErrorMessage()
  {
    return $this->errorMessage;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
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
  public function setFramework($framework)
  {
    $this->framework = $framework;
  }
  public function getFramework()
  {
    return $this->framework;
  }
  public function setIsDefault($isDefault)
  {
    $this->isDefault = $isDefault;
  }
  public function getIsDefault()
  {
    return $this->isDefault;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLastMigrationModelId($lastMigrationModelId)
  {
    $this->lastMigrationModelId = $lastMigrationModelId;
  }
  public function getLastMigrationModelId()
  {
    return $this->lastMigrationModelId;
  }
  public function setLastMigrationTime($lastMigrationTime)
  {
    $this->lastMigrationTime = $lastMigrationTime;
  }
  public function getLastMigrationTime()
  {
    return $this->lastMigrationTime;
  }
  public function setLastUseTime($lastUseTime)
  {
    $this->lastUseTime = $lastUseTime;
  }
  public function getLastUseTime()
  {
    return $this->lastUseTime;
  }
  public function setMachineType($machineType)
  {
    $this->machineType = $machineType;
  }
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
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPackageUris($packageUris)
  {
    $this->packageUris = $packageUris;
  }
  public function getPackageUris()
  {
    return $this->packageUris;
  }
  public function setPredictionClass($predictionClass)
  {
    $this->predictionClass = $predictionClass;
  }
  public function getPredictionClass()
  {
    return $this->predictionClass;
  }
  public function setPythonVersion($pythonVersion)
  {
    $this->pythonVersion = $pythonVersion;
  }
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
  public function setRuntimeVersion($runtimeVersion)
  {
    $this->runtimeVersion = $runtimeVersion;
  }
  public function getRuntimeVersion()
  {
    return $this->runtimeVersion;
  }
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1Version::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Version');
