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

namespace Google\Service\CloudComposer;

class WorkloadsConfig extends \Google\Model
{
  protected $schedulerType = SchedulerResource::class;
  protected $schedulerDataType = '';
  protected $webServerType = WebServerResource::class;
  protected $webServerDataType = '';
  protected $workerType = WorkerResource::class;
  protected $workerDataType = '';

  /**
   * @param SchedulerResource
   */
  public function setScheduler(SchedulerResource $scheduler)
  {
    $this->scheduler = $scheduler;
  }
  /**
   * @return SchedulerResource
   */
  public function getScheduler()
  {
    return $this->scheduler;
  }
  /**
   * @param WebServerResource
   */
  public function setWebServer(WebServerResource $webServer)
  {
    $this->webServer = $webServer;
  }
  /**
   * @return WebServerResource
   */
  public function getWebServer()
  {
    return $this->webServer;
  }
  /**
   * @param WorkerResource
   */
  public function setWorker(WorkerResource $worker)
  {
    $this->worker = $worker;
  }
  /**
   * @return WorkerResource
   */
  public function getWorker()
  {
    return $this->worker;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WorkloadsConfig::class, 'Google_Service_CloudComposer_WorkloadsConfig');
