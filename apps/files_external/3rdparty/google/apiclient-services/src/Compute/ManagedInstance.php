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

namespace Google\Service\Compute;

class ManagedInstance extends \Google\Collection
{
  protected $collection_key = 'instanceHealth';
  /**
   * @var string
   */
  public $currentAction;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $instance;
  protected $instanceHealthType = ManagedInstanceInstanceHealth::class;
  protected $instanceHealthDataType = 'array';
  /**
   * @var string
   */
  public $instanceStatus;
  protected $lastAttemptType = ManagedInstanceLastAttempt::class;
  protected $lastAttemptDataType = '';
  protected $preservedStateFromConfigType = PreservedState::class;
  protected $preservedStateFromConfigDataType = '';
  protected $preservedStateFromPolicyType = PreservedState::class;
  protected $preservedStateFromPolicyDataType = '';
  protected $versionType = ManagedInstanceVersion::class;
  protected $versionDataType = '';

  /**
   * @param string
   */
  public function setCurrentAction($currentAction)
  {
    $this->currentAction = $currentAction;
  }
  /**
   * @return string
   */
  public function getCurrentAction()
  {
    return $this->currentAction;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setInstance($instance)
  {
    $this->instance = $instance;
  }
  /**
   * @return string
   */
  public function getInstance()
  {
    return $this->instance;
  }
  /**
   * @param ManagedInstanceInstanceHealth[]
   */
  public function setInstanceHealth($instanceHealth)
  {
    $this->instanceHealth = $instanceHealth;
  }
  /**
   * @return ManagedInstanceInstanceHealth[]
   */
  public function getInstanceHealth()
  {
    return $this->instanceHealth;
  }
  /**
   * @param string
   */
  public function setInstanceStatus($instanceStatus)
  {
    $this->instanceStatus = $instanceStatus;
  }
  /**
   * @return string
   */
  public function getInstanceStatus()
  {
    return $this->instanceStatus;
  }
  /**
   * @param ManagedInstanceLastAttempt
   */
  public function setLastAttempt(ManagedInstanceLastAttempt $lastAttempt)
  {
    $this->lastAttempt = $lastAttempt;
  }
  /**
   * @return ManagedInstanceLastAttempt
   */
  public function getLastAttempt()
  {
    return $this->lastAttempt;
  }
  /**
   * @param PreservedState
   */
  public function setPreservedStateFromConfig(PreservedState $preservedStateFromConfig)
  {
    $this->preservedStateFromConfig = $preservedStateFromConfig;
  }
  /**
   * @return PreservedState
   */
  public function getPreservedStateFromConfig()
  {
    return $this->preservedStateFromConfig;
  }
  /**
   * @param PreservedState
   */
  public function setPreservedStateFromPolicy(PreservedState $preservedStateFromPolicy)
  {
    $this->preservedStateFromPolicy = $preservedStateFromPolicy;
  }
  /**
   * @return PreservedState
   */
  public function getPreservedStateFromPolicy()
  {
    return $this->preservedStateFromPolicy;
  }
  /**
   * @param ManagedInstanceVersion
   */
  public function setVersion(ManagedInstanceVersion $version)
  {
    $this->version = $version;
  }
  /**
   * @return ManagedInstanceVersion
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManagedInstance::class, 'Google_Service_Compute_ManagedInstance');
