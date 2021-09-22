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

class ExecuteSqlRequest extends \Google\Model
{
  protected $paramTypesType = Type::class;
  protected $paramTypesDataType = 'map';
  public $params;
  public $partitionToken;
  public $queryMode;
  protected $queryOptionsType = QueryOptions::class;
  protected $queryOptionsDataType = '';
  protected $requestOptionsType = RequestOptions::class;
  protected $requestOptionsDataType = '';
  public $resumeToken;
  public $seqno;
  public $sql;
  protected $transactionType = TransactionSelector::class;
  protected $transactionDataType = '';

  /**
   * @param Type[]
   */
  public function setParamTypes($paramTypes)
  {
    $this->paramTypes = $paramTypes;
  }
  /**
   * @return Type[]
   */
  public function getParamTypes()
  {
    return $this->paramTypes;
  }
  public function setParams($params)
  {
    $this->params = $params;
  }
  public function getParams()
  {
    return $this->params;
  }
  public function setPartitionToken($partitionToken)
  {
    $this->partitionToken = $partitionToken;
  }
  public function getPartitionToken()
  {
    return $this->partitionToken;
  }
  public function setQueryMode($queryMode)
  {
    $this->queryMode = $queryMode;
  }
  public function getQueryMode()
  {
    return $this->queryMode;
  }
  /**
   * @param QueryOptions
   */
  public function setQueryOptions(QueryOptions $queryOptions)
  {
    $this->queryOptions = $queryOptions;
  }
  /**
   * @return QueryOptions
   */
  public function getQueryOptions()
  {
    return $this->queryOptions;
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
  public function setResumeToken($resumeToken)
  {
    $this->resumeToken = $resumeToken;
  }
  public function getResumeToken()
  {
    return $this->resumeToken;
  }
  public function setSeqno($seqno)
  {
    $this->seqno = $seqno;
  }
  public function getSeqno()
  {
    return $this->seqno;
  }
  public function setSql($sql)
  {
    $this->sql = $sql;
  }
  public function getSql()
  {
    return $this->sql;
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
class_alias(ExecuteSqlRequest::class, 'Google_Service_Spanner_ExecuteSqlRequest');
