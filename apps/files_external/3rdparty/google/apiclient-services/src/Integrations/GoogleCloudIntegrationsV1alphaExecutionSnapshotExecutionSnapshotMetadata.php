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

namespace Google\Service\Integrations;

class GoogleCloudIntegrationsV1alphaExecutionSnapshotExecutionSnapshotMetadata extends \Google\Model
{
  /**
   * @var int
   */
  public $executionAttempt;
  /**
   * @var string
   */
  public $task;
  /**
   * @var int
   */
  public $taskAttempt;
  /**
   * @var string
   */
  public $taskNumber;

  /**
   * @param int
   */
  public function setExecutionAttempt($executionAttempt)
  {
    $this->executionAttempt = $executionAttempt;
  }
  /**
   * @return int
   */
  public function getExecutionAttempt()
  {
    return $this->executionAttempt;
  }
  /**
   * @param string
   */
  public function setTask($task)
  {
    $this->task = $task;
  }
  /**
   * @return string
   */
  public function getTask()
  {
    return $this->task;
  }
  /**
   * @param int
   */
  public function setTaskAttempt($taskAttempt)
  {
    $this->taskAttempt = $taskAttempt;
  }
  /**
   * @return int
   */
  public function getTaskAttempt()
  {
    return $this->taskAttempt;
  }
  /**
   * @param string
   */
  public function setTaskNumber($taskNumber)
  {
    $this->taskNumber = $taskNumber;
  }
  /**
   * @return string
   */
  public function getTaskNumber()
  {
    return $this->taskNumber;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaExecutionSnapshotExecutionSnapshotMetadata::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaExecutionSnapshotExecutionSnapshotMetadata');
