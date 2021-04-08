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

class Google_Service_GKEHub_Membership extends Google_Model
{
  protected $authorityType = 'Google_Service_GKEHub_Authority';
  protected $authorityDataType = '';
  public $createTime;
  public $deleteTime;
  public $description;
  protected $endpointType = 'Google_Service_GKEHub_MembershipEndpoint';
  protected $endpointDataType = '';
  public $externalId;
  public $labels;
  public $lastConnectionTime;
  public $name;
  protected $stateType = 'Google_Service_GKEHub_MembershipState';
  protected $stateDataType = '';
  public $uniqueId;
  public $updateTime;

  /**
   * @param Google_Service_GKEHub_Authority
   */
  public function setAuthority(Google_Service_GKEHub_Authority $authority)
  {
    $this->authority = $authority;
  }
  /**
   * @return Google_Service_GKEHub_Authority
   */
  public function getAuthority()
  {
    return $this->authority;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDeleteTime($deleteTime)
  {
    $this->deleteTime = $deleteTime;
  }
  public function getDeleteTime()
  {
    return $this->deleteTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_GKEHub_MembershipEndpoint
   */
  public function setEndpoint(Google_Service_GKEHub_MembershipEndpoint $endpoint)
  {
    $this->endpoint = $endpoint;
  }
  /**
   * @return Google_Service_GKEHub_MembershipEndpoint
   */
  public function getEndpoint()
  {
    return $this->endpoint;
  }
  public function setExternalId($externalId)
  {
    $this->externalId = $externalId;
  }
  public function getExternalId()
  {
    return $this->externalId;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLastConnectionTime($lastConnectionTime)
  {
    $this->lastConnectionTime = $lastConnectionTime;
  }
  public function getLastConnectionTime()
  {
    return $this->lastConnectionTime;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_GKEHub_MembershipState
   */
  public function setState(Google_Service_GKEHub_MembershipState $state)
  {
    $this->state = $state;
  }
  /**
   * @return Google_Service_GKEHub_MembershipState
   */
  public function getState()
  {
    return $this->state;
  }
  public function setUniqueId($uniqueId)
  {
    $this->uniqueId = $uniqueId;
  }
  public function getUniqueId()
  {
    return $this->uniqueId;
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
