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

namespace Google\Service\Spanner;

class PartitionReadRequest extends \Google\Collection
{
  protected $collection_key = 'columns';
  public $columns;
  public $index;
  protected $keySetType = KeySet::class;
  protected $keySetDataType = '';
  protected $partitionOptionsType = PartitionOptions::class;
  protected $partitionOptionsDataType = '';
  public $table;
  protected $transactionType = TransactionSelector::class;
  protected $transactionDataType = '';

  public function setColumns($columns)
  {
    $this->columns = $columns;
  }
  public function getColumns()
  {
    return $this->columns;
  }
  public function setIndex($index)
  {
    $this->index = $index;
  }
  public function getIndex()
  {
    return $this->index;
  }
  /**
   * @param KeySet
   */
  public function setKeySet(KeySet $keySet)
  {
    $this->keySet = $keySet;
  }
  /**
   * @return KeySet
   */
  public function getKeySet()
  {
    return $this->keySet;
  }
  /**
   * @param PartitionOptions
   */
  public function setPartitionOptions(PartitionOptions $partitionOptions)
  {
    $this->partitionOptions = $partitionOptions;
  }
  /**
   * @return PartitionOptions
   */
  public function getPartitionOptions()
  {
    return $this->partitionOptions;
  }
  public function setTable($table)
  {
    $this->table = $table;
  }
  public function getTable()
  {
    return $this->table;
  }
  /**
   * @param TransactionSelector
   */
  public function setTransaction(TransactionSelector $transaction)
  {
    $this->transaction = $transaction;
  }
  /**
   * @return TransactionSelector
   */
  public function getTransaction()
  {
    return $this->transaction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PartitionReadRequest::class, 'Google_Service_Spanner_PartitionReadRequest');
