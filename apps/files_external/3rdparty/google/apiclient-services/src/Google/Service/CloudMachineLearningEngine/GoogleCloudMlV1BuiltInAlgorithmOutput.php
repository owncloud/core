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

class Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1BuiltInAlgorithmOutput extends Google_Model
{
  public $framework;
  public $modelPath;
  public $pythonVersion;
  public $runtimeVersion;

  public function setFramework($framework)
  {
    $this->framework = $framework;
  }
  public function getFramework()
  {
    return $this->framework;
  }
  public function setModelPath($modelPath)
  {
    $this->modelPath = $modelPath;
  }
  public function getModelPath()
  {
    return $this->modelPath;
  }
  public function setPythonVersion($pythonVersion)
  {
    $this->pythonVersion = $pythonVersion;
  }
  public function getPythonVersion()
  {
    return $this->pythonVersion;
  }
  public function setRuntimeVersion($runtimeVersion)
  {
    $this->runtimeVersion = $runtimeVersion;
  }
  public function getRuntimeVersion()
  {
    return $this->runtimeVersion;
  }
}
