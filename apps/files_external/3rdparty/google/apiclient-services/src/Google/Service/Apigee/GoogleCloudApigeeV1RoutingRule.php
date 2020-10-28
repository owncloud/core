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

class Google_Service_Apigee_GoogleCloudApigeeV1RoutingRule extends Google_Model
{
  public $basepath;
  public $envGroupRevision;
  public $environment;
  public $receiver;
  public $updateTime;

  public function setBasepath($basepath)
  {
    $this->basepath = $basepath;
  }
  public function getBasepath()
  {
    return $this->basepath;
  }
  public function setEnvGroupRevision($envGroupRevision)
  {
    $this->envGroupRevision = $envGroupRevision;
  }
  public function getEnvGroupRevision()
  {
    return $this->envGroupRevision;
  }
  public function setEnvironment($environment)
  {
    $this->environment = $environment;
  }
  public function getEnvironment()
  {
    return $this->environment;
  }
  public function setReceiver($receiver)
  {
    $this->receiver = $receiver;
  }
  public function getReceiver()
  {
    return $this->receiver;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
