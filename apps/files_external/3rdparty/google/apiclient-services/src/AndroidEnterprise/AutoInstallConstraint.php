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

namespace Google\Service\AndroidEnterprise;

class AutoInstallConstraint extends \Google\Model
{
  /**
   * @var string
   */
  public $chargingStateConstraint;
  /**
   * @var string
   */
  public $deviceIdleStateConstraint;
  /**
   * @var string
   */
  public $networkTypeConstraint;

  /**
   * @param string
   */
  public function setChargingStateConstraint($chargingStateConstraint)
  {
    $this->chargingStateConstraint = $chargingStateConstraint;
  }
  /**
   * @return string
   */
  public function getChargingStateConstraint()
  {
    return $this->chargingStateConstraint;
  }
  /**
   * @param string
   */
  public function setDeviceIdleStateConstraint($deviceIdleStateConstraint)
  {
    $this->deviceIdleStateConstraint = $deviceIdleStateConstraint;
  }
  /**
   * @return string
   */
  public function getDeviceIdleStateConstraint()
  {
    return $this->deviceIdleStateConstraint;
  }
  /**
   * @param string
   */
  public function setNetworkTypeConstraint($networkTypeConstraint)
  {
    $this->networkTypeConstraint = $networkTypeConstraint;
  }
  /**
   * @return string
   */
  public function getNetworkTypeConstraint()
  {
    return $this->networkTypeConstraint;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AutoInstallConstraint::class, 'Google_Service_AndroidEnterprise_AutoInstallConstraint');
