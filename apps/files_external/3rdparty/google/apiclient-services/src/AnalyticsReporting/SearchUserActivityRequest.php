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

class SearchUserActivityRequest extends \Google\Collection
{
  protected $collection_key = 'activityTypes';
  public $activityTypes;
  protected $dateRangeType = DateRange::class;
  protected $dateRangeDataType = '';
  public $pageSize;
  public $pageToken;
  protected $userType = User::class;
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
   * @param DateRange
   */
  public function setDateRange(DateRange $dateRange)
  {
    $this->dateRange = $dateRange;
  }
  /**
   * @return DateRange
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
   * @param User
   */
  public function setUser(User $user)
  {
    $this->user = $user;
  }
  /**
   * @return User
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SearchUserActivityRequest::class, 'Google_Service_AnalyticsReporting_SearchUserActivityRequest');
