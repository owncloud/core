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

class Google_Service_CloudIot_GatewayConfig extends Google_Model
{
  public $gatewayAuthMethod;
  public $gatewayType;
  public $lastAccessedGatewayId;
  public $lastAccessedGatewayTime;

  public function setGatewayAuthMethod($gatewayAuthMethod)
  {
    $this->gatewayAuthMethod = $gatewayAuthMethod;
  }
  public function getGatewayAuthMethod()
  {
    return $this->gatewayAuthMethod;
  }
  public function setGatewayType($gatewayType)
  {
    $this->gatewayType = $gatewayType;
  }
  public function getGatewayType()
  {
    return $this->gatewayType;
  }
  public function setLastAccessedGatewayId($lastAccessedGatewayId)
  {
    $this->lastAccessedGatewayId = $lastAccessedGatewayId;
  }
  public function getLastAccessedGatewayId()
  {
    return $this->lastAccessedGatewayId;
  }
  public function setLastAccessedGatewayTime($lastAccessedGatewayTime)
  {
    $this->lastAccessedGatewayTime = $lastAccessedGatewayTime;
  }
  public function getLastAccessedGatewayTime()
  {
    return $this->lastAccessedGatewayTime;
  }
}
