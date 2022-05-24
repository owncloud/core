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

namespace Google\Service\GKEHub;

class ConfigManagementOperatorState extends \Google\Collection
{
  protected $collection_key = 'errors';
  /**
   * @var string
   */
  public $deploymentState;
  protected $errorsType = ConfigManagementInstallError::class;
  protected $errorsDataType = 'array';
  /**
   * @var string
   */
  public $version;

  /**
   * @param string
   */
  public function setDeploymentState($deploymentState)
  {
    $this->deploymentState = $deploymentState;
  }
  /**
   * @return string
   */
  public function getDeploymentState()
  {
    return $this->deploymentState;
  }
  /**
   * @param ConfigManagementInstallError[]
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return ConfigManagementInstallError[]
   */
  public function getErrors()
  {
    return $this->errors;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConfigManagementOperatorState::class, 'Google_Service_GKEHub_ConfigManagementOperatorState');
