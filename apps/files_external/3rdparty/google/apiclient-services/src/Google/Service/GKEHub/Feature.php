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

class Google_Service_GKEHub_Feature extends Google_Model
{
  public $createTime;
  public $deleteTime;
  public $labels;
  protected $membershipSpecsType = 'Google_Service_GKEHub_MembershipFeatureSpec';
  protected $membershipSpecsDataType = 'map';
  protected $membershipStatesType = 'Google_Service_GKEHub_MembershipFeatureState';
  protected $membershipStatesDataType = 'map';
  public $name;
  protected $resourceStateType = 'Google_Service_GKEHub_FeatureResourceState';
  protected $resourceStateDataType = '';
  protected $specType = 'Google_Service_GKEHub_CommonFeatureSpec';
  protected $specDataType = '';
  protected $stateType = 'Google_Service_GKEHub_CommonFeatureState';
  protected $stateDataType = '';
  public $updateTime;

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
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param Google_Service_GKEHub_MembershipFeatureSpec[]
   */
  public function setMembershipSpecs($membershipSpecs)
  {
    $this->membershipSpecs = $membershipSpecs;
  }
  /**
   * @return Google_Service_GKEHub_MembershipFeatureSpec[]
   */
  public function getMembershipSpecs()
  {
    return $this->membershipSpecs;
  }
  /**
   * @param Google_Service_GKEHub_MembershipFeatureState[]
   */
  public function setMembershipStates($membershipStates)
  {
    $this->membershipStates = $membershipStates;
  }
  /**
   * @return Google_Service_GKEHub_MembershipFeatureState[]
   */
  public function getMembershipStates()
  {
    return $this->membershipStates;
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
   * @param Google_Service_GKEHub_FeatureResourceState
   */
  public function setResourceState(Google_Service_GKEHub_FeatureResourceState $resourceState)
  {
    $this->resourceState = $resourceState;
  }
  /**
   * @return Google_Service_GKEHub_FeatureResourceState
   */
  public function getResourceState()
  {
    return $this->resourceState;
  }
  /**
   * @param Google_Service_GKEHub_CommonFeatureSpec
   */
  public function setSpec(Google_Service_GKEHub_CommonFeatureSpec $spec)
  {
    $this->spec = $spec;
  }
  /**
   * @return Google_Service_GKEHub_CommonFeatureSpec
   */
  public function getSpec()
  {
    return $this->spec;
  }
  /**
   * @param Google_Service_GKEHub_CommonFeatureState
   */
  public function setState(Google_Service_GKEHub_CommonFeatureState $state)
  {
    $this->state = $state;
  }
  /**
   * @return Google_Service_GKEHub_CommonFeatureState
   */
  public function getState()
  {
    return $this->state;
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
