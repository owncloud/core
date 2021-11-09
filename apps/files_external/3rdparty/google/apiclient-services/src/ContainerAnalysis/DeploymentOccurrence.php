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

namespace Google\Service\ContainerAnalysis;

class DeploymentOccurrence extends \Google\Collection
{
  protected $collection_key = 'resourceUri';
  public $address;
  public $config;
  public $deployTime;
  public $platform;
  public $resourceUri;
  public $undeployTime;
  public $userEmail;

  public function setAddress($address)
  {
    $this->address = $address;
  }
  public function getAddress()
  {
    return $this->address;
  }
  public function setConfig($config)
  {
    $this->config = $config;
  }
  public function getConfig()
  {
    return $this->config;
  }
  public function setDeployTime($deployTime)
  {
    $this->deployTime = $deployTime;
  }
  public function getDeployTime()
  {
    return $this->deployTime;
  }
  public function setPlatform($platform)
  {
    $this->platform = $platform;
  }
  public function getPlatform()
  {
    return $this->platform;
  }
  public function setResourceUri($resourceUri)
  {
    $this->resourceUri = $resourceUri;
  }
  public function getResourceUri()
  {
    return $this->resourceUri;
  }
  public function setUndeployTime($undeployTime)
  {
    $this->undeployTime = $undeployTime;
  }
  public function getUndeployTime()
  {
    return $this->undeployTime;
  }
  public function setUserEmail($userEmail)
  {
    $this->userEmail = $userEmail;
  }
  public function getUserEmail()
  {
    return $this->userEmail;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeploymentOccurrence::class, 'Google_Service_ContainerAnalysis_DeploymentOccurrence');
