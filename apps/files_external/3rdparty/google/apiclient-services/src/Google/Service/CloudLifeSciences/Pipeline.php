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

class Google_Service_CloudLifeSciences_Pipeline extends Google_Collection
{
  protected $collection_key = 'actions';
  protected $actionsType = 'Google_Service_CloudLifeSciences_Action';
  protected $actionsDataType = 'array';
  protected $encryptedEnvironmentType = 'Google_Service_CloudLifeSciences_Secret';
  protected $encryptedEnvironmentDataType = '';
  public $environment;
  protected $resourcesType = 'Google_Service_CloudLifeSciences_Resources';
  protected $resourcesDataType = '';
  public $timeout;

  /**
   * @param Google_Service_CloudLifeSciences_Action[]
   */
  public function setActions($actions)
  {
    $this->actions = $actions;
  }
  /**
   * @return Google_Service_CloudLifeSciences_Action[]
   */
  public function getActions()
  {
    return $this->actions;
  }
  /**
   * @param Google_Service_CloudLifeSciences_Secret
   */
  public function setEncryptedEnvironment(Google_Service_CloudLifeSciences_Secret $encryptedEnvironment)
  {
    $this->encryptedEnvironment = $encryptedEnvironment;
  }
  /**
   * @return Google_Service_CloudLifeSciences_Secret
   */
  public function getEncryptedEnvironment()
  {
    return $this->encryptedEnvironment;
  }
  public function setEnvironment($environment)
  {
    $this->environment = $environment;
  }
  public function getEnvironment()
  {
    return $this->environment;
  }
  /**
   * @param Google_Service_CloudLifeSciences_Resources
   */
  public function setResources(Google_Service_CloudLifeSciences_Resources $resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return Google_Service_CloudLifeSciences_Resources
   */
  public function getResources()
  {
    return $this->resources;
  }
  public function setTimeout($timeout)
  {
    $this->timeout = $timeout;
  }
  public function getTimeout()
  {
    return $this->timeout;
  }
}
