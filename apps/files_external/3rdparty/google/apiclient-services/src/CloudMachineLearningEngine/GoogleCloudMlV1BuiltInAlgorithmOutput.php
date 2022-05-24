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

namespace Google\Service\CloudMachineLearningEngine;

class GoogleCloudMlV1BuiltInAlgorithmOutput extends \Google\Model
{
  /**
   * @var string
   */
  public $framework;
  /**
   * @var string
   */
  public $modelPath;
  /**
   * @var string
   */
  public $pythonVersion;
  /**
   * @var string
   */
  public $runtimeVersion;

  /**
   * @param string
   */
  public function setFramework($framework)
  {
    $this->framework = $framework;
  }
  /**
   * @return string
   */
  public function getFramework()
  {
    return $this->framework;
  }
  /**
   * @param string
   */
  public function setModelPath($modelPath)
  {
    $this->modelPath = $modelPath;
  }
  /**
   * @return string
   */
  public function getModelPath()
  {
    return $this->modelPath;
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
   * @param string
   */
  public function setRuntimeVersion($runtimeVersion)
  {
    $this->runtimeVersion = $runtimeVersion;
  }
  /**
   * @return string
   */
  public function getRuntimeVersion()
  {
    return $this->runtimeVersion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1BuiltInAlgorithmOutput::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1BuiltInAlgorithmOutput');
