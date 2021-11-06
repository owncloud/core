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

namespace Google\Service\SQLAdmin;

class Settings extends \Google\Collection
{
  protected $collection_key = 'denyMaintenancePeriods';
  public $activationPolicy;
  protected $activeDirectoryConfigType = SqlActiveDirectoryConfig::class;
  protected $activeDirectoryConfigDataType = '';
  public $authorizedGaeApplications;
  public $availabilityType;
  protected $backupConfigurationType = BackupConfiguration::class;
  protected $backupConfigurationDataType = '';
  public $collation;
  public $crashSafeReplicationEnabled;
  public $dataDiskSizeGb;
  public $dataDiskType;
  protected $databaseFlagsType = DatabaseFlags::class;
  protected $databaseFlagsDataType = 'array';
  public $databaseReplicationEnabled;
  protected $denyMaintenancePeriodsType = DenyMaintenancePeriod::class;
  protected $denyMaintenancePeriodsDataType = 'array';
  protected $insightsConfigType = InsightsConfig::class;
  protected $insightsConfigDataType = '';
  protected $ipConfigurationType = IpConfiguration::class;
  protected $ipConfigurationDataType = '';
  public $kind;
  protected $locationPreferenceType = LocationPreference::class;
  protected $locationPreferenceDataType = '';
  protected $maintenanceWindowType = MaintenanceWindow::class;
  protected $maintenanceWindowDataType = '';
  public $pricingPlan;
  public $replicationType;
  public $settingsVersion;
  protected $sqlServerAuditConfigType = SqlServerAuditConfig::class;
  protected $sqlServerAuditConfigDataType = '';
  public $storageAutoResize;
  public $storageAutoResizeLimit;
  public $tier;
  public $userLabels;

  public function setActivationPolicy($activationPolicy)
  {
    $this->activationPolicy = $activationPolicy;
  }
  public function getActivationPolicy()
  {
    return $this->activationPolicy;
  }
  /**
   * @param SqlActiveDirectoryConfig
   */
  public function setActiveDirectoryConfig(SqlActiveDirectoryConfig $activeDirectoryConfig)
  {
    $this->activeDirectoryConfig = $activeDirectoryConfig;
  }
  /**
   * @return SqlActiveDirectoryConfig
   */
  public function getActiveDirectoryConfig()
  {
    return $this->activeDirectoryConfig;
  }
  public function setAuthorizedGaeApplications($authorizedGaeApplications)
  {
    $this->authorizedGaeApplications = $authorizedGaeApplications;
  }
  public function getAuthorizedGaeApplications()
  {
    return $this->authorizedGaeApplications;
  }
  public function setAvailabilityType($availabilityType)
  {
    $this->availabilityType = $availabilityType;
  }
  public function getAvailabilityType()
  {
    return $this->availabilityType;
  }
  /**
   * @param BackupConfiguration
   */
  public function setBackupConfiguration(BackupConfiguration $backupConfiguration)
  {
    $this->backupConfiguration = $backupConfiguration;
  }
  /**
   * @return BackupConfiguration
   */
  public function getBackupConfiguration()
  {
    return $this->backupConfiguration;
  }
  public function setCollation($collation)
  {
    $this->collation = $collation;
  }
  public function getCollation()
  {
    return $this->collation;
  }
  public function setCrashSafeReplicationEnabled($crashSafeReplicationEnabled)
  {
    $this->crashSafeReplicationEnabled = $crashSafeReplicationEnabled;
  }
  public function getCrashSafeReplicationEnabled()
  {
    return $this->crashSafeReplicationEnabled;
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
  /**
   * @param DatabaseFlags[]
   */
  public function setDatabaseFlags($databaseFlags)
  {
    $this->databaseFlags = $databaseFlags;
  }
  /**
   * @return DatabaseFlags[]
   */
  public function getDatabaseFlags()
  {
    return $this->databaseFlags;
  }
  public function setDatabaseReplicationEnabled($databaseReplicationEnabled)
  {
    $this->databaseReplicationEnabled = $databaseReplicationEnabled;
  }
  public function getDatabaseReplicationEnabled()
  {
    return $this->databaseReplicationEnabled;
  }
  /**
   * @param DenyMaintenancePeriod[]
   */
  public function setDenyMaintenancePeriods($denyMaintenancePeriods)
  {
    $this->denyMaintenancePeriods = $denyMaintenancePeriods;
  }
  /**
   * @return DenyMaintenancePeriod[]
   */
  public function getDenyMaintenancePeriods()
  {
    return $this->denyMaintenancePeriods;
  }
  /**
   * @param InsightsConfig
   */
  public function setInsightsConfig(InsightsConfig $insightsConfig)
  {
    $this->insightsConfig = $insightsConfig;
  }
  /**
   * @return InsightsConfig
   */
  public function getInsightsConfig()
  {
    return $this->insightsConfig;
  }
  /**
   * @param IpConfiguration
   */
  public function setIpConfiguration(IpConfiguration $ipConfiguration)
  {
    $this->ipConfiguration = $ipConfiguration;
  }
  /**
   * @return IpConfiguration
   */
  public function getIpConfiguration()
  {
    return $this->ipConfiguration;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param LocationPreference
   */
  public function setLocationPreference(LocationPreference $locationPreference)
  {
    $this->locationPreference = $locationPreference;
  }
  /**
   * @return LocationPreference
   */
  public function getLocationPreference()
  {
    return $this->locationPreference;
  }
  /**
   * @param MaintenanceWindow
   */
  public function setMaintenanceWindow(MaintenanceWindow $maintenanceWindow)
  {
    $this->maintenanceWindow = $maintenanceWindow;
  }
  /**
   * @return MaintenanceWindow
   */
  public function getMaintenanceWindow()
  {
    return $this->maintenanceWindow;
  }
  public function setPricingPlan($pricingPlan)
  {
    $this->pricingPlan = $pricingPlan;
  }
  public function getPricingPlan()
  {
    return $this->pricingPlan;
  }
  public function setReplicationType($replicationType)
  {
    $this->replicationType = $replicationType;
  }
  public function getReplicationType()
  {
    return $this->replicationType;
  }
  public function setSettingsVersion($settingsVersion)
  {
    $this->settingsVersion = $settingsVersion;
  }
  public function getSettingsVersion()
  {
    return $this->settingsVersion;
  }
  /**
   * @param SqlServerAuditConfig
   */
  public function setSqlServerAuditConfig(SqlServerAuditConfig $sqlServerAuditConfig)
  {
    $this->sqlServerAuditConfig = $sqlServerAuditConfig;
  }
  /**
   * @return SqlServerAuditConfig
   */
  public function getSqlServerAuditConfig()
  {
    return $this->sqlServerAuditConfig;
  }
  public function setStorageAutoResize($storageAutoResize)
  {
    $this->storageAutoResize = $storageAutoResize;
  }
  public function getStorageAutoResize()
  {
    return $this->storageAutoResize;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Settings::class, 'Google_Service_SQLAdmin_Settings');
