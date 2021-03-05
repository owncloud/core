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

class Google_Service_Spanner_Backup extends Google_Collection
{
  protected $collection_key = 'referencingDatabases';
  public $createTime;
  public $database;
  protected $encryptionInfoType = 'Google_Service_Spanner_EncryptionInfo';
  protected $encryptionInfoDataType = '';
  public $expireTime;
  public $name;
  public $referencingDatabases;
  public $sizeBytes;
  public $state;
  public $versionTime;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDatabase($database)
  {
    $this->database = $database;
  }
  public function getDatabase()
  {
    return $this->database;
  }
  /**
   * @param Google_Service_Spanner_EncryptionInfo
   */
  public function setEncryptionInfo(Google_Service_Spanner_EncryptionInfo $encryptionInfo)
  {
    $this->encryptionInfo = $encryptionInfo;
  }
  /**
   * @return Google_Service_Spanner_EncryptionInfo
   */
  public function getEncryptionInfo()
  {
    return $this->encryptionInfo;
  }
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  public function getExpireTime()
  {
    return $this->expireTime;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setReferencingDatabases($referencingDatabases)
  {
    $this->referencingDatabases = $referencingDatabases;
  }
  public function getReferencingDatabases()
  {
    return $this->referencingDatabases;
  }
  public function setSizeBytes($sizeBytes)
  {
    $this->sizeBytes = $sizeBytes;
  }
  public function getSizeBytes()
  {
    return $this->sizeBytes;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setVersionTime($versionTime)
  {
    $this->versionTime = $versionTime;
  }
  public function getVersionTime()
  {
    return $this->versionTime;
  }
}
