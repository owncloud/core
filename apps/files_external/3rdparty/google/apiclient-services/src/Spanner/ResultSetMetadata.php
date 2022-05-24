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

class ResultSetMetadata extends \Google\Model
{
  protected $rowTypeType = StructType::class;
  protected $rowTypeDataType = '';
  protected $transactionType = Transaction::class;
  protected $transactionDataType = '';

  /**
   * @param StructType
   */
  public function setRowType(StructType $rowType)
  {
    $this->rowType = $rowType;
  }
  /**
   * @return StructType
   */
  public function getRowType()
  {
    return $this->rowType;
  }
  /**
   * @param Transaction
   */
  public function setTransaction(Transaction $transaction)
  {
    $this->transaction = $transaction;
  }
  /**
   * @return Transaction
   */
  public function getTransaction()
  {
    return $this->transaction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResultSetMetadata::class, 'Google_Service_Spanner_ResultSetMetadata');
