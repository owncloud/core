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

namespace Google\Service\CloudTasks;

class Task extends \Google\Model
{
  protected $appEngineHttpRequestType = AppEngineHttpRequest::class;
  protected $appEngineHttpRequestDataType = '';
  public $createTime;
  public $dispatchCount;
  public $dispatchDeadline;
  protected $firstAttemptType = Attempt::class;
  protected $firstAttemptDataType = '';
  protected $httpRequestType = HttpRequest::class;
  protected $httpRequestDataType = '';
  protected $lastAttemptType = Attempt::class;
  protected $lastAttemptDataType = '';
  public $name;
  public $responseCount;
  public $scheduleTime;
  public $view;

  /**
   * @param AppEngineHttpRequest
   */
  public function setAppEngineHttpRequest(AppEngineHttpRequest $appEngineHttpRequest)
  {
    $this->appEngineHttpRequest = $appEngineHttpRequest;
  }
  /**
   * @return AppEngineHttpRequest
   */
  public function getAppEngineHttpRequest()
  {
    return $this->appEngineHttpRequest;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDispatchCount($dispatchCount)
  {
    $this->dispatchCount = $dispatchCount;
  }
  public function getDispatchCount()
  {
    return $this->dispatchCount;
  }
  public function setDispatchDeadline($dispatchDeadline)
  {
    $this->dispatchDeadline = $dispatchDeadline;
  }
  public function getDispatchDeadline()
  {
    return $this->dispatchDeadline;
  }
  /**
   * @param Attempt
   */
  public function setFirstAttempt(Attempt $firstAttempt)
  {
    $this->firstAttempt = $firstAttempt;
  }
  /**
   * @return Attempt
   */
  public function getFirstAttempt()
  {
    return $this->firstAttempt;
  }
  /**
   * @param HttpRequest
   */
  public function setHttpRequest(HttpRequest $httpRequest)
  {
    $this->httpRequest = $httpRequest;
  }
  /**
   * @return HttpRequest
   */
  public function getHttpRequest()
  {
    return $this->httpRequest;
  }
  /**
   * @param Attempt
   */
  public function setLastAttempt(Attempt $lastAttempt)
  {
    $this->lastAttempt = $lastAttempt;
  }
  /**
   * @return Attempt
   */
  public function getLastAttempt()
  {
    return $this->lastAttempt;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setResponseCount($responseCount)
  {
    $this->responseCount = $responseCount;
  }
  public function getResponseCount()
  {
    return $this->responseCount;
  }
  public function setScheduleTime($scheduleTime)
  {
    $this->scheduleTime = $scheduleTime;
  }
  public function getScheduleTime()
  {
    return $this->scheduleTime;
  }
  public function setView($view)
  {
    $this->view = $view;
  }
  public function getView()
  {
    return $this->view;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Task::class, 'Google_Service_CloudTasks_Task');
