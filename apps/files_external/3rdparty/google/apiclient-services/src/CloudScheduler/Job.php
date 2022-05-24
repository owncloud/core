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
  /**
   * @var string
   */
  public $attemptDeadline;
  /**
   * @var string
   */
  public $description;
  protected $httpTargetType = HttpTarget::class;
  protected $httpTargetDataType = '';
  /**
   * @var string
   */
  public $lastAttemptTime;
  /**
   * @var string
   */
  public $name;
  protected $pubsubTargetType = PubsubTarget::class;
  protected $pubsubTargetDataType = '';
  protected $retryConfigType = RetryConfig::class;
  protected $retryConfigDataType = '';
  /**
   * @var string
   */
  public $schedule;
  /**
   * @var string
   */
  public $scheduleTime;
  /**
   * @var string
   */
  public $state;
  protected $statusType = Status::class;
  protected $statusDataType = '';
  /**
   * @var string
   */
  public $timeZone;
  /**
   * @var string
   */
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
  /**
   * @param string
   */
  public function setAttemptDeadline($attemptDeadline)
  {
    $this->attemptDeadline = $attemptDeadline;
  }
  /**
   * @return string
   */
  public function getAttemptDeadline()
  {
    return $this->attemptDeadline;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setLastAttemptTime($lastAttemptTime)
  {
    $this->lastAttemptTime = $lastAttemptTime;
  }
  /**
   * @return string
   */
  public function getLastAttemptTime()
  {
    return $this->lastAttemptTime;
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
  /**
   * @param string
   */
  public function setSchedule($schedule)
  {
    $this->schedule = $schedule;
  }
  /**
   * @return string
   */
  public function getSchedule()
  {
    return $this->schedule;
  }
  /**
   * @param string
   */
  public function setScheduleTime($scheduleTime)
  {
    $this->scheduleTime = $scheduleTime;
  }
  /**
   * @return string
   */
  public function getScheduleTime()
  {
    return $this->scheduleTime;
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
  /**
   * @param string
   */
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  /**
   * @return string
   */
  public function getTimeZone()
  {
    return $this->timeZone;
  }
  /**
   * @param string
   */
  public function setUserUpdateTime($userUpdateTime)
  {
    $this->userUpdateTime = $userUpdateTime;
  }
  /**
   * @return string
   */
  public function getUserUpdateTime()
  {
    return $this->userUpdateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Job::class, 'Google_Service_CloudScheduler_Job');
