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

namespace Google\Service\CloudAsset;

class OsInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $architecture;
  /**
   * @var string
   */
  public $hostname;
  /**
   * @var string
   */
  public $kernelRelease;
  /**
   * @var string
   */
  public $kernelVersion;
  /**
   * @var string
   */
  public $longName;
  /**
   * @var string
   */
  public $osconfigAgentVersion;
  /**
   * @var string
   */
  public $shortName;
  /**
   * @var string
   */
  public $version;

  /**
   * @param string
   */
  public function setArchitecture($architecture)
  {
    $this->architecture = $architecture;
  }
  /**
   * @return string
   */
  public function getArchitecture()
  {
    return $this->architecture;
  }
  /**
   * @param string
   */
  public function setHostname($hostname)
  {
    $this->hostname = $hostname;
  }
  /**
   * @return string
   */
  public function getHostname()
  {
    return $this->hostname;
  }
  /**
   * @param string
   */
  public function setKernelRelease($kernelRelease)
  {
    $this->kernelRelease = $kernelRelease;
  }
  /**
   * @return string
   */
  public function getKernelRelease()
  {
    return $this->kernelRelease;
  }
  /**
   * @param string
   */
  public function setKernelVersion($kernelVersion)
  {
    $this->kernelVersion = $kernelVersion;
  }
  /**
   * @return string
   */
  public function getKernelVersion()
  {
    return $this->kernelVersion;
  }
  /**
   * @param string
   */
  public function setLongName($longName)
  {
    $this->longName = $longName;
  }
  /**
   * @return string
   */
  public function getLongName()
  {
    return $this->longName;
  }
  /**
   * @param string
   */
  public function setOsconfigAgentVersion($osconfigAgentVersion)
  {
    $this->osconfigAgentVersion = $osconfigAgentVersion;
  }
  /**
   * @return string
   */
  public function getOsconfigAgentVersion()
  {
    return $this->osconfigAgentVersion;
  }
  /**
   * @param string
   */
  public function setShortName($shortName)
  {
    $this->shortName = $shortName;
  }
  /**
   * @return string
   */
  public function getShortName()
  {
    return $this->shortName;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OsInfo::class, 'Google_Service_CloudAsset_OsInfo');
