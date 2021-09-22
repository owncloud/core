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
  public $creationTimestamp;
  public $description;
  protected $groupPlacementPolicyType = ResourcePolicyGroupPlacementPolicy::class;
  protected $groupPlacementPolicyDataType = '';
  public $id;
  protected $instanceSchedulePolicyType = ResourcePolicyInstanceSchedulePolicy::class;
  protected $instanceSchedulePolicyDataType = '';
  public $kind;
  public $name;
  public $region;
  protected $resourceStatusType = ResourcePolicyResourceStatus::class;
  protected $resourceStatusDataType = '';
  public $selfLink;
  protected $snapshotSchedulePolicyType = ResourcePolicySnapshotSchedulePolicy::class;
  protected $snapshotSchedulePolicyDataType = '';
  public $status;

  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
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
  public function setId($id)
  {
    $this->id = $id;
  }
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
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
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
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
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
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResourcePolicy::class, 'Google_Service_Compute_ResourcePolicy');
