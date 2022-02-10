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

namespace Google\Service\DatabaseMigrationService;

class SqlIpConfig extends \Google\Collection
{
  protected $collection_key = 'authorizedNetworks';
  protected $authorizedNetworksType = SqlAclEntry::class;
  protected $authorizedNetworksDataType = 'array';
  /**
   * @var bool
   */
  public $enableIpv4;
  /**
   * @var string
   */
  public $privateNetwork;
  /**
   * @var bool
   */
  public $requireSsl;

  /**
   * @param SqlAclEntry[]
   */
  public function setAuthorizedNetworks($authorizedNetworks)
  {
    $this->authorizedNetworks = $authorizedNetworks;
  }
  /**
   * @return SqlAclEntry[]
   */
  public function getAuthorizedNetworks()
  {
    return $this->authorizedNetworks;
  }
  /**
   * @param bool
   */
  public function setEnableIpv4($enableIpv4)
  {
    $this->enableIpv4 = $enableIpv4;
  }
  /**
   * @return bool
   */
  public function getEnableIpv4()
  {
    return $this->enableIpv4;
  }
  /**
   * @param string
   */
  public function setPrivateNetwork($privateNetwork)
  {
    $this->privateNetwork = $privateNetwork;
  }
  /**
   * @return string
   */
  public function getPrivateNetwork()
  {
    return $this->privateNetwork;
  }
  /**
   * @param bool
   */
  public function setRequireSsl($requireSsl)
  {
    $this->requireSsl = $requireSsl;
  }
  /**
   * @return bool
   */
  public function getRequireSsl()
  {
    return $this->requireSsl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SqlIpConfig::class, 'Google_Service_DatabaseMigrationService_SqlIpConfig');
