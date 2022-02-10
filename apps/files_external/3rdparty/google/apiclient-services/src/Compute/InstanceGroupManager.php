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
  /**
   * @var string
   */
  public $baseInstanceName;
  /**
   * @var string
   */
  public $creationTimestamp;
  protected $currentActionsType = InstanceGroupManagerActionsSummary::class;
  protected $currentActionsDataType = '';
  /**
   * @var string
   */
  public $description;
  protected $distributionPolicyType = DistributionPolicy::class;
  protected $distributionPolicyDataType = '';
  /**
   * @var string
   */
  public $fingerprint;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $instanceGroup;
  /**
   * @var string
   */
  public $instanceTemplate;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  protected $namedPortsType = NamedPort::class;
  protected $namedPortsDataType = 'array';
  /**
   * @var string
   */
  public $region;
  /**
   * @var string
   */
  public $selfLink;
  protected $statefulPolicyType = StatefulPolicy::class;
  protected $statefulPolicyDataType = '';
  protected $statusType = InstanceGroupManagerStatus::class;
  protected $statusDataType = '';
  /**
   * @var string[]
   */
  public $targetPools;
  /**
   * @var int
   */
  public $targetSize;
  protected $updatePolicyType = InstanceGroupManagerUpdatePolicy::class;
  protected $updatePolicyDataType = '';
  protected $versionsType = InstanceGroupManagerVersion::class;
  protected $versionsDataType = 'array';
  /**
   * @var string
   */
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
  /**
   * @param string
   */
  public function setBaseInstanceName($baseInstanceName)
  {
    $this->baseInstanceName = $baseInstanceName;
  }
  /**
   * @return string
   */
  public function getBaseInstanceName()
  {
    return $this->baseInstanceName;
  }
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
  /**
   * @param string
   */
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  /**
   * @return string
   */
  public function getFingerprint()
  {
    return $this->fingerprint;
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
   * @param string
   */
  public function setInstanceGroup($instanceGroup)
  {
    $this->instanceGroup = $instanceGroup;
  }
  /**
   * @return string
   */
  public function getInstanceGroup()
  {
    return $this->instanceGroup;
  }
  /**
   * @param string
   */
  public function setInstanceTemplate($instanceTemplate)
  {
    $this->instanceTemplate = $instanceTemplate;
  }
  /**
   * @return string
   */
  public function getInstanceTemplate()
  {
    return $this->instanceTemplate;
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
  /**
   * @param string[]
   */
  public function setTargetPools($targetPools)
  {
    $this->targetPools = $targetPools;
  }
  /**
   * @return string[]
   */
  public function getTargetPools()
  {
    return $this->targetPools;
  }
  /**
   * @param int
   */
  public function setTargetSize($targetSize)
  {
    $this->targetSize = $targetSize;
  }
  /**
   * @return int
   */
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
  /**
   * @param string
   */
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  /**
   * @return string
   */
  public function getZone()
  {
    return $this->zone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InstanceGroupManager::class, 'Google_Service_Compute_InstanceGroupManager');
