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

namespace Google\Service\Baremetalsolution;

class ProvisioningConfig extends \Google\Collection
{
  protected $collection_key = 'volumes';
  /**
   * @var string
   */
  public $cloudConsoleUri;
  /**
   * @var string
   */
  public $customId;
  /**
   * @var string
   */
  public $email;
  /**
   * @var string
   */
  public $handoverServiceAccount;
  protected $instancesType = InstanceConfig::class;
  protected $instancesDataType = 'array';
  /**
   * @var string
   */
  public $location;
  /**
   * @var string
   */
  public $name;
  protected $networksType = NetworkConfig::class;
  protected $networksDataType = 'array';
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $statusMessage;
  /**
   * @var string
   */
  public $ticketId;
  /**
   * @var string
   */
  public $updateTime;
  protected $volumesType = VolumeConfig::class;
  protected $volumesDataType = 'array';
  /**
   * @var bool
   */
  public $vpcScEnabled;

  /**
   * @param string
   */
  public function setCloudConsoleUri($cloudConsoleUri)
  {
    $this->cloudConsoleUri = $cloudConsoleUri;
  }
  /**
   * @return string
   */
  public function getCloudConsoleUri()
  {
    return $this->cloudConsoleUri;
  }
  /**
   * @param string
   */
  public function setCustomId($customId)
  {
    $this->customId = $customId;
  }
  /**
   * @return string
   */
  public function getCustomId()
  {
    return $this->customId;
  }
  /**
   * @param string
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }
  /**
   * @return string
   */
  public function getEmail()
  {
    return $this->email;
  }
  /**
   * @param string
   */
  public function setHandoverServiceAccount($handoverServiceAccount)
  {
    $this->handoverServiceAccount = $handoverServiceAccount;
  }
  /**
   * @return string
   */
  public function getHandoverServiceAccount()
  {
    return $this->handoverServiceAccount;
  }
  /**
   * @param InstanceConfig[]
   */
  public function setInstances($instances)
  {
    $this->instances = $instances;
  }
  /**
   * @return InstanceConfig[]
   */
  public function getInstances()
  {
    return $this->instances;
  }
  /**
   * @param string
   */
  public function setLocation($location)
  {
    $this->location = $location;
  }
  /**
   * @return string
   */
  public function getLocation()
  {
    return $this->location;
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
   * @param NetworkConfig[]
   */
  public function setNetworks($networks)
  {
    $this->networks = $networks;
  }
  /**
   * @return NetworkConfig[]
   */
  public function getNetworks()
  {
    return $this->networks;
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
   * @param string
   */
  public function setTicketId($ticketId)
  {
    $this->ticketId = $ticketId;
  }
  /**
   * @return string
   */
  public function getTicketId()
  {
    return $this->ticketId;
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
   * @param VolumeConfig[]
   */
  public function setVolumes($volumes)
  {
    $this->volumes = $volumes;
  }
  /**
   * @return VolumeConfig[]
   */
  public function getVolumes()
  {
    return $this->volumes;
  }
  /**
   * @param bool
   */
  public function setVpcScEnabled($vpcScEnabled)
  {
    $this->vpcScEnabled = $vpcScEnabled;
  }
  /**
   * @return bool
   */
  public function getVpcScEnabled()
  {
    return $this->vpcScEnabled;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProvisioningConfig::class, 'Google_Service_Baremetalsolution_ProvisioningConfig');
