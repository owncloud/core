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

namespace Google\Service\CloudIot;

class GatewayConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $gatewayAuthMethod;
  /**
   * @var string
   */
  public $gatewayType;
  /**
   * @var string
   */
  public $lastAccessedGatewayId;
  /**
   * @var string
   */
  public $lastAccessedGatewayTime;

  /**
   * @param string
   */
  public function setGatewayAuthMethod($gatewayAuthMethod)
  {
    $this->gatewayAuthMethod = $gatewayAuthMethod;
  }
  /**
   * @return string
   */
  public function getGatewayAuthMethod()
  {
    return $this->gatewayAuthMethod;
  }
  /**
   * @param string
   */
  public function setGatewayType($gatewayType)
  {
    $this->gatewayType = $gatewayType;
  }
  /**
   * @return string
   */
  public function getGatewayType()
  {
    return $this->gatewayType;
  }
  /**
   * @param string
   */
  public function setLastAccessedGatewayId($lastAccessedGatewayId)
  {
    $this->lastAccessedGatewayId = $lastAccessedGatewayId;
  }
  /**
   * @return string
   */
  public function getLastAccessedGatewayId()
  {
    return $this->lastAccessedGatewayId;
  }
  /**
   * @param string
   */
  public function setLastAccessedGatewayTime($lastAccessedGatewayTime)
  {
    $this->lastAccessedGatewayTime = $lastAccessedGatewayTime;
  }
  /**
   * @return string
   */
  public function getLastAccessedGatewayTime()
  {
    return $this->lastAccessedGatewayTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GatewayConfig::class, 'Google_Service_CloudIot_GatewayConfig');
