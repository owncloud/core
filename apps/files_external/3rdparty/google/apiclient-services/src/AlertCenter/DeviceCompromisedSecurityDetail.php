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

namespace Google\Service\AlertCenter;

class DeviceCompromisedSecurityDetail extends \Google\Model
{
  public $deviceCompromisedState;
  public $deviceId;
  public $deviceModel;
  public $deviceType;
  public $iosVendorId;
  public $resourceId;
  public $serialNumber;

  public function setDeviceCompromisedState($deviceCompromisedState)
  {
    $this->deviceCompromisedState = $deviceCompromisedState;
  }
  public function getDeviceCompromisedState()
  {
    return $this->deviceCompromisedState;
  }
  public function setDeviceId($deviceId)
  {
    $this->deviceId = $deviceId;
  }
  public function getDeviceId()
  {
    return $this->deviceId;
  }
  public function setDeviceModel($deviceModel)
  {
    $this->deviceModel = $deviceModel;
  }
  public function getDeviceModel()
  {
    return $this->deviceModel;
  }
  public function setDeviceType($deviceType)
  {
    $this->deviceType = $deviceType;
  }
  public function getDeviceType()
  {
    return $this->deviceType;
  }
  public function setIosVendorId($iosVendorId)
  {
    $this->iosVendorId = $iosVendorId;
  }
  public function getIosVendorId()
  {
    return $this->iosVendorId;
  }
  public function setResourceId($resourceId)
  {
    $this->resourceId = $resourceId;
  }
  public function getResourceId()
  {
    return $this->resourceId;
  }
  public function setSerialNumber($serialNumber)
  {
    $this->serialNumber = $serialNumber;
  }
  public function getSerialNumber()
  {
    return $this->serialNumber;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeviceCompromisedSecurityDetail::class, 'Google_Service_AlertCenter_DeviceCompromisedSecurityDetail');
