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

namespace Google\Service\AIPlatformNotebooks;

class Instance extends \Google\Collection
{
  protected $collection_key = 'upgradeHistory';
  protected $acceleratorConfigType = AcceleratorConfig::class;
  protected $acceleratorConfigDataType = '';
  /**
   * @var string
   */
  public $bootDiskSizeGb;
  /**
   * @var string
   */
  public $bootDiskType;
  protected $containerImageType = ContainerImage::class;
  protected $containerImageDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $customGpuDriverPath;
  /**
   * @var string
   */
  public $dataDiskSizeGb;
  /**
   * @var string
   */
  public $dataDiskType;
  /**
   * @var string
   */
  public $diskEncryption;
  protected $disksType = Disk::class;
  protected $disksDataType = 'array';
  /**
   * @var bool
   */
  public $installGpuDriver;
  /**
   * @var string[]
   */
  public $instanceOwners;
  /**
   * @var string
   */
  public $kmsKey;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $machineType;
  /**
   * @var string[]
   */
  public $metadata;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $network;
  /**
   * @var string
   */
  public $nicType;
  /**
   * @var bool
   */
  public $noProxyAccess;
  /**
   * @var bool
   */
  public $noPublicIp;
  /**
   * @var bool
   */
  public $noRemoveDataDisk;
  /**
   * @var string
   */
  public $postStartupScript;
  /**
   * @var string
   */
  public $proxyUri;
  protected $reservationAffinityType = ReservationAffinity::class;
  protected $reservationAffinityDataType = '';
  /**
   * @var string
   */
  public $serviceAccount;
  /**
   * @var string[]
   */
  public $serviceAccountScopes;
  protected $shieldedInstanceConfigType = ShieldedInstanceConfig::class;
  protected $shieldedInstanceConfigDataType = '';
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $subnet;
  /**
   * @var string[]
   */
  public $tags;
  /**
   * @var string
   */
  public $updateTime;
  protected $upgradeHistoryType = UpgradeHistoryEntry::class;
  protected $upgradeHistoryDataType = 'array';
  protected $vmImageType = VmImage::class;
  protected $vmImageDataType = '';

  /**
   * @param AcceleratorConfig
   */
  public function setAcceleratorConfig(AcceleratorConfig $acceleratorConfig)
  {
    $this->acceleratorConfig = $acceleratorConfig;
  }
  /**
   * @return AcceleratorConfig
   */
  public function getAcceleratorConfig()
  {
    return $this->acceleratorConfig;
  }
  /**
   * @param string
   */
  public function setBootDiskSizeGb($bootDiskSizeGb)
  {
    $this->bootDiskSizeGb = $bootDiskSizeGb;
  }
  /**
   * @return string
   */
  public function getBootDiskSizeGb()
  {
    return $this->bootDiskSizeGb;
  }
  /**
   * @param string
   */
  public function setBootDiskType($bootDiskType)
  {
    $this->bootDiskType = $bootDiskType;
  }
  /**
   * @return string
   */
  public function getBootDiskType()
  {
    return $this->bootDiskType;
  }
  /**
   * @param ContainerImage
   */
  public function setContainerImage(ContainerImage $containerImage)
  {
    $this->containerImage = $containerImage;
  }
  /**
   * @return ContainerImage
   */
  public function getContainerImage()
  {
    return $this->containerImage;
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
  public function setCustomGpuDriverPath($customGpuDriverPath)
  {
    $this->customGpuDriverPath = $customGpuDriverPath;
  }
  /**
   * @return string
   */
  public function getCustomGpuDriverPath()
  {
    return $this->customGpuDriverPath;
  }
  /**
   * @param string
   */
  public function setDataDiskSizeGb($dataDiskSizeGb)
  {
    $this->dataDiskSizeGb = $dataDiskSizeGb;
  }
  /**
   * @return string
   */
  public function getDataDiskSizeGb()
  {
    return $this->dataDiskSizeGb;
  }
  /**
   * @param string
   */
  public function setDataDiskType($dataDiskType)
  {
    $this->dataDiskType = $dataDiskType;
  }
  /**
   * @return string
   */
  public function getDataDiskType()
  {
    return $this->dataDiskType;
  }
  /**
   * @param string
   */
  public function setDiskEncryption($diskEncryption)
  {
    $this->diskEncryption = $diskEncryption;
  }
  /**
   * @return string
   */
  public function getDiskEncryption()
  {
    return $this->diskEncryption;
  }
  /**
   * @param Disk[]
   */
  public function setDisks($disks)
  {
    $this->disks = $disks;
  }
  /**
   * @return Disk[]
   */
  public function getDisks()
  {
    return $this->disks;
  }
  /**
   * @param bool
   */
  public function setInstallGpuDriver($installGpuDriver)
  {
    $this->installGpuDriver = $installGpuDriver;
  }
  /**
   * @return bool
   */
  public function getInstallGpuDriver()
  {
    return $this->installGpuDriver;
  }
  /**
   * @param string[]
   */
  public function setInstanceOwners($instanceOwners)
  {
    $this->instanceOwners = $instanceOwners;
  }
  /**
   * @return string[]
   */
  public function getInstanceOwners()
  {
    return $this->instanceOwners;
  }
  /**
   * @param string
   */
  public function setKmsKey($kmsKey)
  {
    $this->kmsKey = $kmsKey;
  }
  /**
   * @return string
   */
  public function getKmsKey()
  {
    return $this->kmsKey;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string
   */
  public function setMachineType($machineType)
  {
    $this->machineType = $machineType;
  }
  /**
   * @return string
   */
  public function getMachineType()
  {
    return $this->machineType;
  }
  /**
   * @param string[]
   */
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return string[]
   */
  public function getMetadata()
  {
    return $this->metadata;
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
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  /**
   * @return string
   */
  public function getNetwork()
  {
    return $this->network;
  }
  /**
   * @param string
   */
  public function setNicType($nicType)
  {
    $this->nicType = $nicType;
  }
  /**
   * @return string
   */
  public function getNicType()
  {
    return $this->nicType;
  }
  /**
   * @param bool
   */
  public function setNoProxyAccess($noProxyAccess)
  {
    $this->noProxyAccess = $noProxyAccess;
  }
  /**
   * @return bool
   */
  public function getNoProxyAccess()
  {
    return $this->noProxyAccess;
  }
  /**
   * @param bool
   */
  public function setNoPublicIp($noPublicIp)
  {
    $this->noPublicIp = $noPublicIp;
  }
  /**
   * @return bool
   */
  public function getNoPublicIp()
  {
    return $this->noPublicIp;
  }
  /**
   * @param bool
   */
  public function setNoRemoveDataDisk($noRemoveDataDisk)
  {
    $this->noRemoveDataDisk = $noRemoveDataDisk;
  }
  /**
   * @return bool
   */
  public function getNoRemoveDataDisk()
  {
    return $this->noRemoveDataDisk;
  }
  /**
   * @param string
   */
  public function setPostStartupScript($postStartupScript)
  {
    $this->postStartupScript = $postStartupScript;
  }
  /**
   * @return string
   */
  public function getPostStartupScript()
  {
    return $this->postStartupScript;
  }
  /**
   * @param string
   */
  public function setProxyUri($proxyUri)
  {
    $this->proxyUri = $proxyUri;
  }
  /**
   * @return string
   */
  public function getProxyUri()
  {
    return $this->proxyUri;
  }
  /**
   * @param ReservationAffinity
   */
  public function setReservationAffinity(ReservationAffinity $reservationAffinity)
  {
    $this->reservationAffinity = $reservationAffinity;
  }
  /**
   * @return ReservationAffinity
   */
  public function getReservationAffinity()
  {
    return $this->reservationAffinity;
  }
  /**
   * @param string
   */
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  /**
   * @return string
   */
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  /**
   * @param string[]
   */
  public function setServiceAccountScopes($serviceAccountScopes)
  {
    $this->serviceAccountScopes = $serviceAccountScopes;
  }
  /**
   * @return string[]
   */
  public function getServiceAccountScopes()
  {
    return $this->serviceAccountScopes;
  }
  /**
   * @param ShieldedInstanceConfig
   */
  public function setShieldedInstanceConfig(ShieldedInstanceConfig $shieldedInstanceConfig)
  {
    $this->shieldedInstanceConfig = $shieldedInstanceConfig;
  }
  /**
   * @return ShieldedInstanceConfig
   */
  public function getShieldedInstanceConfig()
  {
    return $this->shieldedInstanceConfig;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setSubnet($subnet)
  {
    $this->subnet = $subnet;
  }
  /**
   * @return string
   */
  public function getSubnet()
  {
    return $this->subnet;
  }
  /**
   * @param string[]
   */
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  /**
   * @return string[]
   */
  public function getTags()
  {
    return $this->tags;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param UpgradeHistoryEntry[]
   */
  public function setUpgradeHistory($upgradeHistory)
  {
    $this->upgradeHistory = $upgradeHistory;
  }
  /**
   * @return UpgradeHistoryEntry[]
   */
  public function getUpgradeHistory()
  {
    return $this->upgradeHistory;
  }
  /**
   * @param VmImage
   */
  public function setVmImage(VmImage $vmImage)
  {
    $this->vmImage = $vmImage;
  }
  /**
   * @return VmImage
   */
  public function getVmImage()
  {
    return $this->vmImage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Instance::class, 'Google_Service_AIPlatformNotebooks_Instance');
