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

namespace Google\Service\Datastore;

class BeginTransactionRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $databaseId;
  protected $transactionOptionsType = TransactionOptions::class;
  protected $transactionOptionsDataType = '';

  /**
   * @param string
   */
  public function setDatabaseId($databaseId)
  {
    $this->databaseId = $databaseId;
  }
  /**
   * @return string
   */
  public function getDatabaseId()
  {
    return $this->databaseId;
  }
  /**
   * @param TransactionOptions
   */
  public function setTransactionOptions(TransactionOptions $transactionOptions)
  {
    $this->transactionOptions = $transactionOptions;
  }
  /**
   * @return TransactionOptions
   */
  public function getTransactionOptions()
  {
    return $this->transactionOptions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BeginTransactionRequest::class, 'Google_Service_Datastore_BeginTransactionRequest');
