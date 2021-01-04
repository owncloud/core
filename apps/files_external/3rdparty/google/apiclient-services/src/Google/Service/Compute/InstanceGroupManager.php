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

class Google_Service_Compute_InstanceGroupManager extends Google_Collection
{
  protected $collection_key = 'versions';
  protected $autoHealingPoliciesType = 'Google_Service_Compute_InstanceGroupManagerAutoHealingPolicy';
  protected $autoHealingPoliciesDataType = 'array';
  public $baseInstanceName;
  public $creationTimestamp;
  protected $currentActionsType = 'Google_Service_Compute_InstanceGroupManagerActionsSummary';
  protected $currentActionsDataType = '';
  public $description;
  protected $distributionPolicyType = 'Google_Service_Compute_DistributionPolicy';
  protected $distributionPolicyDataType = '';
  public $fingerprint;
  public $id;
  public $instanceGroup;
  public $instanceTemplate;
  public $kind;
  public $name;
  protected $namedPortsType = 'Google_Service_Compute_NamedPort';
  protected $namedPortsDataType = 'array';
  public $region;
  public $selfLink;
  protected $statefulPolicyType = 'Google_Service_Compute_StatefulPolicy';
  protected $statefulPolicyDataType = '';
  protected $statusType = 'Google_Service_Compute_InstanceGroupManagerStatus';
  protected $statusDataType = '';
  public $targetPools;
  public $targetSize;
  protected $updatePolicyType = 'Google_Service_Compute_InstanceGroupManagerUpdatePolicy';
  protected $updatePolicyDataType = '';
  protected $versionsType = 'Google_Service_Compute_InstanceGroupManagerVersion';
  protected $versionsDataType = 'array';
  public $zone;

  /**
   * @param Google_Service_Compute_InstanceGroupManagerAutoHealingPolicy[]
   */
  public function setAutoHealingPolicies($autoHealingPolicies)
  {
    $this->autoHealingPolicies = $autoHealingPolicies;
  }
  /**
   * @return Google_Service_Compute_InstanceGroupManagerAutoHealingPolicy[]
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
   * @param Google_Service_Compute_InstanceGroupManagerActionsSummary
   */
  public function setCurrentActions(Google_Service_Compute_InstanceGroupManagerActionsSummary $currentActions)
  {
    $this->currentActions = $currentActions;
  }
  /**
   * @return Google_Service_Compute_InstanceGroupManagerActionsSummary
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
   * @param Google_Service_Compute_DistributionPolicy
   */
  public function setDistributionPolicy(Google_Service_Compute_DistributionPolicy $distributionPolicy)
  {
    $this->distributionPolicy = $distributionPolicy;
  }
  /**
   * @return Google_Service_Compute_DistributionPolicy
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
   * @param Google_Service_Compute_NamedPort[]
   */
  public function setNamedPorts($namedPorts)
  {
    $this->namedPorts = $namedPorts;
  }
  /**
   * @return Google_Service_Compute_NamedPort[]
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
   * @param Google_Service_Compute_StatefulPolicy
   */
  public function setStatefulPolicy(Google_Service_Compute_StatefulPolicy $statefulPolicy)
  {
    $this->statefulPolicy = $statefulPolicy;
  }
  /**
   * @return Google_Service_Compute_StatefulPolicy
   */
  public function getStatefulPolicy()
  {
    return $this->statefulPolicy;
  }
  /**
   * @param Google_Service_Compute_InstanceGroupManagerStatus
   */
  public function setStatus(Google_Service_Compute_InstanceGroupManagerStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return Google_Service_Compute_InstanceGroupManagerStatus
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
   * @param Google_Service_Compute_InstanceGroupManagerUpdatePolicy
   */
  public function setUpdatePolicy(Google_Service_Compute_InstanceGroupManagerUpdatePolicy $updatePolicy)
  {
    $this->updatePolicy = $updatePolicy;
  }
  /**
   * @return Google_Service_Compute_InstanceGroupManagerUpdatePolicy
   */
  public function getUpdatePolicy()
  {
    return $this->updatePolicy;
  }
  /**
   * @param Google_Service_Compute_InstanceGroupManagerVersion[]
   */
  public function setVersions($versions)
  {
    $this->versions = $versions;
  }
  /**
   * @return Google_Service_Compute_InstanceGroupManagerVersion[]
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
