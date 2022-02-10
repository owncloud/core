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

namespace Google\Service\Compute;

class InterconnectAttachment extends \Google\Collection
{
  protected $collection_key = 'ipsecInternalAddresses';
  /**
   * @var bool
   */
  public $adminEnabled;
  /**
   * @var string
   */
  public $bandwidth;
  /**
   * @var string[]
   */
  public $candidateIpv6Subnets;
  /**
   * @var string[]
   */
  public $candidateSubnets;
  /**
   * @var string
   */
  public $cloudRouterIpAddress;
  /**
   * @var string
   */
  public $cloudRouterIpv6Address;
  /**
   * @var string
   */
  public $cloudRouterIpv6InterfaceId;
  /**
   * @var string
   */
  public $creationTimestamp;
  /**
   * @var string
   */
  public $customerRouterIpAddress;
  /**
   * @var string
   */
  public $customerRouterIpv6Address;
  /**
   * @var string
   */
  public $customerRouterIpv6InterfaceId;
  /**
   * @var int
   */
  public $dataplaneVersion;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $edgeAvailabilityDomain;
  /**
   * @var string
   */
  public $encryption;
  /**
   * @var string
   */
  public $googleReferenceId;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $interconnect;
  /**
   * @var string[]
   */
  public $ipsecInternalAddresses;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var int
   */
  public $mtu;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $operationalStatus;
  /**
   * @var string
   */
  public $pairingKey;
  /**
   * @var string
   */
  public $partnerAsn;
  protected $partnerMetadataType = InterconnectAttachmentPartnerMetadata::class;
  protected $partnerMetadataDataType = '';
  protected $privateInterconnectInfoType = InterconnectAttachmentPrivateInfo::class;
  protected $privateInterconnectInfoDataType = '';
  /**
   * @var string
   */
  public $region;
  /**
   * @var string
   */
  public $router;
  /**
   * @var bool
   */
  public $satisfiesPzs;
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $stackType;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $type;
  /**
   * @var int
   */
  public $vlanTag8021q;

  /**
   * @param bool
   */
  public function setAdminEnabled($adminEnabled)
  {
    $this->adminEnabled = $adminEnabled;
  }
  /**
   * @return bool
   */
  public function getAdminEnabled()
  {
    return $this->adminEnabled;
  }
  /**
   * @param string
   */
  public function setBandwidth($bandwidth)
  {
    $this->bandwidth = $bandwidth;
  }
  /**
   * @return string
   */
  public function getBandwidth()
  {
    return $this->bandwidth;
  }
  /**
   * @param string[]
   */
  public function setCandidateIpv6Subnets($candidateIpv6Subnets)
  {
    $this->candidateIpv6Subnets = $candidateIpv6Subnets;
  }
  /**
   * @return string[]
   */
  public function getCandidateIpv6Subnets()
  {
    return $this->candidateIpv6Subnets;
  }
  /**
   * @param string[]
   */
  public function setCandidateSubnets($candidateSubnets)
  {
    $this->candidateSubnets = $candidateSubnets;
  }
  /**
   * @return string[]
   */
  public function getCandidateSubnets()
  {
    return $this->candidateSubnets;
  }
  /**
   * @param string
   */
  public function setCloudRouterIpAddress($cloudRouterIpAddress)
  {
    $this->cloudRouterIpAddress = $cloudRouterIpAddress;
  }
  /**
   * @return string
   */
  public function getCloudRouterIpAddress()
  {
    return $this->cloudRouterIpAddress;
  }
  /**
   * @param string
   */
  public function setCloudRouterIpv6Address($cloudRouterIpv6Address)
  {
    $this->cloudRouterIpv6Address = $cloudRouterIpv6Address;
  }
  /**
   * @return string
   */
  public function getCloudRouterIpv6Address()
  {
    return $this->cloudRouterIpv6Address;
  }
  /**
   * @param string
   */
  public function setCloudRouterIpv6InterfaceId($cloudRouterIpv6InterfaceId)
  {
    $this->cloudRouterIpv6InterfaceId = $cloudRouterIpv6InterfaceId;
  }
  /**
   * @return string
   */
  public function getCloudRouterIpv6InterfaceId()
  {
    return $this->cloudRouterIpv6InterfaceId;
  }
  /**
   * @param string
   */
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  /**
   * @return string
   */
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  /**
   * @param string
   */
  public function setCustomerRouterIpAddress($customerRouterIpAddress)
  {
    $this->customerRouterIpAddress = $customerRouterIpAddress;
  }
  /**
   * @return string
   */
  public function getCustomerRouterIpAddress()
  {
    return $this->customerRouterIpAddress;
  }
  /**
   * @param string
   */
  public function setCustomerRouterIpv6Address($customerRouterIpv6Address)
  {
    $this->customerRouterIpv6Address = $customerRouterIpv6Address;
  }
  /**
   * @return string
   */
  public function getCustomerRouterIpv6Address()
  {
    return $this->customerRouterIpv6Address;
  }
  /**
   * @param string
   */
  public function setCustomerRouterIpv6InterfaceId($customerRouterIpv6InterfaceId)
  {
    $this->customerRouterIpv6InterfaceId = $customerRouterIpv6InterfaceId;
  }
  /**
   * @return string
   */
  public function getCustomerRouterIpv6InterfaceId()
  {
    return $this->customerRouterIpv6InterfaceId;
  }
  /**
   * @param int
   */
  public function setDataplaneVersion($dataplaneVersion)
  {
    $this->dataplaneVersion = $dataplaneVersion;
  }
  /**
   * @return int
   */
  public function getDataplaneVersion()
  {
    return $this->dataplaneVersion;
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
  public function setEdgeAvailabilityDomain($edgeAvailabilityDomain)
  {
    $this->edgeAvailabilityDomain = $edgeAvailabilityDomain;
  }
  /**
   * @return string
   */
  public function getEdgeAvailabilityDomain()
  {
    return $this->edgeAvailabilityDomain;
  }
  /**
   * @param string
   */
  public function setEncryption($encryption)
  {
    $this->encryption = $encryption;
  }
  /**
   * @return string
   */
  public function getEncryption()
  {
    return $this->encryption;
  }
  /**
   * @param string
   */
  public function setGoogleReferenceId($googleReferenceId)
  {
    $this->googleReferenceId = $googleReferenceId;
  }
  /**
   * @return string
   */
  public function getGoogleReferenceId()
  {
    return $this->googleReferenceId;
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
  public function setInterconnect($interconnect)
  {
    $this->interconnect = $interconnect;
  }
  /**
   * @return string
   */
  public function getInterconnect()
  {
    return $this->interconnect;
  }
  /**
   * @param string[]
   */
  public function setIpsecInternalAddresses($ipsecInternalAddresses)
  {
    $this->ipsecInternalAddresses = $ipsecInternalAddresses;
  }
  /**
   * @return string[]
   */
  public function getIpsecInternalAddresses()
  {
    return $this->ipsecInternalAddresses;
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
   * @param int
   */
  public function setMtu($mtu)
  {
    $this->mtu = $mtu;
  }
  /**
   * @return int
   */
  public function getMtu()
  {
    return $this->mtu;
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
  public function setOperationalStatus($operationalStatus)
  {
    $this->operationalStatus = $operationalStatus;
  }
  /**
   * @return string
   */
  public function getOperationalStatus()
  {
    return $this->operationalStatus;
  }
  /**
   * @param string
   */
  public function setPairingKey($pairingKey)
  {
    $this->pairingKey = $pairingKey;
  }
  /**
   * @return string
   */
  public function getPairingKey()
  {
    return $this->pairingKey;
  }
  /**
   * @param string
   */
  public function setPartnerAsn($partnerAsn)
  {
    $this->partnerAsn = $partnerAsn;
  }
  /**
   * @return string
   */
  public function getPartnerAsn()
  {
    return $this->partnerAsn;
  }
  /**
   * @param InterconnectAttachmentPartnerMetadata
   */
  public function setPartnerMetadata(InterconnectAttachmentPartnerMetadata $partnerMetadata)
  {
    $this->partnerMetadata = $partnerMetadata;
  }
  /**
   * @return InterconnectAttachmentPartnerMetadata
   */
  public function getPartnerMetadata()
  {
    return $this->partnerMetadata;
  }
  /**
   * @param InterconnectAttachmentPrivateInfo
   */
  public function setPrivateInterconnectInfo(InterconnectAttachmentPrivateInfo $privateInterconnectInfo)
  {
    $this->privateInterconnectInfo = $privateInterconnectInfo;
  }
  /**
   * @return InterconnectAttachmentPrivateInfo
   */
  public function getPrivateInterconnectInfo()
  {
    return $this->privateInterconnectInfo;
  }
  /**
   * @param string
   */
  public function setRegion($region)
  {
    $this->region = $region;
  }
  /**
   * @return string
   */
  public function getRegion()
  {
    return $this->region;
  }
  /**
   * @param string
   */
  public function setRouter($router)
  {
    $this->router = $router;
  }
  /**
   * @return string
   */
  public function getRouter()
  {
    return $this->router;
  }
  /**
   * @param bool
   */
  public function setSatisfiesPzs($satisfiesPzs)
  {
    $this->satisfiesPzs = $satisfiesPzs;
  }
  /**
   * @return bool
   */
  public function getSatisfiesPzs()
  {
    return $this->satisfiesPzs;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param string
   */
  public function setStackType($stackType)
  {
    $this->stackType = $stackType;
  }
  /**
   * @return string
   */
  public function getStackType()
  {
    return $this->stackType;
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
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param int
   */
  public function setVlanTag8021q($vlanTag8021q)
  {
    $this->vlanTag8021q = $vlanTag8021q;
  }
  /**
   * @return int
   */
  public function getVlanTag8021q()
  {
    return $this->vlanTag8021q;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InterconnectAttachment::class, 'Google_Service_Compute_InterconnectAttachment');
