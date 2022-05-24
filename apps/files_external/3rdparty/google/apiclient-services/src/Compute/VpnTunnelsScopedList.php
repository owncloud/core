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

class VpnTunnelsScopedList extends \Google\Collection
{
  protected $collection_key = 'vpnTunnels';
  protected $vpnTunnelsType = VpnTunnel::class;
  protected $vpnTunnelsDataType = 'array';
  protected $warningType = VpnTunnelsScopedListWarning::class;
  protected $warningDataType = '';

  /**
   * @param VpnTunnel[]
   */
  public function setVpnTunnels($vpnTunnels)
  {
    $this->vpnTunnels = $vpnTunnels;
  }
  /**
   * @return VpnTunnel[]
   */
  public function getVpnTunnels()
  {
    return $this->vpnTunnels;
  }
  /**
   * @param VpnTunnelsScopedListWarning
   */
  public function setWarning(VpnTunnelsScopedListWarning $warning)
  {
    $this->warning = $warning;
  }
  /**
   * @return VpnTunnelsScopedListWarning
   */
  public function getWarning()
  {
    return $this->warning;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VpnTunnelsScopedList::class, 'Google_Service_Compute_VpnTunnelsScopedList');
