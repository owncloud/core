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

class GoogleChromeManagementV1TelemetryDevice extends \Google\Collection
{
  protected $collection_key = 'thunderboltInfo';
  protected $audioStatusReportType = GoogleChromeManagementV1AudioStatusReport::class;
  protected $audioStatusReportDataType = 'array';
  protected $batteryInfoType = GoogleChromeManagementV1BatteryInfo::class;
  protected $batteryInfoDataType = 'array';
  protected $batteryStatusReportType = GoogleChromeManagementV1BatteryStatusReport::class;
  protected $batteryStatusReportDataType = 'array';
  protected $bootPerformanceReportType = GoogleChromeManagementV1BootPerformanceReport::class;
  protected $bootPerformanceReportDataType = 'array';
  protected $cpuInfoType = GoogleChromeManagementV1CpuInfo::class;
  protected $cpuInfoDataType = 'array';
  protected $cpuStatusReportType = GoogleChromeManagementV1CpuStatusReport::class;
  protected $cpuStatusReportDataType = 'array';
  /**
   * @var string
   */
  public $customer;
  /**
   * @var string
   */
  public $deviceId;
  protected $graphicsInfoType = GoogleChromeManagementV1GraphicsInfo::class;
  protected $graphicsInfoDataType = '';
  protected $graphicsStatusReportType = GoogleChromeManagementV1GraphicsStatusReport::class;
  protected $graphicsStatusReportDataType = 'array';
  protected $memoryInfoType = GoogleChromeManagementV1MemoryInfo::class;
  protected $memoryInfoDataType = '';
  protected $memoryStatusReportType = GoogleChromeManagementV1MemoryStatusReport::class;
  protected $memoryStatusReportDataType = 'array';
  /**
   * @var string
   */
  public $name;
  protected $networkDiagnosticsReportType = GoogleChromeManagementV1NetworkDiagnosticsReport::class;
  protected $networkDiagnosticsReportDataType = 'array';
  protected $networkInfoType = GoogleChromeManagementV1NetworkInfo::class;
  protected $networkInfoDataType = '';
  protected $networkStatusReportType = GoogleChromeManagementV1NetworkStatusReport::class;
  protected $networkStatusReportDataType = 'array';
  /**
   * @var string
   */
  public $orgUnitId;
  protected $osUpdateStatusType = GoogleChromeManagementV1OsUpdateStatus::class;
  protected $osUpdateStatusDataType = 'array';
  /**
   * @var string
   */
  public $serialNumber;
  protected $storageInfoType = GoogleChromeManagementV1StorageInfo::class;
  protected $storageInfoDataType = '';
  protected $storageStatusReportType = GoogleChromeManagementV1StorageStatusReport::class;
  protected $storageStatusReportDataType = 'array';
  protected $thunderboltInfoType = GoogleChromeManagementV1ThunderboltInfo::class;
  protected $thunderboltInfoDataType = 'array';

  /**
   * @param GoogleChromeManagementV1AudioStatusReport[]
   */
  public function setAudioStatusReport($audioStatusReport)
  {
    $this->audioStatusReport = $audioStatusReport;
  }
  /**
   * @return GoogleChromeManagementV1AudioStatusReport[]
   */
  public function getAudioStatusReport()
  {
    return $this->audioStatusReport;
  }
  /**
   * @param GoogleChromeManagementV1BatteryInfo[]
   */
  public function setBatteryInfo($batteryInfo)
  {
    $this->batteryInfo = $batteryInfo;
  }
  /**
   * @return GoogleChromeManagementV1BatteryInfo[]
   */
  public function getBatteryInfo()
  {
    return $this->batteryInfo;
  }
  /**
   * @param GoogleChromeManagementV1BatteryStatusReport[]
   */
  public function setBatteryStatusReport($batteryStatusReport)
  {
    $this->batteryStatusReport = $batteryStatusReport;
  }
  /**
   * @return GoogleChromeManagementV1BatteryStatusReport[]
   */
  public function getBatteryStatusReport()
  {
    return $this->batteryStatusReport;
  }
  /**
   * @param GoogleChromeManagementV1BootPerformanceReport[]
   */
  public function setBootPerformanceReport($bootPerformanceReport)
  {
    $this->bootPerformanceReport = $bootPerformanceReport;
  }
  /**
   * @return GoogleChromeManagementV1BootPerformanceReport[]
   */
  public function getBootPerformanceReport()
  {
    return $this->bootPerformanceReport;
  }
  /**
   * @param GoogleChromeManagementV1CpuInfo[]
   */
  public function setCpuInfo($cpuInfo)
  {
    $this->cpuInfo = $cpuInfo;
  }
  /**
   * @return GoogleChromeManagementV1CpuInfo[]
   */
  public function getCpuInfo()
  {
    return $this->cpuInfo;
  }
  /**
   * @param GoogleChromeManagementV1CpuStatusReport[]
   */
  public function setCpuStatusReport($cpuStatusReport)
  {
    $this->cpuStatusReport = $cpuStatusReport;
  }
  /**
   * @return GoogleChromeManagementV1CpuStatusReport[]
   */
  public function getCpuStatusReport()
  {
    return $this->cpuStatusReport;
  }
  /**
   * @param string
   */
  public function setCustomer($customer)
  {
    $this->customer = $customer;
  }
  /**
   * @return string
   */
  public function getCustomer()
  {
    return $this->customer;
  }
  /**
   * @param string
   */
  public function setDeviceId($deviceId)
  {
    $this->deviceId = $deviceId;
  }
  /**
   * @return string
   */
  public function getDeviceId()
  {
    return $this->deviceId;
  }
  /**
   * @param GoogleChromeManagementV1GraphicsInfo
   */
  public function setGraphicsInfo(GoogleChromeManagementV1GraphicsInfo $graphicsInfo)
  {
    $this->graphicsInfo = $graphicsInfo;
  }
  /**
   * @return GoogleChromeManagementV1GraphicsInfo
   */
  public function getGraphicsInfo()
  {
    return $this->graphicsInfo;
  }
  /**
   * @param GoogleChromeManagementV1GraphicsStatusReport[]
   */
  public function setGraphicsStatusReport($graphicsStatusReport)
  {
    $this->graphicsStatusReport = $graphicsStatusReport;
  }
  /**
   * @return GoogleChromeManagementV1GraphicsStatusReport[]
   */
  public function getGraphicsStatusReport()
  {
    return $this->graphicsStatusReport;
  }
  /**
   * @param GoogleChromeManagementV1MemoryInfo
   */
  public function setMemoryInfo(GoogleChromeManagementV1MemoryInfo $memoryInfo)
  {
    $this->memoryInfo = $memoryInfo;
  }
  /**
   * @return GoogleChromeManagementV1MemoryInfo
   */
  public function getMemoryInfo()
  {
    return $this->memoryInfo;
  }
  /**
   * @param GoogleChromeManagementV1MemoryStatusReport[]
   */
  public function setMemoryStatusReport($memoryStatusReport)
  {
    $this->memoryStatusReport = $memoryStatusReport;
  }
  /**
   * @return GoogleChromeManagementV1MemoryStatusReport[]
   */
  public function getMemoryStatusReport()
  {
    return $this->memoryStatusReport;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GoogleChromeManagementV1NetworkDiagnosticsReport[]
   */
  public function setNetworkDiagnosticsReport($networkDiagnosticsReport)
  {
    $this->networkDiagnosticsReport = $networkDiagnosticsReport;
  }
  /**
   * @return GoogleChromeManagementV1NetworkDiagnosticsReport[]
   */
  public function getNetworkDiagnosticsReport()
  {
    return $this->networkDiagnosticsReport;
  }
  /**
   * @param GoogleChromeManagementV1NetworkInfo
   */
  public function setNetworkInfo(GoogleChromeManagementV1NetworkInfo $networkInfo)
  {
    $this->networkInfo = $networkInfo;
  }
  /**
   * @return GoogleChromeManagementV1NetworkInfo
   */
  public function getNetworkInfo()
  {
    return $this->networkInfo;
  }
  /**
   * @param GoogleChromeManagementV1NetworkStatusReport[]
   */
  public function setNetworkStatusReport($networkStatusReport)
  {
    $this->networkStatusReport = $networkStatusReport;
  }
  /**
   * @return GoogleChromeManagementV1NetworkStatusReport[]
   */
  public function getNetworkStatusReport()
  {
    return $this->networkStatusReport;
  }
  /**
   * @param string
   */
  public function setOrgUnitId($orgUnitId)
  {
    $this->orgUnitId = $orgUnitId;
  }
  /**
   * @return string
   */
  public function getOrgUnitId()
  {
    return $this->orgUnitId;
  }
  /**
   * @param GoogleChromeManagementV1OsUpdateStatus[]
   */
  public function setOsUpdateStatus($osUpdateStatus)
  {
    $this->osUpdateStatus = $osUpdateStatus;
  }
  /**
   * @return GoogleChromeManagementV1OsUpdateStatus[]
   */
  public function getOsUpdateStatus()
  {
    return $this->osUpdateStatus;
  }
  /**
   * @param string
   */
  public function setSerialNumber($serialNumber)
  {
    $this->serialNumber = $serialNumber;
  }
  /**
   * @return string
   */
  public function getSerialNumber()
  {
    return $this->serialNumber;
  }
  /**
   * @param GoogleChromeManagementV1StorageInfo
   */
  public function setStorageInfo(GoogleChromeManagementV1StorageInfo $storageInfo)
  {
    $this->storageInfo = $storageInfo;
  }
  /**
   * @return GoogleChromeManagementV1StorageInfo
   */
  public function getStorageInfo()
  {
    return $this->storageInfo;
  }
  /**
   * @param GoogleChromeManagementV1StorageStatusReport[]
   */
  public function setStorageStatusReport($storageStatusReport)
  {
    $this->storageStatusReport = $storageStatusReport;
  }
  /**
   * @return GoogleChromeManagementV1StorageStatusReport[]
   */
  public function getStorageStatusReport()
  {
    return $this->storageStatusReport;
  }
  /**
   * @param GoogleChromeManagementV1ThunderboltInfo[]
   */
  public function setThunderboltInfo($thunderboltInfo)
  {
    $this->thunderboltInfo = $thunderboltInfo;
  }
  /**
   * @return GoogleChromeManagementV1ThunderboltInfo[]
   */
  public function getThunderboltInfo()
  {
    return $this->thunderboltInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromeManagementV1TelemetryDevice::class, 'Google_Service_ChromeManagement_GoogleChromeManagementV1TelemetryDevice');
