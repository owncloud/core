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

class RunQueryRequest extends \Google\Model
{
  protected $gqlQueryType = GqlQuery::class;
  protected $gqlQueryDataType = '';
  protected $partitionIdType = PartitionId::class;
  protected $partitionIdDataType = '';
  protected $queryType = Query::class;
  protected $queryDataType = '';
  protected $readOptionsType = ReadOptions::class;
  protected $readOptionsDataType = '';

  /**
   * @param GqlQuery
   */
  public function setGqlQuery(GqlQuery $gqlQuery)
  {
    $this->gqlQuery = $gqlQuery;
  }
  /**
   * @return GqlQuery
   */
  public function getGqlQuery()
  {
    return $this->gqlQuery;
  }
  /**
   * @param PartitionId
   */
  public function setPartitionId(PartitionId $partitionId)
  {
    $this->partitionId = $partitionId;
  }
  /**
   * @return PartitionId
   */
  public function getPartitionId()
  {
    return $this->partitionId;
  }
  /**
   * @param Query
   */
  public function setQuery(Query $query)
  {
    $this->query = $query;
  }
  /**
   * @return Query
   */
  public function getQuery()
  {
    return $this->query;
  }
  /**
   * @param ReadOptions
   */
  public function setReadOptions(ReadOptions $readOptions)
  {
    $this->readOptions = $readOptions;
  }
  /**
   * @return ReadOptions
   */
  public function getReadOptions()
  {
    return $this->readOptions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RunQueryRequest::class, 'Google_Service_Datastore_RunQueryRequest');
