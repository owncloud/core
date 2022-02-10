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

namespace Google\Service\Firestore;

class PartitionQueryRequest extends \Google\Model
{
  /**
   * @var int
   */
  public $pageSize;
  /**
   * @var string
   */
  public $pageToken;
  /**
   * @var string
   */
  public $partitionCount;
  protected $structuredQueryType = StructuredQuery::class;
  protected $structuredQueryDataType = '';

  /**
   * @param int
   */
  public function setPageSize($pageSize)
  {
    $this->pageSize = $pageSize;
  }
  /**
   * @return int
   */
  public function getPageSize()
  {
    return $this->pageSize;
  }
  /**
   * @param string
   */
  public function setPageToken($pageToken)
  {
    $this->pageToken = $pageToken;
  }
  /**
   * @return string
   */
  public function getPageToken()
  {
    return $this->pageToken;
  }
  /**
   * @param string
   */
  public function setPartitionCount($partitionCount)
  {
    $this->partitionCount = $partitionCount;
  }
  /**
   * @return string
   */
  public function getPartitionCount()
  {
    return $this->partitionCount;
  }
  /**
   * @param StructuredQuery
   */
  public function setStructuredQuery(StructuredQuery $structuredQuery)
  {
    $this->structuredQuery = $structuredQuery;
  }
  /**
   * @return StructuredQuery
   */
  public function getStructuredQuery()
  {
    return $this->structuredQuery;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PartitionQueryRequest::class, 'Google_Service_Firestore_PartitionQueryRequest');
