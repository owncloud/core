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

class JobRun extends \Google\Model
{
  /**
   * @var string
   */
  public $createTime;
  protected $deployJobRunType = DeployJobRun::class;
  protected $deployJobRunDataType = '';
  /**
   * @var string
   */
  public $endTime;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $jobId;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $phaseId;
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $uid;
  protected $verifyJobRunType = VerifyJobRun::class;
  protected $verifyJobRunDataType = '';

  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param DeployJobRun
   */
  public function setDeployJobRun(DeployJobRun $deployJobRun)
  {
    $this->deployJobRun = $deployJobRun;
  }
  /**
   * @return DeployJobRun
   */
  public function getDeployJobRun()
  {
    return $this->deployJobRun;
  }
  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string
   */
  public function setJobId($jobId)
  {
    $this->jobId = $jobId;
  }
  /**
   * @return string
   */
  public function getJobId()
  {
    return $this->jobId;
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
   * @param string
   */
  public function setPhaseId($phaseId)
  {
    $this->phaseId = $phaseId;
  }
  /**
   * @return string
   */
  public function getPhaseId()
  {
    return $this->phaseId;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
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
   * @param string
   */
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  /**
   * @return string
   */
  public function getUid()
  {
    return $this->uid;
  }
  /**
   * @param VerifyJobRun
   */
  public function setVerifyJobRun(VerifyJobRun $verifyJobRun)
  {
    $this->verifyJobRun = $verifyJobRun;
  }
  /**
   * @return VerifyJobRun
   */
  public function getVerifyJobRun()
  {
    return $this->verifyJobRun;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(JobRun::class, 'Google_Service_CloudDeploy_JobRun');
