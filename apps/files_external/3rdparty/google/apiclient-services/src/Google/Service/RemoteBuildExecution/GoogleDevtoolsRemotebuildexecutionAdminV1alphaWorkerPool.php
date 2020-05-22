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

class Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaWorkerPool extends Google_Model
{
  public $name;
  public $state;
  protected $workerConfigType = 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaWorkerConfig';
  protected $workerConfigDataType = '';
  public $workerCount;

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
   * @param Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaWorkerConfig
   */
  public function setWorkerConfig(Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaWorkerConfig $workerConfig)
  {
    $this->workerConfig = $workerConfig;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildexecutionAdminV1alphaWorkerConfig
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
