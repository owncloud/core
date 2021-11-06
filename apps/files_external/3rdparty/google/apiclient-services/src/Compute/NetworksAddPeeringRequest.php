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

class NetworksAddPeeringRequest extends \Google\Model
{
  public $autoCreateRoutes;
  public $name;
  protected $networkPeeringType = NetworkPeering::class;
  protected $networkPeeringDataType = '';
  public $peerNetwork;

  public function setAutoCreateRoutes($autoCreateRoutes)
  {
    $this->autoCreateRoutes = $autoCreateRoutes;
  }
  public function getAutoCreateRoutes()
  {
    return $this->autoCreateRoutes;
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
   * @param NetworkPeering
   */
  public function setNetworkPeering(NetworkPeering $networkPeering)
  {
    $this->networkPeering = $networkPeering;
  }
  /**
   * @return NetworkPeering
   */
  public function getNetworkPeering()
  {
    return $this->networkPeering;
  }
  public function setPeerNetwork($peerNetwork)
  {
    $this->peerNetwork = $peerNetwork;
  }
  public function getPeerNetwork()
  {
    return $this->peerNetwork;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NetworksAddPeeringRequest::class, 'Google_Service_Compute_NetworksAddPeeringRequest');
