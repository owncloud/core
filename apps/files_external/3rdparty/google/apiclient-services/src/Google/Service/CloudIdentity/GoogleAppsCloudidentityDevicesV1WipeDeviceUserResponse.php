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

class Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1WipeDeviceUserResponse extends Google_Model
{
  protected $deviceUserType = 'Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1DeviceUser';
  protected $deviceUserDataType = '';

  /**
   * @param Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1DeviceUser
   */
  public function setDeviceUser(Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1DeviceUser $deviceUser)
  {
    $this->deviceUser = $deviceUser;
  }
  /**
   * @return Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1DeviceUser
   */
  public function getDeviceUser()
  {
    return $this->deviceUser;
  }
}
