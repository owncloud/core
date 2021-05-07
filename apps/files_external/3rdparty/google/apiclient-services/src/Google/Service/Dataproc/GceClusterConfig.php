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

class Google_Service_Dataproc_GceClusterConfig extends Google_Collection
{
  protected $collection_key = 'tags';
  protected $confidentialInstanceConfigType = 'Google_Service_Dataproc_ConfidentialInstanceConfig';
  protected $confidentialInstanceConfigDataType = '';
  public $internalIpOnly;
  public $metadata;
  public $networkUri;
  protected $nodeGroupAffinityType = 'Google_Service_Dataproc_NodeGroupAffinity';
  protected $nodeGroupAffinityDataType = '';
  public $privateIpv6GoogleAccess;
  protected $reservationAffinityType = 'Google_Service_Dataproc_ReservationAffinity';
  protected $reservationAffinityDataType = '';
  public $serviceAccount;
  public $serviceAccountScopes;
  protected $shieldedInstanceConfigType = 'Google_Service_Dataproc_ShieldedInstanceConfig';
  protected $shieldedInstanceConfigDataType = '';
  public $subnetworkUri;
  public $tags;
  public $zoneUri;

  /**
   * @param Google_Service_Dataproc_ConfidentialInstanceConfig
   */
  public function setConfidentialInstanceConfig(Google_Service_Dataproc_ConfidentialInstanceConfig $confidentialInstanceConfig)
  {
    $this->confidentialInstanceConfig = $confidentialInstanceConfig;
  }
  /**
   * @return Google_Service_Dataproc_ConfidentialInstanceConfig
   */
  public function getConfidentialInstanceConfig()
  {
    return $this->confidentialInstanceConfig;
  }
  public function setInternalIpOnly($internalIpOnly)
  {
    $this->internalIpOnly = $internalIpOnly;
  }
  public function getInternalIpOnly()
  {
    return $this->internalIpOnly;
  }
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setNetworkUri($networkUri)
  {
    $this->networkUri = $networkUri;
  }
  public function getNetworkUri()
  {
    return $this->networkUri;
  }
  /**
   * @param Google_Service_Dataproc_NodeGroupAffinity
   */
  public function setNodeGroupAffinity(Google_Service_Dataproc_NodeGroupAffinity $nodeGroupAffinity)
  {
    $this->nodeGroupAffinity = $nodeGroupAffinity;
  }
  /**
   * @return Google_Service_Dataproc_NodeGroupAffinity
   */
  public function getNodeGroupAffinity()
  {
    return $this->nodeGroupAffinity;
  }
  public function setPrivateIpv6GoogleAccess($privateIpv6GoogleAccess)
  {
    $this->privateIpv6GoogleAccess = $privateIpv6GoogleAccess;
  }
  public function getPrivateIpv6GoogleAccess()
  {
    return $this->privateIpv6GoogleAccess;
  }
  /**
   * @param Google_Service_Dataproc_ReservationAffinity
   */
  public function setReservationAffinity(Google_Service_Dataproc_ReservationAffinity $reservationAffinity)
  {
    $this->reservationAffinity = $reservationAffinity;
  }
  /**
   * @return Google_Service_Dataproc_ReservationAffinity
   */
  public function getReservationAffinity()
  {
    return $this->reservationAffinity;
  }
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  public function setServiceAccountScopes($serviceAccountScopes)
  {
    $this->serviceAccountScopes = $serviceAccountScopes;
  }
  public function getServiceAccountScopes()
  {
    return $this->serviceAccountScopes;
  }
  /**
   * @param Google_Service_Dataproc_ShieldedInstanceConfig
   */
  public function setShieldedInstanceConfig(Google_Service_Dataproc_ShieldedInstanceConfig $shieldedInstanceConfig)
  {
    $this->shieldedInstanceConfig = $shieldedInstanceConfig;
  }
  /**
   * @return Google_Service_Dataproc_ShieldedInstanceConfig
   */
  public function getShieldedInstanceConfig()
  {
    return $this->shieldedInstanceConfig;
  }
  public function setSubnetworkUri($subnetworkUri)
  {
    $this->subnetworkUri = $subnetworkUri;
  }
  public function getSubnetworkUri()
  {
    return $this->subnetworkUri;
  }
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  public function getTags()
  {
    return $this->tags;
  }
  public function setZoneUri($zoneUri)
  {
    $this->zoneUri = $zoneUri;
  }
  public function getZoneUri()
  {
    return $this->zoneUri;
  }
}
