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

class GoogleCloudDatapipelinesV1LaunchTemplateParameters extends \Google\Model
{
  protected $environmentType = GoogleCloudDatapipelinesV1RuntimeEnvironment::class;
  protected $environmentDataType = '';
  /**
   * @var string
   */
  public $jobName;
  /**
   * @var string[]
   */
  public $parameters;
  /**
   * @var string[]
   */
  public $transformNameMapping;
  /**
   * @var bool
   */
  public $update;

  /**
   * @param GoogleCloudDatapipelinesV1RuntimeEnvironment
   */
  public function setEnvironment(GoogleCloudDatapipelinesV1RuntimeEnvironment $environment)
  {
    $this->environment = $environment;
  }
  /**
   * @return GoogleCloudDatapipelinesV1RuntimeEnvironment
   */
  public function getEnvironment()
  {
    return $this->environment;
  }
  /**
   * @param string
   */
  public function setJobName($jobName)
  {
    $this->jobName = $jobName;
  }
  /**
   * @return string
   */
  public function getJobName()
  {
    return $this->jobName;
  }
  /**
   * @param string[]
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return string[]
   */
  public function getParameters()
  {
    return $this->parameters;
  }
  /**
   * @param string[]
   */
  public function setTransformNameMapping($transformNameMapping)
  {
    $this->transformNameMapping = $transformNameMapping;
  }
  /**
   * @return string[]
   */
  public function getTransformNameMapping()
  {
    return $this->transformNameMapping;
  }
  /**
   * @param bool
   */
  public function setUpdate($update)
  {
    $this->update = $update;
  }
  /**
   * @return bool
   */
  public function getUpdate()
  {
    return $this->update;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatapipelinesV1LaunchTemplateParameters::class, 'Google_Service_Datapipelines_GoogleCloudDatapipelinesV1LaunchTemplateParameters');
