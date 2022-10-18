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

namespace Google\Service\DatabaseMigrationService;

class PrimaryInstanceSettings extends \Google\Model
{
  /**
   * @var string[]
   */
  public $databaseFlags;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string[]
   */
  public $labels;
  protected $machineConfigType = MachineConfig::class;
  protected $machineConfigDataType = '';
  /**
   * @var string
   */
  public $privateIp;

  /**
   * @param string[]
   */
  public function setDatabaseFlags($databaseFlags)
  {
    $this->databaseFlags = $databaseFlags;
  }
  /**
   * @return string[]
   */
  public function getDatabaseFlags()
  {
    return $this->databaseFlags;
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
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param MachineConfig
   */
  public function setMachineConfig(MachineConfig $machineConfig)
  {
    $this->machineConfig = $machineConfig;
  }
  /**
   * @return MachineConfig
   */
  public function getMachineConfig()
  {
    return $this->machineConfig;
  }
  /**
   * @param string
   */
  public function setPrivateIp($privateIp)
  {
    $this->privateIp = $privateIp;
  }
  /**
   * @return string
   */
  public function getPrivateIp()
  {
    return $this->privateIp;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PrimaryInstanceSettings::class, 'Google_Service_DatabaseMigrationService_PrimaryInstanceSettings');
