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

namespace Google\Service\HomeGraphService;

class DeviceInfo extends \Google\Model
{
  public $hwVersion;
  public $manufacturer;
  public $model;
  public $swVersion;

  public function setHwVersion($hwVersion)
  {
    $this->hwVersion = $hwVersion;
  }
  public function getHwVersion()
  {
    return $this->hwVersion;
  }
  public function setManufacturer($manufacturer)
  {
    $this->manufacturer = $manufacturer;
  }
  public function getManufacturer()
  {
    return $this->manufacturer;
  }
  public function setModel($model)
  {
    $this->model = $model;
  }
  public function getModel()
  {
    return $this->model;
  }
  public function setSwVersion($swVersion)
  {
    $this->swVersion = $swVersion;
  }
  public function getSwVersion()
  {
    return $this->swVersion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeviceInfo::class, 'Google_Service_HomeGraphService_DeviceInfo');
