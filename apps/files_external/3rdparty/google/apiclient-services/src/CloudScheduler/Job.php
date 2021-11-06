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

namespace Google\Service\CloudScheduler;

class Job extends \Google\Model
{
  protected $appEngineHttpTargetType = AppEngineHttpTarget::class;
  protected $appEngineHttpTargetDataType = '';
  public $attemptDeadline;
  public $description;
  protected $httpTargetType = HttpTarget::class;
  protected $httpTargetDataType = '';
  public $lastAttemptTime;
  public $name;
  protected $pubsubTargetType = PubsubTarget::class;
  protected $pubsubTargetDataType = '';
  protected $retryConfigType = RetryConfig::class;
  protected $retryConfigDataType = '';
  public $schedule;
  public $scheduleTime;
  public $state;
  protected $statusType = Status::class;
  protected $statusDataType = '';
  public $timeZone;
  public $userUpdateTime;

  /**
   * @param AppEngineHttpTarget
   */
  public function setAppEngineHttpTarget(AppEngineHttpTarget $appEngineHttpTarget)
  {
    $this->appEngineHttpTarget = $appEngineHttpTarget;
  }
  /**
   * @return AppEngineHttpTarget
   */
  public function getAppEngineHttpTarget()
  {
    return $this->appEngineHttpTarget;
  }
  public function setAttemptDeadline($attemptDeadline)
  {
    $this->attemptDeadline = $attemptDeadline;
  }
  public function getAttemptDeadline()
  {
    return $this->attemptDeadline;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param HttpTarget
   */
  public function setHttpTarget(HttpTarget $httpTarget)
  {
    $this->httpTarget = $httpTarget;
  }
  /**
   * @return HttpTarget
   */
  public function getHttpTarget()
  {
    return $this->httpTarget;
  }
  public function setLastAttemptTime($lastAttemptTime)
  {
    $this->lastAttemptTime = $lastAttemptTime;
  }
  public function getLastAttemptTime()
  {
    return $this->lastAttemptTime;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param PubsubTarget
   */
  public function setPubsubTarget(PubsubTarget $pubsubTarget)
  {
    $this->pubsubTarget = $pubsubTarget;
  }
  /**
   * @return PubsubTarget
   */
  public function getPubsubTarget()
  {
    return $this->pubsubTarget;
  }
  /**
   * @param RetryConfig
   */
  public function setRetryConfig(RetryConfig $retryConfig)
  {
    $this->retryConfig = $retryConfig;
  }
  /**
   * @return RetryConfig
   */
  public function getRetryConfig()
  {
    return $this->retryConfig;
  }
  public function setSchedule($schedule)
  {
    $this->schedule = $schedule;
  }
  public function getSchedule()
  {
    return $this->schedule;
  }
  public function setScheduleTime($scheduleTime)
  {
    $this->scheduleTime = $scheduleTime;
  }
  public function getScheduleTime()
  {
    return $this->scheduleTime;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param Status
   */
  public function setStatus(Status $status)
  {
    $this->status = $status;
  }
  /**
   * @return Status
   */
  public function getStatus()
  {
    return $this->status;
  }
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone()
  {
    return $this->timeZone;
  }
  public function setUserUpdateTime($userUpdateTime)
  {
    $this->userUpdateTime = $userUpdateTime;
  }
  public function getUserUpdateTime()
  {
    return $this->userUpdateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Job::class, 'Google_Service_CloudScheduler_Job');
