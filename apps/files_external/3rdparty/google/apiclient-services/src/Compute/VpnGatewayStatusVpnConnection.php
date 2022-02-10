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

class VpnGatewayStatusVpnConnection extends \Google\Collection
{
  protected $collection_key = 'tunnels';
  /**
   * @var string
   */
  public $peerExternalGateway;
  /**
   * @var string
   */
  public $peerGcpGateway;
  protected $stateType = VpnGatewayStatusHighAvailabilityRequirementState::class;
  protected $stateDataType = '';
  protected $tunnelsType = VpnGatewayStatusTunnel::class;
  protected $tunnelsDataType = 'array';

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
   * @param VpnGatewayStatusHighAvailabilityRequirementState
   */
  public function setState(VpnGatewayStatusHighAvailabilityRequirementState $state)
  {
    $this->state = $state;
  }
  /**
   * @return VpnGatewayStatusHighAvailabilityRequirementState
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param VpnGatewayStatusTunnel[]
   */
  public function setTunnels($tunnels)
  {
    $this->tunnels = $tunnels;
  }
  /**
   * @return VpnGatewayStatusTunnel[]
   */
  public function getTunnels()
  {
    return $this->tunnels;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VpnGatewayStatusVpnConnection::class, 'Google_Service_Compute_VpnGatewayStatusVpnConnection');
