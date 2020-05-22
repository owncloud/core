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

class Google_Service_AndroidEnterprise_AutoInstallConstraint extends Google_Model
{
  public $chargingStateConstraint;
  public $deviceIdleStateConstraint;
  public $networkTypeConstraint;

  public function setChargingStateConstraint($chargingStateConstraint)
  {
    $this->chargingStateConstraint = $chargingStateConstraint;
  }
  public function getChargingStateConstraint()
  {
    return $this->chargingStateConstraint;
  }
  public function setDeviceIdleStateConstraint($deviceIdleStateConstraint)
  {
    $this->deviceIdleStateConstraint = $deviceIdleStateConstraint;
  }
  public function getDeviceIdleStateConstraint()
  {
    return $this->deviceIdleStateConstraint;
  }
  public function setNetworkTypeConstraint($networkTypeConstraint)
  {
    $this->networkTypeConstraint = $networkTypeConstraint;
  }
  public function getNetworkTypeConstraint()
  {
    return $this->networkTypeConstraint;
  }
}
