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

class ConfigManagementGatekeeperDeploymentState extends \Google\Model
{
  /**
   * @var string
   */
  public $gatekeeperAudit;
  /**
   * @var string
   */
  public $gatekeeperControllerManagerState;
  /**
   * @var string
   */
  public $gatekeeperMutation;

  /**
   * @param string
   */
  public function setGatekeeperAudit($gatekeeperAudit)
  {
    $this->gatekeeperAudit = $gatekeeperAudit;
  }
  /**
   * @return string
   */
  public function getGatekeeperAudit()
  {
    return $this->gatekeeperAudit;
  }
  /**
   * @param string
   */
  public function setGatekeeperControllerManagerState($gatekeeperControllerManagerState)
  {
    $this->gatekeeperControllerManagerState = $gatekeeperControllerManagerState;
  }
  /**
   * @return string
   */
  public function getGatekeeperControllerManagerState()
  {
    return $this->gatekeeperControllerManagerState;
  }
  /**
   * @param string
   */
  public function setGatekeeperMutation($gatekeeperMutation)
  {
    $this->gatekeeperMutation = $gatekeeperMutation;
  }
  /**
   * @return string
   */
  public function getGatekeeperMutation()
  {
    return $this->gatekeeperMutation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConfigManagementGatekeeperDeploymentState::class, 'Google_Service_GKEHub_ConfigManagementGatekeeperDeploymentState');
