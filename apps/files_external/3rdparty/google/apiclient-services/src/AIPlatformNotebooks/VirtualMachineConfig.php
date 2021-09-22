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

class VirtualMachineConfig extends \Google\Collection
{
  protected $collection_key = 'tags';
  protected $acceleratorConfigType = RuntimeAcceleratorConfig::class;
  protected $acceleratorConfigDataType = '';
  protected $containerImagesType = ContainerImage::class;
  protected $containerImagesDataType = 'array';
  protected $dataDiskType = LocalDisk::class;
  protected $dataDiskDataType = '';
  protected $encryptionConfigType = EncryptionConfig::class;
  protected $encryptionConfigDataType = '';
  public $guestAttributes;
  public $internalIpOnly;
  public $labels;
  public $machineType;
  public $metadata;
  public $network;
  public $nicType;
  protected $shieldedInstanceConfigType = RuntimeShieldedInstanceConfig::class;
  protected $shieldedInstanceConfigDataType = '';
  public $subnet;
  public $tags;
  public $zone;

  /**
   * @param RuntimeAcceleratorConfig
   */
  public function setAcceleratorConfig(RuntimeAcceleratorConfig $acceleratorConfig)
  {
    $this->acceleratorConfig = $acceleratorConfig;
  }
  /**
   * @return RuntimeAcceleratorConfig
   */
  public function getAcceleratorConfig()
  {
    return $this->acceleratorConfig;
  }
  /**
   * @param ContainerImage[]
   */
  public function setContainerImages($containerImages)
  {
    $this->containerImages = $containerImages;
  }
  /**
   * @return ContainerImage[]
   */
  public function getContainerImages()
  {
    return $this->containerImages;
  }
  /**
   * @param LocalDisk
   */
  public function setDataDisk(LocalDisk $dataDisk)
  {
    $this->dataDisk = $dataDisk;
  }
  /**
   * @return LocalDisk
   */
  public function getDataDisk()
  {
    return $this->dataDisk;
  }
  /**
   * @param EncryptionConfig
   */
  public function setEncryptionConfig(EncryptionConfig $encryptionConfig)
  {
    $this->encryptionConfig = $encryptionConfig;
  }
  /**
   * @return EncryptionConfig
   */
  public function getEncryptionConfig()
  {
    return $this->encryptionConfig;
  }
  public function setGuestAttributes($guestAttributes)
  {
    $this->guestAttributes = $guestAttributes;
  }
  public function getGuestAttributes()
  {
    return $this->guestAttributes;
  }
  public function setInternalIpOnly($internalIpOnly)
  {
    $this->internalIpOnly = $internalIpOnly;
  }
  public function getInternalIpOnly()
  {
    return $this->internalIpOnly;
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
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  public function getNetwork()
  {
    return $this->network;
  }
  public function setNicType($nicType)
  {
    $this->nicType = $nicType;
  }
  public function getNicType()
  {
    return $this->nicType;
  }
  /**
   * @param RuntimeShieldedInstanceConfig
   */
  public function setShieldedInstanceConfig(RuntimeShieldedInstanceConfig $shieldedInstanceConfig)
  {
    $this->shieldedInstanceConfig = $shieldedInstanceConfig;
  }
  /**
   * @return RuntimeShieldedInstanceConfig
   */
  public function getShieldedInstanceConfig()
  {
    return $this->shieldedInstanceConfig;
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
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  public function getZone()
  {
    return $this->zone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VirtualMachineConfig::class, 'Google_Service_AIPlatformNotebooks_VirtualMachineConfig');
