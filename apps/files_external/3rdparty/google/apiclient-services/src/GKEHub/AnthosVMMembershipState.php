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

namespace Google\Service\GKEHub;

class AnthosVMMembershipState extends \Google\Collection
{
  protected $collection_key = 'subfeatureState';
  protected $localControllerStateType = LocalControllerState::class;
  protected $localControllerStateDataType = '';
  protected $subfeatureStateType = AnthosVMSubFeatureState::class;
  protected $subfeatureStateDataType = 'array';

  /**
   * @param LocalControllerState
   */
  public function setLocalControllerState(LocalControllerState $localControllerState)
  {
    $this->localControllerState = $localControllerState;
  }
  /**
   * @return LocalControllerState
   */
  public function getLocalControllerState()
  {
    return $this->localControllerState;
  }
  /**
   * @param AnthosVMSubFeatureState[]
   */
  public function setSubfeatureState($subfeatureState)
  {
    $this->subfeatureState = $subfeatureState;
  }
  /**
   * @return AnthosVMSubFeatureState[]
   */
  public function getSubfeatureState()
  {
    return $this->subfeatureState;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AnthosVMMembershipState::class, 'Google_Service_GKEHub_AnthosVMMembershipState');
