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

namespace Google\Service\CloudDeploy;

class ExecutionConfig extends \Google\Collection
{
  protected $collection_key = 'usages';
  /**
   * @var string
   */
  public $artifactStorage;
  protected $defaultPoolType = DefaultPool::class;
  protected $defaultPoolDataType = '';
  protected $privatePoolType = PrivatePool::class;
  protected $privatePoolDataType = '';
  /**
   * @var string
   */
  public $serviceAccount;
  /**
   * @var string[]
   */
  public $usages;
  /**
   * @var string
   */
  public $workerPool;

  /**
   * @param string
   */
  public function setArtifactStorage($artifactStorage)
  {
    $this->artifactStorage = $artifactStorage;
  }
  /**
   * @return string
   */
  public function getArtifactStorage()
  {
    return $this->artifactStorage;
  }
  /**
   * @param DefaultPool
   */
  public function setDefaultPool(DefaultPool $defaultPool)
  {
    $this->defaultPool = $defaultPool;
  }
  /**
   * @return DefaultPool
   */
  public function getDefaultPool()
  {
    return $this->defaultPool;
  }
  /**
   * @param PrivatePool
   */
  public function setPrivatePool(PrivatePool $privatePool)
  {
    $this->privatePool = $privatePool;
  }
  /**
   * @return PrivatePool
   */
  public function getPrivatePool()
  {
    return $this->privatePool;
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
   * @param string[]
   */
  public function setUsages($usages)
  {
    $this->usages = $usages;
  }
  /**
   * @return string[]
   */
  public function getUsages()
  {
    return $this->usages;
  }
  /**
   * @param string
   */
  public function setWorkerPool($workerPool)
  {
    $this->workerPool = $workerPool;
  }
  /**
   * @return string
   */
  public function getWorkerPool()
  {
    return $this->workerPool;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExecutionConfig::class, 'Google_Service_CloudDeploy_ExecutionConfig');
