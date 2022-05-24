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

namespace Google\Service\Dataproc;

class ClusterStatus extends \Google\Model
{
  /**
   * @var string
   */
  public $detail;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $stateStartTime;
  /**
   * @var string
   */
  public $substate;

  /**
   * @param string
   */
  public function setDetail($detail)
  {
    $this->detail = $detail;
  }
  /**
   * @return string
   */
  public function getDetail()
  {
    return $this->detail;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setStateStartTime($stateStartTime)
  {
    $this->stateStartTime = $stateStartTime;
  }
  /**
   * @return string
   */
  public function getStateStartTime()
  {
    return $this->stateStartTime;
  }
  /**
   * @param string
   */
  public function setSubstate($substate)
  {
    $this->substate = $substate;
  }
  /**
   * @return string
   */
  public function getSubstate()
  {
    return $this->substate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ClusterStatus::class, 'Google_Service_Dataproc_ClusterStatus');
