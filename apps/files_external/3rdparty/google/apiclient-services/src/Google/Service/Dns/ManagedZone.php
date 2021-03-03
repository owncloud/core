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

class Google_Service_Dns_ManagedZone extends Google_Collection
{
  protected $collection_key = 'nameServers';
  public $creationTime;
  public $description;
  public $dnsName;
  protected $dnssecConfigType = 'Google_Service_Dns_ManagedZoneDnsSecConfig';
  protected $dnssecConfigDataType = '';
  protected $forwardingConfigType = 'Google_Service_Dns_ManagedZoneForwardingConfig';
  protected $forwardingConfigDataType = '';
  public $id;
  public $kind;
  public $labels;
  public $name;
  public $nameServerSet;
  public $nameServers;
  protected $peeringConfigType = 'Google_Service_Dns_ManagedZonePeeringConfig';
  protected $peeringConfigDataType = '';
  protected $privateVisibilityConfigType = 'Google_Service_Dns_ManagedZonePrivateVisibilityConfig';
  protected $privateVisibilityConfigDataType = '';
  protected $reverseLookupConfigType = 'Google_Service_Dns_ManagedZoneReverseLookupConfig';
  protected $reverseLookupConfigDataType = '';
  protected $serviceDirectoryConfigType = 'Google_Service_Dns_ManagedZoneServiceDirectoryConfig';
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
   * @param Google_Service_Dns_ManagedZoneDnsSecConfig
   */
  public function setDnssecConfig(Google_Service_Dns_ManagedZoneDnsSecConfig $dnssecConfig)
  {
    $this->dnssecConfig = $dnssecConfig;
  }
  /**
   * @return Google_Service_Dns_ManagedZoneDnsSecConfig
   */
  public function getDnssecConfig()
  {
    return $this->dnssecConfig;
  }
  /**
   * @param Google_Service_Dns_ManagedZoneForwardingConfig
   */
  public function setForwardingConfig(Google_Service_Dns_ManagedZoneForwardingConfig $forwardingConfig)
  {
    $this->forwardingConfig = $forwardingConfig;
  }
  /**
   * @return Google_Service_Dns_ManagedZoneForwardingConfig
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
   * @param Google_Service_Dns_ManagedZonePeeringConfig
   */
  public function setPeeringConfig(Google_Service_Dns_ManagedZonePeeringConfig $peeringConfig)
  {
    $this->peeringConfig = $peeringConfig;
  }
  /**
   * @return Google_Service_Dns_ManagedZonePeeringConfig
   */
  public function getPeeringConfig()
  {
    return $this->peeringConfig;
  }
  /**
   * @param Google_Service_Dns_ManagedZonePrivateVisibilityConfig
   */
  public function setPrivateVisibilityConfig(Google_Service_Dns_ManagedZonePrivateVisibilityConfig $privateVisibilityConfig)
  {
    $this->privateVisibilityConfig = $privateVisibilityConfig;
  }
  /**
   * @return Google_Service_Dns_ManagedZonePrivateVisibilityConfig
   */
  public function getPrivateVisibilityConfig()
  {
    return $this->privateVisibilityConfig;
  }
  /**
   * @param Google_Service_Dns_ManagedZoneReverseLookupConfig
   */
  public function setReverseLookupConfig(Google_Service_Dns_ManagedZoneReverseLookupConfig $reverseLookupConfig)
  {
    $this->reverseLookupConfig = $reverseLookupConfig;
  }
  /**
   * @return Google_Service_Dns_ManagedZoneReverseLookupConfig
   */
  public function getReverseLookupConfig()
  {
    return $this->reverseLookupConfig;
  }
  /**
   * @param Google_Service_Dns_ManagedZoneServiceDirectoryConfig
   */
  public function setServiceDirectoryConfig(Google_Service_Dns_ManagedZoneServiceDirectoryConfig $serviceDirectoryConfig)
  {
    $this->serviceDirectoryConfig = $serviceDirectoryConfig;
  }
  /**
   * @return Google_Service_Dns_ManagedZoneServiceDirectoryConfig
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
