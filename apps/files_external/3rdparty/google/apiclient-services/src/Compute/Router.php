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
  public $creationTimestamp;
  public $description;
  public $encryptedInterconnectRouter;
  public $id;
  protected $interfacesType = RouterInterface::class;
  protected $interfacesDataType = 'array';
  public $kind;
  public $name;
  protected $natsType = RouterNat::class;
  protected $natsDataType = 'array';
  public $network;
  public $region;
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
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEncryptedInterconnectRouter($encryptedInterconnectRouter)
  {
    $this->encryptedInterconnectRouter = $encryptedInterconnectRouter;
  }
  public function getEncryptedInterconnectRouter()
  {
    return $this->encryptedInterconnectRouter;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
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
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
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
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  public function getNetwork()
  {
    return $this->network;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Router::class, 'Google_Service_Compute_Router');
