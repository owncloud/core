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

namespace Google\Service\AIPlatformNotebooks;

class Schedule extends \Google\Collection
{
  protected $collection_key = 'recentExecutions';
  public $createTime;
  public $cronSchedule;
  public $description;
  public $displayName;
  protected $executionTemplateType = ExecutionTemplate::class;
  protected $executionTemplateDataType = '';
  public $name;
  protected $recentExecutionsType = Execution::class;
  protected $recentExecutionsDataType = 'array';
  public $state;
  public $timeZone;
  public $updateTime;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setCronSchedule($cronSchedule)
  {
    $this->cronSchedule = $cronSchedule;
  }
  public function getCronSchedule()
  {
    return $this->cronSchedule;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param ExecutionTemplate
   */
  public function setExecutionTemplate(ExecutionTemplate $executionTemplate)
  {
    $this->executionTemplate = $executionTemplate;
  }
  /**
   * @return ExecutionTemplate
   */
  public function getExecutionTemplate()
  {
    return $this->executionTemplate;
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
   * @param Execution[]
   */
  public function setRecentExecutions($recentExecutions)
  {
    $this->recentExecutions = $recentExecutions;
  }
  /**
   * @return Execution[]
   */
  public function getRecentExecutions()
  {
    return $this->recentExecutions;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone()
  {
    return $this->timeZone;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Schedule::class, 'Google_Service_AIPlatformNotebooks_Schedule');
