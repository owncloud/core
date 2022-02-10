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

class GoogleCloudMlV1TrainingInput extends \Google\Collection
{
  protected $collection_key = 'packageUris';
  /**
   * @var string[]
   */
  public $args;
  /**
   * @var bool
   */
  public $enableWebAccess;
  protected $encryptionConfigType = GoogleCloudMlV1EncryptionConfig::class;
  protected $encryptionConfigDataType = '';
  protected $evaluatorConfigType = GoogleCloudMlV1ReplicaConfig::class;
  protected $evaluatorConfigDataType = '';
  /**
   * @var string
   */
  public $evaluatorCount;
  /**
   * @var string
   */
  public $evaluatorType;
  protected $hyperparametersType = GoogleCloudMlV1HyperparameterSpec::class;
  protected $hyperparametersDataType = '';
  /**
   * @var string
   */
  public $jobDir;
  protected $masterConfigType = GoogleCloudMlV1ReplicaConfig::class;
  protected $masterConfigDataType = '';
  /**
   * @var string
   */
  public $masterType;
  /**
   * @var string
   */
  public $network;
  /**
   * @var string[]
   */
  public $packageUris;
  protected $parameterServerConfigType = GoogleCloudMlV1ReplicaConfig::class;
  protected $parameterServerConfigDataType = '';
  /**
   * @var string
   */
  public $parameterServerCount;
  /**
   * @var string
   */
  public $parameterServerType;
  /**
   * @var string
   */
  public $pythonModule;
  /**
   * @var string
   */
  public $pythonVersion;
  /**
   * @var string
   */
  public $region;
  /**
   * @var string
   */
  public $runtimeVersion;
  /**
   * @var string
   */
  public $scaleTier;
  protected $schedulingType = GoogleCloudMlV1Scheduling::class;
  protected $schedulingDataType = '';
  /**
   * @var string
   */
  public $serviceAccount;
  /**
   * @var bool
   */
  public $useChiefInTfConfig;
  protected $workerConfigType = GoogleCloudMlV1ReplicaConfig::class;
  protected $workerConfigDataType = '';
  /**
   * @var string
   */
  public $workerCount;
  /**
   * @var string
   */
  public $workerType;

  /**
   * @param string[]
   */
  public function setArgs($args)
  {
    $this->args = $args;
  }
  /**
   * @return string[]
   */
  public function getArgs()
  {
    return $this->args;
  }
  /**
   * @param bool
   */
  public function setEnableWebAccess($enableWebAccess)
  {
    $this->enableWebAccess = $enableWebAccess;
  }
  /**
   * @return bool
   */
  public function getEnableWebAccess()
  {
    return $this->enableWebAccess;
  }
  /**
   * @param GoogleCloudMlV1EncryptionConfig
   */
  public function setEncryptionConfig(GoogleCloudMlV1EncryptionConfig $encryptionConfig)
  {
    $this->encryptionConfig = $encryptionConfig;
  }
  /**
   * @return GoogleCloudMlV1EncryptionConfig
   */
  public function getEncryptionConfig()
  {
    return $this->encryptionConfig;
  }
  /**
   * @param GoogleCloudMlV1ReplicaConfig
   */
  public function setEvaluatorConfig(GoogleCloudMlV1ReplicaConfig $evaluatorConfig)
  {
    $this->evaluatorConfig = $evaluatorConfig;
  }
  /**
   * @return GoogleCloudMlV1ReplicaConfig
   */
  public function getEvaluatorConfig()
  {
    return $this->evaluatorConfig;
  }
  /**
   * @param string
   */
  public function setEvaluatorCount($evaluatorCount)
  {
    $this->evaluatorCount = $evaluatorCount;
  }
  /**
   * @return string
   */
  public function getEvaluatorCount()
  {
    return $this->evaluatorCount;
  }
  /**
   * @param string
   */
  public function setEvaluatorType($evaluatorType)
  {
    $this->evaluatorType = $evaluatorType;
  }
  /**
   * @return string
   */
  public function getEvaluatorType()
  {
    return $this->evaluatorType;
  }
  /**
   * @param GoogleCloudMlV1HyperparameterSpec
   */
  public function setHyperparameters(GoogleCloudMlV1HyperparameterSpec $hyperparameters)
  {
    $this->hyperparameters = $hyperparameters;
  }
  /**
   * @return GoogleCloudMlV1HyperparameterSpec
   */
  public function getHyperparameters()
  {
    return $this->hyperparameters;
  }
  /**
   * @param string
   */
  public function setJobDir($jobDir)
  {
    $this->jobDir = $jobDir;
  }
  /**
   * @return string
   */
  public function getJobDir()
  {
    return $this->jobDir;
  }
  /**
   * @param GoogleCloudMlV1ReplicaConfig
   */
  public function setMasterConfig(GoogleCloudMlV1ReplicaConfig $masterConfig)
  {
    $this->masterConfig = $masterConfig;
  }
  /**
   * @return GoogleCloudMlV1ReplicaConfig
   */
  public function getMasterConfig()
  {
    return $this->masterConfig;
  }
  /**
   * @param string
   */
  public function setMasterType($masterType)
  {
    $this->masterType = $masterType;
  }
  /**
   * @return string
   */
  public function getMasterType()
  {
    return $this->masterType;
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
   * @param GoogleCloudMlV1ReplicaConfig
   */
  public function setParameterServerConfig(GoogleCloudMlV1ReplicaConfig $parameterServerConfig)
  {
    $this->parameterServerConfig = $parameterServerConfig;
  }
  /**
   * @return GoogleCloudMlV1ReplicaConfig
   */
  public function getParameterServerConfig()
  {
    return $this->parameterServerConfig;
  }
  /**
   * @param string
   */
  public function setParameterServerCount($parameterServerCount)
  {
    $this->parameterServerCount = $parameterServerCount;
  }
  /**
   * @return string
   */
  public function getParameterServerCount()
  {
    return $this->parameterServerCount;
  }
  /**
   * @param string
   */
  public function setParameterServerType($parameterServerType)
  {
    $this->parameterServerType = $parameterServerType;
  }
  /**
   * @return string
   */
  public function getParameterServerType()
  {
    return $this->parameterServerType;
  }
  /**
   * @param string
   */
  public function setPythonModule($pythonModule)
  {
    $this->pythonModule = $pythonModule;
  }
  /**
   * @return string
   */
  public function getPythonModule()
  {
    return $this->pythonModule;
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
   * @param string
   */
  public function setRegion($region)
  {
    $this->region = $region;
  }
  /**
   * @return string
   */
  public function getRegion()
  {
    return $this->region;
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
  public function setScaleTier($scaleTier)
  {
    $this->scaleTier = $scaleTier;
  }
  /**
   * @return string
   */
  public function getScaleTier()
  {
    return $this->scaleTier;
  }
  /**
   * @param GoogleCloudMlV1Scheduling
   */
  public function setScheduling(GoogleCloudMlV1Scheduling $scheduling)
  {
    $this->scheduling = $scheduling;
  }
  /**
   * @return GoogleCloudMlV1Scheduling
   */
  public function getScheduling()
  {
    return $this->scheduling;
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
   * @param bool
   */
  public function setUseChiefInTfConfig($useChiefInTfConfig)
  {
    $this->useChiefInTfConfig = $useChiefInTfConfig;
  }
  /**
   * @return bool
   */
  public function getUseChiefInTfConfig()
  {
    return $this->useChiefInTfConfig;
  }
  /**
   * @param GoogleCloudMlV1ReplicaConfig
   */
  public function setWorkerConfig(GoogleCloudMlV1ReplicaConfig $workerConfig)
  {
    $this->workerConfig = $workerConfig;
  }
  /**
   * @return GoogleCloudMlV1ReplicaConfig
   */
  public function getWorkerConfig()
  {
    return $this->workerConfig;
  }
  /**
   * @param string
   */
  public function setWorkerCount($workerCount)
  {
    $this->workerCount = $workerCount;
  }
  /**
   * @return string
   */
  public function getWorkerCount()
  {
    return $this->workerCount;
  }
  /**
   * @param string
   */
  public function setWorkerType($workerType)
  {
    $this->workerType = $workerType;
  }
  /**
   * @return string
   */
  public function getWorkerType()
  {
    return $this->workerType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1TrainingInput::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1TrainingInput');
