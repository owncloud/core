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
  /**
   * @var string[]
   */
  public $autoAllocatedNatIps;
  /**
   * @var string[]
   */
  public $drainAutoAllocatedNatIps;
  /**
   * @var string[]
   */
  public $drainUserAllocatedNatIps;
  /**
   * @var int
   */
  public $minExtraNatIpsNeeded;
  /**
   * @var string
   */
  public $name;
  /**
   * @var int
   */
  public $numVmEndpointsWithNatMappings;
  protected $ruleStatusType = RouterStatusNatStatusNatRuleStatus::class;
  protected $ruleStatusDataType = 'array';
  /**
   * @var string[]
   */
  public $userAllocatedNatIpResources;
  /**
   * @var string[]
   */
  public $userAllocatedNatIps;

  /**
   * @param string[]
   */
  public function setAutoAllocatedNatIps($autoAllocatedNatIps)
  {
    $this->autoAllocatedNatIps = $autoAllocatedNatIps;
  }
  /**
   * @return string[]
   */
  public function getAutoAllocatedNatIps()
  {
    return $this->autoAllocatedNatIps;
  }
  /**
   * @param string[]
   */
  public function setDrainAutoAllocatedNatIps($drainAutoAllocatedNatIps)
  {
    $this->drainAutoAllocatedNatIps = $drainAutoAllocatedNatIps;
  }
  /**
   * @return string[]
   */
  public function getDrainAutoAllocatedNatIps()
  {
    return $this->drainAutoAllocatedNatIps;
  }
  /**
   * @param string[]
   */
  public function setDrainUserAllocatedNatIps($drainUserAllocatedNatIps)
  {
    $this->drainUserAllocatedNatIps = $drainUserAllocatedNatIps;
  }
  /**
   * @return string[]
   */
  public function getDrainUserAllocatedNatIps()
  {
    return $this->drainUserAllocatedNatIps;
  }
  /**
   * @param int
   */
  public function setMinExtraNatIpsNeeded($minExtraNatIpsNeeded)
  {
    $this->minExtraNatIpsNeeded = $minExtraNatIpsNeeded;
  }
  /**
   * @return int
   */
  public function getMinExtraNatIpsNeeded()
  {
    return $this->minExtraNatIpsNeeded;
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
   * @param int
   */
  public function setNumVmEndpointsWithNatMappings($numVmEndpointsWithNatMappings)
  {
    $this->numVmEndpointsWithNatMappings = $numVmEndpointsWithNatMappings;
  }
  /**
   * @return int
   */
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
  /**
   * @param string[]
   */
  public function setUserAllocatedNatIpResources($userAllocatedNatIpResources)
  {
    $this->userAllocatedNatIpResources = $userAllocatedNatIpResources;
  }
  /**
   * @return string[]
   */
  public function getUserAllocatedNatIpResources()
  {
    return $this->userAllocatedNatIpResources;
  }
  /**
   * @param string[]
   */
  public function setUserAllocatedNatIps($userAllocatedNatIps)
  {
    $this->userAllocatedNatIps = $userAllocatedNatIps;
  }
  /**
   * @return string[]
   */
  public function getUserAllocatedNatIps()
  {
    return $this->userAllocatedNatIps;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RouterStatusNatStatus::class, 'Google_Service_Compute_RouterStatusNatStatus');
