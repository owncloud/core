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

namespace Google\Service\Dataproc;

class GceClusterConfig extends \Google\Collection
{
  protected $collection_key = 'tags';
  protected $confidentialInstanceConfigType = ConfidentialInstanceConfig::class;
  protected $confidentialInstanceConfigDataType = '';
  /**
   * @var bool
   */
  public $internalIpOnly;
  /**
   * @var string[]
   */
  public $metadata;
  /**
   * @var string
   */
  public $networkUri;
  protected $nodeGroupAffinityType = NodeGroupAffinity::class;
  protected $nodeGroupAffinityDataType = '';
  /**
   * @var string
   */
  public $privateIpv6GoogleAccess;
  protected $reservationAffinityType = ReservationAffinity::class;
  protected $reservationAffinityDataType = '';
  /**
   * @var string
   */
  public $serviceAccount;
  /**
   * @var string[]
   */
  public $serviceAccountScopes;
  protected $shieldedInstanceConfigType = ShieldedInstanceConfig::class;
  protected $shieldedInstanceConfigDataType = '';
  /**
   * @var string
   */
  public $subnetworkUri;
  /**
   * @var string[]
   */
  public $tags;
  /**
   * @var string
   */
  public $zoneUri;

  /**
   * @param ConfidentialInstanceConfig
   */
  public function setConfidentialInstanceConfig(ConfidentialInstanceConfig $confidentialInstanceConfig)
  {
    $this->confidentialInstanceConfig = $confidentialInstanceConfig;
  }
  /**
   * @return ConfidentialInstanceConfig
   */
  public function getConfidentialInstanceConfig()
  {
    return $this->confidentialInstanceConfig;
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
  public function setNetworkUri($networkUri)
  {
    $this->networkUri = $networkUri;
  }
  /**
   * @return string
   */
  public function getNetworkUri()
  {
    return $this->networkUri;
  }
  /**
   * @param NodeGroupAffinity
   */
  public function setNodeGroupAffinity(NodeGroupAffinity $nodeGroupAffinity)
  {
    $this->nodeGroupAffinity = $nodeGroupAffinity;
  }
  /**
   * @return NodeGroupAffinity
   */
  public function getNodeGroupAffinity()
  {
    return $this->nodeGroupAffinity;
  }
  /**
   * @param string
   */
  public function setPrivateIpv6GoogleAccess($privateIpv6GoogleAccess)
  {
    $this->privateIpv6GoogleAccess = $privateIpv6GoogleAccess;
  }
  /**
   * @return string
   */
  public function getPrivateIpv6GoogleAccess()
  {
    return $this->privateIpv6GoogleAccess;
  }
  /**
   * @param ReservationAffinity
   */
  public function setReservationAffinity(ReservationAffinity $reservationAffinity)
  {
    $this->reservationAffinity = $reservationAffinity;
  }
  /**
   * @return ReservationAffinity
   */
  public function getReservationAffinity()
  {
    return $this->reservationAffinity;
  }
  /**
   * @param string
   */
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  /**
   * @return string
   */
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  /**
   * @param string[]
   */
  public function setServiceAccountScopes($serviceAccountScopes)
  {
    $this->serviceAccountScopes = $serviceAccountScopes;
  }
  /**
   * @return string[]
   */
  public function getServiceAccountScopes()
  {
    return $this->serviceAccountScopes;
  }
  /**
   * @param ShieldedInstanceConfig
   */
  public function setShieldedInstanceConfig(ShieldedInstanceConfig $shieldedInstanceConfig)
  {
    $this->shieldedInstanceConfig = $shieldedInstanceConfig;
  }
  /**
   * @return ShieldedInstanceConfig
   */
  public function getShieldedInstanceConfig()
  {
    return $this->shieldedInstanceConfig;
  }
  /**
   * @param string
   */
  public function setSubnetworkUri($subnetworkUri)
  {
    $this->subnetworkUri = $subnetworkUri;
  }
  /**
   * @return string
   */
  public function getSubnetworkUri()
  {
    return $this->subnetworkUri;
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
  public function setZoneUri($zoneUri)
  {
    $this->zoneUri = $zoneUri;
  }
  /**
   * @return string
   */
  public function getZoneUri()
  {
    return $this->zoneUri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GceClusterConfig::class, 'Google_Service_Dataproc_GceClusterConfig');
