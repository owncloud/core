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

class Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaSearchChangeHistoryEventsRequest extends Google_Collection
{
  protected $collection_key = 'resourceType';
  public $action;
  public $actorEmail;
  public $earliestChangeTime;
  public $latestChangeTime;
  public $pageSize;
  public $pageToken;
  public $property;
  public $resourceType;

  public function setAction($action)
  {
    $this->action = $action;
  }
  public function getAction()
  {
    return $this->action;
  }
  public function setActorEmail($actorEmail)
  {
    $this->actorEmail = $actorEmail;
  }
  public function getActorEmail()
  {
    return $this->actorEmail;
  }
  public function setEarliestChangeTime($earliestChangeTime)
  {
    $this->earliestChangeTime = $earliestChangeTime;
  }
  public function getEarliestChangeTime()
  {
    return $this->earliestChangeTime;
  }
  public function setLatestChangeTime($latestChangeTime)
  {
    $this->latestChangeTime = $latestChangeTime;
  }
  public function getLatestChangeTime()
  {
    return $this->latestChangeTime;
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
  public function setProperty($property)
  {
    $this->property = $property;
  }
  public function getProperty()
  {
    return $this->property;
  }
  public function setResourceType($resourceType)
  {
    $this->resourceType = $resourceType;
  }
  public function getResourceType()
  {
    return $this->resourceType;
  }
}
