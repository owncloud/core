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
  protected $bootImageType = BootImage::class;
  protected $bootImageDataType = '';
  protected $containerImagesType = ContainerImage::class;
  protected $containerImagesDataType = 'array';
  protected $dataDiskType = LocalDisk::class;
  protected $dataDiskDataType = '';
  protected $encryptionConfigType = EncryptionConfig::class;
  protected $encryptionConfigDataType = '';
  /**
   * @var string[]
   */
  public $guestAttributes;
  /**
   * @var bool
   */
  public $internalIpOnly;
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
  public $network;
  /**
   * @var string
   */
  public $nicType;
  /**
   * @var string
   */
  public $reservedIpRange;
  protected $shieldedInstanceConfigType = RuntimeShieldedInstanceConfig::class;
  protected $shieldedInstanceConfigDataType = '';
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
   * @param BootImage
   */
  public function setBootImage(BootImage $bootImage)
  {
    $this->bootImage = $bootImage;
  }
  /**
   * @return BootImage
   */
  public function getBootImage()
  {
    return $this->bootImage;
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
  /**
   * @param string[]
   */
  public function setGuestAttributes($guestAttributes)
  {
    $this->guestAttributes = $guestAttributes;
  }
  /**
   * @return string[]
   */
  public function getGuestAttributes()
  {
    return $this->guestAttributes;
  }
  /**
   * @param bool
   */
  public function setInternalIpOnly($internalIpOnly)
  {
    $this->internalIpOnly = $internalIpOnly;
  }
  /**
   * @return bool
   */
  public function getInternalIpOnly()
  {
    return $this->internalIpOnly;
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
   * @param string
   */
  public function setReservedIpRange($reservedIpRange)
  {
    $this->reservedIpRange = $reservedIpRange;
  }
  /**
   * @return string
   */
  public function getReservedIpRange()
  {
    return $this->reservedIpRange;
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
class_alias(VirtualMachineConfig::class, 'Google_Service_AIPlatformNotebooks_VirtualMachineConfig');
