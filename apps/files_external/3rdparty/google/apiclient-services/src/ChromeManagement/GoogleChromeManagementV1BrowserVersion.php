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

namespace Google\Service\ChromeManagement;

class GoogleChromeManagementV1BrowserVersion extends \Google\Model
{
  public $channel;
  public $count;
  public $deviceOsVersion;
  public $system;
  public $version;

  public function setChannel($channel)
  {
    $this->channel = $channel;
  }
  public function getChannel()
  {
    return $this->channel;
  }
  public function setCount($count)
  {
    $this->count = $count;
  }
  public function getCount()
  {
    return $this->count;
  }
  public function setDeviceOsVersion($deviceOsVersion)
  {
    $this->deviceOsVersion = $deviceOsVersion;
  }
  public function getDeviceOsVersion()
  {
    return $this->deviceOsVersion;
  }
  public function setSystem($system)
  {
    $this->system = $system;
  }
  public function getSystem()
  {
    return $this->system;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromeManagementV1BrowserVersion::class, 'Google_Service_ChromeManagement_GoogleChromeManagementV1BrowserVersion');
