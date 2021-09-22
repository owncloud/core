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

class CloudSqlSettings extends \Google\Model
{
  public $activationPolicy;
  public $autoStorageIncrease;
  public $collation;
  public $dataDiskSizeGb;
  public $dataDiskType;
  public $databaseFlags;
  public $databaseVersion;
  protected $ipConfigType = SqlIpConfig::class;
  protected $ipConfigDataType = '';
  public $rootPassword;
  public $rootPasswordSet;
  public $sourceId;
  public $storageAutoResizeLimit;
  public $tier;
  public $userLabels;
  public $zone;

  public function setActivationPolicy($activationPolicy)
  {
    $this->activationPolicy = $activationPolicy;
  }
  public function getActivationPolicy()
  {
    return $this->activationPolicy;
  }
  public function setAutoStorageIncrease($autoStorageIncrease)
  {
    $this->autoStorageIncrease = $autoStorageIncrease;
  }
  public function getAutoStorageIncrease()
  {
    return $this->autoStorageIncrease;
  }
  public function setCollation($collation)
  {
    $this->collation = $collation;
  }
  public function getCollation()
  {
    return $this->collation;
  }
  public function setDataDiskSizeGb($dataDiskSizeGb)
  {
    $this->dataDiskSizeGb = $dataDiskSizeGb;
  }
  public function getDataDiskSizeGb()
  {
    return $this->dataDiskSizeGb;
  }
  public function setDataDiskType($dataDiskType)
  {
    $this->dataDiskType = $dataDiskType;
  }
  public function getDataDiskType()
  {
    return $this->dataDiskType;
  }
  public function setDatabaseFlags($databaseFlags)
  {
    $this->databaseFlags = $databaseFlags;
  }
  public function getDatabaseFlags()
  {
    return $this->databaseFlags;
  }
  public function setDatabaseVersion($databaseVersion)
  {
    $this->databaseVersion = $databaseVersion;
  }
  public function getDatabaseVersion()
  {
    return $this->databaseVersion;
  }
  /**
   * @param SqlIpConfig
   */
  public function setIpConfig(SqlIpConfig $ipConfig)
  {
    $this->ipConfig = $ipConfig;
  }
  /**
   * @return SqlIpConfig
   */
  public function getIpConfig()
  {
    return $this->ipConfig;
  }
  public function setRootPassword($rootPassword)
  {
    $this->rootPassword = $rootPassword;
  }
  public function getRootPassword()
  {
    return $this->rootPassword;
  }
  public function setRootPasswordSet($rootPasswordSet)
  {
    $this->rootPasswordSet = $rootPasswordSet;
  }
  public function getRootPasswordSet()
  {
    return $this->rootPasswordSet;
  }
  public function setSourceId($sourceId)
  {
    $this->sourceId = $sourceId;
  }
  public function getSourceId()
  {
    return $this->sourceId;
  }
  public function setStorageAutoResizeLimit($storageAutoResizeLimit)
  {
    $this->storageAutoResizeLimit = $storageAutoResizeLimit;
  }
  public function getStorageAutoResizeLimit()
  {
    return $this->storageAutoResizeLimit;
  }
  public function setTier($tier)
  {
    $this->tier = $tier;
  }
  public function getTier()
  {
    return $this->tier;
  }
  public function setUserLabels($userLabels)
  {
    $this->userLabels = $userLabels;
  }
  public function getUserLabels()
  {
    return $this->userLabels;
  }
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  public function getZone()
  {
    return $this->zone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CloudSqlSettings::class, 'Google_Service_DatabaseMigrationService_CloudSqlSettings');
