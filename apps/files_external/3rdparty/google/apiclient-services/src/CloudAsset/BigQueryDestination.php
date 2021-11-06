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

namespace Google\Service\CloudAsset;

class BigQueryDestination extends \Google\Model
{
  public $dataset;
  public $force;
  protected $partitionSpecType = PartitionSpec::class;
  protected $partitionSpecDataType = '';
  public $separateTablesPerAssetType;
  public $table;

  public function setDataset($dataset)
  {
    $this->dataset = $dataset;
  }
  public function getDataset()
  {
    return $this->dataset;
  }
  public function setForce($force)
  {
    $this->force = $force;
  }
  public function getForce()
  {
    return $this->force;
  }
  /**
   * @param PartitionSpec
   */
  public function setPartitionSpec(PartitionSpec $partitionSpec)
  {
    $this->partitionSpec = $partitionSpec;
  }
  /**
   * @return PartitionSpec
   */
  public function getPartitionSpec()
  {
    return $this->partitionSpec;
  }
  public function setSeparateTablesPerAssetType($separateTablesPerAssetType)
  {
    $this->separateTablesPerAssetType = $separateTablesPerAssetType;
  }
  public function getSeparateTablesPerAssetType()
  {
    return $this->separateTablesPerAssetType;
  }
  public function setTable($table)
  {
    $this->table = $table;
  }
  public function getTable()
  {
    return $this->table;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BigQueryDestination::class, 'Google_Service_CloudAsset_BigQueryDestination');
