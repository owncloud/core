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
  public $assetTag;
  public $basebandVersion;
  public $bootloaderVersion;
  public $brand;
  public $buildNumber;
  public $compromisedState;
  public $createTime;
  public $deviceType;
  public $enabledDeveloperOptions;
  public $enabledUsbDebugging;
  public $encryptionState;
  public $imei;
  public $kernelVersion;
  public $lastSyncTime;
  public $managementState;
  public $manufacturer;
  public $meid;
  public $model;
  public $name;
  public $networkOperator;
  public $osVersion;
  public $otherAccounts;
  public $ownerType;
  public $releaseVersion;
  public $securityPatchTime;
  public $serialNumber;
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
  public function setAssetTag($assetTag)
  {
    $this->assetTag = $assetTag;
  }
  public function getAssetTag()
  {
    return $this->assetTag;
  }
  public function setBasebandVersion($basebandVersion)
  {
    $this->basebandVersion = $basebandVersion;
  }
  public function getBasebandVersion()
  {
    return $this->basebandVersion;
  }
  public function setBootloaderVersion($bootloaderVersion)
  {
    $this->bootloaderVersion = $bootloaderVersion;
  }
  public function getBootloaderVersion()
  {
    return $this->bootloaderVersion;
  }
  public function setBrand($brand)
  {
    $this->brand = $brand;
  }
  public function getBrand()
  {
    return $this->brand;
  }
  public function setBuildNumber($buildNumber)
  {
    $this->buildNumber = $buildNumber;
  }
  public function getBuildNumber()
  {
    return $this->buildNumber;
  }
  public function setCompromisedState($compromisedState)
  {
    $this->compromisedState = $compromisedState;
  }
  public function getCompromisedState()
  {
    return $this->compromisedState;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDeviceType($deviceType)
  {
    $this->deviceType = $deviceType;
  }
  public function getDeviceType()
  {
    return $this->deviceType;
  }
  public function setEnabledDeveloperOptions($enabledDeveloperOptions)
  {
    $this->enabledDeveloperOptions = $enabledDeveloperOptions;
  }
  public function getEnabledDeveloperOptions()
  {
    return $this->enabledDeveloperOptions;
  }
  public function setEnabledUsbDebugging($enabledUsbDebugging)
  {
    $this->enabledUsbDebugging = $enabledUsbDebugging;
  }
  public function getEnabledUsbDebugging()
  {
    return $this->enabledUsbDebugging;
  }
  public function setEncryptionState($encryptionState)
  {
    $this->encryptionState = $encryptionState;
  }
  public function getEncryptionState()
  {
    return $this->encryptionState;
  }
  public function setImei($imei)
  {
    $this->imei = $imei;
  }
  public function getImei()
  {
    return $this->imei;
  }
  public function setKernelVersion($kernelVersion)
  {
    $this->kernelVersion = $kernelVersion;
  }
  public function getKernelVersion()
  {
    return $this->kernelVersion;
  }
  public function setLastSyncTime($lastSyncTime)
  {
    $this->lastSyncTime = $lastSyncTime;
  }
  public function getLastSyncTime()
  {
    return $this->lastSyncTime;
  }
  public function setManagementState($managementState)
  {
    $this->managementState = $managementState;
  }
  public function getManagementState()
  {
    return $this->managementState;
  }
  public function setManufacturer($manufacturer)
  {
    $this->manufacturer = $manufacturer;
  }
  public function getManufacturer()
  {
    return $this->manufacturer;
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
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNetworkOperator($networkOperator)
  {
    $this->networkOperator = $networkOperator;
  }
  public function getNetworkOperator()
  {
    return $this->networkOperator;
  }
  public function setOsVersion($osVersion)
  {
    $this->osVersion = $osVersion;
  }
  public function getOsVersion()
  {
    return $this->osVersion;
  }
  public function setOtherAccounts($otherAccounts)
  {
    $this->otherAccounts = $otherAccounts;
  }
  public function getOtherAccounts()
  {
    return $this->otherAccounts;
  }
  public function setOwnerType($ownerType)
  {
    $this->ownerType = $ownerType;
  }
  public function getOwnerType()
  {
    return $this->ownerType;
  }
  public function setReleaseVersion($releaseVersion)
  {
    $this->releaseVersion = $releaseVersion;
  }
  public function getReleaseVersion()
  {
    return $this->releaseVersion;
  }
  public function setSecurityPatchTime($securityPatchTime)
  {
    $this->securityPatchTime = $securityPatchTime;
  }
  public function getSecurityPatchTime()
  {
    return $this->securityPatchTime;
  }
  public function setSerialNumber($serialNumber)
  {
    $this->serialNumber = $serialNumber;
  }
  public function getSerialNumber()
  {
    return $this->serialNumber;
  }
  public function setWifiMacAddresses($wifiMacAddresses)
  {
    $this->wifiMacAddresses = $wifiMacAddresses;
  }
  public function getWifiMacAddresses()
  {
    return $this->wifiMacAddresses;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsCloudidentityDevicesV1Device::class, 'Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1Device');
