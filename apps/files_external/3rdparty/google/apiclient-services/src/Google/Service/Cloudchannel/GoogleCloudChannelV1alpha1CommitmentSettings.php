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

class Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1CommitmentSettings extends Google_Model
{
  public $endTime;
  protected $renewalSettingsType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1RenewalSettings';
  protected $renewalSettingsDataType = '';
  public $startTime;

  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1RenewalSettings
   */
  public function setRenewalSettings(Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1RenewalSettings $renewalSettings)
  {
    $this->renewalSettings = $renewalSettings;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1alpha1RenewalSettings
   */
  public function getRenewalSettings()
  {
    return $this->renewalSettings;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
}
