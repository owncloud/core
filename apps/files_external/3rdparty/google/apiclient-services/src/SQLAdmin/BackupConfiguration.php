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

class BackupConfiguration extends \Google\Model
{
  protected $backupRetentionSettingsType = BackupRetentionSettings::class;
  protected $backupRetentionSettingsDataType = '';
  /**
   * @var bool
   */
  public $binaryLogEnabled;
  /**
   * @var bool
   */
  public $enabled;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $location;
  /**
   * @var bool
   */
  public $pointInTimeRecoveryEnabled;
  /**
   * @var bool
   */
  public $replicationLogArchivingEnabled;
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var int
   */
  public $transactionLogRetentionDays;

  /**
   * @param BackupRetentionSettings
   */
  public function setBackupRetentionSettings(BackupRetentionSettings $backupRetentionSettings)
  {
    $this->backupRetentionSettings = $backupRetentionSettings;
  }
  /**
   * @return BackupRetentionSettings
   */
  public function getBackupRetentionSettings()
  {
    return $this->backupRetentionSettings;
  }
  /**
   * @param bool
   */
  public function setBinaryLogEnabled($binaryLogEnabled)
  {
    $this->binaryLogEnabled = $binaryLogEnabled;
  }
  /**
   * @return bool
   */
  public function getBinaryLogEnabled()
  {
    return $this->binaryLogEnabled;
  }
  /**
   * @param bool
   */
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  /**
   * @return bool
   */
  public function getEnabled()
  {
    return $this->enabled;
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
   * @param string
   */
  public function setLocation($location)
  {
    $this->location = $location;
  }
  /**
   * @return string
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param bool
   */
  public function setPointInTimeRecoveryEnabled($pointInTimeRecoveryEnabled)
  {
    $this->pointInTimeRecoveryEnabled = $pointInTimeRecoveryEnabled;
  }
  /**
   * @return bool
   */
  public function getPointInTimeRecoveryEnabled()
  {
    return $this->pointInTimeRecoveryEnabled;
  }
  /**
   * @param bool
   */
  public function setReplicationLogArchivingEnabled($replicationLogArchivingEnabled)
  {
    $this->replicationLogArchivingEnabled = $replicationLogArchivingEnabled;
  }
  /**
   * @return bool
   */
  public function getReplicationLogArchivingEnabled()
  {
    return $this->replicationLogArchivingEnabled;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param int
   */
  public function setTransactionLogRetentionDays($transactionLogRetentionDays)
  {
    $this->transactionLogRetentionDays = $transactionLogRetentionDays;
  }
  /**
   * @return int
   */
  public function getTransactionLogRetentionDays()
  {
    return $this->transactionLogRetentionDays;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BackupConfiguration::class, 'Google_Service_SQLAdmin_BackupConfiguration');
