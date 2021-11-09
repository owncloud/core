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

namespace Google\Service\DataCatalog;

class GoogleCloudDatacatalogV1BigQueryDateShardedSpec extends \Google\Model
{
  public $dataset;
  public $latestShardResource;
  public $shardCount;
  public $tablePrefix;

  public function setDataset($dataset)
  {
    $this->dataset = $dataset;
  }
  public function getDataset()
  {
    return $this->dataset;
  }
  public function setLatestShardResource($latestShardResource)
  {
    $this->latestShardResource = $latestShardResource;
  }
  public function getLatestShardResource()
  {
    return $this->latestShardResource;
  }
  public function setShardCount($shardCount)
  {
    $this->shardCount = $shardCount;
  }
  public function getShardCount()
  {
    return $this->shardCount;
  }
  public function setTablePrefix($tablePrefix)
  {
    $this->tablePrefix = $tablePrefix;
  }
  public function getTablePrefix()
  {
    return $this->tablePrefix;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatacatalogV1BigQueryDateShardedSpec::class, 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1BigQueryDateShardedSpec');
