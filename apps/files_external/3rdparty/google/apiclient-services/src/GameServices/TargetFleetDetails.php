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

class TargetFleetDetails extends \Google\Model
{
  protected $autoscalerType = TargetFleetAutoscaler::class;
  protected $autoscalerDataType = '';
  protected $fleetType = TargetFleet::class;
  protected $fleetDataType = '';

  /**
   * @param TargetFleetAutoscaler
   */
  public function setAutoscaler(TargetFleetAutoscaler $autoscaler)
  {
    $this->autoscaler = $autoscaler;
  }
  /**
   * @return TargetFleetAutoscaler
   */
  public function getAutoscaler()
  {
    return $this->autoscaler;
  }
  /**
   * @param TargetFleet
   */
  public function setFleet(TargetFleet $fleet)
  {
    $this->fleet = $fleet;
  }
  /**
   * @return TargetFleet
   */
  public function getFleet()
  {
    return $this->fleet;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetFleetDetails::class, 'Google_Service_GameServices_TargetFleetDetails');
