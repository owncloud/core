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

namespace Google\Service\Contentwarehouse;

class ResearchScamOnlineSearchLatencyStats extends \Google\Model
{
  public $cpuTime;
  /**
   * @var int
   */
  public $taskId;
  public $wallTime;

  public function setCpuTime($cpuTime)
  {
    $this->cpuTime = $cpuTime;
  }
  public function getCpuTime()
  {
    return $this->cpuTime;
  }
  /**
   * @param int
   */
  public function setTaskId($taskId)
  {
    $this->taskId = $taskId;
  }
  /**
   * @return int
   */
  public function getTaskId()
  {
    return $this->taskId;
  }
  public function setWallTime($wallTime)
  {
    $this->wallTime = $wallTime;
  }
  public function getWallTime()
  {
    return $this->wallTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResearchScamOnlineSearchLatencyStats::class, 'Google_Service_Contentwarehouse_ResearchScamOnlineSearchLatencyStats');
