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

namespace Google\Service\Directory;

class ChromeOsDevice extends \Google\Collection
{
  protected $collection_key = 'systemRamFreeReports';
  protected $activeTimeRangesType = ChromeOsDeviceActiveTimeRanges::class;
  protected $activeTimeRangesDataType = 'array';
  /**
   * @var string
   */
  public $annotatedAssetId;
  /**
   * @var string
   */
  public $annotatedLocation;
  /**
   * @var string
   */
  public $annotatedUser;
  /**
   * @var string
   */
  public $autoUpdateExpiration;
  /**
   * @var string
   */
  public $bootMode;
  protected $cpuInfoType = ChromeOsDeviceCpuInfo::class;
  protected $cpuInfoDataType = 'array';
  protected $cpuStatusReportsType = ChromeOsDeviceCpuStatusReports::class;
  protected $cpuStatusReportsDataType = 'array';
  protected $deviceFilesType = ChromeOsDeviceDeviceFiles::class;
  protected $deviceFilesDataType = 'array';
  /**
   * @var string
   */
  public $deviceId;
  protected $diskVolumeReportsType = ChromeOsDeviceDiskVolumeReports::class;
  protected $diskVolumeReportsDataType = 'array';
  /**
   * @var string
   */
  public $dockMacAddress;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $ethernetMacAddress;
  /**
   * @var string
   */
  public $ethernetMacAddress0;
  /**
   * @var string
   */
  public $firmwareVersion;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $lastEnrollmentTime;
  protected $lastKnownNetworkType = ChromeOsDeviceLastKnownNetwork::class;
  protected $lastKnownNetworkDataType = 'array';
  /**
   * @var string
   */
  public $lastSync;
  /**
   * @var string
   */
  public $macAddress;
  /**
   * @var string
   */
  public $manufactureDate;
  /**
   * @var string
   */
  public $meid;
  /**
   * @var string
   */
  public $model;
  /**
   * @var string
   */
  public $notes;
  /**
   * @var string
   */
  public $orderNumber;
  /**
   * @var string
   */
  public $orgUnitId;
  /**
   * @var string
   */
  public $orgUnitPath;
  /**
   * @var string
   */
  public $osVersion;
  /**
   * @var string
   */
  public $platformVersion;
  protected $recentUsersType = ChromeOsDeviceRecentUsers::class;
  protected $recentUsersDataType = 'array';
  protected $screenshotFilesType = ChromeOsDeviceScreenshotFiles::class;
  protected $screenshotFilesDataType = 'array';
  /**
   * @var string
   */
  public $serialNumber;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $supportEndDate;
  protected $systemRamFreeReportsType = ChromeOsDeviceSystemRamFreeReports::class;
  protected $systemRamFreeReportsDataType = 'array';
  /**
   * @var string
   */
  public $systemRamTotal;
  protected $tpmVersionInfoType = ChromeOsDeviceTpmVersionInfo::class;
  protected $tpmVersionInfoDataType = '';
  /**
   * @var bool
   */
  public $willAutoRenew;

  /**
   * @param ChromeOsDeviceActiveTimeRanges[]
   */
  public function setActiveTimeRanges($activeTimeRanges)
  {
    $this->activeTimeRanges = $activeTimeRanges;
  }
  /**
   * @return ChromeOsDeviceActiveTimeRanges[]
   */
  public function getActiveTimeRanges()
  {
    return $this->activeTimeRanges;
  }
  /**
   * @param string
   */
  public function setAnnotatedAssetId($annotatedAssetId)
  {
    $this->annotatedAssetId = $annotatedAssetId;
  }
  /**
   * @return string
   */
  public function getAnnotatedAssetId()
  {
    return $this->annotatedAssetId;
  }
  /**
   * @param string
   */
  public function setAnnotatedLocation($annotatedLocation)
  {
    $this->annotatedLocation = $annotatedLocation;
  }
  /**
   * @return string
   */
  public function getAnnotatedLocation()
  {
    return $this->annotatedLocation;
  }
  /**
   * @param string
   */
  public function setAnnotatedUser($annotatedUser)
  {
    $this->annotatedUser = $annotatedUser;
  }
  /**
   * @return string
   */
  public function getAnnotatedUser()
  {
    return $this->annotatedUser;
  }
  /**
   * @param string
   */
  public function setAutoUpdateExpiration($autoUpdateExpiration)
  {
    $this->autoUpdateExpiration = $autoUpdateExpiration;
  }
  /**
   * @return string
   */
  public function getAutoUpdateExpiration()
  {
    return $this->autoUpdateExpiration;
  }
  /**
   * @param string
   */
  public function setBootMode($bootMode)
  {
    $this->bootMode = $bootMode;
  }
  /**
   * @return string
   */
  public function getBootMode()
  {
    return $this->bootMode;
  }
  /**
   * @param ChromeOsDeviceCpuInfo[]
   */
  public function setCpuInfo($cpuInfo)
  {
    $this->cpuInfo = $cpuInfo;
  }
  /**
   * @return ChromeOsDeviceCpuInfo[]
   */
  public function getCpuInfo()
  {
    return $this->cpuInfo;
  }
  /**
   * @param ChromeOsDeviceCpuStatusReports[]
   */
  public function setCpuStatusReports($cpuStatusReports)
  {
    $this->cpuStatusReports = $cpuStatusReports;
  }
  /**
   * @return ChromeOsDeviceCpuStatusReports[]
   */
  public function getCpuStatusReports()
  {
    return $this->cpuStatusReports;
  }
  /**
   * @param ChromeOsDeviceDeviceFiles[]
   */
  public function setDeviceFiles($deviceFiles)
  {
    $this->deviceFiles = $deviceFiles;
  }
  /**
   * @return ChromeOsDeviceDeviceFiles[]
   */
  public function getDeviceFiles()
  {
    return $this->deviceFiles;
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
   * @param ChromeOsDeviceDiskVolumeReports[]
   */
  public function setDiskVolumeReports($diskVolumeReports)
  {
    $this->diskVolumeReports = $diskVolumeReports;
  }
  /**
   * @return ChromeOsDeviceDiskVolumeReports[]
   */
  public function getDiskVolumeReports()
  {
    return $this->diskVolumeReports;
  }
  /**
   * @param string
   */
  public function setDockMacAddress($dockMacAddress)
  {
    $this->dockMacAddress = $dockMacAddress;
  }
  /**
   * @return string
   */
  public function getDockMacAddress()
  {
    return $this->dockMacAddress;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string
   */
  public function setEthernetMacAddress($ethernetMacAddress)
  {
    $this->ethernetMacAddress = $ethernetMacAddress;
  }
  /**
   * @return string
   */
  public function getEthernetMacAddress()
  {
    return $this->ethernetMacAddress;
  }
  /**
   * @param string
   */
  public function setEthernetMacAddress0($ethernetMacAddress0)
  {
    $this->ethernetMacAddress0 = $ethernetMacAddress0;
  }
  /**
   * @return string
   */
  public function getEthernetMacAddress0()
  {
    return $this->ethernetMacAddress0;
  }
  /**
   * @param string
   */
  public function setFirmwareVersion($firmwareVersion)
  {
    $this->firmwareVersion = $firmwareVersion;
  }
  /**
   * @return string
   */
  public function getFirmwareVersion()
  {
    return $this->firmwareVersion;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setLastEnrollmentTime($lastEnrollmentTime)
  {
    $this->lastEnrollmentTime = $lastEnrollmentTime;
  }
  /**
   * @return string
   */
  public function getLastEnrollmentTime()
  {
    return $this->lastEnrollmentTime;
  }
  /**
   * @param ChromeOsDeviceLastKnownNetwork[]
   */
  public function setLastKnownNetwork($lastKnownNetwork)
  {
    $this->lastKnownNetwork = $lastKnownNetwork;
  }
  /**
   * @return ChromeOsDeviceLastKnownNetwork[]
   */
  public function getLastKnownNetwork()
  {
    return $this->lastKnownNetwork;
  }
  /**
   * @param string
   */
  public function setLastSync($lastSync)
  {
    $this->lastSync = $lastSync;
  }
  /**
   * @return string
   */
  public function getLastSync()
  {
    return $this->lastSync;
  }
  /**
   * @param string
   */
  public function setMacAddress($macAddress)
  {
    $this->macAddress = $macAddress;
  }
  /**
   * @return string
   */
  public function getMacAddress()
  {
    return $this->macAddress;
  }
  /**
   * @param string
   */
  public function setManufactureDate($manufactureDate)
  {
    $this->manufactureDate = $manufactureDate;
  }
  /**
   * @return string
   */
  public function getManufactureDate()
  {
    return $this->manufactureDate;
  }
  /**
   * @param string
   */
  public function setMeid($meid)
  {
    $this->meid = $meid;
  }
  /**
   * @return string
   */
  public function getMeid()
  {
    return $this->meid;
  }
  /**
   * @param string
   */
  public function setModel($model)
  {
    $this->model = $model;
  }
  /**
   * @return string
   */
  public function getModel()
  {
    return $this->model;
  }
  /**
   * @param string
   */
  public function setNotes($notes)
  {
    $this->notes = $notes;
  }
  /**
   * @return string
   */
  public function getNotes()
  {
    return $this->notes;
  }
  /**
   * @param string
   */
  public function setOrderNumber($orderNumber)
  {
    $this->orderNumber = $orderNumber;
  }
  /**
   * @return string
   */
  public function getOrderNumber()
  {
    return $this->orderNumber;
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
   * @param string
   */
  public function setOrgUnitPath($orgUnitPath)
  {
    $this->orgUnitPath = $orgUnitPath;
  }
  /**
   * @return string
   */
  public function getOrgUnitPath()
  {
    return $this->orgUnitPath;
  }
  /**
   * @param string
   */
  public function setOsVersion($osVersion)
  {
    $this->osVersion = $osVersion;
  }
  /**
   * @return string
   */
  public function getOsVersion()
  {
    return $this->osVersion;
  }
  /**
   * @param string
   */
  public function setPlatformVersion($platformVersion)
  {
    $this->platformVersion = $platformVersion;
  }
  /**
   * @return string
   */
  public function getPlatformVersion()
  {
    return $this->platformVersion;
  }
  /**
   * @param ChromeOsDeviceRecentUsers[]
   */
  public function setRecentUsers($recentUsers)
  {
    $this->recentUsers = $recentUsers;
  }
  /**
   * @return ChromeOsDeviceRecentUsers[]
   */
  public function getRecentUsers()
  {
    return $this->recentUsers;
  }
  /**
   * @param ChromeOsDeviceScreenshotFiles[]
   */
  public function setScreenshotFiles($screenshotFiles)
  {
    $this->screenshotFiles = $screenshotFiles;
  }
  /**
   * @return ChromeOsDeviceScreenshotFiles[]
   */
  public function getScreenshotFiles()
  {
    return $this->screenshotFiles;
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
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setSupportEndDate($supportEndDate)
  {
    $this->supportEndDate = $supportEndDate;
  }
  /**
   * @return string
   */
  public function getSupportEndDate()
  {
    return $this->supportEndDate;
  }
  /**
   * @param ChromeOsDeviceSystemRamFreeReports[]
   */
  public function setSystemRamFreeReports($systemRamFreeReports)
  {
    $this->systemRamFreeReports = $systemRamFreeReports;
  }
  /**
   * @return ChromeOsDeviceSystemRamFreeReports[]
   */
  public function getSystemRamFreeReports()
  {
    return $this->systemRamFreeReports;
  }
  /**
   * @param string
   */
  public function setSystemRamTotal($systemRamTotal)
  {
    $this->systemRamTotal = $systemRamTotal;
  }
  /**
   * @return string
   */
  public function getSystemRamTotal()
  {
    return $this->systemRamTotal;
  }
  /**
   * @param ChromeOsDeviceTpmVersionInfo
   */
  public function setTpmVersionInfo(ChromeOsDeviceTpmVersionInfo $tpmVersionInfo)
  {
    $this->tpmVersionInfo = $tpmVersionInfo;
  }
  /**
   * @return ChromeOsDeviceTpmVersionInfo
   */
  public function getTpmVersionInfo()
  {
    return $this->tpmVersionInfo;
  }
  /**
   * @param bool
   */
  public function setWillAutoRenew($willAutoRenew)
  {
    $this->willAutoRenew = $willAutoRenew;
  }
  /**
   * @return bool
   */
  public function getWillAutoRenew()
  {
    return $this->willAutoRenew;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChromeOsDevice::class, 'Google_Service_Directory_ChromeOsDevice');
