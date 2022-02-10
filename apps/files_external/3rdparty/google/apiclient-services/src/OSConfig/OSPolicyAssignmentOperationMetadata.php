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

namespace Google\Service\OSConfig;

class OSPolicyAssignmentOperationMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $apiMethod;
  /**
   * @var string
   */
  public $osPolicyAssignment;
  /**
   * @var string
   */
  public $rolloutStartTime;
  /**
   * @var string
   */
  public $rolloutState;
  /**
   * @var string
   */
  public $rolloutUpdateTime;

  /**
   * @param string
   */
  public function setApiMethod($apiMethod)
  {
    $this->apiMethod = $apiMethod;
  }
  /**
   * @return string
   */
  public function getApiMethod()
  {
    return $this->apiMethod;
  }
  /**
   * @param string
   */
  public function setOsPolicyAssignment($osPolicyAssignment)
  {
    $this->osPolicyAssignment = $osPolicyAssignment;
  }
  /**
   * @return string
   */
  public function getOsPolicyAssignment()
  {
    return $this->osPolicyAssignment;
  }
  /**
   * @param string
   */
  public function setRolloutStartTime($rolloutStartTime)
  {
    $this->rolloutStartTime = $rolloutStartTime;
  }
  /**
   * @return string
   */
  public function getRolloutStartTime()
  {
    return $this->rolloutStartTime;
  }
  /**
   * @param string
   */
  public function setRolloutState($rolloutState)
  {
    $this->rolloutState = $rolloutState;
  }
  /**
   * @return string
   */
  public function getRolloutState()
  {
    return $this->rolloutState;
  }
  /**
   * @param string
   */
  public function setRolloutUpdateTime($rolloutUpdateTime)
  {
    $this->rolloutUpdateTime = $rolloutUpdateTime;
  }
  /**
   * @return string
   */
  public function getRolloutUpdateTime()
  {
    return $this->rolloutUpdateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OSPolicyAssignmentOperationMetadata::class, 'Google_Service_OSConfig_OSPolicyAssignmentOperationMetadata');
