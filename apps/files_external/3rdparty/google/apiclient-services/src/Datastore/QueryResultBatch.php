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

class QueryResultBatch extends \Google\Collection
{
  protected $collection_key = 'entityResults';
  /**
   * @var string
   */
  public $endCursor;
  /**
   * @var string
   */
  public $entityResultType;
  protected $entityResultsType = EntityResult::class;
  protected $entityResultsDataType = 'array';
  /**
   * @var string
   */
  public $moreResults;
  /**
   * @var string
   */
  public $readTime;
  /**
   * @var string
   */
  public $skippedCursor;
  /**
   * @var int
   */
  public $skippedResults;
  /**
   * @var string
   */
  public $snapshotVersion;

  /**
   * @param string
   */
  public function setEndCursor($endCursor)
  {
    $this->endCursor = $endCursor;
  }
  /**
   * @return string
   */
  public function getEndCursor()
  {
    return $this->endCursor;
  }
  /**
   * @param string
   */
  public function setEntityResultType($entityResultType)
  {
    $this->entityResultType = $entityResultType;
  }
  /**
   * @return string
   */
  public function getEntityResultType()
  {
    return $this->entityResultType;
  }
  /**
   * @param EntityResult[]
   */
  public function setEntityResults($entityResults)
  {
    $this->entityResults = $entityResults;
  }
  /**
   * @return EntityResult[]
   */
  public function getEntityResults()
  {
    return $this->entityResults;
  }
  /**
   * @param string
   */
  public function setMoreResults($moreResults)
  {
    $this->moreResults = $moreResults;
  }
  /**
   * @return string
   */
  public function getMoreResults()
  {
    return $this->moreResults;
  }
  /**
   * @param string
   */
  public function setReadTime($readTime)
  {
    $this->readTime = $readTime;
  }
  /**
   * @return string
   */
  public function getReadTime()
  {
    return $this->readTime;
  }
  /**
   * @param string
   */
  public function setSkippedCursor($skippedCursor)
  {
    $this->skippedCursor = $skippedCursor;
  }
  /**
   * @return string
   */
  public function getSkippedCursor()
  {
    return $this->skippedCursor;
  }
  /**
   * @param int
   */
  public function setSkippedResults($skippedResults)
  {
    $this->skippedResults = $skippedResults;
  }
  /**
   * @return int
   */
  public function getSkippedResults()
  {
    return $this->skippedResults;
  }
  /**
   * @param string
   */
  public function setSnapshotVersion($snapshotVersion)
  {
    $this->snapshotVersion = $snapshotVersion;
  }
  /**
   * @return string
   */
  public function getSnapshotVersion()
  {
    return $this->snapshotVersion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QueryResultBatch::class, 'Google_Service_Datastore_QueryResultBatch');
