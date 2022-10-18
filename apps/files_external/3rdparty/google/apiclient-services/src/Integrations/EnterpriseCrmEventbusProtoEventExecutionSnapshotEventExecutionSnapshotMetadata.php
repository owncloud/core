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

class EnterpriseCrmEventbusProtoEventExecutionSnapshotEventExecutionSnapshotMetadata extends \Google\Model
{
  /**
   * @var int
   */
  public $eventAttemptNum;
  /**
   * @var int
   */
  public $taskAttemptNum;
  /**
   * @var string
   */
  public $taskName;
  /**
   * @var string
   */
  public $taskNumber;

  /**
   * @param int
   */
  public function setEventAttemptNum($eventAttemptNum)
  {
    $this->eventAttemptNum = $eventAttemptNum;
  }
  /**
   * @return int
   */
  public function getEventAttemptNum()
  {
    return $this->eventAttemptNum;
  }
  /**
   * @param int
   */
  public function setTaskAttemptNum($taskAttemptNum)
  {
    $this->taskAttemptNum = $taskAttemptNum;
  }
  /**
   * @return int
   */
  public function getTaskAttemptNum()
  {
    return $this->taskAttemptNum;
  }
  /**
   * @param string
   */
  public function setTaskName($taskName)
  {
    $this->taskName = $taskName;
  }
  /**
   * @return string
   */
  public function getTaskName()
  {
    return $this->taskName;
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
class_alias(EnterpriseCrmEventbusProtoEventExecutionSnapshotEventExecutionSnapshotMetadata::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoEventExecutionSnapshotEventExecutionSnapshotMetadata');
