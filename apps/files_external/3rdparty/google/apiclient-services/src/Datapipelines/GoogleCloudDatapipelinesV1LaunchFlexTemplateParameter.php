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

namespace Google\Service\Datapipelines;

class GoogleCloudDatapipelinesV1LaunchFlexTemplateParameter extends \Google\Model
{
  public $containerSpecGcsPath;
  protected $environmentType = GoogleCloudDatapipelinesV1FlexTemplateRuntimeEnvironment::class;
  protected $environmentDataType = '';
  public $jobName;
  public $launchOptions;
  public $parameters;
  public $transformNameMappings;
  public $update;

  public function setContainerSpecGcsPath($containerSpecGcsPath)
  {
    $this->containerSpecGcsPath = $containerSpecGcsPath;
  }
  public function getContainerSpecGcsPath()
  {
    return $this->containerSpecGcsPath;
  }
  /**
   * @param GoogleCloudDatapipelinesV1FlexTemplateRuntimeEnvironment
   */
  public function setEnvironment(GoogleCloudDatapipelinesV1FlexTemplateRuntimeEnvironment $environment)
  {
    $this->environment = $environment;
  }
  /**
   * @return GoogleCloudDatapipelinesV1FlexTemplateRuntimeEnvironment
   */
  public function getEnvironment()
  {
    return $this->environment;
  }
  public function setJobName($jobName)
  {
    $this->jobName = $jobName;
  }
  public function getJobName()
  {
    return $this->jobName;
  }
  public function setLaunchOptions($launchOptions)
  {
    $this->launchOptions = $launchOptions;
  }
  public function getLaunchOptions()
  {
    return $this->launchOptions;
  }
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  public function getParameters()
  {
    return $this->parameters;
  }
  public function setTransformNameMappings($transformNameMappings)
  {
    $this->transformNameMappings = $transformNameMappings;
  }
  public function getTransformNameMappings()
  {
    return $this->transformNameMappings;
  }
  public function setUpdate($update)
  {
    $this->update = $update;
  }
  public function getUpdate()
  {
    return $this->update;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatapipelinesV1LaunchFlexTemplateParameter::class, 'Google_Service_Datapipelines_GoogleCloudDatapipelinesV1LaunchFlexTemplateParameter');
