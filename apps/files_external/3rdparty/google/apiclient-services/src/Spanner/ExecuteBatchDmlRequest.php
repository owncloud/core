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

class ExecuteBatchDmlRequest extends \Google\Collection
{
  protected $collection_key = 'statements';
  protected $requestOptionsType = RequestOptions::class;
  protected $requestOptionsDataType = '';
  public $seqno;
  protected $statementsType = Statement::class;
  protected $statementsDataType = 'array';
  protected $transactionType = TransactionSelector::class;
  protected $transactionDataType = '';

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
  public function setSeqno($seqno)
  {
    $this->seqno = $seqno;
  }
  public function getSeqno()
  {
    return $this->seqno;
  }
  /**
   * @param Statement[]
   */
  public function setStatements($statements)
  {
    $this->statements = $statements;
  }
  /**
   * @return Statement[]
   */
  public function getStatements()
  {
    return $this->statements;
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
class_alias(ExecuteBatchDmlRequest::class, 'Google_Service_Spanner_ExecuteBatchDmlRequest');
