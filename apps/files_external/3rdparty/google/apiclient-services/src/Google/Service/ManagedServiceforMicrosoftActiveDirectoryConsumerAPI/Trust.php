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

class Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Trust extends Google_Collection
{
  protected $collection_key = 'targetDnsIpAddresses';
  public $createTime;
  public $lastTrustHeartbeatTime;
  public $selectiveAuthentication;
  public $state;
  public $stateDescription;
  public $targetDnsIpAddresses;
  public $targetDomainName;
  public $trustDirection;
  public $trustHandshakeSecret;
  public $trustType;
  public $updateTime;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setLastTrustHeartbeatTime($lastTrustHeartbeatTime)
  {
    $this->lastTrustHeartbeatTime = $lastTrustHeartbeatTime;
  }
  public function getLastTrustHeartbeatTime()
  {
    return $this->lastTrustHeartbeatTime;
  }
  public function setSelectiveAuthentication($selectiveAuthentication)
  {
    $this->selectiveAuthentication = $selectiveAuthentication;
  }
  public function getSelectiveAuthentication()
  {
    return $this->selectiveAuthentication;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setStateDescription($stateDescription)
  {
    $this->stateDescription = $stateDescription;
  }
  public function getStateDescription()
  {
    return $this->stateDescription;
  }
  public function setTargetDnsIpAddresses($targetDnsIpAddresses)
  {
    $this->targetDnsIpAddresses = $targetDnsIpAddresses;
  }
  public function getTargetDnsIpAddresses()
  {
    return $this->targetDnsIpAddresses;
  }
  public function setTargetDomainName($targetDomainName)
  {
    $this->targetDomainName = $targetDomainName;
  }
  public function getTargetDomainName()
  {
    return $this->targetDomainName;
  }
  public function setTrustDirection($trustDirection)
  {
    $this->trustDirection = $trustDirection;
  }
  public function getTrustDirection()
  {
    return $this->trustDirection;
  }
  public function setTrustHandshakeSecret($trustHandshakeSecret)
  {
    $this->trustHandshakeSecret = $trustHandshakeSecret;
  }
  public function getTrustHandshakeSecret()
  {
    return $this->trustHandshakeSecret;
  }
  public function setTrustType($trustType)
  {
    $this->trustType = $trustType;
  }
  public function getTrustType()
  {
    return $this->trustType;
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
