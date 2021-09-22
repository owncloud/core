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

class InstanceGroupManager extends \Google\Collection
{
  protected $collection_key = 'versions';
  protected $autoHealingPoliciesType = InstanceGroupManagerAutoHealingPolicy::class;
  protected $autoHealingPoliciesDataType = 'array';
  public $baseInstanceName;
  public $creationTimestamp;
  protected $currentActionsType = InstanceGroupManagerActionsSummary::class;
  protected $currentActionsDataType = '';
  public $description;
  protected $distributionPolicyType = DistributionPolicy::class;
  protected $distributionPolicyDataType = '';
  public $fingerprint;
  public $id;
  public $instanceGroup;
  public $instanceTemplate;
  public $kind;
  public $name;
  protected $namedPortsType = NamedPort::class;
  protected $namedPortsDataType = 'array';
  public $region;
  public $selfLink;
  protected $statefulPolicyType = StatefulPolicy::class;
  protected $statefulPolicyDataType = '';
  protected $statusType = InstanceGroupManagerStatus::class;
  protected $statusDataType = '';
  public $targetPools;
  public $targetSize;
  protected $updatePolicyType = InstanceGroupManagerUpdatePolicy::class;
  protected $updatePolicyDataType = '';
  protected $versionsType = InstanceGroupManagerVersion::class;
  protected $versionsDataType = 'array';
  public $zone;

  /**
   * @param InstanceGroupManagerAutoHealingPolicy[]
   */
  public function setAutoHealingPolicies($autoHealingPolicies)
  {
    $this->autoHealingPolicies = $autoHealingPolicies;
  }
  /**
   * @return InstanceGroupManagerAutoHealingPolicy[]
   */
  public function getAutoHealingPolicies()
  {
    return $this->autoHealingPolicies;
  }
  public function setBaseInstanceName($baseInstanceName)
  {
    $this->baseInstanceName = $baseInstanceName;
  }
  public function getBaseInstanceName()
  {
    return $this->baseInstanceName;
  }
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  /**
   * @param InstanceGroupManagerActionsSummary
   */
  public function setCurrentActions(InstanceGroupManagerActionsSummary $currentActions)
  {
    $this->currentActions = $currentActions;
  }
  /**
   * @return InstanceGroupManagerActionsSummary
   */
  public function getCurrentActions()
  {
    return $this->currentActions;
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
   * @param DistributionPolicy
   */
  public function setDistributionPolicy(DistributionPolicy $distributionPolicy)
  {
    $this->distributionPolicy = $distributionPolicy;
  }
  /**
   * @return DistributionPolicy
   */
  public function getDistributionPolicy()
  {
    return $this->distributionPolicy;
  }
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setInstanceGroup($instanceGroup)
  {
    $this->instanceGroup = $instanceGroup;
  }
  public function getInstanceGroup()
  {
    return $this->instanceGroup;
  }
  public function setInstanceTemplate($instanceTemplate)
  {
    $this->instanceTemplate = $instanceTemplate;
  }
  public function getInstanceTemplate()
  {
    return $this->instanceTemplate;
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
  /**
   * @param NamedPort[]
   */
  public function setNamedPorts($namedPorts)
  {
    $this->namedPorts = $namedPorts;
  }
  /**
   * @return NamedPort[]
   */
  public function getNamedPorts()
  {
    return $this->namedPorts;
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
   * @param StatefulPolicy
   */
  public function setStatefulPolicy(StatefulPolicy $statefulPolicy)
  {
    $this->statefulPolicy = $statefulPolicy;
  }
  /**
   * @return StatefulPolicy
   */
  public function getStatefulPolicy()
  {
    return $this->statefulPolicy;
  }
  /**
   * @param InstanceGroupManagerStatus
   */
  public function setStatus(InstanceGroupManagerStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return InstanceGroupManagerStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
  public function setTargetPools($targetPools)
  {
    $this->targetPools = $targetPools;
  }
  public function getTargetPools()
  {
    return $this->targetPools;
  }
  public function setTargetSize($targetSize)
  {
    $this->targetSize = $targetSize;
  }
  public function getTargetSize()
  {
    return $this->targetSize;
  }
  /**
   * @param InstanceGroupManagerUpdatePolicy
   */
  public function setUpdatePolicy(InstanceGroupManagerUpdatePolicy $updatePolicy)
  {
    $this->updatePolicy = $updatePolicy;
  }
  /**
   * @return InstanceGroupManagerUpdatePolicy
   */
  public function getUpdatePolicy()
  {
    return $this->updatePolicy;
  }
  /**
   * @param InstanceGroupManagerVersion[]
   */
  public function setVersions($versions)
  {
    $this->versions = $versions;
  }
  /**
   * @return InstanceGroupManagerVersion[]
   */
  public function getVersions()
  {
    return $this->versions;
  }
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  public function getZone()
  {
    return $this->zone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InstanceGroupManager::class, 'Google_Service_Compute_InstanceGroupManager');
