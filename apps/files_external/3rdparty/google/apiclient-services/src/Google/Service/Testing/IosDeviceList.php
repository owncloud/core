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

class Google_Service_Testing_IosDeviceList extends Google_Collection
{
  protected $collection_key = 'iosDevices';
  protected $iosDevicesType = 'Google_Service_Testing_IosDevice';
  protected $iosDevicesDataType = 'array';

  /**
   * @param Google_Service_Testing_IosDevice
   */
  public function setIosDevices($iosDevices)
  {
    $this->iosDevices = $iosDevices;
  }
  /**
   * @return Google_Service_Testing_IosDevice
   */
  public function getIosDevices()
  {
    return $this->iosDevices;
  }
}
