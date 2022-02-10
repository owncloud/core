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

class Feature extends \Google\Model
{
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $deleteTime;
  /**
   * @var string[]
   */
  public $labels;
  protected $membershipSpecsType = MembershipFeatureSpec::class;
  protected $membershipSpecsDataType = 'map';
  protected $membershipStatesType = MembershipFeatureState::class;
  protected $membershipStatesDataType = 'map';
  /**
   * @var string
   */
  public $name;
  protected $resourceStateType = FeatureResourceState::class;
  protected $resourceStateDataType = '';
  protected $specType = CommonFeatureSpec::class;
  protected $specDataType = '';
  protected $stateType = CommonFeatureState::class;
  protected $stateDataType = '';
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
   * @param MembershipFeatureSpec[]
   */
  public function setMembershipSpecs($membershipSpecs)
  {
    $this->membershipSpecs = $membershipSpecs;
  }
  /**
   * @return MembershipFeatureSpec[]
   */
  public function getMembershipSpecs()
  {
    return $this->membershipSpecs;
  }
  /**
   * @param MembershipFeatureState[]
   */
  public function setMembershipStates($membershipStates)
  {
    $this->membershipStates = $membershipStates;
  }
  /**
   * @return MembershipFeatureState[]
   */
  public function getMembershipStates()
  {
    return $this->membershipStates;
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
   * @param FeatureResourceState
   */
  public function setResourceState(FeatureResourceState $resourceState)
  {
    $this->resourceState = $resourceState;
  }
  /**
   * @return FeatureResourceState
   */
  public function getResourceState()
  {
    return $this->resourceState;
  }
  /**
   * @param CommonFeatureSpec
   */
  public function setSpec(CommonFeatureSpec $spec)
  {
    $this->spec = $spec;
  }
  /**
   * @return CommonFeatureSpec
   */
  public function getSpec()
  {
    return $this->spec;
  }
  /**
   * @param CommonFeatureState
   */
  public function setState(CommonFeatureState $state)
  {
    $this->state = $state;
  }
  /**
   * @return CommonFeatureState
   */
  public function getState()
  {
    return $this->state;
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
class_alias(Feature::class, 'Google_Service_GKEHub_Feature');
