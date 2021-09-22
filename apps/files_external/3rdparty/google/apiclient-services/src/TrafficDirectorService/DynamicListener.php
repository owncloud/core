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

namespace Google\Service\TrafficDirectorService;

class DynamicListener extends \Google\Model
{
  protected $activeStateType = DynamicListenerState::class;
  protected $activeStateDataType = '';
  protected $drainingStateType = DynamicListenerState::class;
  protected $drainingStateDataType = '';
  protected $errorStateType = UpdateFailureState::class;
  protected $errorStateDataType = '';
  public $name;
  protected $warmingStateType = DynamicListenerState::class;
  protected $warmingStateDataType = '';

  /**
   * @param DynamicListenerState
   */
  public function setActiveState(DynamicListenerState $activeState)
  {
    $this->activeState = $activeState;
  }
  /**
   * @return DynamicListenerState
   */
  public function getActiveState()
  {
    return $this->activeState;
  }
  /**
   * @param DynamicListenerState
   */
  public function setDrainingState(DynamicListenerState $drainingState)
  {
    $this->drainingState = $drainingState;
  }
  /**
   * @return DynamicListenerState
   */
  public function getDrainingState()
  {
    return $this->drainingState;
  }
  /**
   * @param UpdateFailureState
   */
  public function setErrorState(UpdateFailureState $errorState)
  {
    $this->errorState = $errorState;
  }
  /**
   * @return UpdateFailureState
   */
  public function getErrorState()
  {
    return $this->errorState;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param DynamicListenerState
   */
  public function setWarmingState(DynamicListenerState $warmingState)
  {
    $this->warmingState = $warmingState;
  }
  /**
   * @return DynamicListenerState
   */
  public function getWarmingState()
  {
    return $this->warmingState;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DynamicListener::class, 'Google_Service_TrafficDirectorService_DynamicListener');
