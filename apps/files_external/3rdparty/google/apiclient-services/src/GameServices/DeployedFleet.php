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

namespace Google\Service\GameServices;

class DeployedFleet extends \Google\Model
{
  /**
   * @var string
   */
  public $fleet;
  /**
   * @var string
   */
  public $fleetSpec;
  protected $specSourceType = SpecSource::class;
  protected $specSourceDataType = '';
  protected $statusType = DeployedFleetStatus::class;
  protected $statusDataType = '';

  /**
   * @param string
   */
  public function setFleet($fleet)
  {
    $this->fleet = $fleet;
  }
  /**
   * @return string
   */
  public function getFleet()
  {
    return $this->fleet;
  }
  /**
   * @param string
   */
  public function setFleetSpec($fleetSpec)
  {
    $this->fleetSpec = $fleetSpec;
  }
  /**
   * @return string
   */
  public function getFleetSpec()
  {
    return $this->fleetSpec;
  }
  /**
   * @param SpecSource
   */
  public function setSpecSource(SpecSource $specSource)
  {
    $this->specSource = $specSource;
  }
  /**
   * @return SpecSource
   */
  public function getSpecSource()
  {
    return $this->specSource;
  }
  /**
   * @param DeployedFleetStatus
   */
  public function setStatus(DeployedFleetStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return DeployedFleetStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeployedFleet::class, 'Google_Service_GameServices_DeployedFleet');
