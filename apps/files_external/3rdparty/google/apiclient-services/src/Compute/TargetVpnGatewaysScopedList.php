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

class TargetVpnGatewaysScopedList extends \Google\Collection
{
  protected $collection_key = 'targetVpnGateways';
  protected $targetVpnGatewaysType = TargetVpnGateway::class;
  protected $targetVpnGatewaysDataType = 'array';
  protected $warningType = TargetVpnGatewaysScopedListWarning::class;
  protected $warningDataType = '';

  /**
   * @param TargetVpnGateway[]
   */
  public function setTargetVpnGateways($targetVpnGateways)
  {
    $this->targetVpnGateways = $targetVpnGateways;
  }
  /**
   * @return TargetVpnGateway[]
   */
  public function getTargetVpnGateways()
  {
    return $this->targetVpnGateways;
  }
  /**
   * @param TargetVpnGatewaysScopedListWarning
   */
  public function setWarning(TargetVpnGatewaysScopedListWarning $warning)
  {
    $this->warning = $warning;
  }
  /**
   * @return TargetVpnGatewaysScopedListWarning
   */
  public function getWarning()
  {
    return $this->warning;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetVpnGatewaysScopedList::class, 'Google_Service_Compute_TargetVpnGatewaysScopedList');
