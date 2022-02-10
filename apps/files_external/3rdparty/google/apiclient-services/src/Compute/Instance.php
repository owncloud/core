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

namespace Google\Service\Compute;

class Instance extends \Google\Collection
{
  protected $collection_key = 'serviceAccounts';
  protected $advancedMachineFeaturesType = AdvancedMachineFeatures::class;
  protected $advancedMachineFeaturesDataType = '';
  /**
   * @var bool
   */
  public $canIpForward;
  protected $confidentialInstanceConfigType = ConfidentialInstanceConfig::class;
  protected $confidentialInstanceConfigDataType = '';
  /**
   * @var string
   */
  public $cpuPlatform;
  /**
   * @var string
   */
  public $creationTimestamp;
  /**
   * @var bool
   */
  public $deletionProtection;
  /**
   * @var string
   */
  public $description;
  protected $disksType = AttachedDisk::class;
  protected $disksDataType = 'array';
  protected $displayDeviceType = DisplayDevice::class;
  protected $displayDeviceDataType = '';
  /**
   * @var string
   */
  public $fingerprint;
  protected $guestAcceleratorsType = AcceleratorConfig::class;
  protected $guestAcceleratorsDataType = 'array';
  /**
   * @var string
   */
  public $hostname;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $labelFingerprint;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $lastStartTimestamp;
  /**
   * @var string
   */
  public $lastStopTimestamp;
  /**
   * @var string
   */
  public $lastSuspendedTimestamp;
  /**
   * @var string
   */
  public $machineType;
  protected $metadataType = Metadata::class;
  protected $metadataDataType = '';
  /**
   * @var string
   */
  public $minCpuPlatform;
  /**
   * @var string
   */
  public $name;
  protected $networkInterfacesType = NetworkInterface::class;
  protected $networkInterfacesDataType = 'array';
  protected $networkPerformanceConfigType = NetworkPerformanceConfig::class;
  protected $networkPerformanceConfigDataType = '';
  /**
   * @var string
   */
  public $privateIpv6GoogleAccess;
  protected $reservationAffinityType = ReservationAffinity::class;
  protected $reservationAffinityDataType = '';
  /**
   * @var string[]
   */
  public $resourcePolicies;
  /**
   * @var bool
   */
  public $satisfiesPzs;
  protected $schedulingType = Scheduling::class;
  protected $schedulingDataType = '';
  /**
   * @var string
   */
  public $selfLink;
  protected $serviceAccountsType = ServiceAccount::class;
  protected $serviceAccountsDataType = 'array';
  protected $shieldedInstanceConfigType = ShieldedInstanceConfig::class;
  protected $shieldedInstanceConfigDataType = '';
  protected $shieldedInstanceIntegrityPolicyType = ShieldedInstanceIntegrityPolicy::class;
  protected $shieldedInstanceIntegrityPolicyDataType = '';
  /**
   * @var string
   */
  public $sourceMachineImage;
  protected $sourceMachineImageEncryptionKeyType = CustomerEncryptionKey::class;
  protected $sourceMachineImageEncryptionKeyDataType = '';
  /**
   * @var bool
   */
  public $startRestricted;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $statusMessage;
  protected $tagsType = Tags::class;
  protected $tagsDataType = '';
  /**
   * @var string
   */
  public $zone;

  /**
   * @param AdvancedMachineFeatures
   */
  public function setAdvancedMachineFeatures(AdvancedMachineFeatures $advancedMachineFeatures)
  {
    $this->advancedMachineFeatures = $advancedMachineFeatures;
  }
  /**
   * @return AdvancedMachineFeatures
   */
  public function getAdvancedMachineFeatures()
  {
    return $this->advancedMachineFeatures;
  }
  /**
   * @param bool
   */
  public function setCanIpForward($canIpForward)
  {
    $this->canIpForward = $canIpForward;
  }
  /**
   * @return bool
   */
  public function getCanIpForward()
  {
    return $this->canIpForward;
  }
  /**
   * @param ConfidentialInstanceConfig
   */
  public function setConfidentialInstanceConfig(ConfidentialInstanceConfig $confidentialInstanceConfig)
  {
    $this->confidentialInstanceConfig = $confidentialInstanceConfig;
  }
  /**
   * @return ConfidentialInstanceConfig
   */
  public function getConfidentialInstanceConfig()
  {
    return $this->confidentialInstanceConfig;
  }
  /**
   * @param string
   */
  public function setCpuPlatform($cpuPlatform)
  {
    $this->cpuPlatform = $cpuPlatform;
  }
  /**
   * @return string
   */
  public function getCpuPlatform()
  {
    return $this->cpuPlatform;
  }
  /**
   * @param string
   */
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  /**
   * @return string
   */
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  /**
   * @param bool
   */
  public function setDeletionProtection($deletionProtection)
  {
    $this->deletionProtection = $deletionProtection;
  }
  /**
   * @return bool
   */
  public function getDeletionProtection()
  {
    return $this->deletionProtection;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param AttachedDisk[]
   */
  public function setDisks($disks)
  {
    $this->disks = $disks;
  }
  /**
   * @return AttachedDisk[]
   */
  public function getDisks()
  {
    return $this->disks;
  }
  /**
   * @param DisplayDevice
   */
  public function setDisplayDevice(DisplayDevice $displayDevice)
  {
    $this->displayDevice = $displayDevice;
  }
  /**
   * @return DisplayDevice
   */
  public function getDisplayDevice()
  {
    return $this->displayDevice;
  }
  /**
   * @param string
   */
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  /**
   * @return string
   */
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  /**
   * @param AcceleratorConfig[]
   */
  public function setGuestAccelerators($guestAccelerators)
  {
    $this->guestAccelerators = $guestAccelerators;
  }
  /**
   * @return AcceleratorConfig[]
   */
  public function getGuestAccelerators()
  {
    return $this->guestAccelerators;
  }
  /**
   * @param string
   */
  public function setHostname($hostname)
  {
    $this->hostname = $hostname;
  }
  /**
   * @return string
   */
  public function getHostname()
  {
    return $this->hostname;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
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
  public function setLabelFingerprint($labelFingerprint)
  {
    $this->labelFingerprint = $labelFingerprint;
  }
  /**
   * @return string
   */
  public function getLabelFingerprint()
  {
    return $this->labelFingerprint;
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
  public function setLastStartTimestamp($lastStartTimestamp)
  {
    $this->lastStartTimestamp = $lastStartTimestamp;
  }
  /**
   * @return string
   */
  public function getLastStartTimestamp()
  {
    return $this->lastStartTimestamp;
  }
  /**
   * @param string
   */
  public function setLastStopTimestamp($lastStopTimestamp)
  {
    $this->lastStopTimestamp = $lastStopTimestamp;
  }
  /**
   * @return string
   */
  public function getLastStopTimestamp()
  {
    return $this->lastStopTimestamp;
  }
  /**
   * @param string
   */
  public function setLastSuspendedTimestamp($lastSuspendedTimestamp)
  {
    $this->lastSuspendedTimestamp = $lastSuspendedTimestamp;
  }
  /**
   * @return string
   */
  public function getLastSuspendedTimestamp()
  {
    return $this->lastSuspendedTimestamp;
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
   * @param Metadata
   */
  public function setMetadata(Metadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Metadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param string
   */
  public function setMinCpuPlatform($minCpuPlatform)
  {
    $this->minCpuPlatform = $minCpuPlatform;
  }
  /**
   * @return string
   */
  public function getMinCpuPlatform()
  {
    return $this->minCpuPlatform;
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
   * @param NetworkInterface[]
   */
  public function setNetworkInterfaces($networkInterfaces)
  {
    $this->networkInterfaces = $networkInterfaces;
  }
  /**
   * @return NetworkInterface[]
   */
  public function getNetworkInterfaces()
  {
    return $this->networkInterfaces;
  }
  /**
   * @param NetworkPerformanceConfig
   */
  public function setNetworkPerformanceConfig(NetworkPerformanceConfig $networkPerformanceConfig)
  {
    $this->networkPerformanceConfig = $networkPerformanceConfig;
  }
  /**
   * @return NetworkPerformanceConfig
   */
  public function getNetworkPerformanceConfig()
  {
    return $this->networkPerformanceConfig;
  }
  /**
   * @param string
   */
  public function setPrivateIpv6GoogleAccess($privateIpv6GoogleAccess)
  {
    $this->privateIpv6GoogleAccess = $privateIpv6GoogleAccess;
  }
  /**
   * @return string
   */
  public function getPrivateIpv6GoogleAccess()
  {
    return $this->privateIpv6GoogleAccess;
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
   * @param string[]
   */
  public function setResourcePolicies($resourcePolicies)
  {
    $this->resourcePolicies = $resourcePolicies;
  }
  /**
   * @return string[]
   */
  public function getResourcePolicies()
  {
    return $this->resourcePolicies;
  }
  /**
   * @param bool
   */
  public function setSatisfiesPzs($satisfiesPzs)
  {
    $this->satisfiesPzs = $satisfiesPzs;
  }
  /**
   * @return bool
   */
  public function getSatisfiesPzs()
  {
    return $this->satisfiesPzs;
  }
  /**
   * @param Scheduling
   */
  public function setScheduling(Scheduling $scheduling)
  {
    $this->scheduling = $scheduling;
  }
  /**
   * @return Scheduling
   */
  public function getScheduling()
  {
    return $this->scheduling;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param ServiceAccount[]
   */
  public function setServiceAccounts($serviceAccounts)
  {
    $this->serviceAccounts = $serviceAccounts;
  }
  /**
   * @return ServiceAccount[]
   */
  public function getServiceAccounts()
  {
    return $this->serviceAccounts;
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
   * @param ShieldedInstanceIntegrityPolicy
   */
  public function setShieldedInstanceIntegrityPolicy(ShieldedInstanceIntegrityPolicy $shieldedInstanceIntegrityPolicy)
  {
    $this->shieldedInstanceIntegrityPolicy = $shieldedInstanceIntegrityPolicy;
  }
  /**
   * @return ShieldedInstanceIntegrityPolicy
   */
  public function getShieldedInstanceIntegrityPolicy()
  {
    return $this->shieldedInstanceIntegrityPolicy;
  }
  /**
   * @param string
   */
  public function setSourceMachineImage($sourceMachineImage)
  {
    $this->sourceMachineImage = $sourceMachineImage;
  }
  /**
   * @return string
   */
  public function getSourceMachineImage()
  {
    return $this->sourceMachineImage;
  }
  /**
   * @param CustomerEncryptionKey
   */
  public function setSourceMachineImageEncryptionKey(CustomerEncryptionKey $sourceMachineImageEncryptionKey)
  {
    $this->sourceMachineImageEncryptionKey = $sourceMachineImageEncryptionKey;
  }
  /**
   * @return CustomerEncryptionKey
   */
  public function getSourceMachineImageEncryptionKey()
  {
    return $this->sourceMachineImageEncryptionKey;
  }
  /**
   * @param bool
   */
  public function setStartRestricted($startRestricted)
  {
    $this->startRestricted = $startRestricted;
  }
  /**
   * @return bool
   */
  public function getStartRestricted()
  {
    return $this->startRestricted;
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
  public function setStatusMessage($statusMessage)
  {
    $this->statusMessage = $statusMessage;
  }
  /**
   * @return string
   */
  public function getStatusMessage()
  {
    return $this->statusMessage;
  }
  /**
   * @param Tags
   */
  public function setTags(Tags $tags)
  {
    $this->tags = $tags;
  }
  /**
   * @return Tags
   */
  public function getTags()
  {
    return $this->tags;
  }
  /**
   * @param string
   */
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  /**
   * @return string
   */
  public function getZone()
  {
    return $this->zone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Instance::class, 'Google_Service_Compute_Instance');
