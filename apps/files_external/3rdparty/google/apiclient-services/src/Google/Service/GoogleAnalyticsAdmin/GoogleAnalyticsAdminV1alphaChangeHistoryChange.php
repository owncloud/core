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

class Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaChangeHistoryChange extends Google_Model
{
  public $action;
  public $resource;
  protected $resourceAfterChangeType = 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaChangeHistoryChangeChangeHistoryResource';
  protected $resourceAfterChangeDataType = '';
  protected $resourceBeforeChangeType = 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaChangeHistoryChangeChangeHistoryResource';
  protected $resourceBeforeChangeDataType = '';

  public function setAction($action)
  {
    $this->action = $action;
  }
  public function getAction()
  {
    return $this->action;
  }
  public function setResource($resource)
  {
    $this->resource = $resource;
  }
  public function getResource()
  {
    return $this->resource;
  }
  /**
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaChangeHistoryChangeChangeHistoryResource
   */
  public function setResourceAfterChange(Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaChangeHistoryChangeChangeHistoryResource $resourceAfterChange)
  {
    $this->resourceAfterChange = $resourceAfterChange;
  }
  /**
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaChangeHistoryChangeChangeHistoryResource
   */
  public function getResourceAfterChange()
  {
    return $this->resourceAfterChange;
  }
  /**
   * @param Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaChangeHistoryChangeChangeHistoryResource
   */
  public function setResourceBeforeChange(Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaChangeHistoryChangeChangeHistoryResource $resourceBeforeChange)
  {
    $this->resourceBeforeChange = $resourceBeforeChange;
  }
  /**
   * @return Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaChangeHistoryChangeChangeHistoryResource
   */
  public function getResourceBeforeChange()
  {
    return $this->resourceBeforeChange;
  }
}
