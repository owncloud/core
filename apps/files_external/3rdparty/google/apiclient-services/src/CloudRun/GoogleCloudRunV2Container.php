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

namespace Google\Service\CloudRun;

class GoogleCloudRunV2Container extends \Google\Collection
{
  protected $collection_key = 'volumeMounts';
  /**
   * @var string[]
   */
  public $args;
  /**
   * @var string[]
   */
  public $command;
  protected $envType = GoogleCloudRunV2EnvVar::class;
  protected $envDataType = 'array';
  /**
   * @var string
   */
  public $image;
  /**
   * @var string
   */
  public $name;
  protected $portsType = GoogleCloudRunV2ContainerPort::class;
  protected $portsDataType = 'array';
  protected $resourcesType = GoogleCloudRunV2ResourceRequirements::class;
  protected $resourcesDataType = '';
  protected $volumeMountsType = GoogleCloudRunV2VolumeMount::class;
  protected $volumeMountsDataType = 'array';

  /**
   * @param string[]
   */
  public function setArgs($args)
  {
    $this->args = $args;
  }
  /**
   * @return string[]
   */
  public function getArgs()
  {
    return $this->args;
  }
  /**
   * @param string[]
   */
  public function setCommand($command)
  {
    $this->command = $command;
  }
  /**
   * @return string[]
   */
  public function getCommand()
  {
    return $this->command;
  }
  /**
   * @param GoogleCloudRunV2EnvVar[]
   */
  public function setEnv($env)
  {
    $this->env = $env;
  }
  /**
   * @return GoogleCloudRunV2EnvVar[]
   */
  public function getEnv()
  {
    return $this->env;
  }
  /**
   * @param string
   */
  public function setImage($image)
  {
    $this->image = $image;
  }
  /**
   * @return string
   */
  public function getImage()
  {
    return $this->image;
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
   * @param GoogleCloudRunV2ContainerPort[]
   */
  public function setPorts($ports)
  {
    $this->ports = $ports;
  }
  /**
   * @return GoogleCloudRunV2ContainerPort[]
   */
  public function getPorts()
  {
    return $this->ports;
  }
  /**
   * @param GoogleCloudRunV2ResourceRequirements
   */
  public function setResources(GoogleCloudRunV2ResourceRequirements $resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return GoogleCloudRunV2ResourceRequirements
   */
  public function getResources()
  {
    return $this->resources;
  }
  /**
   * @param GoogleCloudRunV2VolumeMount[]
   */
  public function setVolumeMounts($volumeMounts)
  {
    $this->volumeMounts = $volumeMounts;
  }
  /**
   * @return GoogleCloudRunV2VolumeMount[]
   */
  public function getVolumeMounts()
  {
    return $this->volumeMounts;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRunV2Container::class, 'Google_Service_CloudRun_GoogleCloudRunV2Container');
