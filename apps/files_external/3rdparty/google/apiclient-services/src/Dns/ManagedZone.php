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

namespace Google\Service\Dns;

class ManagedZone extends \Google\Collection
{
  protected $collection_key = 'nameServers';
  protected $cloudLoggingConfigType = ManagedZoneCloudLoggingConfig::class;
  protected $cloudLoggingConfigDataType = '';
  /**
   * @var string
   */
  public $creationTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $dnsName;
  protected $dnssecConfigType = ManagedZoneDnsSecConfig::class;
  protected $dnssecConfigDataType = '';
  protected $forwardingConfigType = ManagedZoneForwardingConfig::class;
  protected $forwardingConfigDataType = '';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $nameServerSet;
  /**
   * @var string[]
   */
  public $nameServers;
  protected $peeringConfigType = ManagedZonePeeringConfig::class;
  protected $peeringConfigDataType = '';
  protected $privateVisibilityConfigType = ManagedZonePrivateVisibilityConfig::class;
  protected $privateVisibilityConfigDataType = '';
  protected $reverseLookupConfigType = ManagedZoneReverseLookupConfig::class;
  protected $reverseLookupConfigDataType = '';
  protected $serviceDirectoryConfigType = ManagedZoneServiceDirectoryConfig::class;
  protected $serviceDirectoryConfigDataType = '';
  /**
   * @var string
   */
  public $visibility;

  /**
   * @param ManagedZoneCloudLoggingConfig
   */
  public function setCloudLoggingConfig(ManagedZoneCloudLoggingConfig $cloudLoggingConfig)
  {
    $this->cloudLoggingConfig = $cloudLoggingConfig;
  }
  /**
   * @return ManagedZoneCloudLoggingConfig
   */
  public function getCloudLoggingConfig()
  {
    return $this->cloudLoggingConfig;
  }
  /**
   * @param string
   */
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  /**
   * @return string
   */
  public function getCreationTime()
  {
    return $this->creationTime;
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
   * @param string
   */
  public function setDnsName($dnsName)
  {
    $this->dnsName = $dnsName;
  }
  /**
   * @return string
   */
  public function getDnsName()
  {
    return $this->dnsName;
  }
  /**
   * @param ManagedZoneDnsSecConfig
   */
  public function setDnssecConfig(ManagedZoneDnsSecConfig $dnssecConfig)
  {
    $this->dnssecConfig = $dnssecConfig;
  }
  /**
   * @return ManagedZoneDnsSecConfig
   */
  public function getDnssecConfig()
  {
    return $this->dnssecConfig;
  }
  /**
   * @param ManagedZoneForwardingConfig
   */
  public function setForwardingConfig(ManagedZoneForwardingConfig $forwardingConfig)
  {
    $this->forwardingConfig = $forwardingConfig;
  }
  /**
   * @return ManagedZoneForwardingConfig
   */
  public function getForwardingConfig()
  {
    return $this->forwardingConfig;
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
  public function setNameServerSet($nameServerSet)
  {
    $this->nameServerSet = $nameServerSet;
  }
  /**
   * @return string
   */
  public function getNameServerSet()
  {
    return $this->nameServerSet;
  }
  /**
   * @param string[]
   */
  public function setNameServers($nameServers)
  {
    $this->nameServers = $nameServers;
  }
  /**
   * @return string[]
   */
  public function getNameServers()
  {
    return $this->nameServers;
  }
  /**
   * @param ManagedZonePeeringConfig
   */
  public function setPeeringConfig(ManagedZonePeeringConfig $peeringConfig)
  {
    $this->peeringConfig = $peeringConfig;
  }
  /**
   * @return ManagedZonePeeringConfig
   */
  public function getPeeringConfig()
  {
    return $this->peeringConfig;
  }
  /**
   * @param ManagedZonePrivateVisibilityConfig
   */
  public function setPrivateVisibilityConfig(ManagedZonePrivateVisibilityConfig $privateVisibilityConfig)
  {
    $this->privateVisibilityConfig = $privateVisibilityConfig;
  }
  /**
   * @return ManagedZonePrivateVisibilityConfig
   */
  public function getPrivateVisibilityConfig()
  {
    return $this->privateVisibilityConfig;
  }
  /**
   * @param ManagedZoneReverseLookupConfig
   */
  public function setReverseLookupConfig(ManagedZoneReverseLookupConfig $reverseLookupConfig)
  {
    $this->reverseLookupConfig = $reverseLookupConfig;
  }
  /**
   * @return ManagedZoneReverseLookupConfig
   */
  public function getReverseLookupConfig()
  {
    return $this->reverseLookupConfig;
  }
  /**
   * @param ManagedZoneServiceDirectoryConfig
   */
  public function setServiceDirectoryConfig(ManagedZoneServiceDirectoryConfig $serviceDirectoryConfig)
  {
    $this->serviceDirectoryConfig = $serviceDirectoryConfig;
  }
  /**
   * @return ManagedZoneServiceDirectoryConfig
   */
  public function getServiceDirectoryConfig()
  {
    return $this->serviceDirectoryConfig;
  }
  /**
   * @param string
   */
  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
  }
  /**
   * @return string
   */
  public function getVisibility()
  {
    return $this->visibility;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManagedZone::class, 'Google_Service_Dns_ManagedZone');
