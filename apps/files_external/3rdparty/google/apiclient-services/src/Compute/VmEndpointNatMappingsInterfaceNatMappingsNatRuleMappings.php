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

class VmEndpointNatMappingsInterfaceNatMappingsNatRuleMappings extends \Google\Collection
{
  protected $collection_key = 'natIpPortRanges';
  /**
   * @var string[]
   */
  public $drainNatIpPortRanges;
  /**
   * @var string[]
   */
  public $natIpPortRanges;
  /**
   * @var int
   */
  public $numTotalDrainNatPorts;
  /**
   * @var int
   */
  public $numTotalNatPorts;
  /**
   * @var int
   */
  public $ruleNumber;

  /**
   * @param string[]
   */
  public function setDrainNatIpPortRanges($drainNatIpPortRanges)
  {
    $this->drainNatIpPortRanges = $drainNatIpPortRanges;
  }
  /**
   * @return string[]
   */
  public function getDrainNatIpPortRanges()
  {
    return $this->drainNatIpPortRanges;
  }
  /**
   * @param string[]
   */
  public function setNatIpPortRanges($natIpPortRanges)
  {
    $this->natIpPortRanges = $natIpPortRanges;
  }
  /**
   * @return string[]
   */
  public function getNatIpPortRanges()
  {
    return $this->natIpPortRanges;
  }
  /**
   * @param int
   */
  public function setNumTotalDrainNatPorts($numTotalDrainNatPorts)
  {
    $this->numTotalDrainNatPorts = $numTotalDrainNatPorts;
  }
  /**
   * @return int
   */
  public function getNumTotalDrainNatPorts()
  {
    return $this->numTotalDrainNatPorts;
  }
  /**
   * @param int
   */
  public function setNumTotalNatPorts($numTotalNatPorts)
  {
    $this->numTotalNatPorts = $numTotalNatPorts;
  }
  /**
   * @return int
   */
  public function getNumTotalNatPorts()
  {
    return $this->numTotalNatPorts;
  }
  /**
   * @param int
   */
  public function setRuleNumber($ruleNumber)
  {
    $this->ruleNumber = $ruleNumber;
  }
  /**
   * @return int
   */
  public function getRuleNumber()
  {
    return $this->ruleNumber;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VmEndpointNatMappingsInterfaceNatMappingsNatRuleMappings::class, 'Google_Service_Compute_VmEndpointNatMappingsInterfaceNatMappingsNatRuleMappings');
