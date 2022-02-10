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

namespace Google\Service\Dataflow;

class CreateJobFromTemplateRequest extends \Google\Model
{
  protected $environmentType = RuntimeEnvironment::class;
  protected $environmentDataType = '';
  /**
   * @var string
   */
  public $gcsPath;
  /**
   * @var string
   */
  public $jobName;
  /**
   * @var string
   */
  public $location;
  /**
   * @var string[]
   */
  public $parameters;

  /**
   * @param RuntimeEnvironment
   */
  public function setEnvironment(RuntimeEnvironment $environment)
  {
    $this->environment = $environment;
  }
  /**
   * @return RuntimeEnvironment
   */
  public function getEnvironment()
  {
    return $this->environment;
  }
  /**
   * @param string
   */
  public function setGcsPath($gcsPath)
  {
    $this->gcsPath = $gcsPath;
  }
  /**
   * @return string
   */
  public function getGcsPath()
  {
    return $this->gcsPath;
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
   * @param string
   */
  public function setLocation($location)
  {
    $this->location = $location;
  }
  /**
   * @return string
   */
  public function getLocation()
  {
    return $this->location;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreateJobFromTemplateRequest::class, 'Google_Service_Dataflow_CreateJobFromTemplateRequest');
