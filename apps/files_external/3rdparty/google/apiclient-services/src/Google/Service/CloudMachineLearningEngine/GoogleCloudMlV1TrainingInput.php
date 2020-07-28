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

class Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1TrainingInput extends Google_Collection
{
  protected $collection_key = 'packageUris';
  public $args;
  protected $encryptionConfigType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1EncryptionConfig';
  protected $encryptionConfigDataType = '';
  protected $evaluatorConfigType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ReplicaConfig';
  protected $evaluatorConfigDataType = '';
  public $evaluatorCount;
  public $evaluatorType;
  protected $hyperparametersType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1HyperparameterSpec';
  protected $hyperparametersDataType = '';
  public $jobDir;
  protected $masterConfigType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ReplicaConfig';
  protected $masterConfigDataType = '';
  public $masterType;
  public $network;
  public $packageUris;
  protected $parameterServerConfigType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ReplicaConfig';
  protected $parameterServerConfigDataType = '';
  public $parameterServerCount;
  public $parameterServerType;
  public $pythonModule;
  public $pythonVersion;
  public $region;
  public $runtimeVersion;
  public $scaleTier;
  protected $schedulingType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Scheduling';
  protected $schedulingDataType = '';
  public $serviceAccount;
  public $useChiefInTfConfig;
  protected $workerConfigType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ReplicaConfig';
  protected $workerConfigDataType = '';
  public $workerCount;
  public $workerType;

  public function setArgs($args)
  {
    $this->args = $args;
  }
  public function getArgs()
  {
    return $this->args;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1EncryptionConfig
   */
  public function setEncryptionConfig(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1EncryptionConfig $encryptionConfig)
  {
    $this->encryptionConfig = $encryptionConfig;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1EncryptionConfig
   */
  public function getEncryptionConfig()
  {
    return $this->encryptionConfig;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ReplicaConfig
   */
  public function setEvaluatorConfig(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ReplicaConfig $evaluatorConfig)
  {
    $this->evaluatorConfig = $evaluatorConfig;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ReplicaConfig
   */
  public function getEvaluatorConfig()
  {
    return $this->evaluatorConfig;
  }
  public function setEvaluatorCount($evaluatorCount)
  {
    $this->evaluatorCount = $evaluatorCount;
  }
  public function getEvaluatorCount()
  {
    return $this->evaluatorCount;
  }
  public function setEvaluatorType($evaluatorType)
  {
    $this->evaluatorType = $evaluatorType;
  }
  public function getEvaluatorType()
  {
    return $this->evaluatorType;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1HyperparameterSpec
   */
  public function setHyperparameters(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1HyperparameterSpec $hyperparameters)
  {
    $this->hyperparameters = $hyperparameters;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1HyperparameterSpec
   */
  public function getHyperparameters()
  {
    return $this->hyperparameters;
  }
  public function setJobDir($jobDir)
  {
    $this->jobDir = $jobDir;
  }
  public function getJobDir()
  {
    return $this->jobDir;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ReplicaConfig
   */
  public function setMasterConfig(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ReplicaConfig $masterConfig)
  {
    $this->masterConfig = $masterConfig;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ReplicaConfig
   */
  public function getMasterConfig()
  {
    return $this->masterConfig;
  }
  public function setMasterType($masterType)
  {
    $this->masterType = $masterType;
  }
  public function getMasterType()
  {
    return $this->masterType;
  }
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  public function getNetwork()
  {
    return $this->network;
  }
  public function setPackageUris($packageUris)
  {
    $this->packageUris = $packageUris;
  }
  public function getPackageUris()
  {
    return $this->packageUris;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ReplicaConfig
   */
  public function setParameterServerConfig(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ReplicaConfig $parameterServerConfig)
  {
    $this->parameterServerConfig = $parameterServerConfig;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ReplicaConfig
   */
  public function getParameterServerConfig()
  {
    return $this->parameterServerConfig;
  }
  public function setParameterServerCount($parameterServerCount)
  {
    $this->parameterServerCount = $parameterServerCount;
  }
  public function getParameterServerCount()
  {
    return $this->parameterServerCount;
  }
  public function setParameterServerType($parameterServerType)
  {
    $this->parameterServerType = $parameterServerType;
  }
  public function getParameterServerType()
  {
    return $this->parameterServerType;
  }
  public function setPythonModule($pythonModule)
  {
    $this->pythonModule = $pythonModule;
  }
  public function getPythonModule()
  {
    return $this->pythonModule;
  }
  public function setPythonVersion($pythonVersion)
  {
    $this->pythonVersion = $pythonVersion;
  }
  public function getPythonVersion()
  {
    return $this->pythonVersion;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setRuntimeVersion($runtimeVersion)
  {
    $this->runtimeVersion = $runtimeVersion;
  }
  public function getRuntimeVersion()
  {
    return $this->runtimeVersion;
  }
  public function setScaleTier($scaleTier)
  {
    $this->scaleTier = $scaleTier;
  }
  public function getScaleTier()
  {
    return $this->scaleTier;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Scheduling
   */
  public function setScheduling(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Scheduling $scheduling)
  {
    $this->scheduling = $scheduling;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Scheduling
   */
  public function getScheduling()
  {
    return $this->scheduling;
  }
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  public function setUseChiefInTfConfig($useChiefInTfConfig)
  {
    $this->useChiefInTfConfig = $useChiefInTfConfig;
  }
  public function getUseChiefInTfConfig()
  {
    return $this->useChiefInTfConfig;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ReplicaConfig
   */
  public function setWorkerConfig(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ReplicaConfig $workerConfig)
  {
    $this->workerConfig = $workerConfig;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ReplicaConfig
   */
  public function getWorkerConfig()
  {
    return $this->workerConfig;
  }
  public function setWorkerCount($workerCount)
  {
    $this->workerCount = $workerCount;
  }
  public function getWorkerCount()
  {
    return $this->workerCount;
  }
  public function setWorkerType($workerType)
  {
    $this->workerType = $workerType;
  }
  public function getWorkerType()
  {
    return $this->workerType;
  }
}
