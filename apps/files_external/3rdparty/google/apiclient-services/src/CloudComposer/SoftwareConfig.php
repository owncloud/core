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

namespace Google\Service\CloudComposer;

class SoftwareConfig extends \Google\Model
{
  /**
   * @var string[]
   */
  public $airflowConfigOverrides;
  /**
   * @var string[]
   */
  public $envVariables;
  /**
   * @var string
   */
  public $imageVersion;
  /**
   * @var string[]
   */
  public $pypiPackages;
  /**
   * @var string
   */
  public $pythonVersion;
  /**
   * @var int
   */
  public $schedulerCount;

  /**
   * @param string[]
   */
  public function setAirflowConfigOverrides($airflowConfigOverrides)
  {
    $this->airflowConfigOverrides = $airflowConfigOverrides;
  }
  /**
   * @return string[]
   */
  public function getAirflowConfigOverrides()
  {
    return $this->airflowConfigOverrides;
  }
  /**
   * @param string[]
   */
  public function setEnvVariables($envVariables)
  {
    $this->envVariables = $envVariables;
  }
  /**
   * @return string[]
   */
  public function getEnvVariables()
  {
    return $this->envVariables;
  }
  /**
   * @param string
   */
  public function setImageVersion($imageVersion)
  {
    $this->imageVersion = $imageVersion;
  }
  /**
   * @return string
   */
  public function getImageVersion()
  {
    return $this->imageVersion;
  }
  /**
   * @param string[]
   */
  public function setPypiPackages($pypiPackages)
  {
    $this->pypiPackages = $pypiPackages;
  }
  /**
   * @return string[]
   */
  public function getPypiPackages()
  {
    return $this->pypiPackages;
  }
  /**
   * @param string
   */
  public function setPythonVersion($pythonVersion)
  {
    $this->pythonVersion = $pythonVersion;
  }
  /**
   * @return string
   */
  public function getPythonVersion()
  {
    return $this->pythonVersion;
  }
  /**
   * @param int
   */
  public function setSchedulerCount($schedulerCount)
  {
    $this->schedulerCount = $schedulerCount;
  }
  /**
   * @return int
   */
  public function getSchedulerCount()
  {
    return $this->schedulerCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SoftwareConfig::class, 'Google_Service_CloudComposer_SoftwareConfig');
