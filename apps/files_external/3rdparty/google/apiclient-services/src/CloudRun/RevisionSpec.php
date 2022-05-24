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

namespace Google\Service\CloudRun;

class RevisionSpec extends \Google\Collection
{
  protected $collection_key = 'volumes';
  /**
   * @var int
   */
  public $containerConcurrency;
  protected $containersType = Container::class;
  protected $containersDataType = 'array';
  /**
   * @var string
   */
  public $serviceAccountName;
  /**
   * @var int
   */
  public $timeoutSeconds;
  protected $volumesType = Volume::class;
  protected $volumesDataType = 'array';

  /**
   * @param int
   */
  public function setContainerConcurrency($containerConcurrency)
  {
    $this->containerConcurrency = $containerConcurrency;
  }
  /**
   * @return int
   */
  public function getContainerConcurrency()
  {
    return $this->containerConcurrency;
  }
  /**
   * @param Container[]
   */
  public function setContainers($containers)
  {
    $this->containers = $containers;
  }
  /**
   * @return Container[]
   */
  public function getContainers()
  {
    return $this->containers;
  }
  /**
   * @param string
   */
  public function setServiceAccountName($serviceAccountName)
  {
    $this->serviceAccountName = $serviceAccountName;
  }
  /**
   * @return string
   */
  public function getServiceAccountName()
  {
    return $this->serviceAccountName;
  }
  /**
   * @param int
   */
  public function setTimeoutSeconds($timeoutSeconds)
  {
    $this->timeoutSeconds = $timeoutSeconds;
  }
  /**
   * @return int
   */
  public function getTimeoutSeconds()
  {
    return $this->timeoutSeconds;
  }
  /**
   * @param Volume[]
   */
  public function setVolumes($volumes)
  {
    $this->volumes = $volumes;
  }
  /**
   * @return Volume[]
   */
  public function getVolumes()
  {
    return $this->volumes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RevisionSpec::class, 'Google_Service_CloudRun_RevisionSpec');
