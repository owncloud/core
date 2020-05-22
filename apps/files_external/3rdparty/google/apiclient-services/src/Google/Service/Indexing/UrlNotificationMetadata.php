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

class Google_Service_Indexing_UrlNotificationMetadata extends Google_Model
{
  protected $latestRemoveType = 'Google_Service_Indexing_UrlNotification';
  protected $latestRemoveDataType = '';
  protected $latestUpdateType = 'Google_Service_Indexing_UrlNotification';
  protected $latestUpdateDataType = '';
  public $url;

  /**
   * @param Google_Service_Indexing_UrlNotification
   */
  public function setLatestRemove(Google_Service_Indexing_UrlNotification $latestRemove)
  {
    $this->latestRemove = $latestRemove;
  }
  /**
   * @return Google_Service_Indexing_UrlNotification
   */
  public function getLatestRemove()
  {
    return $this->latestRemove;
  }
  /**
   * @param Google_Service_Indexing_UrlNotification
   */
  public function setLatestUpdate(Google_Service_Indexing_UrlNotification $latestUpdate)
  {
    $this->latestUpdate = $latestUpdate;
  }
  /**
   * @return Google_Service_Indexing_UrlNotification
   */
  public function getLatestUpdate()
  {
    return $this->latestUpdate;
  }
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}
