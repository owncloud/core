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

class VpnTunnel extends \Google\Collection
{
  protected $collection_key = 'remoteTrafficSelector';
  /**
   * @var string
   */
  public $creationTimestamp;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $detailedStatus;
  /**
   * @var string
   */
  public $id;
  /**
   * @var int
   */
  public $ikeVersion;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string[]
   */
  public $localTrafficSelector;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $peerExternalGateway;
  /**
   * @var int
   */
  public $peerExternalGatewayInterface;
  /**
   * @var string
   */
  public $peerGcpGateway;
  /**
   * @var string
   */
  public $peerIp;
  /**
   * @var string
   */
  public $region;
  /**
   * @var string[]
   */
  public $remoteTrafficSelector;
  /**
   * @var string
   */
  public $router;
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $sharedSecret;
  /**
   * @var string
   */
  public $sharedSecretHash;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $targetVpnGateway;
  /**
   * @var string
   */
  public $vpnGateway;
  /**
   * @var int
   */
  public $vpnGatewayInterface;

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
  public function setDetailedStatus($detailedStatus)
  {
    $this->detailedStatus = $detailedStatus;
  }
  /**
   * @return string
   */
  public function getDetailedStatus()
  {
    return $this->detailedStatus;
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
   * @param int
   */
  public function setIkeVersion($ikeVersion)
  {
    $this->ikeVersion = $ikeVersion;
  }
  /**
   * @return int
   */
  public function getIkeVersion()
  {
    return $this->ikeVersion;
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
  public function setLocalTrafficSelector($localTrafficSelector)
  {
    $this->localTrafficSelector = $localTrafficSelector;
  }
  /**
   * @return string[]
   */
  public function getLocalTrafficSelector()
  {
    return $this->localTrafficSelector;
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
  public function setPeerExternalGateway($peerExternalGateway)
  {
    $this->peerExternalGateway = $peerExternalGateway;
  }
  /**
   * @return string
   */
  public function getPeerExternalGateway()
  {
    return $this->peerExternalGateway;
  }
  /**
   * @param int
   */
  public function setPeerExternalGatewayInterface($peerExternalGatewayInterface)
  {
    $this->peerExternalGatewayInterface = $peerExternalGatewayInterface;
  }
  /**
   * @return int
   */
  public function getPeerExternalGatewayInterface()
  {
    return $this->peerExternalGatewayInterface;
  }
  /**
   * @param string
   */
  public function setPeerGcpGateway($peerGcpGateway)
  {
    $this->peerGcpGateway = $peerGcpGateway;
  }
  /**
   * @return string
   */
  public function getPeerGcpGateway()
  {
    return $this->peerGcpGateway;
  }
  /**
   * @param string
   */
  public function setPeerIp($peerIp)
  {
    $this->peerIp = $peerIp;
  }
  /**
   * @return string
   */
  public function getPeerIp()
  {
    return $this->peerIp;
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
   * @param string[]
   */
  public function setRemoteTrafficSelector($remoteTrafficSelector)
  {
    $this->remoteTrafficSelector = $remoteTrafficSelector;
  }
  /**
   * @return string[]
   */
  public function getRemoteTrafficSelector()
  {
    return $this->remoteTrafficSelector;
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
  public function setSharedSecret($sharedSecret)
  {
    $this->sharedSecret = $sharedSecret;
  }
  /**
   * @return string
   */
  public function getSharedSecret()
  {
    return $this->sharedSecret;
  }
  /**
   * @param string
   */
  public function setSharedSecretHash($sharedSecretHash)
  {
    $this->sharedSecretHash = $sharedSecretHash;
  }
  /**
   * @return string
   */
  public function getSharedSecretHash()
  {
    return $this->sharedSecretHash;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setTargetVpnGateway($targetVpnGateway)
  {
    $this->targetVpnGateway = $targetVpnGateway;
  }
  /**
   * @return string
   */
  public function getTargetVpnGateway()
  {
    return $this->targetVpnGateway;
  }
  /**
   * @param string
   */
  public function setVpnGateway($vpnGateway)
  {
    $this->vpnGateway = $vpnGateway;
  }
  /**
   * @return string
   */
  public function getVpnGateway()
  {
    return $this->vpnGateway;
  }
  /**
   * @param int
   */
  public function setVpnGatewayInterface($vpnGatewayInterface)
  {
    $this->vpnGatewayInterface = $vpnGatewayInterface;
  }
  /**
   * @return int
   */
  public function getVpnGatewayInterface()
  {
    return $this->vpnGatewayInterface;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VpnTunnel::class, 'Google_Service_Compute_VpnTunnel');
