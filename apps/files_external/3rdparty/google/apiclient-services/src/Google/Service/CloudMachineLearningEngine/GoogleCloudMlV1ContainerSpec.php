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

class Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ContainerSpec extends Google_Collection
{
  protected $collection_key = 'ports';
  public $args;
  public $command;
  protected $envType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1EnvVar';
  protected $envDataType = 'array';
  public $image;
  protected $portsType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ContainerPort';
  protected $portsDataType = 'array';

  public function setArgs($args)
  {
    $this->args = $args;
  }
  public function getArgs()
  {
    return $this->args;
  }
  public function setCommand($command)
  {
    $this->command = $command;
  }
  public function getCommand()
  {
    return $this->command;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1EnvVar[]
   */
  public function setEnv($env)
  {
    $this->env = $env;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1EnvVar[]
   */
  public function getEnv()
  {
    return $this->env;
  }
  public function setImage($image)
  {
    $this->image = $image;
  }
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ContainerPort[]
   */
  public function setPorts($ports)
  {
    $this->ports = $ports;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ContainerPort[]
   */
  public function getPorts()
  {
    return $this->ports;
  }
}
