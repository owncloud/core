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

class Google_Service_CloudRedis_MaintenancePolicy extends Google_Collection
{
  protected $collection_key = 'weeklyMaintenanceWindow';
  public $createTime;
  public $description;
  public $updateTime;
  protected $weeklyMaintenanceWindowType = 'Google_Service_CloudRedis_WeeklyMaintenanceWindow';
  protected $weeklyMaintenanceWindowDataType = 'array';

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param Google_Service_CloudRedis_WeeklyMaintenanceWindow[]
   */
  public function setWeeklyMaintenanceWindow($weeklyMaintenanceWindow)
  {
    $this->weeklyMaintenanceWindow = $weeklyMaintenanceWindow;
  }
  /**
   * @return Google_Service_CloudRedis_WeeklyMaintenanceWindow[]
   */
  public function getWeeklyMaintenanceWindow()
  {
    return $this->weeklyMaintenanceWindow;
  }
}
