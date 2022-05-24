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

class InstanceProperties extends \Google\Collection
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
  public $description;
  protected $disksType = AttachedDisk::class;
  protected $disksDataType = 'array';
  protected $guestAcceleratorsType = AcceleratorConfig::class;
  protected $guestAcceleratorsDataType = 'array';
  /**
   * @var string[]
   */
  public $labels;
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
  public $resourceManagerTags;
  /**
   * @var string[]
   */
  public $resourcePolicies;
  protected $schedulingType = Scheduling::class;
  protected $schedulingDataType = '';
  protected $serviceAccountsType = ServiceAccount::class;
  protected $serviceAccountsDataType = 'array';
  protected $shieldedInstanceConfigType = ShieldedInstanceConfig::class;
  protected $shieldedInstanceConfigDataType = '';
  protected $tagsType = Tags::class;
  protected $tagsDataType = '';

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
  public function setResourceManagerTags($resourceManagerTags)
  {
    $this->resourceManagerTags = $resourceManagerTags;
  }
  /**
   * @return string[]
   */
  public function getResourceManagerTags()
  {
    return $this->resourceManagerTags;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InstanceProperties::class, 'Google_Service_Compute_InstanceProperties');
