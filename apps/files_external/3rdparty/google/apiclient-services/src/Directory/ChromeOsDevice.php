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
  public $annotatedAssetId;
  public $annotatedLocation;
  public $annotatedUser;
  public $autoUpdateExpiration;
  public $bootMode;
  protected $cpuStatusReportsType = ChromeOsDeviceCpuStatusReports::class;
  protected $cpuStatusReportsDataType = 'array';
  protected $deviceFilesType = ChromeOsDeviceDeviceFiles::class;
  protected $deviceFilesDataType = 'array';
  public $deviceId;
  protected $diskVolumeReportsType = ChromeOsDeviceDiskVolumeReports::class;
  protected $diskVolumeReportsDataType = 'array';
  public $dockMacAddress;
  public $etag;
  public $ethernetMacAddress;
  public $ethernetMacAddress0;
  public $firmwareVersion;
  public $kind;
  public $lastEnrollmentTime;
  protected $lastKnownNetworkType = ChromeOsDeviceLastKnownNetwork::class;
  protected $lastKnownNetworkDataType = 'array';
  public $lastSync;
  public $macAddress;
  public $manufactureDate;
  public $meid;
  public $model;
  public $notes;
  public $orderNumber;
  public $orgUnitPath;
  public $osVersion;
  public $platformVersion;
  protected $recentUsersType = ChromeOsDeviceRecentUsers::class;
  protected $recentUsersDataType = 'array';
  protected $screenshotFilesType = ChromeOsDeviceScreenshotFiles::class;
  protected $screenshotFilesDataType = 'array';
  public $serialNumber;
  public $status;
  public $supportEndDate;
  protected $systemRamFreeReportsType = ChromeOsDeviceSystemRamFreeReports::class;
  protected $systemRamFreeReportsDataType = 'array';
  public $systemRamTotal;
  protected $tpmVersionInfoType = ChromeOsDeviceTpmVersionInfo::class;
  protected $tpmVersionInfoDataType = '';
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
  public function setAnnotatedAssetId($annotatedAssetId)
  {
    $this->annotatedAssetId = $annotatedAssetId;
  }
  public function getAnnotatedAssetId()
  {
    return $this->annotatedAssetId;
  }
  public function setAnnotatedLocation($annotatedLocation)
  {
    $this->annotatedLocation = $annotatedLocation;
  }
  public function getAnnotatedLocation()
  {
    return $this->annotatedLocation;
  }
  public function setAnnotatedUser($annotatedUser)
  {
    $this->annotatedUser = $annotatedUser;
  }
  public function getAnnotatedUser()
  {
    return $this->annotatedUser;
  }
  public function setAutoUpdateExpiration($autoUpdateExpiration)
  {
    $this->autoUpdateExpiration = $autoUpdateExpiration;
  }
  public function getAutoUpdateExpiration()
  {
    return $this->autoUpdateExpiration;
  }
  public function setBootMode($bootMode)
  {
    $this->bootMode = $bootMode;
  }
  public function getBootMode()
  {
    return $this->bootMode;
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
  public function setDeviceId($deviceId)
  {
    $this->deviceId = $deviceId;
  }
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
  public function setDockMacAddress($dockMacAddress)
  {
    $this->dockMacAddress = $dockMacAddress;
  }
  public function getDockMacAddress()
  {
    return $this->dockMacAddress;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setEthernetMacAddress($ethernetMacAddress)
  {
    $this->ethernetMacAddress = $ethernetMacAddress;
  }
  public function getEthernetMacAddress()
  {
    return $this->ethernetMacAddress;
  }
  public function setEthernetMacAddress0($ethernetMacAddress0)
  {
    $this->ethernetMacAddress0 = $ethernetMacAddress0;
  }
  public function getEthernetMacAddress0()
  {
    return $this->ethernetMacAddress0;
  }
  public function setFirmwareVersion($firmwareVersion)
  {
    $this->firmwareVersion = $firmwareVersion;
  }
  public function getFirmwareVersion()
  {
    return $this->firmwareVersion;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLastEnrollmentTime($lastEnrollmentTime)
  {
    $this->lastEnrollmentTime = $lastEnrollmentTime;
  }
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
  public function setLastSync($lastSync)
  {
    $this->lastSync = $lastSync;
  }
  public function getLastSync()
  {
    return $this->lastSync;
  }
  public function setMacAddress($macAddress)
  {
    $this->macAddress = $macAddress;
  }
  public function getMacAddress()
  {
    return $this->macAddress;
  }
  public function setManufactureDate($manufactureDate)
  {
    $this->manufactureDate = $manufactureDate;
  }
  public function getManufactureDate()
  {
    return $this->manufactureDate;
  }
  public function setMeid($meid)
  {
    $this->meid = $meid;
  }
  public function getMeid()
  {
    return $this->meid;
  }
  public function setModel($model)
  {
    $this->model = $model;
  }
  public function getModel()
  {
    return $this->model;
  }
  public function setNotes($notes)
  {
    $this->notes = $notes;
  }
  public function getNotes()
  {
    return $this->notes;
  }
  public function setOrderNumber($orderNumber)
  {
    $this->orderNumber = $orderNumber;
  }
  public function getOrderNumber()
  {
    return $this->orderNumber;
  }
  public function setOrgUnitPath($orgUnitPath)
  {
    $this->orgUnitPath = $orgUnitPath;
  }
  public function getOrgUnitPath()
  {
    return $this->orgUnitPath;
  }
  public function setOsVersion($osVersion)
  {
    $this->osVersion = $osVersion;
  }
  public function getOsVersion()
  {
    return $this->osVersion;
  }
  public function setPlatformVersion($platformVersion)
  {
    $this->platformVersion = $platformVersion;
  }
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
  public function setSerialNumber($serialNumber)
  {
    $this->serialNumber = $serialNumber;
  }
  public function getSerialNumber()
  {
    return $this->serialNumber;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setSupportEndDate($supportEndDate)
  {
    $this->supportEndDate = $supportEndDate;
  }
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
  public function setSystemRamTotal($systemRamTotal)
  {
    $this->systemRamTotal = $systemRamTotal;
  }
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
  public function setWillAutoRenew($willAutoRenew)
  {
    $this->willAutoRenew = $willAutoRenew;
  }
  public function getWillAutoRenew()
  {
    return $this->willAutoRenew;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChromeOsDevice::class, 'Google_Service_Directory_ChromeOsDevice');
