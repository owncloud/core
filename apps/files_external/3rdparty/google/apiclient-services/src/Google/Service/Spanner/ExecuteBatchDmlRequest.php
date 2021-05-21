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

class Google_Service_Spanner_ExecuteBatchDmlRequest extends Google_Collection
{
  protected $collection_key = 'statements';
  protected $requestOptionsType = 'Google_Service_Spanner_RequestOptions';
  protected $requestOptionsDataType = '';
  public $seqno;
  protected $statementsType = 'Google_Service_Spanner_Statement';
  protected $statementsDataType = 'array';
  protected $transactionType = 'Google_Service_Spanner_TransactionSelector';
  protected $transactionDataType = '';

  /**
   * @param Google_Service_Spanner_RequestOptions
   */
  public function setRequestOptions(Google_Service_Spanner_RequestOptions $requestOptions)
  {
    $this->requestOptions = $requestOptions;
  }
  /**
   * @return Google_Service_Spanner_RequestOptions
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
   * @param Google_Service_Spanner_Statement[]
   */
  public function setStatements($statements)
  {
    $this->statements = $statements;
  }
  /**
   * @return Google_Service_Spanner_Statement[]
   */
  public function getStatements()
  {
    return $this->statements;
  }
  /**
   * @param Google_Service_Spanner_TransactionSelector
   */
  public function setTransaction(Google_Service_Spanner_TransactionSelector $transaction)
  {
    $this->transaction = $transaction;
  }
  /**
   * @return Google_Service_Spanner_TransactionSelector
   */
  public function getTransaction()
  {
    return $this->transaction;
  }
}
