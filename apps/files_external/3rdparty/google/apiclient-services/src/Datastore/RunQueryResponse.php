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

class RunQueryResponse extends \Google\Model
{
  protected $batchType = QueryResultBatch::class;
  protected $batchDataType = '';
  protected $queryType = Query::class;
  protected $queryDataType = '';

  /**
   * @param QueryResultBatch
   */
  public function setBatch(QueryResultBatch $batch)
  {
    $this->batch = $batch;
  }
  /**
   * @return QueryResultBatch
   */
  public function getBatch()
  {
    return $this->batch;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RunQueryResponse::class, 'Google_Service_Datastore_RunQueryResponse');
