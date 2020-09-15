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

class Google_Service_TrafficDirectorService_DynamicListener extends Google_Model
{
  protected $activeStateType = 'Google_Service_TrafficDirectorService_DynamicListenerState';
  protected $activeStateDataType = '';
  protected $drainingStateType = 'Google_Service_TrafficDirectorService_DynamicListenerState';
  protected $drainingStateDataType = '';
  protected $errorStateType = 'Google_Service_TrafficDirectorService_UpdateFailureState';
  protected $errorStateDataType = '';
  public $name;
  protected $warmingStateType = 'Google_Service_TrafficDirectorService_DynamicListenerState';
  protected $warmingStateDataType = '';

  /**
   * @param Google_Service_TrafficDirectorService_DynamicListenerState
   */
  public function setActiveState(Google_Service_TrafficDirectorService_DynamicListenerState $activeState)
  {
    $this->activeState = $activeState;
  }
  /**
   * @return Google_Service_TrafficDirectorService_DynamicListenerState
   */
  public function getActiveState()
  {
    return $this->activeState;
  }
  /**
   * @param Google_Service_TrafficDirectorService_DynamicListenerState
   */
  public function setDrainingState(Google_Service_TrafficDirectorService_DynamicListenerState $drainingState)
  {
    $this->drainingState = $drainingState;
  }
  /**
   * @return Google_Service_TrafficDirectorService_DynamicListenerState
   */
  public function getDrainingState()
  {
    return $this->drainingState;
  }
  /**
   * @param Google_Service_TrafficDirectorService_UpdateFailureState
   */
  public function setErrorState(Google_Service_TrafficDirectorService_UpdateFailureState $errorState)
  {
    $this->errorState = $errorState;
  }
  /**
   * @return Google_Service_TrafficDirectorService_UpdateFailureState
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
   * @param Google_Service_TrafficDirectorService_DynamicListenerState
   */
  public function setWarmingState(Google_Service_TrafficDirectorService_DynamicListenerState $warmingState)
  {
    $this->warmingState = $warmingState;
  }
  /**
   * @return Google_Service_TrafficDirectorService_DynamicListenerState
   */
  public function getWarmingState()
  {
    return $this->warmingState;
  }
}
