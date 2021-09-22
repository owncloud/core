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

namespace Google\Service\Vault;

class Export extends \Google\Model
{
  protected $cloudStorageSinkType = CloudStorageSink::class;
  protected $cloudStorageSinkDataType = '';
  public $createTime;
  protected $exportOptionsType = ExportOptions::class;
  protected $exportOptionsDataType = '';
  public $id;
  public $matterId;
  public $name;
  protected $queryType = Query::class;
  protected $queryDataType = '';
  protected $requesterType = UserInfo::class;
  protected $requesterDataType = '';
  protected $statsType = ExportStats::class;
  protected $statsDataType = '';
  public $status;

  /**
   * @param CloudStorageSink
   */
  public function setCloudStorageSink(CloudStorageSink $cloudStorageSink)
  {
    $this->cloudStorageSink = $cloudStorageSink;
  }
  /**
   * @return CloudStorageSink
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
   * @param ExportOptions
   */
  public function setExportOptions(ExportOptions $exportOptions)
  {
    $this->exportOptions = $exportOptions;
  }
  /**
   * @return ExportOptions
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
   * @param Query
   */
  public function setQuery(Query $query)
  {
    $this->query = $query;
  }
  /**
   * @return Query
   */
  public function getQuery()
  {
    return $this->query;
  }
  /**
   * @param UserInfo
   */
  public function setRequester(UserInfo $requester)
  {
    $this->requester = $requester;
  }
  /**
   * @return UserInfo
   */
  public function getRequester()
  {
    return $this->requester;
  }
  /**
   * @param ExportStats
   */
  public function setStats(ExportStats $stats)
  {
    $this->stats = $stats;
  }
  /**
   * @return ExportStats
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Export::class, 'Google_Service_Vault_Export');
