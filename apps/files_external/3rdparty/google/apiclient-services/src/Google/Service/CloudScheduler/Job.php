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

class Google_Service_CloudScheduler_Job extends Google_Model
{
  protected $appEngineHttpTargetType = 'Google_Service_CloudScheduler_AppEngineHttpTarget';
  protected $appEngineHttpTargetDataType = '';
  public $attemptDeadline;
  public $description;
  protected $httpTargetType = 'Google_Service_CloudScheduler_HttpTarget';
  protected $httpTargetDataType = '';
  public $lastAttemptTime;
  public $name;
  protected $pubsubTargetType = 'Google_Service_CloudScheduler_PubsubTarget';
  protected $pubsubTargetDataType = '';
  protected $retryConfigType = 'Google_Service_CloudScheduler_RetryConfig';
  protected $retryConfigDataType = '';
  public $schedule;
  public $scheduleTime;
  public $state;
  protected $statusType = 'Google_Service_CloudScheduler_Status';
  protected $statusDataType = '';
  public $timeZone;
  public $userUpdateTime;

  /**
   * @param Google_Service_CloudScheduler_AppEngineHttpTarget
   */
  public function setAppEngineHttpTarget(Google_Service_CloudScheduler_AppEngineHttpTarget $appEngineHttpTarget)
  {
    $this->appEngineHttpTarget = $appEngineHttpTarget;
  }
  /**
   * @return Google_Service_CloudScheduler_AppEngineHttpTarget
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
   * @param Google_Service_CloudScheduler_HttpTarget
   */
  public function setHttpTarget(Google_Service_CloudScheduler_HttpTarget $httpTarget)
  {
    $this->httpTarget = $httpTarget;
  }
  /**
   * @return Google_Service_CloudScheduler_HttpTarget
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
   * @param Google_Service_CloudScheduler_PubsubTarget
   */
  public function setPubsubTarget(Google_Service_CloudScheduler_PubsubTarget $pubsubTarget)
  {
    $this->pubsubTarget = $pubsubTarget;
  }
  /**
   * @return Google_Service_CloudScheduler_PubsubTarget
   */
  public function getPubsubTarget()
  {
    return $this->pubsubTarget;
  }
  /**
   * @param Google_Service_CloudScheduler_RetryConfig
   */
  public function setRetryConfig(Google_Service_CloudScheduler_RetryConfig $retryConfig)
  {
    $this->retryConfig = $retryConfig;
  }
  /**
   * @return Google_Service_CloudScheduler_RetryConfig
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
   * @param Google_Service_CloudScheduler_Status
   */
  public function setStatus(Google_Service_CloudScheduler_Status $status)
  {
    $this->status = $status;
  }
  /**
   * @return Google_Service_CloudScheduler_Status
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
