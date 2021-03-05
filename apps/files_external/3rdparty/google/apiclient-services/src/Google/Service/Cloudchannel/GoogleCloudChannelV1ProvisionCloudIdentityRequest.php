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

class Google_Service_Cloudchannel_GoogleCloudChannelV1ProvisionCloudIdentityRequest extends Google_Model
{
  protected $cloudIdentityInfoType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1CloudIdentityInfo';
  protected $cloudIdentityInfoDataType = '';
  protected $userType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1AdminUser';
  protected $userDataType = '';
  public $validateOnly;

  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1CloudIdentityInfo
   */
  public function setCloudIdentityInfo(Google_Service_Cloudchannel_GoogleCloudChannelV1CloudIdentityInfo $cloudIdentityInfo)
  {
    $this->cloudIdentityInfo = $cloudIdentityInfo;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1CloudIdentityInfo
   */
  public function getCloudIdentityInfo()
  {
    return $this->cloudIdentityInfo;
  }
  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1AdminUser
   */
  public function setUser(Google_Service_Cloudchannel_GoogleCloudChannelV1AdminUser $user)
  {
    $this->user = $user;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1AdminUser
   */
  public function getUser()
  {
    return $this->user;
  }
  public function setValidateOnly($validateOnly)
  {
    $this->validateOnly = $validateOnly;
  }
  public function getValidateOnly()
  {
    return $this->validateOnly;
  }
}
