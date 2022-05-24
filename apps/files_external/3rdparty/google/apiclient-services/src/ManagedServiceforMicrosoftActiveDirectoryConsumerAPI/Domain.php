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

namespace Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI;

class Domain extends \Google\Collection
{
  protected $collection_key = 'trusts';
  /**
   * @var string
   */
  public $admin;
  /**
   * @var bool
   */
  public $auditLogsEnabled;
  /**
   * @var string[]
   */
  public $authorizedNetworks;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $fqdn;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string[]
   */
  public $locations;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $reservedIpRange;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $statusMessage;
  protected $trustsType = Trust::class;
  protected $trustsDataType = 'array';
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setAdmin($admin)
  {
    $this->admin = $admin;
  }
  /**
   * @return string
   */
  public function getAdmin()
  {
    return $this->admin;
  }
  /**
   * @param bool
   */
  public function setAuditLogsEnabled($auditLogsEnabled)
  {
    $this->auditLogsEnabled = $auditLogsEnabled;
  }
  /**
   * @return bool
   */
  public function getAuditLogsEnabled()
  {
    return $this->auditLogsEnabled;
  }
  /**
   * @param string[]
   */
  public function setAuthorizedNetworks($authorizedNetworks)
  {
    $this->authorizedNetworks = $authorizedNetworks;
  }
  /**
   * @return string[]
   */
  public function getAuthorizedNetworks()
  {
    return $this->authorizedNetworks;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setFqdn($fqdn)
  {
    $this->fqdn = $fqdn;
  }
  /**
   * @return string
   */
  public function getFqdn()
  {
    return $this->fqdn;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string[]
   */
  public function setLocations($locations)
  {
    $this->locations = $locations;
  }
  /**
   * @return string[]
   */
  public function getLocations()
  {
    return $this->locations;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setReservedIpRange($reservedIpRange)
  {
    $this->reservedIpRange = $reservedIpRange;
  }
  /**
   * @return string
   */
  public function getReservedIpRange()
  {
    return $this->reservedIpRange;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setStatusMessage($statusMessage)
  {
    $this->statusMessage = $statusMessage;
  }
  /**
   * @return string
   */
  public function getStatusMessage()
  {
    return $this->statusMessage;
  }
  /**
   * @param Trust[]
   */
  public function setTrusts($trusts)
  {
    $this->trusts = $trusts;
  }
  /**
   * @return Trust[]
   */
  public function getTrusts()
  {
    return $this->trusts;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Domain::class, 'Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Domain');
