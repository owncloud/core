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

namespace Google\Service\CloudDeploy;

class Job extends \Google\Model
{
  protected $deployJobType = DeployJob::class;
  protected $deployJobDataType = '';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $jobRun;
  /**
   * @var string
   */
  public $state;
  protected $verifyJobType = VerifyJob::class;
  protected $verifyJobDataType = '';

  /**
   * @param DeployJob
   */
  public function setDeployJob(DeployJob $deployJob)
  {
    $this->deployJob = $deployJob;
  }
  /**
   * @return DeployJob
   */
  public function getDeployJob()
  {
    return $this->deployJob;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setJobRun($jobRun)
  {
    $this->jobRun = $jobRun;
  }
  /**
   * @return string
   */
  public function getJobRun()
  {
    return $this->jobRun;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param VerifyJob
   */
  public function setVerifyJob(VerifyJob $verifyJob)
  {
    $this->verifyJob = $verifyJob;
  }
  /**
   * @return VerifyJob
   */
  public function getVerifyJob()
  {
    return $this->verifyJob;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Job::class, 'Google_Service_CloudDeploy_Job');
