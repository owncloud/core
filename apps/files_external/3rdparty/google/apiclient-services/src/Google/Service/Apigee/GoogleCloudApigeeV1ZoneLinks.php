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

class Google_Service_Apigee_GoogleCloudApigeeV1ZoneLinks extends Google_Model
{
  public $homeRedirect;
  protected $logoutType = 'Google_Service_Apigee_GoogleCloudApigeeV1ZoneLinksLogout';
  protected $logoutDataType = '';
  protected $selfServiceType = 'Google_Service_Apigee_GoogleCloudApigeeV1ZoneLinksSelfService';
  protected $selfServiceDataType = '';

  public function setHomeRedirect($homeRedirect)
  {
    $this->homeRedirect = $homeRedirect;
  }
  public function getHomeRedirect()
  {
    return $this->homeRedirect;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ZoneLinksLogout
   */
  public function setLogout(Google_Service_Apigee_GoogleCloudApigeeV1ZoneLinksLogout $logout)
  {
    $this->logout = $logout;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ZoneLinksLogout
   */
  public function getLogout()
  {
    return $this->logout;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ZoneLinksSelfService
   */
  public function setSelfService(Google_Service_Apigee_GoogleCloudApigeeV1ZoneLinksSelfService $selfService)
  {
    $this->selfService = $selfService;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ZoneLinksSelfService
   */
  public function getSelfService()
  {
    return $this->selfService;
  }
}
