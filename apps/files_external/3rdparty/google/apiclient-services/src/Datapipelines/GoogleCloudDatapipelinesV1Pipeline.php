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

namespace Google\Service\Datapipelines;

class GoogleCloudDatapipelinesV1Pipeline extends \Google\Model
{
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var int
   */
  public $jobCount;
  /**
   * @var string
   */
  public $lastUpdateTime;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $pipelineSources;
  protected $scheduleInfoType = GoogleCloudDatapipelinesV1ScheduleSpec::class;
  protected $scheduleInfoDataType = '';
  /**
   * @var string
   */
  public $schedulerServiceAccountEmail;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $type;
  protected $workloadType = GoogleCloudDatapipelinesV1Workload::class;
  protected $workloadDataType = '';

  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param int
   */
  public function setJobCount($jobCount)
  {
    $this->jobCount = $jobCount;
  }
  /**
   * @return int
   */
  public function getJobCount()
  {
    return $this->jobCount;
  }
  /**
   * @param string
   */
  public function setLastUpdateTime($lastUpdateTime)
  {
    $this->lastUpdateTime = $lastUpdateTime;
  }
  /**
   * @return string
   */
  public function getLastUpdateTime()
  {
    return $this->lastUpdateTime;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string[]
   */
  public function setPipelineSources($pipelineSources)
  {
    $this->pipelineSources = $pipelineSources;
  }
  /**
   * @return string[]
   */
  public function getPipelineSources()
  {
    return $this->pipelineSources;
  }
  /**
   * @param GoogleCloudDatapipelinesV1ScheduleSpec
   */
  public function setScheduleInfo(GoogleCloudDatapipelinesV1ScheduleSpec $scheduleInfo)
  {
    $this->scheduleInfo = $scheduleInfo;
  }
  /**
   * @return GoogleCloudDatapipelinesV1ScheduleSpec
   */
  public function getScheduleInfo()
  {
    return $this->scheduleInfo;
  }
  /**
   * @param string
   */
  public function setSchedulerServiceAccountEmail($schedulerServiceAccountEmail)
  {
    $this->schedulerServiceAccountEmail = $schedulerServiceAccountEmail;
  }
  /**
   * @return string
   */
  public function getSchedulerServiceAccountEmail()
  {
    return $this->schedulerServiceAccountEmail;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param GoogleCloudDatapipelinesV1Workload
   */
  public function setWorkload(GoogleCloudDatapipelinesV1Workload $workload)
  {
    $this->workload = $workload;
  }
  /**
   * @return GoogleCloudDatapipelinesV1Workload
   */
  public function getWorkload()
  {
    return $this->workload;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatapipelinesV1Pipeline::class, 'Google_Service_Datapipelines_GoogleCloudDatapipelinesV1Pipeline');
