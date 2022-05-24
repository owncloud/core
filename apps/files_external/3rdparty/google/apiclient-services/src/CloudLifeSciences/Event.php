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

namespace Google\Service\CloudLifeSciences;

class Event extends \Google\Model
{
  protected $containerKilledType = ContainerKilledEvent::class;
  protected $containerKilledDataType = '';
  protected $containerStartedType = ContainerStartedEvent::class;
  protected $containerStartedDataType = '';
  protected $containerStoppedType = ContainerStoppedEvent::class;
  protected $containerStoppedDataType = '';
  protected $delayedType = DelayedEvent::class;
  protected $delayedDataType = '';
  /**
   * @var string
   */
  public $description;
  protected $failedType = FailedEvent::class;
  protected $failedDataType = '';
  protected $pullStartedType = PullStartedEvent::class;
  protected $pullStartedDataType = '';
  protected $pullStoppedType = PullStoppedEvent::class;
  protected $pullStoppedDataType = '';
  /**
   * @var string
   */
  public $timestamp;
  protected $unexpectedExitStatusType = UnexpectedExitStatusEvent::class;
  protected $unexpectedExitStatusDataType = '';
  protected $workerAssignedType = WorkerAssignedEvent::class;
  protected $workerAssignedDataType = '';
  protected $workerReleasedType = WorkerReleasedEvent::class;
  protected $workerReleasedDataType = '';

  /**
   * @param ContainerKilledEvent
   */
  public function setContainerKilled(ContainerKilledEvent $containerKilled)
  {
    $this->containerKilled = $containerKilled;
  }
  /**
   * @return ContainerKilledEvent
   */
  public function getContainerKilled()
  {
    return $this->containerKilled;
  }
  /**
   * @param ContainerStartedEvent
   */
  public function setContainerStarted(ContainerStartedEvent $containerStarted)
  {
    $this->containerStarted = $containerStarted;
  }
  /**
   * @return ContainerStartedEvent
   */
  public function getContainerStarted()
  {
    return $this->containerStarted;
  }
  /**
   * @param ContainerStoppedEvent
   */
  public function setContainerStopped(ContainerStoppedEvent $containerStopped)
  {
    $this->containerStopped = $containerStopped;
  }
  /**
   * @return ContainerStoppedEvent
   */
  public function getContainerStopped()
  {
    return $this->containerStopped;
  }
  /**
   * @param DelayedEvent
   */
  public function setDelayed(DelayedEvent $delayed)
  {
    $this->delayed = $delayed;
  }
  /**
   * @return DelayedEvent
   */
  public function getDelayed()
  {
    return $this->delayed;
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
   * @param FailedEvent
   */
  public function setFailed(FailedEvent $failed)
  {
    $this->failed = $failed;
  }
  /**
   * @return FailedEvent
   */
  public function getFailed()
  {
    return $this->failed;
  }
  /**
   * @param PullStartedEvent
   */
  public function setPullStarted(PullStartedEvent $pullStarted)
  {
    $this->pullStarted = $pullStarted;
  }
  /**
   * @return PullStartedEvent
   */
  public function getPullStarted()
  {
    return $this->pullStarted;
  }
  /**
   * @param PullStoppedEvent
   */
  public function setPullStopped(PullStoppedEvent $pullStopped)
  {
    $this->pullStopped = $pullStopped;
  }
  /**
   * @return PullStoppedEvent
   */
  public function getPullStopped()
  {
    return $this->pullStopped;
  }
  /**
   * @param string
   */
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  /**
   * @return string
   */
  public function getTimestamp()
  {
    return $this->timestamp;
  }
  /**
   * @param UnexpectedExitStatusEvent
   */
  public function setUnexpectedExitStatus(UnexpectedExitStatusEvent $unexpectedExitStatus)
  {
    $this->unexpectedExitStatus = $unexpectedExitStatus;
  }
  /**
   * @return UnexpectedExitStatusEvent
   */
  public function getUnexpectedExitStatus()
  {
    return $this->unexpectedExitStatus;
  }
  /**
   * @param WorkerAssignedEvent
   */
  public function setWorkerAssigned(WorkerAssignedEvent $workerAssigned)
  {
    $this->workerAssigned = $workerAssigned;
  }
  /**
   * @return WorkerAssignedEvent
   */
  public function getWorkerAssigned()
  {
    return $this->workerAssigned;
  }
  /**
   * @param WorkerReleasedEvent
   */
  public function setWorkerReleased(WorkerReleasedEvent $workerReleased)
  {
    $this->workerReleased = $workerReleased;
  }
  /**
   * @return WorkerReleasedEvent
   */
  public function getWorkerReleased()
  {
    return $this->workerReleased;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Event::class, 'Google_Service_CloudLifeSciences_Event');
