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

class Google_Service_AIPlatformNotebooks_VirtualMachineConfig extends Google_Collection
{
  protected $collection_key = 'tags';
  protected $acceleratorConfigType = 'Google_Service_AIPlatformNotebooks_RuntimeAcceleratorConfig';
  protected $acceleratorConfigDataType = '';
  protected $containerImagesType = 'Google_Service_AIPlatformNotebooks_ContainerImage';
  protected $containerImagesDataType = 'array';
  protected $dataDiskType = 'Google_Service_AIPlatformNotebooks_LocalDisk';
  protected $dataDiskDataType = '';
  protected $encryptionConfigType = 'Google_Service_AIPlatformNotebooks_EncryptionConfig';
  protected $encryptionConfigDataType = '';
  public $guestAttributes;
  public $internalIpOnly;
  public $labels;
  public $machineType;
  public $metadata;
  public $network;
  public $nicType;
  protected $shieldedInstanceConfigType = 'Google_Service_AIPlatformNotebooks_RuntimeShieldedInstanceConfig';
  protected $shieldedInstanceConfigDataType = '';
  public $subnet;
  public $tags;
  public $zone;

  /**
   * @param Google_Service_AIPlatformNotebooks_RuntimeAcceleratorConfig
   */
  public function setAcceleratorConfig(Google_Service_AIPlatformNotebooks_RuntimeAcceleratorConfig $acceleratorConfig)
  {
    $this->acceleratorConfig = $acceleratorConfig;
  }
  /**
   * @return Google_Service_AIPlatformNotebooks_RuntimeAcceleratorConfig
   */
  public function getAcceleratorConfig()
  {
    return $this->acceleratorConfig;
  }
  /**
   * @param Google_Service_AIPlatformNotebooks_ContainerImage[]
   */
  public function setContainerImages($containerImages)
  {
    $this->containerImages = $containerImages;
  }
  /**
   * @return Google_Service_AIPlatformNotebooks_ContainerImage[]
   */
  public function getContainerImages()
  {
    return $this->containerImages;
  }
  /**
   * @param Google_Service_AIPlatformNotebooks_LocalDisk
   */
  public function setDataDisk(Google_Service_AIPlatformNotebooks_LocalDisk $dataDisk)
  {
    $this->dataDisk = $dataDisk;
  }
  /**
   * @return Google_Service_AIPlatformNotebooks_LocalDisk
   */
  public function getDataDisk()
  {
    return $this->dataDisk;
  }
  /**
   * @param Google_Service_AIPlatformNotebooks_EncryptionConfig
   */
  public function setEncryptionConfig(Google_Service_AIPlatformNotebooks_EncryptionConfig $encryptionConfig)
  {
    $this->encryptionConfig = $encryptionConfig;
  }
  /**
   * @return Google_Service_AIPlatformNotebooks_EncryptionConfig
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
   * @param Google_Service_AIPlatformNotebooks_RuntimeShieldedInstanceConfig
   */
  public function setShieldedInstanceConfig(Google_Service_AIPlatformNotebooks_RuntimeShieldedInstanceConfig $shieldedInstanceConfig)
  {
    $this->shieldedInstanceConfig = $shieldedInstanceConfig;
  }
  /**
   * @return Google_Service_AIPlatformNotebooks_RuntimeShieldedInstanceConfig
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
