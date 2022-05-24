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

class CommitResponse extends \Google\Collection
{
  protected $collection_key = 'mutationResults';
  /**
   * @var string
   */
  public $commitTime;
  /**
   * @var int
   */
  public $indexUpdates;
  protected $mutationResultsType = MutationResult::class;
  protected $mutationResultsDataType = 'array';

  /**
   * @param string
   */
  public function setCommitTime($commitTime)
  {
    $this->commitTime = $commitTime;
  }
  /**
   * @return string
   */
  public function getCommitTime()
  {
    return $this->commitTime;
  }
  /**
   * @param int
   */
  public function setIndexUpdates($indexUpdates)
  {
    $this->indexUpdates = $indexUpdates;
  }
  /**
   * @return int
   */
  public function getIndexUpdates()
  {
    return $this->indexUpdates;
  }
  /**
   * @param MutationResult[]
   */
  public function setMutationResults($mutationResults)
  {
    $this->mutationResults = $mutationResults;
  }
  /**
   * @return MutationResult[]
   */
  public function getMutationResults()
  {
    return $this->mutationResults;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CommitResponse::class, 'Google_Service_Datastore_CommitResponse');
