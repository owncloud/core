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

class Google_Service_OSConfig_OSPolicyAssignmentOperationMetadata extends Google_Model
{
  public $apiMethod;
  public $osPolicyAssignment;
  public $rolloutStartTime;
  public $rolloutState;
  public $rolloutUpdateTime;

  public function setApiMethod($apiMethod)
  {
    $this->apiMethod = $apiMethod;
  }
  public function getApiMethod()
  {
    return $this->apiMethod;
  }
  public function setOsPolicyAssignment($osPolicyAssignment)
  {
    $this->osPolicyAssignment = $osPolicyAssignment;
  }
  public function getOsPolicyAssignment()
  {
    return $this->osPolicyAssignment;
  }
  public function setRolloutStartTime($rolloutStartTime)
  {
    $this->rolloutStartTime = $rolloutStartTime;
  }
  public function getRolloutStartTime()
  {
    return $this->rolloutStartTime;
  }
  public function setRolloutState($rolloutState)
  {
    $this->rolloutState = $rolloutState;
  }
  public function getRolloutState()
  {
    return $this->rolloutState;
  }
  public function setRolloutUpdateTime($rolloutUpdateTime)
  {
    $this->rolloutUpdateTime = $rolloutUpdateTime;
  }
  public function getRolloutUpdateTime()
  {
    return $this->rolloutUpdateTime;
  }
}
