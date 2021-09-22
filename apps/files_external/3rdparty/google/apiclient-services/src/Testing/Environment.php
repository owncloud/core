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

namespace Google\Service\Testing;

class Environment extends \Google\Model
{
  protected $androidDeviceType = AndroidDevice::class;
  protected $androidDeviceDataType = '';
  protected $iosDeviceType = IosDevice::class;
  protected $iosDeviceDataType = '';

  /**
   * @param AndroidDevice
   */
  public function setAndroidDevice(AndroidDevice $androidDevice)
  {
    $this->androidDevice = $androidDevice;
  }
  /**
   * @return AndroidDevice
   */
  public function getAndroidDevice()
  {
    return $this->androidDevice;
  }
  /**
   * @param IosDevice
   */
  public function setIosDevice(IosDevice $iosDevice)
  {
    $this->iosDevice = $iosDevice;
  }
  /**
   * @return IosDevice
   */
  public function getIosDevice()
  {
    return $this->iosDevice;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Environment::class, 'Google_Service_Testing_Environment');
