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

class DeployedFleetDetails extends \Google\Model
{
  protected $deployedAutoscalerType = DeployedFleetAutoscaler::class;
  protected $deployedAutoscalerDataType = '';
  protected $deployedFleetType = DeployedFleet::class;
  protected $deployedFleetDataType = '';

  /**
   * @param DeployedFleetAutoscaler
   */
  public function setDeployedAutoscaler(DeployedFleetAutoscaler $deployedAutoscaler)
  {
    $this->deployedAutoscaler = $deployedAutoscaler;
  }
  /**
   * @return DeployedFleetAutoscaler
   */
  public function getDeployedAutoscaler()
  {
    return $this->deployedAutoscaler;
  }
  /**
   * @param DeployedFleet
   */
  public function setDeployedFleet(DeployedFleet $deployedFleet)
  {
    $this->deployedFleet = $deployedFleet;
  }
  /**
   * @return DeployedFleet
   */
  public function getDeployedFleet()
  {
    return $this->deployedFleet;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeployedFleetDetails::class, 'Google_Service_GameServices_DeployedFleetDetails');
