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

namespace Google\Service\SmartDeviceManagement;

class GoogleHomeEnterpriseSdmV1ExecuteDeviceCommandRequest extends \Google\Model
{
  public $command;
  public $params;

  public function setCommand($command)
  {
    $this->command = $command;
  }
  public function getCommand()
  {
    return $this->command;
  }
  public function setParams($params)
  {
    $this->params = $params;
  }
  public function getParams()
  {
    return $this->params;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleHomeEnterpriseSdmV1ExecuteDeviceCommandRequest::class, 'Google_Service_SmartDeviceManagement_GoogleHomeEnterpriseSdmV1ExecuteDeviceCommandRequest');
