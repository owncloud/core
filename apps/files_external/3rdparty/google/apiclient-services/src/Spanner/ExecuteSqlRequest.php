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
  /**
   * @var array[]
   */
  public $params;
  /**
   * @var string
   */
  public $partitionToken;
  /**
   * @var string
   */
  public $queryMode;
  protected $queryOptionsType = QueryOptions::class;
  protected $queryOptionsDataType = '';
  protected $requestOptionsType = RequestOptions::class;
  protected $requestOptionsDataType = '';
  /**
   * @var string
   */
  public $resumeToken;
  /**
   * @var string
   */
  public $seqno;
  /**
   * @var string
   */
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
  /**
   * @param array[]
   */
  public function setParams($params)
  {
    $this->params = $params;
  }
  /**
   * @return array[]
   */
  public function getParams()
  {
    return $this->params;
  }
  /**
   * @param string
   */
  public function setPartitionToken($partitionToken)
  {
    $this->partitionToken = $partitionToken;
  }
  /**
   * @return string
   */
  public function getPartitionToken()
  {
    return $this->partitionToken;
  }
  /**
   * @param string
   */
  public function setQueryMode($queryMode)
  {
    $this->queryMode = $queryMode;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setResumeToken($resumeToken)
  {
    $this->resumeToken = $resumeToken;
  }
  /**
   * @return string
   */
  public function getResumeToken()
  {
    return $this->resumeToken;
  }
  /**
   * @param string
   */
  public function setSeqno($seqno)
  {
    $this->seqno = $seqno;
  }
  /**
   * @return string
   */
  public function getSeqno()
  {
    return $this->seqno;
  }
  /**
   * @param string
   */
  public function setSql($sql)
  {
    $this->sql = $sql;
  }
  /**
   * @return string
   */
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
