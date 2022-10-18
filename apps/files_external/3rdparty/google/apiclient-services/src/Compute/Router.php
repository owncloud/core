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

class Router extends \Google\Collection
{
  protected $collection_key = 'nats';
  protected $bgpType = RouterBgp::class;
  protected $bgpDataType = '';
  protected $bgpPeersType = RouterBgpPeer::class;
  protected $bgpPeersDataType = 'array';
  /**
   * @var string
   */
  public $creationTimestamp;
  /**
   * @var string
   */
  public $description;
  /**
   * @var bool
   */
  public $encryptedInterconnectRouter;
  /**
   * @var string
   */
  public $id;
  protected $interfacesType = RouterInterface::class;
  protected $interfacesDataType = 'array';
  /**
   * @var string
   */
  public $kind;
  protected $md5AuthenticationKeysType = RouterMd5AuthenticationKey::class;
  protected $md5AuthenticationKeysDataType = 'array';
  /**
   * @var string
   */
  public $name;
  protected $natsType = RouterNat::class;
  protected $natsDataType = 'array';
  /**
   * @var string
   */
  public $network;
  /**
   * @var string
   */
  public $region;
  /**
   * @var string
   */
  public $selfLink;

  /**
   * @param RouterBgp
   */
  public function setBgp(RouterBgp $bgp)
  {
    $this->bgp = $bgp;
  }
  /**
   * @return RouterBgp
   */
  public function getBgp()
  {
    return $this->bgp;
  }
  /**
   * @param RouterBgpPeer[]
   */
  public function setBgpPeers($bgpPeers)
  {
    $this->bgpPeers = $bgpPeers;
  }
  /**
   * @return RouterBgpPeer[]
   */
  public function getBgpPeers()
  {
    return $this->bgpPeers;
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
   * @param bool
   */
  public function setEncryptedInterconnectRouter($encryptedInterconnectRouter)
  {
    $this->encryptedInterconnectRouter = $encryptedInterconnectRouter;
  }
  /**
   * @return bool
   */
  public function getEncryptedInterconnectRouter()
  {
    return $this->encryptedInterconnectRouter;
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
   * @param RouterInterface[]
   */
  public function setInterfaces($interfaces)
  {
    $this->interfaces = $interfaces;
  }
  /**
   * @return RouterInterface[]
   */
  public function getInterfaces()
  {
    return $this->interfaces;
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
   * @param RouterMd5AuthenticationKey[]
   */
  public function setMd5AuthenticationKeys($md5AuthenticationKeys)
  {
    $this->md5AuthenticationKeys = $md5AuthenticationKeys;
  }
  /**
   * @return RouterMd5AuthenticationKey[]
   */
  public function getMd5AuthenticationKeys()
  {
    return $this->md5AuthenticationKeys;
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
   * @param RouterNat[]
   */
  public function setNats($nats)
  {
    $this->nats = $nats;
  }
  /**
   * @return RouterNat[]
   */
  public function getNats()
  {
    return $this->nats;
  }
  /**
   * @param string
   */
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  /**
   * @return string
   */
  public function getNetwork()
  {
    return $this->network;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Router::class, 'Google_Service_Compute_Router');
