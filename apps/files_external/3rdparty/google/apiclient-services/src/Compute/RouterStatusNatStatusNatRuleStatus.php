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

class RouterStatusNatStatusNatRuleStatus extends \Google\Collection
{
  protected $collection_key = 'drainNatIps';
  public $activeNatIps;
  public $drainNatIps;
  public $minExtraIpsNeeded;
  public $numVmEndpointsWithNatMappings;
  public $ruleNumber;

  public function setActiveNatIps($activeNatIps)
  {
    $this->activeNatIps = $activeNatIps;
  }
  public function getActiveNatIps()
  {
    return $this->activeNatIps;
  }
  public function setDrainNatIps($drainNatIps)
  {
    $this->drainNatIps = $drainNatIps;
  }
  public function getDrainNatIps()
  {
    return $this->drainNatIps;
  }
  public function setMinExtraIpsNeeded($minExtraIpsNeeded)
  {
    $this->minExtraIpsNeeded = $minExtraIpsNeeded;
  }
  public function getMinExtraIpsNeeded()
  {
    return $this->minExtraIpsNeeded;
  }
  public function setNumVmEndpointsWithNatMappings($numVmEndpointsWithNatMappings)
  {
    $this->numVmEndpointsWithNatMappings = $numVmEndpointsWithNatMappings;
  }
  public function getNumVmEndpointsWithNatMappings()
  {
    return $this->numVmEndpointsWithNatMappings;
  }
  public function setRuleNumber($ruleNumber)
  {
    $this->ruleNumber = $ruleNumber;
  }
  public function getRuleNumber()
  {
    return $this->ruleNumber;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RouterStatusNatStatusNatRuleStatus::class, 'Google_Service_Compute_RouterStatusNatStatusNatRuleStatus');
