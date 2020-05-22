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

class Google_Service_AndroidPublisher_TrackReleasePinPinTargeting extends Google_Collection
{
  protected $collection_key = 'sdkVersions';
  public $countryCodes;
  protected $devicesType = 'Google_Service_AndroidPublisher_TrackReleasePinPinTargetingDevicePin';
  protected $devicesDataType = 'array';
  public $phoneskyVersions;
  public $sdkVersions;

  public function setCountryCodes($countryCodes)
  {
    $this->countryCodes = $countryCodes;
  }
  public function getCountryCodes()
  {
    return $this->countryCodes;
  }
  /**
   * @param Google_Service_AndroidPublisher_TrackReleasePinPinTargetingDevicePin
   */
  public function setDevices($devices)
  {
    $this->devices = $devices;
  }
  /**
   * @return Google_Service_AndroidPublisher_TrackReleasePinPinTargetingDevicePin
   */
  public function getDevices()
  {
    return $this->devices;
  }
  public function setPhoneskyVersions($phoneskyVersions)
  {
    $this->phoneskyVersions = $phoneskyVersions;
  }
  public function getPhoneskyVersions()
  {
    return $this->phoneskyVersions;
  }
  public function setSdkVersions($sdkVersions)
  {
    $this->sdkVersions = $sdkVersions;
  }
  public function getSdkVersions()
  {
    return $this->sdkVersions;
  }
}
