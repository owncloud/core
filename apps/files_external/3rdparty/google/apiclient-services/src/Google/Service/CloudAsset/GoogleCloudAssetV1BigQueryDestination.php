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

class Google_Service_CloudAsset_GoogleCloudAssetV1BigQueryDestination extends Google_Model
{
  public $dataset;
  public $partitionKey;
  public $tablePrefix;
  public $writeDisposition;

  public function setDataset($dataset)
  {
    $this->dataset = $dataset;
  }
  public function getDataset()
  {
    return $this->dataset;
  }
  public function setPartitionKey($partitionKey)
  {
    $this->partitionKey = $partitionKey;
  }
  public function getPartitionKey()
  {
    return $this->partitionKey;
  }
  public function setTablePrefix($tablePrefix)
  {
    $this->tablePrefix = $tablePrefix;
  }
  public function getTablePrefix()
  {
    return $this->tablePrefix;
  }
  public function setWriteDisposition($writeDisposition)
  {
    $this->writeDisposition = $writeDisposition;
  }
  public function getWriteDisposition()
  {
    return $this->writeDisposition;
  }
}
