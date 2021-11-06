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

namespace Google\Service\AnalyticsReporting;

class UserActivitySession extends \Google\Collection
{
  protected $collection_key = 'activities';
  protected $activitiesType = Activity::class;
  protected $activitiesDataType = 'array';
  public $dataSource;
  public $deviceCategory;
  public $platform;
  public $sessionDate;
  public $sessionId;

  /**
   * @param Activity[]
   */
  public function setActivities($activities)
  {
    $this->activities = $activities;
  }
  /**
   * @return Activity[]
   */
  public function getActivities()
  {
    return $this->activities;
  }
  public function setDataSource($dataSource)
  {
    $this->dataSource = $dataSource;
  }
  public function getDataSource()
  {
    return $this->dataSource;
  }
  public function setDeviceCategory($deviceCategory)
  {
    $this->deviceCategory = $deviceCategory;
  }
  public function getDeviceCategory()
  {
    return $this->deviceCategory;
  }
  public function setPlatform($platform)
  {
    $this->platform = $platform;
  }
  public function getPlatform()
  {
    return $this->platform;
  }
  public function setSessionDate($sessionDate)
  {
    $this->sessionDate = $sessionDate;
  }
  public function getSessionDate()
  {
    return $this->sessionDate;
  }
  public function setSessionId($sessionId)
  {
    $this->sessionId = $sessionId;
  }
  public function getSessionId()
  {
    return $this->sessionId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UserActivitySession::class, 'Google_Service_AnalyticsReporting_UserActivitySession');
