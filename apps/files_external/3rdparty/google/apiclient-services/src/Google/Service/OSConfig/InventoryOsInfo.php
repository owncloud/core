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

class Google_Service_OSConfig_InventoryOsInfo extends Google_Model
{
  public $architecture;
  public $hostname;
  public $kernelRelease;
  public $kernelVersion;
  public $longName;
  public $osconfigAgentVersion;
  public $shortName;
  public $version;

  public function setArchitecture($architecture)
  {
    $this->architecture = $architecture;
  }
  public function getArchitecture()
  {
    return $this->architecture;
  }
  public function setHostname($hostname)
  {
    $this->hostname = $hostname;
  }
  public function getHostname()
  {
    return $this->hostname;
  }
  public function setKernelRelease($kernelRelease)
  {
    $this->kernelRelease = $kernelRelease;
  }
  public function getKernelRelease()
  {
    return $this->kernelRelease;
  }
  public function setKernelVersion($kernelVersion)
  {
    $this->kernelVersion = $kernelVersion;
  }
  public function getKernelVersion()
  {
    return $this->kernelVersion;
  }
  public function setLongName($longName)
  {
    $this->longName = $longName;
  }
  public function getLongName()
  {
    return $this->longName;
  }
  public function setOsconfigAgentVersion($osconfigAgentVersion)
  {
    $this->osconfigAgentVersion = $osconfigAgentVersion;
  }
  public function getOsconfigAgentVersion()
  {
    return $this->osconfigAgentVersion;
  }
  public function setShortName($shortName)
  {
    $this->shortName = $shortName;
  }
  public function getShortName()
  {
    return $this->shortName;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}
