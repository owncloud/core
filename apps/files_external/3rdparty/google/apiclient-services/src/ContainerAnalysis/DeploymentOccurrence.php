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
  /**
   * @var string
   */
  public $address;
  /**
   * @var string
   */
  public $config;
  /**
   * @var string
   */
  public $deployTime;
  /**
   * @var string
   */
  public $platform;
  /**
   * @var string[]
   */
  public $resourceUri;
  /**
   * @var string
   */
  public $undeployTime;
  /**
   * @var string
   */
  public $userEmail;

  /**
   * @param string
   */
  public function setAddress($address)
  {
    $this->address = $address;
  }
  /**
   * @return string
   */
  public function getAddress()
  {
    return $this->address;
  }
  /**
   * @param string
   */
  public function setConfig($config)
  {
    $this->config = $config;
  }
  /**
   * @return string
   */
  public function getConfig()
  {
    return $this->config;
  }
  /**
   * @param string
   */
  public function setDeployTime($deployTime)
  {
    $this->deployTime = $deployTime;
  }
  /**
   * @return string
   */
  public function getDeployTime()
  {
    return $this->deployTime;
  }
  /**
   * @param string
   */
  public function setPlatform($platform)
  {
    $this->platform = $platform;
  }
  /**
   * @return string
   */
  public function getPlatform()
  {
    return $this->platform;
  }
  /**
   * @param string[]
   */
  public function setResourceUri($resourceUri)
  {
    $this->resourceUri = $resourceUri;
  }
  /**
   * @return string[]
   */
  public function getResourceUri()
  {
    return $this->resourceUri;
  }
  /**
   * @param string
   */
  public function setUndeployTime($undeployTime)
  {
    $this->undeployTime = $undeployTime;
  }
  /**
   * @return string
   */
  public function getUndeployTime()
  {
    return $this->undeployTime;
  }
  /**
   * @param string
   */
  public function setUserEmail($userEmail)
  {
    $this->userEmail = $userEmail;
  }
  /**
   * @return string
   */
  public function getUserEmail()
  {
    return $this->userEmail;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeploymentOccurrence::class, 'Google_Service_ContainerAnalysis_DeploymentOccurrence');
