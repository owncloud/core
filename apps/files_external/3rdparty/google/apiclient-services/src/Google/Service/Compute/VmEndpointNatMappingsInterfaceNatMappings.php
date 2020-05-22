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

class Google_Service_Compute_VmEndpointNatMappingsInterfaceNatMappings extends Google_Collection
{
  protected $collection_key = 'natIpPortRanges';
  public $drainNatIpPortRanges;
  public $natIpPortRanges;
  public $numTotalDrainNatPorts;
  public $numTotalNatPorts;
  public $sourceAliasIpRange;
  public $sourceVirtualIp;

  public function setDrainNatIpPortRanges($drainNatIpPortRanges)
  {
    $this->drainNatIpPortRanges = $drainNatIpPortRanges;
  }
  public function getDrainNatIpPortRanges()
  {
    return $this->drainNatIpPortRanges;
  }
  public function setNatIpPortRanges($natIpPortRanges)
  {
    $this->natIpPortRanges = $natIpPortRanges;
  }
  public function getNatIpPortRanges()
  {
    return $this->natIpPortRanges;
  }
  public function setNumTotalDrainNatPorts($numTotalDrainNatPorts)
  {
    $this->numTotalDrainNatPorts = $numTotalDrainNatPorts;
  }
  public function getNumTotalDrainNatPorts()
  {
    return $this->numTotalDrainNatPorts;
  }
  public function setNumTotalNatPorts($numTotalNatPorts)
  {
    $this->numTotalNatPorts = $numTotalNatPorts;
  }
  public function getNumTotalNatPorts()
  {
    return $this->numTotalNatPorts;
  }
  public function setSourceAliasIpRange($sourceAliasIpRange)
  {
    $this->sourceAliasIpRange = $sourceAliasIpRange;
  }
  public function getSourceAliasIpRange()
  {
    return $this->sourceAliasIpRange;
  }
  public function setSourceVirtualIp($sourceVirtualIp)
  {
    $this->sourceVirtualIp = $sourceVirtualIp;
  }
  public function getSourceVirtualIp()
  {
    return $this->sourceVirtualIp;
  }
}
