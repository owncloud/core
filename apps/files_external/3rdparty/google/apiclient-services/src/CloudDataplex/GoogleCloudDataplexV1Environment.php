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

namespace Google\Service\CloudDataplex;

class GoogleCloudDataplexV1Environment extends \Google\Model
{
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  protected $endpointsType = GoogleCloudDataplexV1EnvironmentEndpoints::class;
  protected $endpointsDataType = '';
  protected $infrastructureSpecType = GoogleCloudDataplexV1EnvironmentInfrastructureSpec::class;
  protected $infrastructureSpecDataType = '';
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $name;
  protected $sessionSpecType = GoogleCloudDataplexV1EnvironmentSessionSpec::class;
  protected $sessionSpecDataType = '';
  protected $sessionStatusType = GoogleCloudDataplexV1EnvironmentSessionStatus::class;
  protected $sessionStatusDataType = '';
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $uid;
  /**
   * @var string
   */
  public $updateTime;

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
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param GoogleCloudDataplexV1EnvironmentEndpoints
   */
  public function setEndpoints(GoogleCloudDataplexV1EnvironmentEndpoints $endpoints)
  {
    $this->endpoints = $endpoints;
  }
  /**
   * @return GoogleCloudDataplexV1EnvironmentEndpoints
   */
  public function getEndpoints()
  {
    return $this->endpoints;
  }
  /**
   * @param GoogleCloudDataplexV1EnvironmentInfrastructureSpec
   */
  public function setInfrastructureSpec(GoogleCloudDataplexV1EnvironmentInfrastructureSpec $infrastructureSpec)
  {
    $this->infrastructureSpec = $infrastructureSpec;
  }
  /**
   * @return GoogleCloudDataplexV1EnvironmentInfrastructureSpec
   */
  public function getInfrastructureSpec()
  {
    return $this->infrastructureSpec;
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
   * @param GoogleCloudDataplexV1EnvironmentSessionSpec
   */
  public function setSessionSpec(GoogleCloudDataplexV1EnvironmentSessionSpec $sessionSpec)
  {
    $this->sessionSpec = $sessionSpec;
  }
  /**
   * @return GoogleCloudDataplexV1EnvironmentSessionSpec
   */
  public function getSessionSpec()
  {
    return $this->sessionSpec;
  }
  /**
   * @param GoogleCloudDataplexV1EnvironmentSessionStatus
   */
  public function setSessionStatus(GoogleCloudDataplexV1EnvironmentSessionStatus $sessionStatus)
  {
    $this->sessionStatus = $sessionStatus;
  }
  /**
   * @return GoogleCloudDataplexV1EnvironmentSessionStatus
   */
  public function getSessionStatus()
  {
    return $this->sessionStatus;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDataplexV1Environment::class, 'Google_Service_CloudDataplex_GoogleCloudDataplexV1Environment');
