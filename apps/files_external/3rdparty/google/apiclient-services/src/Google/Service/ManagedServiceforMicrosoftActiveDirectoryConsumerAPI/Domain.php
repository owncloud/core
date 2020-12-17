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

class Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Domain extends Google_Collection
{
  protected $collection_key = 'trusts';
  public $admin;
  public $authorizedNetworks;
  public $createTime;
  public $fqdn;
  public $labels;
  public $locations;
  public $name;
  public $reservedIpRange;
  public $state;
  public $statusMessage;
  protected $trustsType = 'Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Trust';
  protected $trustsDataType = 'array';
  public $updateTime;

  public function setAdmin($admin)
  {
    $this->admin = $admin;
  }
  public function getAdmin()
  {
    return $this->admin;
  }
  public function setAuthorizedNetworks($authorizedNetworks)
  {
    $this->authorizedNetworks = $authorizedNetworks;
  }
  public function getAuthorizedNetworks()
  {
    return $this->authorizedNetworks;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setFqdn($fqdn)
  {
    $this->fqdn = $fqdn;
  }
  public function getFqdn()
  {
    return $this->fqdn;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLocations($locations)
  {
    $this->locations = $locations;
  }
  public function getLocations()
  {
    return $this->locations;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setReservedIpRange($reservedIpRange)
  {
    $this->reservedIpRange = $reservedIpRange;
  }
  public function getReservedIpRange()
  {
    return $this->reservedIpRange;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setStatusMessage($statusMessage)
  {
    $this->statusMessage = $statusMessage;
  }
  public function getStatusMessage()
  {
    return $this->statusMessage;
  }
  /**
   * @param Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Trust[]
   */
  public function setTrusts($trusts)
  {
    $this->trusts = $trusts;
  }
  /**
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Trust[]
   */
  public function getTrusts()
  {
    return $this->trusts;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
