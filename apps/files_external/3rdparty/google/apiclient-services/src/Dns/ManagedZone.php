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
  public $creationTime;
  public $description;
  public $dnsName;
  protected $dnssecConfigType = ManagedZoneDnsSecConfig::class;
  protected $dnssecConfigDataType = '';
  protected $forwardingConfigType = ManagedZoneForwardingConfig::class;
  protected $forwardingConfigDataType = '';
  public $id;
  public $kind;
  public $labels;
  public $name;
  public $nameServerSet;
  public $nameServers;
  protected $peeringConfigType = ManagedZonePeeringConfig::class;
  protected $peeringConfigDataType = '';
  protected $privateVisibilityConfigType = ManagedZonePrivateVisibilityConfig::class;
  protected $privateVisibilityConfigDataType = '';
  protected $reverseLookupConfigType = ManagedZoneReverseLookupConfig::class;
  protected $reverseLookupConfigDataType = '';
  protected $serviceDirectoryConfigType = ManagedZoneServiceDirectoryConfig::class;
  protected $serviceDirectoryConfigDataType = '';
  public $visibility;

  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDnsName($dnsName)
  {
    $this->dnsName = $dnsName;
  }
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
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNameServerSet($nameServerSet)
  {
    $this->nameServerSet = $nameServerSet;
  }
  public function getNameServerSet()
  {
    return $this->nameServerSet;
  }
  public function setNameServers($nameServers)
  {
    $this->nameServers = $nameServers;
  }
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
  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
  }
  public function getVisibility()
  {
    return $this->visibility;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManagedZone::class, 'Google_Service_Dns_ManagedZone');
