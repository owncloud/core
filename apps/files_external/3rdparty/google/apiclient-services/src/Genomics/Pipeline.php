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

namespace Google\Service\Genomics;

class Pipeline extends \Google\Collection
{
  protected $collection_key = 'actions';
  protected $actionsType = Action::class;
  protected $actionsDataType = 'array';
  protected $encryptedEnvironmentType = Secret::class;
  protected $encryptedEnvironmentDataType = '';
  /**
   * @var string[]
   */
  public $environment;
  protected $resourcesType = Resources::class;
  protected $resourcesDataType = '';
  /**
   * @var string
   */
  public $timeout;

  /**
   * @param Action[]
   */
  public function setActions($actions)
  {
    $this->actions = $actions;
  }
  /**
   * @return Action[]
   */
  public function getActions()
  {
    return $this->actions;
  }
  /**
   * @param Secret
   */
  public function setEncryptedEnvironment(Secret $encryptedEnvironment)
  {
    $this->encryptedEnvironment = $encryptedEnvironment;
  }
  /**
   * @return Secret
   */
  public function getEncryptedEnvironment()
  {
    return $this->encryptedEnvironment;
  }
  /**
   * @param string[]
   */
  public function setEnvironment($environment)
  {
    $this->environment = $environment;
  }
  /**
   * @return string[]
   */
  public function getEnvironment()
  {
    return $this->environment;
  }
  /**
   * @param Resources
   */
  public function setResources(Resources $resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return Resources
   */
  public function getResources()
  {
    return $this->resources;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Pipeline::class, 'Google_Service_Genomics_Pipeline');
