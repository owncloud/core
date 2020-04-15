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

class Google_Service_Spanner_RestoreDatabaseMetadata extends Google_Model
{
  protected $backupInfoType = 'Google_Service_Spanner_BackupInfo';
  protected $backupInfoDataType = '';
  public $cancelTime;
  public $name;
  public $optimizeDatabaseOperationName;
  protected $progressType = 'Google_Service_Spanner_OperationProgress';
  protected $progressDataType = '';
  public $sourceType;

  /**
   * @param Google_Service_Spanner_BackupInfo
   */
  public function setBackupInfo(Google_Service_Spanner_BackupInfo $backupInfo)
  {
    $this->backupInfo = $backupInfo;
  }
  /**
   * @return Google_Service_Spanner_BackupInfo
   */
  public function getBackupInfo()
  {
    return $this->backupInfo;
  }
  public function setCancelTime($cancelTime)
  {
    $this->cancelTime = $cancelTime;
  }
  public function getCancelTime()
  {
    return $this->cancelTime;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOptimizeDatabaseOperationName($optimizeDatabaseOperationName)
  {
    $this->optimizeDatabaseOperationName = $optimizeDatabaseOperationName;
  }
  public function getOptimizeDatabaseOperationName()
  {
    return $this->optimizeDatabaseOperationName;
  }
  /**
   * @param Google_Service_Spanner_OperationProgress
   */
  public function setProgress(Google_Service_Spanner_OperationProgress $progress)
  {
    $this->progress = $progress;
  }
  /**
   * @return Google_Service_Spanner_OperationProgress
   */
  public function getProgress()
  {
    return $this->progress;
  }
  public function setSourceType($sourceType)
  {
    $this->sourceType = $sourceType;
  }
  public function getSourceType()
  {
    return $this->sourceType;
  }
}
