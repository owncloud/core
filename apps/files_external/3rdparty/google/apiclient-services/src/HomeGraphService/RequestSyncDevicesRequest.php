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

class RequestSyncDevicesRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $agentUserId;
  /**
   * @var bool
   */
  public $async;

  /**
   * @param string
   */
  public function setAgentUserId($agentUserId)
  {
    $this->agentUserId = $agentUserId;
  }
  /**
   * @return string
   */
  public function getAgentUserId()
  {
    return $this->agentUserId;
  }
  /**
   * @param bool
   */
  public function setAsync($async)
  {
    $this->async = $async;
  }
  /**
   * @return bool
   */
  public function getAsync()
  {
    return $this->async;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RequestSyncDevicesRequest::class, 'Google_Service_HomeGraphService_RequestSyncDevicesRequest');
