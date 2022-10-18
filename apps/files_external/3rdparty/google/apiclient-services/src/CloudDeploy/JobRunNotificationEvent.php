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

class JobRunNotificationEvent extends \Google\Model
{
  /**
   * @var string
   */
  public $jobRun;
  /**
   * @var string
   */
  public $message;
  /**
   * @var string
   */
  public $pipelineUid;
  /**
   * @var string
   */
  public $releaseUid;
  /**
   * @var string
   */
  public $rolloutUid;
  /**
   * @var string
   */
  public $targetId;
  /**
   * @var string
   */
  public $type;

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
  public function setMessage($message)
  {
    $this->message = $message;
  }
  /**
   * @return string
   */
  public function getMessage()
  {
    return $this->message;
  }
  /**
   * @param string
   */
  public function setPipelineUid($pipelineUid)
  {
    $this->pipelineUid = $pipelineUid;
  }
  /**
   * @return string
   */
  public function getPipelineUid()
  {
    return $this->pipelineUid;
  }
  /**
   * @param string
   */
  public function setReleaseUid($releaseUid)
  {
    $this->releaseUid = $releaseUid;
  }
  /**
   * @return string
   */
  public function getReleaseUid()
  {
    return $this->releaseUid;
  }
  /**
   * @param string
   */
  public function setRolloutUid($rolloutUid)
  {
    $this->rolloutUid = $rolloutUid;
  }
  /**
   * @return string
   */
  public function getRolloutUid()
  {
    return $this->rolloutUid;
  }
  /**
   * @param string
   */
  public function setTargetId($targetId)
  {
    $this->targetId = $targetId;
  }
  /**
   * @return string
   */
  public function getTargetId()
  {
    return $this->targetId;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(JobRunNotificationEvent::class, 'Google_Service_CloudDeploy_JobRunNotificationEvent');
