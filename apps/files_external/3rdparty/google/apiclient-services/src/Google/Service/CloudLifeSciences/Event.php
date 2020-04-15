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

class Google_Service_CloudLifeSciences_Event extends Google_Model
{
  protected $containerKilledType = 'Google_Service_CloudLifeSciences_ContainerKilledEvent';
  protected $containerKilledDataType = '';
  protected $containerStartedType = 'Google_Service_CloudLifeSciences_ContainerStartedEvent';
  protected $containerStartedDataType = '';
  protected $containerStoppedType = 'Google_Service_CloudLifeSciences_ContainerStoppedEvent';
  protected $containerStoppedDataType = '';
  protected $delayedType = 'Google_Service_CloudLifeSciences_DelayedEvent';
  protected $delayedDataType = '';
  public $description;
  protected $failedType = 'Google_Service_CloudLifeSciences_FailedEvent';
  protected $failedDataType = '';
  protected $pullStartedType = 'Google_Service_CloudLifeSciences_PullStartedEvent';
  protected $pullStartedDataType = '';
  protected $pullStoppedType = 'Google_Service_CloudLifeSciences_PullStoppedEvent';
  protected $pullStoppedDataType = '';
  public $timestamp;
  protected $unexpectedExitStatusType = 'Google_Service_CloudLifeSciences_UnexpectedExitStatusEvent';
  protected $unexpectedExitStatusDataType = '';
  protected $workerAssignedType = 'Google_Service_CloudLifeSciences_WorkerAssignedEvent';
  protected $workerAssignedDataType = '';
  protected $workerReleasedType = 'Google_Service_CloudLifeSciences_WorkerReleasedEvent';
  protected $workerReleasedDataType = '';

  /**
   * @param Google_Service_CloudLifeSciences_ContainerKilledEvent
   */
  public function setContainerKilled(Google_Service_CloudLifeSciences_ContainerKilledEvent $containerKilled)
  {
    $this->containerKilled = $containerKilled;
  }
  /**
   * @return Google_Service_CloudLifeSciences_ContainerKilledEvent
   */
  public function getContainerKilled()
  {
    return $this->containerKilled;
  }
  /**
   * @param Google_Service_CloudLifeSciences_ContainerStartedEvent
   */
  public function setContainerStarted(Google_Service_CloudLifeSciences_ContainerStartedEvent $containerStarted)
  {
    $this->containerStarted = $containerStarted;
  }
  /**
   * @return Google_Service_CloudLifeSciences_ContainerStartedEvent
   */
  public function getContainerStarted()
  {
    return $this->containerStarted;
  }
  /**
   * @param Google_Service_CloudLifeSciences_ContainerStoppedEvent
   */
  public function setContainerStopped(Google_Service_CloudLifeSciences_ContainerStoppedEvent $containerStopped)
  {
    $this->containerStopped = $containerStopped;
  }
  /**
   * @return Google_Service_CloudLifeSciences_ContainerStoppedEvent
   */
  public function getContainerStopped()
  {
    return $this->containerStopped;
  }
  /**
   * @param Google_Service_CloudLifeSciences_DelayedEvent
   */
  public function setDelayed(Google_Service_CloudLifeSciences_DelayedEvent $delayed)
  {
    $this->delayed = $delayed;
  }
  /**
   * @return Google_Service_CloudLifeSciences_DelayedEvent
   */
  public function getDelayed()
  {
    return $this->delayed;
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
   * @param Google_Service_CloudLifeSciences_FailedEvent
   */
  public function setFailed(Google_Service_CloudLifeSciences_FailedEvent $failed)
  {
    $this->failed = $failed;
  }
  /**
   * @return Google_Service_CloudLifeSciences_FailedEvent
   */
  public function getFailed()
  {
    return $this->failed;
  }
  /**
   * @param Google_Service_CloudLifeSciences_PullStartedEvent
   */
  public function setPullStarted(Google_Service_CloudLifeSciences_PullStartedEvent $pullStarted)
  {
    $this->pullStarted = $pullStarted;
  }
  /**
   * @return Google_Service_CloudLifeSciences_PullStartedEvent
   */
  public function getPullStarted()
  {
    return $this->pullStarted;
  }
  /**
   * @param Google_Service_CloudLifeSciences_PullStoppedEvent
   */
  public function setPullStopped(Google_Service_CloudLifeSciences_PullStoppedEvent $pullStopped)
  {
    $this->pullStopped = $pullStopped;
  }
  /**
   * @return Google_Service_CloudLifeSciences_PullStoppedEvent
   */
  public function getPullStopped()
  {
    return $this->pullStopped;
  }
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  public function getTimestamp()
  {
    return $this->timestamp;
  }
  /**
   * @param Google_Service_CloudLifeSciences_UnexpectedExitStatusEvent
   */
  public function setUnexpectedExitStatus(Google_Service_CloudLifeSciences_UnexpectedExitStatusEvent $unexpectedExitStatus)
  {
    $this->unexpectedExitStatus = $unexpectedExitStatus;
  }
  /**
   * @return Google_Service_CloudLifeSciences_UnexpectedExitStatusEvent
   */
  public function getUnexpectedExitStatus()
  {
    return $this->unexpectedExitStatus;
  }
  /**
   * @param Google_Service_CloudLifeSciences_WorkerAssignedEvent
   */
  public function setWorkerAssigned(Google_Service_CloudLifeSciences_WorkerAssignedEvent $workerAssigned)
  {
    $this->workerAssigned = $workerAssigned;
  }
  /**
   * @return Google_Service_CloudLifeSciences_WorkerAssignedEvent
   */
  public function getWorkerAssigned()
  {
    return $this->workerAssigned;
  }
  /**
   * @param Google_Service_CloudLifeSciences_WorkerReleasedEvent
   */
  public function setWorkerReleased(Google_Service_CloudLifeSciences_WorkerReleasedEvent $workerReleased)
  {
    $this->workerReleased = $workerReleased;
  }
  /**
   * @return Google_Service_CloudLifeSciences_WorkerReleasedEvent
   */
  public function getWorkerReleased()
  {
    return $this->workerReleased;
  }
}
