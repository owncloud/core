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

namespace Google\Service\GKEHub;

class Membership extends \Google\Model
{
  protected $authorityType = Authority::class;
  protected $authorityDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $deleteTime;
  /**
   * @var string
   */
  public $description;
  protected $endpointType = MembershipEndpoint::class;
  protected $endpointDataType = '';
  /**
   * @var string
   */
  public $externalId;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $lastConnectionTime;
  /**
   * @var string
   */
  public $name;
  protected $stateType = MembershipState::class;
  protected $stateDataType = '';
  /**
   * @var string
   */
  public $uniqueId;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param Authority
   */
  public function setAuthority(Authority $authority)
  {
    $this->authority = $authority;
  }
  /**
   * @return Authority
   */
  public function getAuthority()
  {
    return $this->authority;
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
  public function setDeleteTime($deleteTime)
  {
    $this->deleteTime = $deleteTime;
  }
  /**
   * @return string
   */
  public function getDeleteTime()
  {
    return $this->deleteTime;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param MembershipEndpoint
   */
  public function setEndpoint(MembershipEndpoint $endpoint)
  {
    $this->endpoint = $endpoint;
  }
  /**
   * @return MembershipEndpoint
   */
  public function getEndpoint()
  {
    return $this->endpoint;
  }
  /**
   * @param string
   */
  public function setExternalId($externalId)
  {
    $this->externalId = $externalId;
  }
  /**
   * @return string
   */
  public function getExternalId()
  {
    return $this->externalId;
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
   * @param string
   */
  public function setLastConnectionTime($lastConnectionTime)
  {
    $this->lastConnectionTime = $lastConnectionTime;
  }
  /**
   * @return string
   */
  public function getLastConnectionTime()
  {
    return $this->lastConnectionTime;
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
   * @param MembershipState
   */
  public function setState(MembershipState $state)
  {
    $this->state = $state;
  }
  /**
   * @return MembershipState
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setUniqueId($uniqueId)
  {
    $this->uniqueId = $uniqueId;
  }
  /**
   * @return string
   */
  public function getUniqueId()
  {
    return $this->uniqueId;
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
class_alias(Membership::class, 'Google_Service_GKEHub_Membership');
