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

class MobileDevice extends \Google\Collection
{
  protected $collection_key = 'otherAccountsInfo';
  /**
   * @var bool
   */
  public $adbStatus;
  protected $applicationsType = MobileDeviceApplications::class;
  protected $applicationsDataType = 'array';
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
  public $defaultLanguage;
  /**
   * @var bool
   */
  public $developerOptionsStatus;
  /**
   * @var string
   */
  public $deviceCompromisedStatus;
  /**
   * @var string
   */
  public $deviceId;
  /**
   * @var string
   */
  public $devicePasswordStatus;
  /**
   * @var string[]
   */
  public $email;
  /**
   * @var string
   */
  public $encryptionStatus;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $firstSync;
  /**
   * @var string
   */
  public $hardware;
  /**
   * @var string
   */
  public $hardwareId;
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
  public $kind;
  /**
   * @var string
   */
  public $lastSync;
  /**
   * @var bool
   */
  public $managedAccountIsOnOwnerProfile;
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
   * @var string[]
   */
  public $name;
  /**
   * @var string
   */
  public $networkOperator;
  /**
   * @var string
   */
  public $os;
  /**
   * @var string[]
   */
  public $otherAccountsInfo;
  /**
   * @var string
   */
  public $privilege;
  /**
   * @var string
   */
  public $releaseVersion;
  /**
   * @var string
   */
  public $resourceId;
  /**
   * @var string
   */
  public $securityPatchLevel;
  /**
   * @var string
   */
  public $serialNumber;
  /**
   * @var string
   */
  public $status;
  /**
   * @var bool
   */
  public $supportsWorkProfile;
  /**
   * @var string
   */
  public $type;
  /**
   * @var bool
   */
  public $unknownSourcesStatus;
  /**
   * @var string
   */
  public $userAgent;
  /**
   * @var string
   */
  public $wifiMacAddress;

  /**
   * @param bool
   */
  public function setAdbStatus($adbStatus)
  {
    $this->adbStatus = $adbStatus;
  }
  /**
   * @return bool
   */
  public function getAdbStatus()
  {
    return $this->adbStatus;
  }
  /**
   * @param MobileDeviceApplications[]
   */
  public function setApplications($applications)
  {
    $this->applications = $applications;
  }
  /**
   * @return MobileDeviceApplications[]
   */
  public function getApplications()
  {
    return $this->applications;
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
  public function setDefaultLanguage($defaultLanguage)
  {
    $this->defaultLanguage = $defaultLanguage;
  }
  /**
   * @return string
   */
  public function getDefaultLanguage()
  {
    return $this->defaultLanguage;
  }
  /**
   * @param bool
   */
  public function setDeveloperOptionsStatus($developerOptionsStatus)
  {
    $this->developerOptionsStatus = $developerOptionsStatus;
  }
  /**
   * @return bool
   */
  public function getDeveloperOptionsStatus()
  {
    return $this->developerOptionsStatus;
  }
  /**
   * @param string
   */
  public function setDeviceCompromisedStatus($deviceCompromisedStatus)
  {
    $this->deviceCompromisedStatus = $deviceCompromisedStatus;
  }
  /**
   * @return string
   */
  public function getDeviceCompromisedStatus()
  {
    return $this->deviceCompromisedStatus;
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
  public function setDevicePasswordStatus($devicePasswordStatus)
  {
    $this->devicePasswordStatus = $devicePasswordStatus;
  }
  /**
   * @return string
   */
  public function getDevicePasswordStatus()
  {
    return $this->devicePasswordStatus;
  }
  /**
   * @param string[]
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }
  /**
   * @return string[]
   */
  public function getEmail()
  {
    return $this->email;
  }
  /**
   * @param string
   */
  public function setEncryptionStatus($encryptionStatus)
  {
    $this->encryptionStatus = $encryptionStatus;
  }
  /**
   * @return string
   */
  public function getEncryptionStatus()
  {
    return $this->encryptionStatus;
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
  public function setFirstSync($firstSync)
  {
    $this->firstSync = $firstSync;
  }
  /**
   * @return string
   */
  public function getFirstSync()
  {
    return $this->firstSync;
  }
  /**
   * @param string
   */
  public function setHardware($hardware)
  {
    $this->hardware = $hardware;
  }
  /**
   * @return string
   */
  public function getHardware()
  {
    return $this->hardware;
  }
  /**
   * @param string
   */
  public function setHardwareId($hardwareId)
  {
    $this->hardwareId = $hardwareId;
  }
  /**
   * @return string
   */
  public function getHardwareId()
  {
    return $this->hardwareId;
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
   * @param bool
   */
  public function setManagedAccountIsOnOwnerProfile($managedAccountIsOnOwnerProfile)
  {
    $this->managedAccountIsOnOwnerProfile = $managedAccountIsOnOwnerProfile;
  }
  /**
   * @return bool
   */
  public function getManagedAccountIsOnOwnerProfile()
  {
    return $this->managedAccountIsOnOwnerProfile;
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
   * @param string[]
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string[]
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
  public function setOs($os)
  {
    $this->os = $os;
  }
  /**
   * @return string
   */
  public function getOs()
  {
    return $this->os;
  }
  /**
   * @param string[]
   */
  public function setOtherAccountsInfo($otherAccountsInfo)
  {
    $this->otherAccountsInfo = $otherAccountsInfo;
  }
  /**
   * @return string[]
   */
  public function getOtherAccountsInfo()
  {
    return $this->otherAccountsInfo;
  }
  /**
   * @param string
   */
  public function setPrivilege($privilege)
  {
    $this->privilege = $privilege;
  }
  /**
   * @return string
   */
  public function getPrivilege()
  {
    return $this->privilege;
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
  public function setResourceId($resourceId)
  {
    $this->resourceId = $resourceId;
  }
  /**
   * @return string
   */
  public function getResourceId()
  {
    return $this->resourceId;
  }
  /**
   * @param string
   */
  public function setSecurityPatchLevel($securityPatchLevel)
  {
    $this->securityPatchLevel = $securityPatchLevel;
  }
  /**
   * @return string
   */
  public function getSecurityPatchLevel()
  {
    return $this->securityPatchLevel;
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
   * @param bool
   */
  public function setSupportsWorkProfile($supportsWorkProfile)
  {
    $this->supportsWorkProfile = $supportsWorkProfile;
  }
  /**
   * @return bool
   */
  public function getSupportsWorkProfile()
  {
    return $this->supportsWorkProfile;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param bool
   */
  public function setUnknownSourcesStatus($unknownSourcesStatus)
  {
    $this->unknownSourcesStatus = $unknownSourcesStatus;
  }
  /**
   * @return bool
   */
  public function getUnknownSourcesStatus()
  {
    return $this->unknownSourcesStatus;
  }
  /**
   * @param string
   */
  public function setUserAgent($userAgent)
  {
    $this->userAgent = $userAgent;
  }
  /**
   * @return string
   */
  public function getUserAgent()
  {
    return $this->userAgent;
  }
  /**
   * @param string
   */
  public function setWifiMacAddress($wifiMacAddress)
  {
    $this->wifiMacAddress = $wifiMacAddress;
  }
  /**
   * @return string
   */
  public function getWifiMacAddress()
  {
    return $this->wifiMacAddress;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MobileDevice::class, 'Google_Service_Directory_MobileDevice');
