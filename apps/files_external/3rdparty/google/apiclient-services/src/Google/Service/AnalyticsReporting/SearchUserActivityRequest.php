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

class Google_Service_AnalyticsReporting_SearchUserActivityRequest extends Google_Collection
{
  protected $collection_key = 'activityTypes';
  public $activityTypes;
  protected $dateRangeType = 'Google_Service_AnalyticsReporting_DateRange';
  protected $dateRangeDataType = '';
  public $pageSize;
  public $pageToken;
  protected $userType = 'Google_Service_AnalyticsReporting_User';
  protected $userDataType = '';
  public $viewId;

  public function setActivityTypes($activityTypes)
  {
    $this->activityTypes = $activityTypes;
  }
  public function getActivityTypes()
  {
    return $this->activityTypes;
  }
  /**
   * @param Google_Service_AnalyticsReporting_DateRange
   */
  public function setDateRange(Google_Service_AnalyticsReporting_DateRange $dateRange)
  {
    $this->dateRange = $dateRange;
  }
  /**
   * @return Google_Service_AnalyticsReporting_DateRange
   */
  public function getDateRange()
  {
    return $this->dateRange;
  }
  public function setPageSize($pageSize)
  {
    $this->pageSize = $pageSize;
  }
  public function getPageSize()
  {
    return $this->pageSize;
  }
  public function setPageToken($pageToken)
  {
    $this->pageToken = $pageToken;
  }
  public function getPageToken()
  {
    return $this->pageToken;
  }
  /**
   * @param Google_Service_AnalyticsReporting_User
   */
  public function setUser(Google_Service_AnalyticsReporting_User $user)
  {
    $this->user = $user;
  }
  /**
   * @return Google_Service_AnalyticsReporting_User
   */
  public function getUser()
  {
    return $this->user;
  }
  public function setViewId($viewId)
  {
    $this->viewId = $viewId;
  }
  public function getViewId()
  {
    return $this->viewId;
  }
}
