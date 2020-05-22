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

class Google_Service_CloudComposer_SoftwareConfig extends Google_Model
{
  public $airflowConfigOverrides;
  public $envVariables;
  public $imageVersion;
  public $pypiPackages;
  public $pythonVersion;

  public function setAirflowConfigOverrides($airflowConfigOverrides)
  {
    $this->airflowConfigOverrides = $airflowConfigOverrides;
  }
  public function getAirflowConfigOverrides()
  {
    return $this->airflowConfigOverrides;
  }
  public function setEnvVariables($envVariables)
  {
    $this->envVariables = $envVariables;
  }
  public function getEnvVariables()
  {
    return $this->envVariables;
  }
  public function setImageVersion($imageVersion)
  {
    $this->imageVersion = $imageVersion;
  }
  public function getImageVersion()
  {
    return $this->imageVersion;
  }
  public function setPypiPackages($pypiPackages)
  {
    $this->pypiPackages = $pypiPackages;
  }
  public function getPypiPackages()
  {
    return $this->pypiPackages;
  }
  public function setPythonVersion($pythonVersion)
  {
    $this->pythonVersion = $pythonVersion;
  }
  public function getPythonVersion()
  {
    return $this->pythonVersion;
  }
}
