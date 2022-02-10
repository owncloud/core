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

namespace Google\Service\Compute;

class VpnGatewayVpnGatewayInterface extends \Google\Model
{
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $interconnectAttachment;
  /**
   * @var string
   */
  public $ipAddress;

  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setInterconnectAttachment($interconnectAttachment)
  {
    $this->interconnectAttachment = $interconnectAttachment;
  }
  /**
   * @return string
   */
  public function getInterconnectAttachment()
  {
    return $this->interconnectAttachment;
  }
  /**
   * @param string
   */
  public function setIpAddress($ipAddress)
  {
    $this->ipAddress = $ipAddress;
  }
  /**
   * @return string
   */
  public function getIpAddress()
  {
    return $this->ipAddress;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VpnGatewayVpnGatewayInterface::class, 'Google_Service_Compute_VpnGatewayVpnGatewayInterface');
