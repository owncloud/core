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

namespace Google\Service\Baremetalsolution;

class VolumeConfig extends \Google\Collection
{
  protected $collection_key = 'nfsExports';
  /**
   * @var string
   */
  public $gcpService;
  /**
   * @var string
   */
  public $id;
  protected $lunRangesType = LunRange::class;
  protected $lunRangesDataType = 'array';
  /**
   * @var string[]
   */
  public $machineIds;
  /**
   * @var string
   */
  public $name;
  protected $nfsExportsType = NfsExport::class;
  protected $nfsExportsDataType = 'array';
  /**
   * @var string
   */
  public $performanceTier;
  /**
   * @var string
   */
  public $protocol;
  /**
   * @var int
   */
  public $sizeGb;
  /**
   * @var bool
   */
  public $snapshotsEnabled;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $userNote;

  /**
   * @param string
   */
  public function setGcpService($gcpService)
  {
    $this->gcpService = $gcpService;
  }
  /**
   * @return string
   */
  public function getGcpService()
  {
    return $this->gcpService;
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
   * @param LunRange[]
   */
  public function setLunRanges($lunRanges)
  {
    $this->lunRanges = $lunRanges;
  }
  /**
   * @return LunRange[]
   */
  public function getLunRanges()
  {
    return $this->lunRanges;
  }
  /**
   * @param string[]
   */
  public function setMachineIds($machineIds)
  {
    $this->machineIds = $machineIds;
  }
  /**
   * @return string[]
   */
  public function getMachineIds()
  {
    return $this->machineIds;
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
   * @param NfsExport[]
   */
  public function setNfsExports($nfsExports)
  {
    $this->nfsExports = $nfsExports;
  }
  /**
   * @return NfsExport[]
   */
  public function getNfsExports()
  {
    return $this->nfsExports;
  }
  /**
   * @param string
   */
  public function setPerformanceTier($performanceTier)
  {
    $this->performanceTier = $performanceTier;
  }
  /**
   * @return string
   */
  public function getPerformanceTier()
  {
    return $this->performanceTier;
  }
  /**
   * @param string
   */
  public function setProtocol($protocol)
  {
    $this->protocol = $protocol;
  }
  /**
   * @return string
   */
  public function getProtocol()
  {
    return $this->protocol;
  }
  /**
   * @param int
   */
  public function setSizeGb($sizeGb)
  {
    $this->sizeGb = $sizeGb;
  }
  /**
   * @return int
   */
  public function getSizeGb()
  {
    return $this->sizeGb;
  }
  /**
   * @param bool
   */
  public function setSnapshotsEnabled($snapshotsEnabled)
  {
    $this->snapshotsEnabled = $snapshotsEnabled;
  }
  /**
   * @return bool
   */
  public function getSnapshotsEnabled()
  {
    return $this->snapshotsEnabled;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setUserNote($userNote)
  {
    $this->userNote = $userNote;
  }
  /**
   * @return string
   */
  public function getUserNote()
  {
    return $this->userNote;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VolumeConfig::class, 'Google_Service_Baremetalsolution_VolumeConfig');
