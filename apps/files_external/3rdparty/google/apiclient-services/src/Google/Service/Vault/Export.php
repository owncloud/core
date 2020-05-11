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

class Google_Service_Vault_Export extends Google_Model
{
  protected $cloudStorageSinkType = 'Google_Service_Vault_CloudStorageSink';
  protected $cloudStorageSinkDataType = '';
  public $createTime;
  protected $exportOptionsType = 'Google_Service_Vault_ExportOptions';
  protected $exportOptionsDataType = '';
  public $id;
  public $matterId;
  public $name;
  protected $queryType = 'Google_Service_Vault_Query';
  protected $queryDataType = '';
  protected $requesterType = 'Google_Service_Vault_UserInfo';
  protected $requesterDataType = '';
  protected $statsType = 'Google_Service_Vault_ExportStats';
  protected $statsDataType = '';
  public $status;

  /**
   * @param Google_Service_Vault_CloudStorageSink
   */
  public function setCloudStorageSink(Google_Service_Vault_CloudStorageSink $cloudStorageSink)
  {
    $this->cloudStorageSink = $cloudStorageSink;
  }
  /**
   * @return Google_Service_Vault_CloudStorageSink
   */
  public function getCloudStorageSink()
  {
    return $this->cloudStorageSink;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param Google_Service_Vault_ExportOptions
   */
  public function setExportOptions(Google_Service_Vault_ExportOptions $exportOptions)
  {
    $this->exportOptions = $exportOptions;
  }
  /**
   * @return Google_Service_Vault_ExportOptions
   */
  public function getExportOptions()
  {
    return $this->exportOptions;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setMatterId($matterId)
  {
    $this->matterId = $matterId;
  }
  public function getMatterId()
  {
    return $this->matterId;
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
   * @param Google_Service_Vault_Query
   */
  public function setQuery(Google_Service_Vault_Query $query)
  {
    $this->query = $query;
  }
  /**
   * @return Google_Service_Vault_Query
   */
  public function getQuery()
  {
    return $this->query;
  }
  /**
   * @param Google_Service_Vault_UserInfo
   */
  public function setRequester(Google_Service_Vault_UserInfo $requester)
  {
    $this->requester = $requester;
  }
  /**
   * @return Google_Service_Vault_UserInfo
   */
  public function getRequester()
  {
    return $this->requester;
  }
  /**
   * @param Google_Service_Vault_ExportStats
   */
  public function setStats(Google_Service_Vault_ExportStats $stats)
  {
    $this->stats = $stats;
  }
  /**
   * @return Google_Service_Vault_ExportStats
   */
  public function getStats()
  {
    return $this->stats;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
}
