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

class RouterStatusNatStatus extends \Google\Collection
{
  protected $collection_key = 'userAllocatedNatIps';
  public $autoAllocatedNatIps;
  public $drainAutoAllocatedNatIps;
  public $drainUserAllocatedNatIps;
  public $minExtraNatIpsNeeded;
  public $name;
  public $numVmEndpointsWithNatMappings;
  protected $ruleStatusType = RouterStatusNatStatusNatRuleStatus::class;
  protected $ruleStatusDataType = 'array';
  public $userAllocatedNatIpResources;
  public $userAllocatedNatIps;

  public function setAutoAllocatedNatIps($autoAllocatedNatIps)
  {
    $this->autoAllocatedNatIps = $autoAllocatedNatIps;
  }
  public function getAutoAllocatedNatIps()
  {
    return $this->autoAllocatedNatIps;
  }
  public function setDrainAutoAllocatedNatIps($drainAutoAllocatedNatIps)
  {
    $this->drainAutoAllocatedNatIps = $drainAutoAllocatedNatIps;
  }
  public function getDrainAutoAllocatedNatIps()
  {
    return $this->drainAutoAllocatedNatIps;
  }
  public function setDrainUserAllocatedNatIps($drainUserAllocatedNatIps)
  {
    $this->drainUserAllocatedNatIps = $drainUserAllocatedNatIps;
  }
  public function getDrainUserAllocatedNatIps()
  {
    return $this->drainUserAllocatedNatIps;
  }
  public function setMinExtraNatIpsNeeded($minExtraNatIpsNeeded)
  {
    $this->minExtraNatIpsNeeded = $minExtraNatIpsNeeded;
  }
  public function getMinExtraNatIpsNeeded()
  {
    return $this->minExtraNatIpsNeeded;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNumVmEndpointsWithNatMappings($numVmEndpointsWithNatMappings)
  {
    $this->numVmEndpointsWithNatMappings = $numVmEndpointsWithNatMappings;
  }
  public function getNumVmEndpointsWithNatMappings()
  {
    return $this->numVmEndpointsWithNatMappings;
  }
  /**
   * @param RouterStatusNatStatusNatRuleStatus[]
   */
  public function setRuleStatus($ruleStatus)
  {
    $this->ruleStatus = $ruleStatus;
  }
  /**
   * @return RouterStatusNatStatusNatRuleStatus[]
   */
  public function getRuleStatus()
  {
    return $this->ruleStatus;
  }
  public function setUserAllocatedNatIpResources($userAllocatedNatIpResources)
  {
    $this->userAllocatedNatIpResources = $userAllocatedNatIpResources;
  }
  public function getUserAllocatedNatIpResources()
  {
    return $this->userAllocatedNatIpResources;
  }
  public function setUserAllocatedNatIps($userAllocatedNatIps)
  {
    $this->userAllocatedNatIps = $userAllocatedNatIps;
  }
  public function getUserAllocatedNatIps()
  {
    return $this->userAllocatedNatIps;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RouterStatusNatStatus::class, 'Google_Service_Compute_RouterStatusNatStatus');
