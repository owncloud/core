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

namespace Google\Service\CloudMemorystoreforMemcached;

class GoogleCloudMemcacheV1MaintenancePolicy extends \Google\Collection
{
  protected $collection_key = 'weeklyMaintenanceWindow';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $updateTime;
  protected $weeklyMaintenanceWindowType = WeeklyMaintenanceWindow::class;
  protected $weeklyMaintenanceWindowDataType = 'array';

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
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param WeeklyMaintenanceWindow[]
   */
  public function setWeeklyMaintenanceWindow($weeklyMaintenanceWindow)
  {
    $this->weeklyMaintenanceWindow = $weeklyMaintenanceWindow;
  }
  /**
   * @return WeeklyMaintenanceWindow[]
   */
  public function getWeeklyMaintenanceWindow()
  {
    return $this->weeklyMaintenanceWindow;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMemcacheV1MaintenancePolicy::class, 'Google_Service_CloudMemorystoreforMemcached_GoogleCloudMemcacheV1MaintenancePolicy');
