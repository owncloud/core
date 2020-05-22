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

class Google_Service_Dns_Quota extends Google_Collection
{
  protected $collection_key = 'whitelistedKeySpecs';
  public $dnsKeysPerManagedZone;
  public $kind;
  public $managedZones;
  public $managedZonesPerNetwork;
  public $networksPerManagedZone;
  public $networksPerPolicy;
  public $policies;
  public $resourceRecordsPerRrset;
  public $rrsetAdditionsPerChange;
  public $rrsetDeletionsPerChange;
  public $rrsetsPerManagedZone;
  public $targetNameServersPerManagedZone;
  public $targetNameServersPerPolicy;
  public $totalRrdataSizePerChange;
  protected $whitelistedKeySpecsType = 'Google_Service_Dns_DnsKeySpec';
  protected $whitelistedKeySpecsDataType = 'array';

  public function setDnsKeysPerManagedZone($dnsKeysPerManagedZone)
  {
    $this->dnsKeysPerManagedZone = $dnsKeysPerManagedZone;
  }
  public function getDnsKeysPerManagedZone()
  {
    return $this->dnsKeysPerManagedZone;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setManagedZones($managedZones)
  {
    $this->managedZones = $managedZones;
  }
  public function getManagedZones()
  {
    return $this->managedZones;
  }
  public function setManagedZonesPerNetwork($managedZonesPerNetwork)
  {
    $this->managedZonesPerNetwork = $managedZonesPerNetwork;
  }
  public function getManagedZonesPerNetwork()
  {
    return $this->managedZonesPerNetwork;
  }
  public function setNetworksPerManagedZone($networksPerManagedZone)
  {
    $this->networksPerManagedZone = $networksPerManagedZone;
  }
  public function getNetworksPerManagedZone()
  {
    return $this->networksPerManagedZone;
  }
  public function setNetworksPerPolicy($networksPerPolicy)
  {
    $this->networksPerPolicy = $networksPerPolicy;
  }
  public function getNetworksPerPolicy()
  {
    return $this->networksPerPolicy;
  }
  public function setPolicies($policies)
  {
    $this->policies = $policies;
  }
  public function getPolicies()
  {
    return $this->policies;
  }
  public function setResourceRecordsPerRrset($resourceRecordsPerRrset)
  {
    $this->resourceRecordsPerRrset = $resourceRecordsPerRrset;
  }
  public function getResourceRecordsPerRrset()
  {
    return $this->resourceRecordsPerRrset;
  }
  public function setRrsetAdditionsPerChange($rrsetAdditionsPerChange)
  {
    $this->rrsetAdditionsPerChange = $rrsetAdditionsPerChange;
  }
  public function getRrsetAdditionsPerChange()
  {
    return $this->rrsetAdditionsPerChange;
  }
  public function setRrsetDeletionsPerChange($rrsetDeletionsPerChange)
  {
    $this->rrsetDeletionsPerChange = $rrsetDeletionsPerChange;
  }
  public function getRrsetDeletionsPerChange()
  {
    return $this->rrsetDeletionsPerChange;
  }
  public function setRrsetsPerManagedZone($rrsetsPerManagedZone)
  {
    $this->rrsetsPerManagedZone = $rrsetsPerManagedZone;
  }
  public function getRrsetsPerManagedZone()
  {
    return $this->rrsetsPerManagedZone;
  }
  public function setTargetNameServersPerManagedZone($targetNameServersPerManagedZone)
  {
    $this->targetNameServersPerManagedZone = $targetNameServersPerManagedZone;
  }
  public function getTargetNameServersPerManagedZone()
  {
    return $this->targetNameServersPerManagedZone;
  }
  public function setTargetNameServersPerPolicy($targetNameServersPerPolicy)
  {
    $this->targetNameServersPerPolicy = $targetNameServersPerPolicy;
  }
  public function getTargetNameServersPerPolicy()
  {
    return $this->targetNameServersPerPolicy;
  }
  public function setTotalRrdataSizePerChange($totalRrdataSizePerChange)
  {
    $this->totalRrdataSizePerChange = $totalRrdataSizePerChange;
  }
  public function getTotalRrdataSizePerChange()
  {
    return $this->totalRrdataSizePerChange;
  }
  /**
   * @param Google_Service_Dns_DnsKeySpec
   */
  public function setWhitelistedKeySpecs($whitelistedKeySpecs)
  {
    $this->whitelistedKeySpecs = $whitelistedKeySpecs;
  }
  /**
   * @return Google_Service_Dns_DnsKeySpec
   */
  public function getWhitelistedKeySpecs()
  {
    return $this->whitelistedKeySpecs;
  }
}
