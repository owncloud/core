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

namespace Google\Service\CloudRun;

class GoogleCloudRunV2Revision extends \Google\Collection
{
  protected $collection_key = 'volumes';
  /**
   * @var string[]
   */
  public $annotations;
  protected $conditionsType = GoogleCloudRunV2Condition::class;
  protected $conditionsDataType = 'array';
  /**
   * @var bool
   */
  public $confidential;
  /**
   * @var int
   */
  public $containerConcurrency;
  protected $containersType = GoogleCloudRunV2Container::class;
  protected $containersDataType = 'array';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $deleteTime;
  /**
   * @var string
   */
  public $encryptionKey;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $executionEnvironment;
  /**
   * @var string
   */
  public $expireTime;
  /**
   * @var string
   */
  public $generation;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $launchStage;
  /**
   * @var string
   */
  public $logUri;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $observedGeneration;
  /**
   * @var bool
   */
  public $reconciling;
  protected $scalingType = GoogleCloudRunV2RevisionScaling::class;
  protected $scalingDataType = '';
  /**
   * @var string
   */
  public $service;
  /**
   * @var string
   */
  public $serviceAccount;
  /**
   * @var string
   */
  public $timeout;
  /**
   * @var string
   */
  public $uid;
  /**
   * @var string
   */
  public $updateTime;
  protected $volumesType = GoogleCloudRunV2Volume::class;
  protected $volumesDataType = 'array';
  protected $vpcAccessType = GoogleCloudRunV2VpcAccess::class;
  protected $vpcAccessDataType = '';

  /**
   * @param string[]
   */
  public function setAnnotations($annotations)
  {
    $this->annotations = $annotations;
  }
  /**
   * @return string[]
   */
  public function getAnnotations()
  {
    return $this->annotations;
  }
  /**
   * @param GoogleCloudRunV2Condition[]
   */
  public function setConditions($conditions)
  {
    $this->conditions = $conditions;
  }
  /**
   * @return GoogleCloudRunV2Condition[]
   */
  public function getConditions()
  {
    return $this->conditions;
  }
  /**
   * @param bool
   */
  public function setConfidential($confidential)
  {
    $this->confidential = $confidential;
  }
  /**
   * @return bool
   */
  public function getConfidential()
  {
    return $this->confidential;
  }
  /**
   * @param int
   */
  public function setContainerConcurrency($containerConcurrency)
  {
    $this->containerConcurrency = $containerConcurrency;
  }
  /**
   * @return int
   */
  public function getContainerConcurrency()
  {
    return $this->containerConcurrency;
  }
  /**
   * @param GoogleCloudRunV2Container[]
   */
  public function setContainers($containers)
  {
    $this->containers = $containers;
  }
  /**
   * @return GoogleCloudRunV2Container[]
   */
  public function getContainers()
  {
    return $this->containers;
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
  public function setDeleteTime($deleteTime)
  {
    $this->deleteTime = $deleteTime;
  }
  /**
   * @return string
   */
  public function getDeleteTime()
  {
    return $this->deleteTime;
  }
  /**
   * @param string
   */
  public function setEncryptionKey($encryptionKey)
  {
    $this->encryptionKey = $encryptionKey;
  }
  /**
   * @return string
   */
  public function getEncryptionKey()
  {
    return $this->encryptionKey;
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
   * @param string
   */
  public function setExecutionEnvironment($executionEnvironment)
  {
    $this->executionEnvironment = $executionEnvironment;
  }
  /**
   * @return string
   */
  public function getExecutionEnvironment()
  {
    return $this->executionEnvironment;
  }
  /**
   * @param string
   */
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  /**
   * @return string
   */
  public function getExpireTime()
  {
    return $this->expireTime;
  }
  /**
   * @param string
   */
  public function setGeneration($generation)
  {
    $this->generation = $generation;
  }
  /**
   * @return string
   */
  public function getGeneration()
  {
    return $this->generation;
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
  public function setLaunchStage($launchStage)
  {
    $this->launchStage = $launchStage;
  }
  /**
   * @return string
   */
  public function getLaunchStage()
  {
    return $this->launchStage;
  }
  /**
   * @param string
   */
  public function setLogUri($logUri)
  {
    $this->logUri = $logUri;
  }
  /**
   * @return string
   */
  public function getLogUri()
  {
    return $this->logUri;
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
  public function setObservedGeneration($observedGeneration)
  {
    $this->observedGeneration = $observedGeneration;
  }
  /**
   * @return string
   */
  public function getObservedGeneration()
  {
    return $this->observedGeneration;
  }
  /**
   * @param bool
   */
  public function setReconciling($reconciling)
  {
    $this->reconciling = $reconciling;
  }
  /**
   * @return bool
   */
  public function getReconciling()
  {
    return $this->reconciling;
  }
  /**
   * @param GoogleCloudRunV2RevisionScaling
   */
  public function setScaling(GoogleCloudRunV2RevisionScaling $scaling)
  {
    $this->scaling = $scaling;
  }
  /**
   * @return GoogleCloudRunV2RevisionScaling
   */
  public function getScaling()
  {
    return $this->scaling;
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
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  /**
   * @return string
   */
  public function getUid()
  {
    return $this->uid;
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
   * @param GoogleCloudRunV2Volume[]
   */
  public function setVolumes($volumes)
  {
    $this->volumes = $volumes;
  }
  /**
   * @return GoogleCloudRunV2Volume[]
   */
  public function getVolumes()
  {
    return $this->volumes;
  }
  /**
   * @param GoogleCloudRunV2VpcAccess
   */
  public function setVpcAccess(GoogleCloudRunV2VpcAccess $vpcAccess)
  {
    $this->vpcAccess = $vpcAccess;
  }
  /**
   * @return GoogleCloudRunV2VpcAccess
   */
  public function getVpcAccess()
  {
    return $this->vpcAccess;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRunV2Revision::class, 'Google_Service_CloudRun_GoogleCloudRunV2Revision');
