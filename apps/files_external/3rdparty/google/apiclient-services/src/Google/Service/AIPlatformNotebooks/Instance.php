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

class Google_Service_AIPlatformNotebooks_Instance extends Google_Collection
{
  protected $collection_key = 'upgradeHistory';
  protected $acceleratorConfigType = 'Google_Service_AIPlatformNotebooks_AcceleratorConfig';
  protected $acceleratorConfigDataType = '';
  public $bootDiskSizeGb;
  public $bootDiskType;
  protected $containerImageType = 'Google_Service_AIPlatformNotebooks_ContainerImage';
  protected $containerImageDataType = '';
  public $createTime;
  public $customGpuDriverPath;
  public $dataDiskSizeGb;
  public $dataDiskType;
  public $diskEncryption;
  protected $disksType = 'Google_Service_AIPlatformNotebooks_Disk';
  protected $disksDataType = 'array';
  public $installGpuDriver;
  public $instanceOwners;
  public $kmsKey;
  public $labels;
  public $machineType;
  public $metadata;
  public $name;
  public $network;
  public $noProxyAccess;
  public $noPublicIp;
  public $noRemoveDataDisk;
  public $postStartupScript;
  public $proxyUri;
  public $serviceAccount;
  public $serviceAccountScopes;
  protected $shieldedInstanceConfigType = 'Google_Service_AIPlatformNotebooks_ShieldedInstanceConfig';
  protected $shieldedInstanceConfigDataType = '';
  public $state;
  public $subnet;
  public $tags;
  public $updateTime;
  protected $upgradeHistoryType = 'Google_Service_AIPlatformNotebooks_UpgradeHistoryEntry';
  protected $upgradeHistoryDataType = 'array';
  protected $vmImageType = 'Google_Service_AIPlatformNotebooks_VmImage';
  protected $vmImageDataType = '';

  /**
   * @param Google_Service_AIPlatformNotebooks_AcceleratorConfig
   */
  public function setAcceleratorConfig(Google_Service_AIPlatformNotebooks_AcceleratorConfig $acceleratorConfig)
  {
    $this->acceleratorConfig = $acceleratorConfig;
  }
  /**
   * @return Google_Service_AIPlatformNotebooks_AcceleratorConfig
   */
  public function getAcceleratorConfig()
  {
    return $this->acceleratorConfig;
  }
  public function setBootDiskSizeGb($bootDiskSizeGb)
  {
    $this->bootDiskSizeGb = $bootDiskSizeGb;
  }
  public function getBootDiskSizeGb()
  {
    return $this->bootDiskSizeGb;
  }
  public function setBootDiskType($bootDiskType)
  {
    $this->bootDiskType = $bootDiskType;
  }
  public function getBootDiskType()
  {
    return $this->bootDiskType;
  }
  /**
   * @param Google_Service_AIPlatformNotebooks_ContainerImage
   */
  public function setContainerImage(Google_Service_AIPlatformNotebooks_ContainerImage $containerImage)
  {
    $this->containerImage = $containerImage;
  }
  /**
   * @return Google_Service_AIPlatformNotebooks_ContainerImage
   */
  public function getContainerImage()
  {
    return $this->containerImage;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setCustomGpuDriverPath($customGpuDriverPath)
  {
    $this->customGpuDriverPath = $customGpuDriverPath;
  }
  public function getCustomGpuDriverPath()
  {
    return $this->customGpuDriverPath;
  }
  public function setDataDiskSizeGb($dataDiskSizeGb)
  {
    $this->dataDiskSizeGb = $dataDiskSizeGb;
  }
  public function getDataDiskSizeGb()
  {
    return $this->dataDiskSizeGb;
  }
  public function setDataDiskType($dataDiskType)
  {
    $this->dataDiskType = $dataDiskType;
  }
  public function getDataDiskType()
  {
    return $this->dataDiskType;
  }
  public function setDiskEncryption($diskEncryption)
  {
    $this->diskEncryption = $diskEncryption;
  }
  public function getDiskEncryption()
  {
    return $this->diskEncryption;
  }
  /**
   * @param Google_Service_AIPlatformNotebooks_Disk[]
   */
  public function setDisks($disks)
  {
    $this->disks = $disks;
  }
  /**
   * @return Google_Service_AIPlatformNotebooks_Disk[]
   */
  public function getDisks()
  {
    return $this->disks;
  }
  public function setInstallGpuDriver($installGpuDriver)
  {
    $this->installGpuDriver = $installGpuDriver;
  }
  public function getInstallGpuDriver()
  {
    return $this->installGpuDriver;
  }
  public function setInstanceOwners($instanceOwners)
  {
    $this->instanceOwners = $instanceOwners;
  }
  public function getInstanceOwners()
  {
    return $this->instanceOwners;
  }
  public function setKmsKey($kmsKey)
  {
    $this->kmsKey = $kmsKey;
  }
  public function getKmsKey()
  {
    return $this->kmsKey;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setMachineType($machineType)
  {
    $this->machineType = $machineType;
  }
  public function getMachineType()
  {
    return $this->machineType;
  }
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  public function getNetwork()
  {
    return $this->network;
  }
  public function setNoProxyAccess($noProxyAccess)
  {
    $this->noProxyAccess = $noProxyAccess;
  }
  public function getNoProxyAccess()
  {
    return $this->noProxyAccess;
  }
  public function setNoPublicIp($noPublicIp)
  {
    $this->noPublicIp = $noPublicIp;
  }
  public function getNoPublicIp()
  {
    return $this->noPublicIp;
  }
  public function setNoRemoveDataDisk($noRemoveDataDisk)
  {
    $this->noRemoveDataDisk = $noRemoveDataDisk;
  }
  public function getNoRemoveDataDisk()
  {
    return $this->noRemoveDataDisk;
  }
  public function setPostStartupScript($postStartupScript)
  {
    $this->postStartupScript = $postStartupScript;
  }
  public function getPostStartupScript()
  {
    return $this->postStartupScript;
  }
  public function setProxyUri($proxyUri)
  {
    $this->proxyUri = $proxyUri;
  }
  public function getProxyUri()
  {
    return $this->proxyUri;
  }
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  public function setServiceAccountScopes($serviceAccountScopes)
  {
    $this->serviceAccountScopes = $serviceAccountScopes;
  }
  public function getServiceAccountScopes()
  {
    return $this->serviceAccountScopes;
  }
  /**
   * @param Google_Service_AIPlatformNotebooks_ShieldedInstanceConfig
   */
  public function setShieldedInstanceConfig(Google_Service_AIPlatformNotebooks_ShieldedInstanceConfig $shieldedInstanceConfig)
  {
    $this->shieldedInstanceConfig = $shieldedInstanceConfig;
  }
  /**
   * @return Google_Service_AIPlatformNotebooks_ShieldedInstanceConfig
   */
  public function getShieldedInstanceConfig()
  {
    return $this->shieldedInstanceConfig;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setSubnet($subnet)
  {
    $this->subnet = $subnet;
  }
  public function getSubnet()
  {
    return $this->subnet;
  }
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  public function getTags()
  {
    return $this->tags;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param Google_Service_AIPlatformNotebooks_UpgradeHistoryEntry[]
   */
  public function setUpgradeHistory($upgradeHistory)
  {
    $this->upgradeHistory = $upgradeHistory;
  }
  /**
   * @return Google_Service_AIPlatformNotebooks_UpgradeHistoryEntry[]
   */
  public function getUpgradeHistory()
  {
    return $this->upgradeHistory;
  }
  /**
   * @param Google_Service_AIPlatformNotebooks_VmImage
   */
  public function setVmImage(Google_Service_AIPlatformNotebooks_VmImage $vmImage)
  {
    $this->vmImage = $vmImage;
  }
  /**
   * @return Google_Service_AIPlatformNotebooks_VmImage
   */
  public function getVmImage()
  {
    return $this->vmImage;
  }
}
