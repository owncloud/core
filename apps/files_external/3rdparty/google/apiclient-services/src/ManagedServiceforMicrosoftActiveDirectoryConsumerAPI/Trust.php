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

class Trust extends \Google\Collection
{
  protected $collection_key = 'targetDnsIpAddresses';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $lastTrustHeartbeatTime;
  /**
   * @var bool
   */
  public $selectiveAuthentication;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $stateDescription;
  /**
   * @var string[]
   */
  public $targetDnsIpAddresses;
  /**
   * @var string
   */
  public $targetDomainName;
  /**
   * @var string
   */
  public $trustDirection;
  /**
   * @var string
   */
  public $trustHandshakeSecret;
  /**
   * @var string
   */
  public $trustType;
  /**
   * @var string
   */
  public $updateTime;

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
  public function setLastTrustHeartbeatTime($lastTrustHeartbeatTime)
  {
    $this->lastTrustHeartbeatTime = $lastTrustHeartbeatTime;
  }
  /**
   * @return string
   */
  public function getLastTrustHeartbeatTime()
  {
    return $this->lastTrustHeartbeatTime;
  }
  /**
   * @param bool
   */
  public function setSelectiveAuthentication($selectiveAuthentication)
  {
    $this->selectiveAuthentication = $selectiveAuthentication;
  }
  /**
   * @return bool
   */
  public function getSelectiveAuthentication()
  {
    return $this->selectiveAuthentication;
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
  public function setStateDescription($stateDescription)
  {
    $this->stateDescription = $stateDescription;
  }
  /**
   * @return string
   */
  public function getStateDescription()
  {
    return $this->stateDescription;
  }
  /**
   * @param string[]
   */
  public function setTargetDnsIpAddresses($targetDnsIpAddresses)
  {
    $this->targetDnsIpAddresses = $targetDnsIpAddresses;
  }
  /**
   * @return string[]
   */
  public function getTargetDnsIpAddresses()
  {
    return $this->targetDnsIpAddresses;
  }
  /**
   * @param string
   */
  public function setTargetDomainName($targetDomainName)
  {
    $this->targetDomainName = $targetDomainName;
  }
  /**
   * @return string
   */
  public function getTargetDomainName()
  {
    return $this->targetDomainName;
  }
  /**
   * @param string
   */
  public function setTrustDirection($trustDirection)
  {
    $this->trustDirection = $trustDirection;
  }
  /**
   * @return string
   */
  public function getTrustDirection()
  {
    return $this->trustDirection;
  }
  /**
   * @param string
   */
  public function setTrustHandshakeSecret($trustHandshakeSecret)
  {
    $this->trustHandshakeSecret = $trustHandshakeSecret;
  }
  /**
   * @return string
   */
  public function getTrustHandshakeSecret()
  {
    return $this->trustHandshakeSecret;
  }
  /**
   * @param string
   */
  public function setTrustType($trustType)
  {
    $this->trustType = $trustType;
  }
  /**
   * @return string
   */
  public function getTrustType()
  {
    return $this->trustType;
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
class_alias(Trust::class, 'Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Trust');
