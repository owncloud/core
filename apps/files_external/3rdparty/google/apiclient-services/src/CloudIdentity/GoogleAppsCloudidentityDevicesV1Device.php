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

namespace Google\Service\CloudIdentity;

class GoogleAppsCloudidentityDevicesV1Device extends \Google\Collection
{
  protected $collection_key = 'wifiMacAddresses';
  protected $androidSpecificAttributesType = GoogleAppsCloudidentityDevicesV1AndroidAttributes::class;
  protected $androidSpecificAttributesDataType = '';
  /**
   * @var string
   */
  public $assetTag;
  /**
   * @var string
   */
  public $basebandVersion;
  /**
   * @var string
   */
  public $bootloaderVersion;
  /**
   * @var string
   */
  public $brand;
  /**
   * @var string
   */
  public $buildNumber;
  /**
   * @var string
   */
  public $compromisedState;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $deviceId;
  /**
   * @var string
   */
  public $deviceType;
  /**
   * @var bool
   */
  public $enabledDeveloperOptions;
  /**
   * @var bool
   */
  public $enabledUsbDebugging;
  /**
   * @var string
   */
  public $encryptionState;
  /**
   * @var string
   */
  public $imei;
  /**
   * @var string
   */
  public $kernelVersion;
  /**
   * @var string
   */
  public $lastSyncTime;
  /**
   * @var string
   */
  public $managementState;
  /**
   * @var string
   */
  public $manufacturer;
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
  public $name;
  /**
   * @var string
   */
  public $networkOperator;
  /**
   * @var string
   */
  public $osVersion;
  /**
   * @var string[]
   */
  public $otherAccounts;
  /**
   * @var string
   */
  public $ownerType;
  /**
   * @var string
   */
  public $releaseVersion;
  /**
   * @var string
   */
  public $securityPatchTime;
  /**
   * @var string
   */
  public $serialNumber;
  /**
   * @var string[]
   */
  public $wifiMacAddresses;

  /**
   * @param GoogleAppsCloudidentityDevicesV1AndroidAttributes
   */
  public function setAndroidSpecificAttributes(GoogleAppsCloudidentityDevicesV1AndroidAttributes $androidSpecificAttributes)
  {
    $this->androidSpecificAttributes = $androidSpecificAttributes;
  }
  /**
   * @return GoogleAppsCloudidentityDevicesV1AndroidAttributes
   */
  public function getAndroidSpecificAttributes()
  {
    return $this->androidSpecificAttributes;
  }
  /**
   * @param string
   */
  public function setAssetTag($assetTag)
  {
    $this->assetTag = $assetTag;
  }
  /**
   * @return string
   */
  public function getAssetTag()
  {
    return $this->assetTag;
  }
  /**
   * @param string
   */
  public function setBasebandVersion($basebandVersion)
  {
    $this->basebandVersion = $basebandVersion;
  }
  /**
   * @return string
   */
  public function getBasebandVersion()
  {
    return $this->basebandVersion;
  }
  /**
   * @param string
   */
  public function setBootloaderVersion($bootloaderVersion)
  {
    $this->bootloaderVersion = $bootloaderVersion;
  }
  /**
   * @return string
   */
  public function getBootloaderVersion()
  {
    return $this->bootloaderVersion;
  }
  /**
   * @param string
   */
  public function setBrand($brand)
  {
    $this->brand = $brand;
  }
  /**
   * @return string
   */
  public function getBrand()
  {
    return $this->brand;
  }
  /**
   * @param string
   */
  public function setBuildNumber($buildNumber)
  {
    $this->buildNumber = $buildNumber;
  }
  /**
   * @return string
   */
  public function getBuildNumber()
  {
    return $this->buildNumber;
  }
  /**
   * @param string
   */
  public function setCompromisedState($compromisedState)
  {
    $this->compromisedState = $compromisedState;
  }
  /**
   * @return string
   */
  public function getCompromisedState()
  {
    return $this->compromisedState;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
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
   * @param string
   */
  public function setDeviceType($deviceType)
  {
    $this->deviceType = $deviceType;
  }
  /**
   * @return string
   */
  public function getDeviceType()
  {
    return $this->deviceType;
  }
  /**
   * @param bool
   */
  public function setEnabledDeveloperOptions($enabledDeveloperOptions)
  {
    $this->enabledDeveloperOptions = $enabledDeveloperOptions;
  }
  /**
   * @return bool
   */
  public function getEnabledDeveloperOptions()
  {
    return $this->enabledDeveloperOptions;
  }
  /**
   * @param bool
   */
  public function setEnabledUsbDebugging($enabledUsbDebugging)
  {
    $this->enabledUsbDebugging = $enabledUsbDebugging;
  }
  /**
   * @return bool
   */
  public function getEnabledUsbDebugging()
  {
    return $this->enabledUsbDebugging;
  }
  /**
   * @param string
   */
  public function setEncryptionState($encryptionState)
  {
    $this->encryptionState = $encryptionState;
  }
  /**
   * @return string
   */
  public function getEncryptionState()
  {
    return $this->encryptionState;
  }
  /**
   * @param string
   */
  public function setImei($imei)
  {
    $this->imei = $imei;
  }
  /**
   * @return string
   */
  public function getImei()
  {
    return $this->imei;
  }
  /**
   * @param string
   */
  public function setKernelVersion($kernelVersion)
  {
    $this->kernelVersion = $kernelVersion;
  }
  /**
   * @return string
   */
  public function getKernelVersion()
  {
    return $this->kernelVersion;
  }
  /**
   * @param string
   */
  public function setLastSyncTime($lastSyncTime)
  {
    $this->lastSyncTime = $lastSyncTime;
  }
  /**
   * @return string
   */
  public function getLastSyncTime()
  {
    return $this->lastSyncTime;
  }
  /**
   * @param string
   */
  public function setManagementState($managementState)
  {
    $this->managementState = $managementState;
  }
  /**
   * @return string
   */
  public function getManagementState()
  {
    return $this->managementState;
  }
  /**
   * @param string
   */
  public function setManufacturer($manufacturer)
  {
    $this->manufacturer = $manufacturer;
  }
  /**
   * @return string
   */
  public function getManufacturer()
  {
    return $this->manufacturer;
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
   * @param string
   */
  public function setNetworkOperator($networkOperator)
  {
    $this->networkOperator = $networkOperator;
  }
  /**
   * @return string
   */
  public function getNetworkOperator()
  {
    return $this->networkOperator;
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
   * @param string[]
   */
  public function setOtherAccounts($otherAccounts)
  {
    $this->otherAccounts = $otherAccounts;
  }
  /**
   * @return string[]
   */
  public function getOtherAccounts()
  {
    return $this->otherAccounts;
  }
  /**
   * @param string
   */
  public function setOwnerType($ownerType)
  {
    $this->ownerType = $ownerType;
  }
  /**
   * @return string
   */
  public function getOwnerType()
  {
    return $this->ownerType;
  }
  /**
   * @param string
   */
  public function setReleaseVersion($releaseVersion)
  {
    $this->releaseVersion = $releaseVersion;
  }
  /**
   * @return string
   */
  public function getReleaseVersion()
  {
    return $this->releaseVersion;
  }
  /**
   * @param string
   */
  public function setSecurityPatchTime($securityPatchTime)
  {
    $this->securityPatchTime = $securityPatchTime;
  }
  /**
   * @return string
   */
  public function getSecurityPatchTime()
  {
    return $this->securityPatchTime;
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
   * @param string[]
   */
  public function setWifiMacAddresses($wifiMacAddresses)
  {
    $this->wifiMacAddresses = $wifiMacAddresses;
  }
  /**
   * @return string[]
   */
  public function getWifiMacAddresses()
  {
    return $this->wifiMacAddresses;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsCloudidentityDevicesV1Device::class, 'Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1Device');
