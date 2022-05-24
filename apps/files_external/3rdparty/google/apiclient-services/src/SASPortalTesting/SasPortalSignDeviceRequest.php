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

namespace Google\Service\SASPortalTesting;

class SasPortalSignDeviceRequest extends \Google\Model
{
  protected $deviceType = SasPortalDevice::class;
  protected $deviceDataType = '';

  /**
   * @param SasPortalDevice
   */
  public function setDevice(SasPortalDevice $device)
  {
    $this->device = $device;
  }
  /**
   * @return SasPortalDevice
   */
  public function getDevice()
  {
    return $this->device;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SasPortalSignDeviceRequest::class, 'Google_Service_SASPortalTesting_SasPortalSignDeviceRequest');
