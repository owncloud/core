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
  /**
   * @var string
   */
  public $activationPolicy;
  /**
   * @var bool
   */
  public $autoStorageIncrease;
  /**
   * @var string
   */
  public $cmekKeyName;
  /**
   * @var string
   */
  public $collation;
  /**
   * @var string
   */
  public $dataDiskSizeGb;
  /**
   * @var string
   */
  public $dataDiskType;
  /**
   * @var string[]
   */
  public $databaseFlags;
  /**
   * @var string
   */
  public $databaseVersion;
  protected $ipConfigType = SqlIpConfig::class;
  protected $ipConfigDataType = '';
  /**
   * @var string
   */
  public $rootPassword;
  /**
   * @var bool
   */
  public $rootPasswordSet;
  /**
   * @var string
   */
  public $sourceId;
  /**
   * @var string
   */
  public $storageAutoResizeLimit;
  /**
   * @var string
   */
  public $tier;
  /**
   * @var string[]
   */
  public $userLabels;
  /**
   * @var string
   */
  public $zone;

  /**
   * @param string
   */
  public function setActivationPolicy($activationPolicy)
  {
    $this->activationPolicy = $activationPolicy;
  }
  /**
   * @return string
   */
  public function getActivationPolicy()
  {
    return $this->activationPolicy;
  }
  /**
   * @param bool
   */
  public function setAutoStorageIncrease($autoStorageIncrease)
  {
    $this->autoStorageIncrease = $autoStorageIncrease;
  }
  /**
   * @return bool
   */
  public function getAutoStorageIncrease()
  {
    return $this->autoStorageIncrease;
  }
  /**
   * @param string
   */
  public function setCmekKeyName($cmekKeyName)
  {
    $this->cmekKeyName = $cmekKeyName;
  }
  /**
   * @return string
   */
  public function getCmekKeyName()
  {
    return $this->cmekKeyName;
  }
  /**
   * @param string
   */
  public function setCollation($collation)
  {
    $this->collation = $collation;
  }
  /**
   * @return string
   */
  public function getCollation()
  {
    return $this->collation;
  }
  /**
   * @param string
   */
  public function setDataDiskSizeGb($dataDiskSizeGb)
  {
    $this->dataDiskSizeGb = $dataDiskSizeGb;
  }
  /**
   * @return string
   */
  public function getDataDiskSizeGb()
  {
    return $this->dataDiskSizeGb;
  }
  /**
   * @param string
   */
  public function setDataDiskType($dataDiskType)
  {
    $this->dataDiskType = $dataDiskType;
  }
  /**
   * @return string
   */
  public function getDataDiskType()
  {
    return $this->dataDiskType;
  }
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
  public function setDatabaseVersion($databaseVersion)
  {
    $this->databaseVersion = $databaseVersion;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setRootPassword($rootPassword)
  {
    $this->rootPassword = $rootPassword;
  }
  /**
   * @return string
   */
  public function getRootPassword()
  {
    return $this->rootPassword;
  }
  /**
   * @param bool
   */
  public function setRootPasswordSet($rootPasswordSet)
  {
    $this->rootPasswordSet = $rootPasswordSet;
  }
  /**
   * @return bool
   */
  public function getRootPasswordSet()
  {
    return $this->rootPasswordSet;
  }
  /**
   * @param string
   */
  public function setSourceId($sourceId)
  {
    $this->sourceId = $sourceId;
  }
  /**
   * @return string
   */
  public function getSourceId()
  {
    return $this->sourceId;
  }
  /**
   * @param string
   */
  public function setStorageAutoResizeLimit($storageAutoResizeLimit)
  {
    $this->storageAutoResizeLimit = $storageAutoResizeLimit;
  }
  /**
   * @return string
   */
  public function getStorageAutoResizeLimit()
  {
    return $this->storageAutoResizeLimit;
  }
  /**
   * @param string
   */
  public function setTier($tier)
  {
    $this->tier = $tier;
  }
  /**
   * @return string
   */
  public function getTier()
  {
    return $this->tier;
  }
  /**
   * @param string[]
   */
  public function setUserLabels($userLabels)
  {
    $this->userLabels = $userLabels;
  }
  /**
   * @return string[]
   */
  public function getUserLabels()
  {
    return $this->userLabels;
  }
  /**
   * @param string
   */
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  /**
   * @return string
   */
  public function getZone()
  {
    return $this->zone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CloudSqlSettings::class, 'Google_Service_DatabaseMigrationService_CloudSqlSettings');
