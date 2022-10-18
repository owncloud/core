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

class GoogleCloudIntegrationsV1alphaTaskExecutionDetails extends \Google\Collection
{
  protected $collection_key = 'taskAttemptStats';
  protected $taskAttemptStatsType = GoogleCloudIntegrationsV1alphaAttemptStats::class;
  protected $taskAttemptStatsDataType = 'array';
  /**
   * @var string
   */
  public $taskExecutionState;
  /**
   * @var string
   */
  public $taskNumber;

  /**
   * @param GoogleCloudIntegrationsV1alphaAttemptStats[]
   */
  public function setTaskAttemptStats($taskAttemptStats)
  {
    $this->taskAttemptStats = $taskAttemptStats;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaAttemptStats[]
   */
  public function getTaskAttemptStats()
  {
    return $this->taskAttemptStats;
  }
  /**
   * @param string
   */
  public function setTaskExecutionState($taskExecutionState)
  {
    $this->taskExecutionState = $taskExecutionState;
  }
  /**
   * @return string
   */
  public function getTaskExecutionState()
  {
    return $this->taskExecutionState;
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
class_alias(GoogleCloudIntegrationsV1alphaTaskExecutionDetails::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaTaskExecutionDetails');
