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

namespace Google\Service\RemoteBuildExecution;

class GoogleDevtoolsRemotebuildexecutionAdminV1alphaWorkerPool extends \Google\Model
{
  protected $autoscaleType = GoogleDevtoolsRemotebuildexecutionAdminV1alphaAutoscale::class;
  protected $autoscaleDataType = '';
  public $channel;
  public $name;
  public $state;
  protected $workerConfigType = GoogleDevtoolsRemotebuildexecutionAdminV1alphaWorkerConfig::class;
  protected $workerConfigDataType = '';
  public $workerCount;

  /**
   * @param GoogleDevtoolsRemotebuildexecutionAdminV1alphaAutoscale
   */
  public function setAutoscale(GoogleDevtoolsRemotebuildexecutionAdminV1alphaAutoscale $autoscale)
  {
    $this->autoscale = $autoscale;
  }
  /**
   * @return GoogleDevtoolsRemotebuildexecutionAdminV1alphaAutoscale
   */
  public function getAutoscale()
  {
    return $this->autoscale;
  }
  public function setChannel($channel)
  {
    $this->channel = $channel;
  }
  public function getChannel()
  {
    return $this->channel;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param GoogleDevtoolsRemotebuildexecutionAdminV1alphaWorkerConfig
   */
  public function setWorkerConfig(GoogleDevtoolsRemotebuildexecutionAdminV1alphaWorkerConfig $workerConfig)
  {
    $this->workerConfig = $workerConfig;
  }
  /**
   * @return GoogleDevtoolsRemotebuildexecutionAdminV1alphaWorkerConfig
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleDevtoolsRemotebuildexecutionAdminV1alphaWorkerPool::class, 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaWorkerPool');
