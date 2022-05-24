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

namespace Google\Service\Dataflow;

class Environment extends \Google\Collection
{
  protected $collection_key = 'workerPools';
  /**
   * @var string
   */
  public $clusterManagerApiService;
  /**
   * @var string
   */
  public $dataset;
  protected $debugOptionsType = DebugOptions::class;
  protected $debugOptionsDataType = '';
  /**
   * @var string[]
   */
  public $experiments;
  /**
   * @var string
   */
  public $flexResourceSchedulingGoal;
  /**
   * @var array[]
   */
  public $internalExperiments;
  /**
   * @var array[]
   */
  public $sdkPipelineOptions;
  /**
   * @var string
   */
  public $serviceAccountEmail;
  /**
   * @var string
   */
  public $serviceKmsKeyName;
  /**
   * @var string[]
   */
  public $serviceOptions;
  /**
   * @var string
   */
  public $shuffleMode;
  /**
   * @var string
   */
  public $tempStoragePrefix;
  /**
   * @var array[]
   */
  public $userAgent;
  /**
   * @var array[]
   */
  public $version;
  protected $workerPoolsType = WorkerPool::class;
  protected $workerPoolsDataType = 'array';
  /**
   * @var string
   */
  public $workerRegion;
  /**
   * @var string
   */
  public $workerZone;

  /**
   * @param string
   */
  public function setClusterManagerApiService($clusterManagerApiService)
  {
    $this->clusterManagerApiService = $clusterManagerApiService;
  }
  /**
   * @return string
   */
  public function getClusterManagerApiService()
  {
    return $this->clusterManagerApiService;
  }
  /**
   * @param string
   */
  public function setDataset($dataset)
  {
    $this->dataset = $dataset;
  }
  /**
   * @return string
   */
  public function getDataset()
  {
    return $this->dataset;
  }
  /**
   * @param DebugOptions
   */
  public function setDebugOptions(DebugOptions $debugOptions)
  {
    $this->debugOptions = $debugOptions;
  }
  /**
   * @return DebugOptions
   */
  public function getDebugOptions()
  {
    return $this->debugOptions;
  }
  /**
   * @param string[]
   */
  public function setExperiments($experiments)
  {
    $this->experiments = $experiments;
  }
  /**
   * @return string[]
   */
  public function getExperiments()
  {
    return $this->experiments;
  }
  /**
   * @param string
   */
  public function setFlexResourceSchedulingGoal($flexResourceSchedulingGoal)
  {
    $this->flexResourceSchedulingGoal = $flexResourceSchedulingGoal;
  }
  /**
   * @return string
   */
  public function getFlexResourceSchedulingGoal()
  {
    return $this->flexResourceSchedulingGoal;
  }
  /**
   * @param array[]
   */
  public function setInternalExperiments($internalExperiments)
  {
    $this->internalExperiments = $internalExperiments;
  }
  /**
   * @return array[]
   */
  public function getInternalExperiments()
  {
    return $this->internalExperiments;
  }
  /**
   * @param array[]
   */
  public function setSdkPipelineOptions($sdkPipelineOptions)
  {
    $this->sdkPipelineOptions = $sdkPipelineOptions;
  }
  /**
   * @return array[]
   */
  public function getSdkPipelineOptions()
  {
    return $this->sdkPipelineOptions;
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
  public function setServiceKmsKeyName($serviceKmsKeyName)
  {
    $this->serviceKmsKeyName = $serviceKmsKeyName;
  }
  /**
   * @return string
   */
  public function getServiceKmsKeyName()
  {
    return $this->serviceKmsKeyName;
  }
  /**
   * @param string[]
   */
  public function setServiceOptions($serviceOptions)
  {
    $this->serviceOptions = $serviceOptions;
  }
  /**
   * @return string[]
   */
  public function getServiceOptions()
  {
    return $this->serviceOptions;
  }
  /**
   * @param string
   */
  public function setShuffleMode($shuffleMode)
  {
    $this->shuffleMode = $shuffleMode;
  }
  /**
   * @return string
   */
  public function getShuffleMode()
  {
    return $this->shuffleMode;
  }
  /**
   * @param string
   */
  public function setTempStoragePrefix($tempStoragePrefix)
  {
    $this->tempStoragePrefix = $tempStoragePrefix;
  }
  /**
   * @return string
   */
  public function getTempStoragePrefix()
  {
    return $this->tempStoragePrefix;
  }
  /**
   * @param array[]
   */
  public function setUserAgent($userAgent)
  {
    $this->userAgent = $userAgent;
  }
  /**
   * @return array[]
   */
  public function getUserAgent()
  {
    return $this->userAgent;
  }
  /**
   * @param array[]
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return array[]
   */
  public function getVersion()
  {
    return $this->version;
  }
  /**
   * @param WorkerPool[]
   */
  public function setWorkerPools($workerPools)
  {
    $this->workerPools = $workerPools;
  }
  /**
   * @return WorkerPool[]
   */
  public function getWorkerPools()
  {
    return $this->workerPools;
  }
  /**
   * @param string
   */
  public function setWorkerRegion($workerRegion)
  {
    $this->workerRegion = $workerRegion;
  }
  /**
   * @return string
   */
  public function getWorkerRegion()
  {
    return $this->workerRegion;
  }
  /**
   * @param string
   */
  public function setWorkerZone($workerZone)
  {
    $this->workerZone = $workerZone;
  }
  /**
   * @return string
   */
  public function getWorkerZone()
  {
    return $this->workerZone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Environment::class, 'Google_Service_Dataflow_Environment');
