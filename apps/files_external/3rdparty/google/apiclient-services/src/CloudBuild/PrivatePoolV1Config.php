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

namespace Google\Service\CloudBuild;

class PrivatePoolV1Config extends \Google\Model
{
  protected $networkConfigType = NetworkConfig::class;
  protected $networkConfigDataType = '';
  protected $workerConfigType = WorkerConfig::class;
  protected $workerConfigDataType = '';

  /**
   * @param NetworkConfig
   */
  public function setNetworkConfig(NetworkConfig $networkConfig)
  {
    $this->networkConfig = $networkConfig;
  }
  /**
   * @return NetworkConfig
   */
  public function getNetworkConfig()
  {
    return $this->networkConfig;
  }
  /**
   * @param WorkerConfig
   */
  public function setWorkerConfig(WorkerConfig $workerConfig)
  {
    $this->workerConfig = $workerConfig;
  }
  /**
   * @return WorkerConfig
   */
  public function getWorkerConfig()
  {
    return $this->workerConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PrivatePoolV1Config::class, 'Google_Service_CloudBuild_PrivatePoolV1Config');
