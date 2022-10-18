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

namespace Google\Service\Contentwarehouse;

class TrawlerOriginalClientParams extends \Google\Model
{
  /**
   * @var string
   */
  public $clientCell;
  /**
   * @var string
   */
  public $clientIp;
  /**
   * @var string
   */
  public $clientRpcType;
  /**
   * @var string
   */
  public $clientUsername;

  /**
   * @param string
   */
  public function setClientCell($clientCell)
  {
    $this->clientCell = $clientCell;
  }
  /**
   * @return string
   */
  public function getClientCell()
  {
    return $this->clientCell;
  }
  /**
   * @param string
   */
  public function setClientIp($clientIp)
  {
    $this->clientIp = $clientIp;
  }
  /**
   * @return string
   */
  public function getClientIp()
  {
    return $this->clientIp;
  }
  /**
   * @param string
   */
  public function setClientRpcType($clientRpcType)
  {
    $this->clientRpcType = $clientRpcType;
  }
  /**
   * @return string
   */
  public function getClientRpcType()
  {
    return $this->clientRpcType;
  }
  /**
   * @param string
   */
  public function setClientUsername($clientUsername)
  {
    $this->clientUsername = $clientUsername;
  }
  /**
   * @return string
   */
  public function getClientUsername()
  {
    return $this->clientUsername;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrawlerOriginalClientParams::class, 'Google_Service_Contentwarehouse_TrawlerOriginalClientParams');
