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

class VpnGatewayStatusTunnel extends \Google\Model
{
  /**
   * @var string
   */
  public $localGatewayInterface;
  /**
   * @var string
   */
  public $peerGatewayInterface;
  /**
   * @var string
   */
  public $tunnelUrl;

  /**
   * @param string
   */
  public function setLocalGatewayInterface($localGatewayInterface)
  {
    $this->localGatewayInterface = $localGatewayInterface;
  }
  /**
   * @return string
   */
  public function getLocalGatewayInterface()
  {
    return $this->localGatewayInterface;
  }
  /**
   * @param string
   */
  public function setPeerGatewayInterface($peerGatewayInterface)
  {
    $this->peerGatewayInterface = $peerGatewayInterface;
  }
  /**
   * @return string
   */
  public function getPeerGatewayInterface()
  {
    return $this->peerGatewayInterface;
  }
  /**
   * @param string
   */
  public function setTunnelUrl($tunnelUrl)
  {
    $this->tunnelUrl = $tunnelUrl;
  }
  /**
   * @return string
   */
  public function getTunnelUrl()
  {
    return $this->tunnelUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VpnGatewayStatusTunnel::class, 'Google_Service_Compute_VpnGatewayStatusTunnel');
