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

class Google_Service_Compute_ResourcePolicy extends Google_Model
{
  public $creationTimestamp;
  public $description;
  protected $groupPlacementPolicyType = 'Google_Service_Compute_ResourcePolicyGroupPlacementPolicy';
  protected $groupPlacementPolicyDataType = '';
  public $id;
  public $kind;
  public $name;
  public $region;
  public $selfLink;
  protected $snapshotSchedulePolicyType = 'Google_Service_Compute_ResourcePolicySnapshotSchedulePolicy';
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
   * @param Google_Service_Compute_ResourcePolicyGroupPlacementPolicy
   */
  public function setGroupPlacementPolicy(Google_Service_Compute_ResourcePolicyGroupPlacementPolicy $groupPlacementPolicy)
  {
    $this->groupPlacementPolicy = $groupPlacementPolicy;
  }
  /**
   * @return Google_Service_Compute_ResourcePolicyGroupPlacementPolicy
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
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param Google_Service_Compute_ResourcePolicySnapshotSchedulePolicy
   */
  public function setSnapshotSchedulePolicy(Google_Service_Compute_ResourcePolicySnapshotSchedulePolicy $snapshotSchedulePolicy)
  {
    $this->snapshotSchedulePolicy = $snapshotSchedulePolicy;
  }
  /**
   * @return Google_Service_Compute_ResourcePolicySnapshotSchedulePolicy
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
