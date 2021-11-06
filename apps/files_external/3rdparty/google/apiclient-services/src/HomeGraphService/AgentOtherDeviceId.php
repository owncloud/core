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

namespace Google\Service\HomeGraphService;

class AgentOtherDeviceId extends \Google\Model
{
  public $agentId;
  public $deviceId;

  public function setAgentId($agentId)
  {
    $this->agentId = $agentId;
  }
  public function getAgentId()
  {
    return $this->agentId;
  }
  public function setDeviceId($deviceId)
  {
    $this->deviceId = $deviceId;
  }
  public function getDeviceId()
  {
    return $this->deviceId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AgentOtherDeviceId::class, 'Google_Service_HomeGraphService_AgentOtherDeviceId');
