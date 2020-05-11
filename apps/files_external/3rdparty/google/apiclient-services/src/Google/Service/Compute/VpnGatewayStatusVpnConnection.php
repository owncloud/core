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

class Google_Service_Compute_VpnGatewayStatusVpnConnection extends Google_Collection
{
  protected $collection_key = 'tunnels';
  public $peerExternalGateway;
  public $peerGcpGateway;
  protected $stateType = 'Google_Service_Compute_VpnGatewayStatusHighAvailabilityRequirementState';
  protected $stateDataType = '';
  protected $tunnelsType = 'Google_Service_Compute_VpnGatewayStatusTunnel';
  protected $tunnelsDataType = 'array';

  public function setPeerExternalGateway($peerExternalGateway)
  {
    $this->peerExternalGateway = $peerExternalGateway;
  }
  public function getPeerExternalGateway()
  {
    return $this->peerExternalGateway;
  }
  public function setPeerGcpGateway($peerGcpGateway)
  {
    $this->peerGcpGateway = $peerGcpGateway;
  }
  public function getPeerGcpGateway()
  {
    return $this->peerGcpGateway;
  }
  /**
   * @param Google_Service_Compute_VpnGatewayStatusHighAvailabilityRequirementState
   */
  public function setState(Google_Service_Compute_VpnGatewayStatusHighAvailabilityRequirementState $state)
  {
    $this->state = $state;
  }
  /**
   * @return Google_Service_Compute_VpnGatewayStatusHighAvailabilityRequirementState
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param Google_Service_Compute_VpnGatewayStatusTunnel
   */
  public function setTunnels($tunnels)
  {
    $this->tunnels = $tunnels;
  }
  /**
   * @return Google_Service_Compute_VpnGatewayStatusTunnel
   */
  public function getTunnels()
  {
    return $this->tunnels;
  }
}
