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

namespace Google\Service\GoogleAnalyticsAdmin;

class GoogleAnalyticsAdminV1alphaSearchChangeHistoryEventsRequest extends \Google\Collection
{
  protected $collection_key = 'resourceType';
  /**
   * @var string[]
   */
  public $action;
  /**
   * @var string[]
   */
  public $actorEmail;
  /**
   * @var string
   */
  public $earliestChangeTime;
  /**
   * @var string
   */
  public $latestChangeTime;
  /**
   * @var int
   */
  public $pageSize;
  /**
   * @var string
   */
  public $pageToken;
  /**
   * @var string
   */
  public $property;
  /**
   * @var string[]
   */
  public $resourceType;

  /**
   * @param string[]
   */
  public function setAction($action)
  {
    $this->action = $action;
  }
  /**
   * @return string[]
   */
  public function getAction()
  {
    return $this->action;
  }
  /**
   * @param string[]
   */
  public function setActorEmail($actorEmail)
  {
    $this->actorEmail = $actorEmail;
  }
  /**
   * @return string[]
   */
  public function getActorEmail()
  {
    return $this->actorEmail;
  }
  /**
   * @param string
   */
  public function setEarliestChangeTime($earliestChangeTime)
  {
    $this->earliestChangeTime = $earliestChangeTime;
  }
  /**
   * @return string
   */
  public function getEarliestChangeTime()
  {
    return $this->earliestChangeTime;
  }
  /**
   * @param string
   */
  public function setLatestChangeTime($latestChangeTime)
  {
    $this->latestChangeTime = $latestChangeTime;
  }
  /**
   * @return string
   */
  public function getLatestChangeTime()
  {
    return $this->latestChangeTime;
  }
  /**
   * @param int
   */
  public function setPageSize($pageSize)
  {
    $this->pageSize = $pageSize;
  }
  /**
   * @return int
   */
  public function getPageSize()
  {
    return $this->pageSize;
  }
  /**
   * @param string
   */
  public function setPageToken($pageToken)
  {
    $this->pageToken = $pageToken;
  }
  /**
   * @return string
   */
  public function getPageToken()
  {
    return $this->pageToken;
  }
  /**
   * @param string
   */
  public function setProperty($property)
  {
    $this->property = $property;
  }
  /**
   * @return string
   */
  public function getProperty()
  {
    return $this->property;
  }
  /**
   * @param string[]
   */
  public function setResourceType($resourceType)
  {
    $this->resourceType = $resourceType;
  }
  /**
   * @return string[]
   */
  public function getResourceType()
  {
    return $this->resourceType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaSearchChangeHistoryEventsRequest::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaSearchChangeHistoryEventsRequest');
