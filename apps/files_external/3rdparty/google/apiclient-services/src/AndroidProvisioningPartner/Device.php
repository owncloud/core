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

namespace Google\Service\AndroidProvisioningPartner;

class Device extends \Google\Collection
{
  protected $collection_key = 'claims';
  protected $claimsType = DeviceClaim::class;
  protected $claimsDataType = 'array';
  /**
   * @var string
   */
  public $configuration;
  /**
   * @var string
   */
  public $deviceId;
  protected $deviceIdentifierType = DeviceIdentifier::class;
  protected $deviceIdentifierDataType = '';
  protected $deviceMetadataType = DeviceMetadata::class;
  protected $deviceMetadataDataType = '';
  /**
   * @var string
   */
  public $name;

  /**
   * @param DeviceClaim[]
   */
  public function setClaims($claims)
  {
    $this->claims = $claims;
  }
  /**
   * @return DeviceClaim[]
   */
  public function getClaims()
  {
    return $this->claims;
  }
  /**
   * @param string
   */
  public function setConfiguration($configuration)
  {
    $this->configuration = $configuration;
  }
  /**
   * @return string
   */
  public function getConfiguration()
  {
    return $this->configuration;
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
   * @param DeviceIdentifier
   */
  public function setDeviceIdentifier(DeviceIdentifier $deviceIdentifier)
  {
    $this->deviceIdentifier = $deviceIdentifier;
  }
  /**
   * @return DeviceIdentifier
   */
  public function getDeviceIdentifier()
  {
    return $this->deviceIdentifier;
  }
  /**
   * @param DeviceMetadata
   */
  public function setDeviceMetadata(DeviceMetadata $deviceMetadata)
  {
    $this->deviceMetadata = $deviceMetadata;
  }
  /**
   * @return DeviceMetadata
   */
  public function getDeviceMetadata()
  {
    return $this->deviceMetadata;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Device::class, 'Google_Service_AndroidProvisioningPartner_Device');
