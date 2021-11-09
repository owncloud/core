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
  public $createTime;
  public $displayName;
  public $jobCount;
  public $lastUpdateTime;
  public $name;
  protected $scheduleInfoType = GoogleCloudDatapipelinesV1ScheduleSpec::class;
  protected $scheduleInfoDataType = '';
  public $schedulerServiceAccountEmail;
  public $state;
  public $type;
  protected $workloadType = GoogleCloudDatapipelinesV1Workload::class;
  protected $workloadDataType = '';

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setJobCount($jobCount)
  {
    $this->jobCount = $jobCount;
  }
  public function getJobCount()
  {
    return $this->jobCount;
  }
  public function setLastUpdateTime($lastUpdateTime)
  {
    $this->lastUpdateTime = $lastUpdateTime;
  }
  public function getLastUpdateTime()
  {
    return $this->lastUpdateTime;
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
  public function setSchedulerServiceAccountEmail($schedulerServiceAccountEmail)
  {
    $this->schedulerServiceAccountEmail = $schedulerServiceAccountEmail;
  }
  public function getSchedulerServiceAccountEmail()
  {
    return $this->schedulerServiceAccountEmail;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
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
