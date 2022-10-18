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

class GoogleChromeManagementV1CountChromeHardwareFleetDevicesResponse extends \Google\Collection
{
  protected $collection_key = 'storageReports';
  protected $cpuReportsType = GoogleChromeManagementV1DeviceHardwareCountReport::class;
  protected $cpuReportsDataType = 'array';
  protected $memoryReportsType = GoogleChromeManagementV1DeviceHardwareCountReport::class;
  protected $memoryReportsDataType = 'array';
  protected $modelReportsType = GoogleChromeManagementV1DeviceHardwareCountReport::class;
  protected $modelReportsDataType = 'array';
  protected $storageReportsType = GoogleChromeManagementV1DeviceHardwareCountReport::class;
  protected $storageReportsDataType = 'array';

  /**
   * @param GoogleChromeManagementV1DeviceHardwareCountReport[]
   */
  public function setCpuReports($cpuReports)
  {
    $this->cpuReports = $cpuReports;
  }
  /**
   * @return GoogleChromeManagementV1DeviceHardwareCountReport[]
   */
  public function getCpuReports()
  {
    return $this->cpuReports;
  }
  /**
   * @param GoogleChromeManagementV1DeviceHardwareCountReport[]
   */
  public function setMemoryReports($memoryReports)
  {
    $this->memoryReports = $memoryReports;
  }
  /**
   * @return GoogleChromeManagementV1DeviceHardwareCountReport[]
   */
  public function getMemoryReports()
  {
    return $this->memoryReports;
  }
  /**
   * @param GoogleChromeManagementV1DeviceHardwareCountReport[]
   */
  public function setModelReports($modelReports)
  {
    $this->modelReports = $modelReports;
  }
  /**
   * @return GoogleChromeManagementV1DeviceHardwareCountReport[]
   */
  public function getModelReports()
  {
    return $this->modelReports;
  }
  /**
   * @param GoogleChromeManagementV1DeviceHardwareCountReport[]
   */
  public function setStorageReports($storageReports)
  {
    $this->storageReports = $storageReports;
  }
  /**
   * @return GoogleChromeManagementV1DeviceHardwareCountReport[]
   */
  public function getStorageReports()
  {
    return $this->storageReports;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromeManagementV1CountChromeHardwareFleetDevicesResponse::class, 'Google_Service_ChromeManagement_GoogleChromeManagementV1CountChromeHardwareFleetDevicesResponse');
