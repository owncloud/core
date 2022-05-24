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

namespace Google\Service\Baremetalsolution;

class VlanAttachment extends \Google\Model
{
  /**
   * @var string
   */
  public $peerIp;
  /**
   * @var string
   */
  public $peerVlanId;
  /**
   * @var string
   */
  public $routerIp;

  /**
   * @param string
   */
  public function setPeerIp($peerIp)
  {
    $this->peerIp = $peerIp;
  }
  /**
   * @return string
   */
  public function getPeerIp()
  {
    return $this->peerIp;
  }
  /**
   * @param string
   */
  public function setPeerVlanId($peerVlanId)
  {
    $this->peerVlanId = $peerVlanId;
  }
  /**
   * @return string
   */
  public function getPeerVlanId()
  {
    return $this->peerVlanId;
  }
  /**
   * @param string
   */
  public function setRouterIp($routerIp)
  {
    $this->routerIp = $routerIp;
  }
  /**
   * @return string
   */
  public function getRouterIp()
  {
    return $this->routerIp;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VlanAttachment::class, 'Google_Service_Baremetalsolution_VlanAttachment');
