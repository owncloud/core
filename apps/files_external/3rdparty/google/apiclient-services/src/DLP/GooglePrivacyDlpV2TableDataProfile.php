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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2TableDataProfile extends \Google\Collection
{
  protected $collection_key = 'predictedInfoTypes';
  protected $configSnapshotType = GooglePrivacyDlpV2DataProfileConfigSnapshot::class;
  protected $configSnapshotDataType = '';
  /**
   * @var string
   */
  public $createTime;
  protected $dataRiskLevelType = GooglePrivacyDlpV2DataRiskLevel::class;
  protected $dataRiskLevelDataType = '';
  /**
   * @var string
   */
  public $datasetId;
  /**
   * @var string
   */
  public $datasetLocation;
  /**
   * @var string
   */
  public $datasetProjectId;
  /**
   * @var string
   */
  public $encryptionStatus;
  /**
   * @var string
   */
  public $expirationTime;
  /**
   * @var string
   */
  public $failedColumnCount;
  /**
   * @var string
   */
  public $fullResource;
  /**
   * @var string
   */
  public $lastModifiedTime;
  /**
   * @var string
   */
  public $name;
  protected $otherInfoTypesType = GooglePrivacyDlpV2OtherInfoTypeSummary::class;
  protected $otherInfoTypesDataType = 'array';
  protected $predictedInfoTypesType = GooglePrivacyDlpV2InfoTypeSummary::class;
  protected $predictedInfoTypesDataType = 'array';
  /**
   * @var string
   */
  public $profileLastGenerated;
  protected $profileStatusType = GooglePrivacyDlpV2ProfileStatus::class;
  protected $profileStatusDataType = '';
  /**
   * @var string
   */
  public $projectDataProfile;
  /**
   * @var string[]
   */
  public $resourceLabels;
  /**
   * @var string
   */
  public $resourceVisibility;
  /**
   * @var string
   */
  public $rowCount;
  /**
   * @var string
   */
  public $scannedColumnCount;
  protected $sensitivityScoreType = GooglePrivacyDlpV2SensitivityScore::class;
  protected $sensitivityScoreDataType = '';
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $tableId;
  /**
   * @var string
   */
  public $tableSizeBytes;

  /**
   * @param GooglePrivacyDlpV2DataProfileConfigSnapshot
   */
  public function setConfigSnapshot(GooglePrivacyDlpV2DataProfileConfigSnapshot $configSnapshot)
  {
    $this->configSnapshot = $configSnapshot;
  }
  /**
   * @return GooglePrivacyDlpV2DataProfileConfigSnapshot
   */
  public function getConfigSnapshot()
  {
    return $this->configSnapshot;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param GooglePrivacyDlpV2DataRiskLevel
   */
  public function setDataRiskLevel(GooglePrivacyDlpV2DataRiskLevel $dataRiskLevel)
  {
    $this->dataRiskLevel = $dataRiskLevel;
  }
  /**
   * @return GooglePrivacyDlpV2DataRiskLevel
   */
  public function getDataRiskLevel()
  {
    return $this->dataRiskLevel;
  }
  /**
   * @param string
   */
  public function setDatasetId($datasetId)
  {
    $this->datasetId = $datasetId;
  }
  /**
   * @return string
   */
  public function getDatasetId()
  {
    return $this->datasetId;
  }
  /**
   * @param string
   */
  public function setDatasetLocation($datasetLocation)
  {
    $this->datasetLocation = $datasetLocation;
  }
  /**
   * @return string
   */
  public function getDatasetLocation()
  {
    return $this->datasetLocation;
  }
  /**
   * @param string
   */
  public function setDatasetProjectId($datasetProjectId)
  {
    $this->datasetProjectId = $datasetProjectId;
  }
  /**
   * @return string
   */
  public function getDatasetProjectId()
  {
    return $this->datasetProjectId;
  }
  /**
   * @param string
   */
  public function setEncryptionStatus($encryptionStatus)
  {
    $this->encryptionStatus = $encryptionStatus;
  }
  /**
   * @return string
   */
  public function getEncryptionStatus()
  {
    return $this->encryptionStatus;
  }
  /**
   * @param string
   */
  public function setExpirationTime($expirationTime)
  {
    $this->expirationTime = $expirationTime;
  }
  /**
   * @return string
   */
  public function getExpirationTime()
  {
    return $this->expirationTime;
  }
  /**
   * @param string
   */
  public function setFailedColumnCount($failedColumnCount)
  {
    $this->failedColumnCount = $failedColumnCount;
  }
  /**
   * @return string
   */
  public function getFailedColumnCount()
  {
    return $this->failedColumnCount;
  }
  /**
   * @param string
   */
  public function setFullResource($fullResource)
  {
    $this->fullResource = $fullResource;
  }
  /**
   * @return string
   */
  public function getFullResource()
  {
    return $this->fullResource;
  }
  /**
   * @param string
   */
  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }
  /**
   * @return string
   */
  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
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
   * @param GooglePrivacyDlpV2OtherInfoTypeSummary[]
   */
  public function setOtherInfoTypes($otherInfoTypes)
  {
    $this->otherInfoTypes = $otherInfoTypes;
  }
  /**
   * @return GooglePrivacyDlpV2OtherInfoTypeSummary[]
   */
  public function getOtherInfoTypes()
  {
    return $this->otherInfoTypes;
  }
  /**
   * @param GooglePrivacyDlpV2InfoTypeSummary[]
   */
  public function setPredictedInfoTypes($predictedInfoTypes)
  {
    $this->predictedInfoTypes = $predictedInfoTypes;
  }
  /**
   * @return GooglePrivacyDlpV2InfoTypeSummary[]
   */
  public function getPredictedInfoTypes()
  {
    return $this->predictedInfoTypes;
  }
  /**
   * @param string
   */
  public function setProfileLastGenerated($profileLastGenerated)
  {
    $this->profileLastGenerated = $profileLastGenerated;
  }
  /**
   * @return string
   */
  public function getProfileLastGenerated()
  {
    return $this->profileLastGenerated;
  }
  /**
   * @param GooglePrivacyDlpV2ProfileStatus
   */
  public function setProfileStatus(GooglePrivacyDlpV2ProfileStatus $profileStatus)
  {
    $this->profileStatus = $profileStatus;
  }
  /**
   * @return GooglePrivacyDlpV2ProfileStatus
   */
  public function getProfileStatus()
  {
    return $this->profileStatus;
  }
  /**
   * @param string
   */
  public function setProjectDataProfile($projectDataProfile)
  {
    $this->projectDataProfile = $projectDataProfile;
  }
  /**
   * @return string
   */
  public function getProjectDataProfile()
  {
    return $this->projectDataProfile;
  }
  /**
   * @param string[]
   */
  public function setResourceLabels($resourceLabels)
  {
    $this->resourceLabels = $resourceLabels;
  }
  /**
   * @return string[]
   */
  public function getResourceLabels()
  {
    return $this->resourceLabels;
  }
  /**
   * @param string
   */
  public function setResourceVisibility($resourceVisibility)
  {
    $this->resourceVisibility = $resourceVisibility;
  }
  /**
   * @return string
   */
  public function getResourceVisibility()
  {
    return $this->resourceVisibility;
  }
  /**
   * @param string
   */
  public function setRowCount($rowCount)
  {
    $this->rowCount = $rowCount;
  }
  /**
   * @return string
   */
  public function getRowCount()
  {
    return $this->rowCount;
  }
  /**
   * @param string
   */
  public function setScannedColumnCount($scannedColumnCount)
  {
    $this->scannedColumnCount = $scannedColumnCount;
  }
  /**
   * @return string
   */
  public function getScannedColumnCount()
  {
    return $this->scannedColumnCount;
  }
  /**
   * @param GooglePrivacyDlpV2SensitivityScore
   */
  public function setSensitivityScore(GooglePrivacyDlpV2SensitivityScore $sensitivityScore)
  {
    $this->sensitivityScore = $sensitivityScore;
  }
  /**
   * @return GooglePrivacyDlpV2SensitivityScore
   */
  public function getSensitivityScore()
  {
    return $this->sensitivityScore;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setTableId($tableId)
  {
    $this->tableId = $tableId;
  }
  /**
   * @return string
   */
  public function getTableId()
  {
    return $this->tableId;
  }
  /**
   * @param string
   */
  public function setTableSizeBytes($tableSizeBytes)
  {
    $this->tableSizeBytes = $tableSizeBytes;
  }
  /**
   * @return string
   */
  public function getTableSizeBytes()
  {
    return $this->tableSizeBytes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2TableDataProfile::class, 'Google_Service_DLP_GooglePrivacyDlpV2TableDataProfile');
