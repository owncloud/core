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

namespace Google\Service\Compute;

class ResourcePolicy extends \Google\Model
{
  /**
   * @var string
   */
  public $creationTimestamp;
  /**
   * @var string
   */
  public $description;
  protected $groupPlacementPolicyType = ResourcePolicyGroupPlacementPolicy::class;
  protected $groupPlacementPolicyDataType = '';
  /**
   * @var string
   */
  public $id;
  protected $instanceSchedulePolicyType = ResourcePolicyInstanceSchedulePolicy::class;
  protected $instanceSchedulePolicyDataType = '';
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $region;
  protected $resourceStatusType = ResourcePolicyResourceStatus::class;
  protected $resourceStatusDataType = '';
  /**
   * @var string
   */
  public $selfLink;
  protected $snapshotSchedulePolicyType = ResourcePolicySnapshotSchedulePolicy::class;
  protected $snapshotSchedulePolicyDataType = '';
  /**
   * @var string
   */
  public $status;

  /**
   * @param string
   */
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  /**
   * @return string
   */
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
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
   * @param ResourcePolicyGroupPlacementPolicy
   */
  public function setGroupPlacementPolicy(ResourcePolicyGroupPlacementPolicy $groupPlacementPolicy)
  {
    $this->groupPlacementPolicy = $groupPlacementPolicy;
  }
  /**
   * @return ResourcePolicyGroupPlacementPolicy
   */
  public function getGroupPlacementPolicy()
  {
    return $this->groupPlacementPolicy;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param ResourcePolicyInstanceSchedulePolicy
   */
  public function setInstanceSchedulePolicy(ResourcePolicyInstanceSchedulePolicy $instanceSchedulePolicy)
  {
    $this->instanceSchedulePolicy = $instanceSchedulePolicy;
  }
  /**
   * @return ResourcePolicyInstanceSchedulePolicy
   */
  public function getInstanceSchedulePolicy()
  {
    return $this->instanceSchedulePolicy;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
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
  public function setRegion($region)
  {
    $this->region = $region;
  }
  /**
   * @return string
   */
  public function getRegion()
  {
    return $this->region;
  }
  /**
   * @param ResourcePolicyResourceStatus
   */
  public function setResourceStatus(ResourcePolicyResourceStatus $resourceStatus)
  {
    $this->resourceStatus = $resourceStatus;
  }
  /**
   * @return ResourcePolicyResourceStatus
   */
  public function getResourceStatus()
  {
    return $this->resourceStatus;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param ResourcePolicySnapshotSchedulePolicy
   */
  public function setSnapshotSchedulePolicy(ResourcePolicySnapshotSchedulePolicy $snapshotSchedulePolicy)
  {
    $this->snapshotSchedulePolicy = $snapshotSchedulePolicy;
  }
  /**
   * @return ResourcePolicySnapshotSchedulePolicy
   */
  public function getSnapshotSchedulePolicy()
  {
    return $this->snapshotSchedulePolicy;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResourcePolicy::class, 'Google_Service_Compute_ResourcePolicy');
