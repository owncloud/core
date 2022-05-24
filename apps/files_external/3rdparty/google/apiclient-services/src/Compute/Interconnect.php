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

class Interconnect extends \Google\Collection
{
  protected $collection_key = 'interconnectAttachments';
  /**
   * @var bool
   */
  public $adminEnabled;
  protected $circuitInfosType = InterconnectCircuitInfo::class;
  protected $circuitInfosDataType = 'array';
  /**
   * @var string
   */
  public $creationTimestamp;
  /**
   * @var string
   */
  public $customerName;
  /**
   * @var string
   */
  public $description;
  protected $expectedOutagesType = InterconnectOutageNotification::class;
  protected $expectedOutagesDataType = 'array';
  /**
   * @var string
   */
  public $googleIpAddress;
  /**
   * @var string
   */
  public $googleReferenceId;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string[]
   */
  public $interconnectAttachments;
  /**
   * @var string
   */
  public $interconnectType;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $linkType;
  /**
   * @var string
   */
  public $location;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $nocContactEmail;
  /**
   * @var string
   */
  public $operationalStatus;
  /**
   * @var string
   */
  public $peerIpAddress;
  /**
   * @var int
   */
  public $provisionedLinkCount;
  /**
   * @var int
   */
  public $requestedLinkCount;
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
  public $state;

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
   * @param InterconnectCircuitInfo[]
   */
  public function setCircuitInfos($circuitInfos)
  {
    $this->circuitInfos = $circuitInfos;
  }
  /**
   * @return InterconnectCircuitInfo[]
   */
  public function getCircuitInfos()
  {
    return $this->circuitInfos;
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
  public function setCustomerName($customerName)
  {
    $this->customerName = $customerName;
  }
  /**
   * @return string
   */
  public function getCustomerName()
  {
    return $this->customerName;
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
   * @param InterconnectOutageNotification[]
   */
  public function setExpectedOutages($expectedOutages)
  {
    $this->expectedOutages = $expectedOutages;
  }
  /**
   * @return InterconnectOutageNotification[]
   */
  public function getExpectedOutages()
  {
    return $this->expectedOutages;
  }
  /**
   * @param string
   */
  public function setGoogleIpAddress($googleIpAddress)
  {
    $this->googleIpAddress = $googleIpAddress;
  }
  /**
   * @return string
   */
  public function getGoogleIpAddress()
  {
    return $this->googleIpAddress;
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
   * @param string[]
   */
  public function setInterconnectAttachments($interconnectAttachments)
  {
    $this->interconnectAttachments = $interconnectAttachments;
  }
  /**
   * @return string[]
   */
  public function getInterconnectAttachments()
  {
    return $this->interconnectAttachments;
  }
  /**
   * @param string
   */
  public function setInterconnectType($interconnectType)
  {
    $this->interconnectType = $interconnectType;
  }
  /**
   * @return string
   */
  public function getInterconnectType()
  {
    return $this->interconnectType;
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
   * @param string
   */
  public function setLinkType($linkType)
  {
    $this->linkType = $linkType;
  }
  /**
   * @return string
   */
  public function getLinkType()
  {
    return $this->linkType;
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
   * @param string
   */
  public function setNocContactEmail($nocContactEmail)
  {
    $this->nocContactEmail = $nocContactEmail;
  }
  /**
   * @return string
   */
  public function getNocContactEmail()
  {
    return $this->nocContactEmail;
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
  public function setPeerIpAddress($peerIpAddress)
  {
    $this->peerIpAddress = $peerIpAddress;
  }
  /**
   * @return string
   */
  public function getPeerIpAddress()
  {
    return $this->peerIpAddress;
  }
  /**
   * @param int
   */
  public function setProvisionedLinkCount($provisionedLinkCount)
  {
    $this->provisionedLinkCount = $provisionedLinkCount;
  }
  /**
   * @return int
   */
  public function getProvisionedLinkCount()
  {
    return $this->provisionedLinkCount;
  }
  /**
   * @param int
   */
  public function setRequestedLinkCount($requestedLinkCount)
  {
    $this->requestedLinkCount = $requestedLinkCount;
  }
  /**
   * @return int
   */
  public function getRequestedLinkCount()
  {
    return $this->requestedLinkCount;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Interconnect::class, 'Google_Service_Compute_Interconnect');
