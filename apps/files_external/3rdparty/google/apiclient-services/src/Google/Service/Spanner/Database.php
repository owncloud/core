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

class Google_Service_Spanner_Database extends Google_Collection
{
  protected $collection_key = 'encryptionInfo';
  public $createTime;
  public $earliestVersionTime;
  protected $encryptionConfigType = 'Google_Service_Spanner_EncryptionConfig';
  protected $encryptionConfigDataType = '';
  protected $encryptionInfoType = 'Google_Service_Spanner_EncryptionInfo';
  protected $encryptionInfoDataType = 'array';
  public $name;
  protected $restoreInfoType = 'Google_Service_Spanner_RestoreInfo';
  protected $restoreInfoDataType = '';
  public $state;
  public $versionRetentionPeriod;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setEarliestVersionTime($earliestVersionTime)
  {
    $this->earliestVersionTime = $earliestVersionTime;
  }
  public function getEarliestVersionTime()
  {
    return $this->earliestVersionTime;
  }
  /**
   * @param Google_Service_Spanner_EncryptionConfig
   */
  public function setEncryptionConfig(Google_Service_Spanner_EncryptionConfig $encryptionConfig)
  {
    $this->encryptionConfig = $encryptionConfig;
  }
  /**
   * @return Google_Service_Spanner_EncryptionConfig
   */
  public function getEncryptionConfig()
  {
    return $this->encryptionConfig;
  }
  /**
   * @param Google_Service_Spanner_EncryptionInfo[]
   */
  public function setEncryptionInfo($encryptionInfo)
  {
    $this->encryptionInfo = $encryptionInfo;
  }
  /**
   * @return Google_Service_Spanner_EncryptionInfo[]
   */
  public function getEncryptionInfo()
  {
    return $this->encryptionInfo;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_Spanner_RestoreInfo
   */
  public function setRestoreInfo(Google_Service_Spanner_RestoreInfo $restoreInfo)
  {
    $this->restoreInfo = $restoreInfo;
  }
  /**
   * @return Google_Service_Spanner_RestoreInfo
   */
  public function getRestoreInfo()
  {
    return $this->restoreInfo;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setVersionRetentionPeriod($versionRetentionPeriod)
  {
    $this->versionRetentionPeriod = $versionRetentionPeriod;
  }
  public function getVersionRetentionPeriod()
  {
    return $this->versionRetentionPeriod;
  }
}
