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

class CommitRequest extends \Google\Collection
{
  protected $collection_key = 'mutations';
  protected $mutationsType = Mutation::class;
  protected $mutationsDataType = 'array';
  protected $requestOptionsType = RequestOptions::class;
  protected $requestOptionsDataType = '';
  public $returnCommitStats;
  protected $singleUseTransactionType = TransactionOptions::class;
  protected $singleUseTransactionDataType = '';
  public $transactionId;

  /**
   * @param Mutation[]
   */
  public function setMutations($mutations)
  {
    $this->mutations = $mutations;
  }
  /**
   * @return Mutation[]
   */
  public function getMutations()
  {
    return $this->mutations;
  }
  /**
   * @param RequestOptions
   */
  public function setRequestOptions(RequestOptions $requestOptions)
  {
    $this->requestOptions = $requestOptions;
  }
  /**
   * @return RequestOptions
   */
  public function getRequestOptions()
  {
    return $this->requestOptions;
  }
  public function setReturnCommitStats($returnCommitStats)
  {
    $this->returnCommitStats = $returnCommitStats;
  }
  public function getReturnCommitStats()
  {
    return $this->returnCommitStats;
  }
  /**
   * @param TransactionOptions
   */
  public function setSingleUseTransaction(TransactionOptions $singleUseTransaction)
  {
    $this->singleUseTransaction = $singleUseTransaction;
  }
  /**
   * @return TransactionOptions
   */
  public function getSingleUseTransaction()
  {
    return $this->singleUseTransaction;
  }
  public function setTransactionId($transactionId)
  {
    $this->transactionId = $transactionId;
  }
  public function getTransactionId()
  {
    return $this->transactionId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CommitRequest::class, 'Google_Service_Spanner_CommitRequest');
