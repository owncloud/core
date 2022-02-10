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
  /**
   * @var string
   */
  public $activationPolicy;
  protected $activeDirectoryConfigType = SqlActiveDirectoryConfig::class;
  protected $activeDirectoryConfigDataType = '';
  /**
   * @var string[]
   */
  public $authorizedGaeApplications;
  /**
   * @var string
   */
  public $availabilityType;
  protected $backupConfigurationType = BackupConfiguration::class;
  protected $backupConfigurationDataType = '';
  /**
   * @var string
   */
  public $collation;
  /**
   * @var bool
   */
  public $crashSafeReplicationEnabled;
  /**
   * @var string
   */
  public $dataDiskSizeGb;
  /**
   * @var string
   */
  public $dataDiskType;
  protected $databaseFlagsType = DatabaseFlags::class;
  protected $databaseFlagsDataType = 'array';
  /**
   * @var bool
   */
  public $databaseReplicationEnabled;
  protected $denyMaintenancePeriodsType = DenyMaintenancePeriod::class;
  protected $denyMaintenancePeriodsDataType = 'array';
  protected $insightsConfigType = InsightsConfig::class;
  protected $insightsConfigDataType = '';
  protected $ipConfigurationType = IpConfiguration::class;
  protected $ipConfigurationDataType = '';
  /**
   * @var string
   */
  public $kind;
  protected $locationPreferenceType = LocationPreference::class;
  protected $locationPreferenceDataType = '';
  protected $maintenanceWindowType = MaintenanceWindow::class;
  protected $maintenanceWindowDataType = '';
  protected $passwordValidationPolicyType = PasswordValidationPolicy::class;
  protected $passwordValidationPolicyDataType = '';
  /**
   * @var string
   */
  public $pricingPlan;
  /**
   * @var string
   */
  public $replicationType;
  /**
   * @var string
   */
  public $settingsVersion;
  protected $sqlServerAuditConfigType = SqlServerAuditConfig::class;
  protected $sqlServerAuditConfigDataType = '';
  /**
   * @var bool
   */
  public $storageAutoResize;
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
  /**
   * @param string[]
   */
  public function setAuthorizedGaeApplications($authorizedGaeApplications)
  {
    $this->authorizedGaeApplications = $authorizedGaeApplications;
  }
  /**
   * @return string[]
   */
  public function getAuthorizedGaeApplications()
  {
    return $this->authorizedGaeApplications;
  }
  /**
   * @param string
   */
  public function setAvailabilityType($availabilityType)
  {
    $this->availabilityType = $availabilityType;
  }
  /**
   * @return string
   */
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
   * @param bool
   */
  public function setCrashSafeReplicationEnabled($crashSafeReplicationEnabled)
  {
    $this->crashSafeReplicationEnabled = $crashSafeReplicationEnabled;
  }
  /**
   * @return bool
   */
  public function getCrashSafeReplicationEnabled()
  {
    return $this->crashSafeReplicationEnabled;
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
  /**
   * @param bool
   */
  public function setDatabaseReplicationEnabled($databaseReplicationEnabled)
  {
    $this->databaseReplicationEnabled = $databaseReplicationEnabled;
  }
  /**
   * @return bool
   */
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
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
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
  /**
   * @param PasswordValidationPolicy
   */
  public function setPasswordValidationPolicy(PasswordValidationPolicy $passwordValidationPolicy)
  {
    $this->passwordValidationPolicy = $passwordValidationPolicy;
  }
  /**
   * @return PasswordValidationPolicy
   */
  public function getPasswordValidationPolicy()
  {
    return $this->passwordValidationPolicy;
  }
  /**
   * @param string
   */
  public function setPricingPlan($pricingPlan)
  {
    $this->pricingPlan = $pricingPlan;
  }
  /**
   * @return string
   */
  public function getPricingPlan()
  {
    return $this->pricingPlan;
  }
  /**
   * @param string
   */
  public function setReplicationType($replicationType)
  {
    $this->replicationType = $replicationType;
  }
  /**
   * @return string
   */
  public function getReplicationType()
  {
    return $this->replicationType;
  }
  /**
   * @param string
   */
  public function setSettingsVersion($settingsVersion)
  {
    $this->settingsVersion = $settingsVersion;
  }
  /**
   * @return string
   */
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
  /**
   * @param bool
   */
  public function setStorageAutoResize($storageAutoResize)
  {
    $this->storageAutoResize = $storageAutoResize;
  }
  /**
   * @return bool
   */
  public function getStorageAutoResize()
  {
    return $this->storageAutoResize;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Settings::class, 'Google_Service_SQLAdmin_Settings');
