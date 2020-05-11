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

class Google_Service_SecurityCommandCenter_GroupAssetsResponse extends Google_Collection
{
  protected $collection_key = 'groupByResults';
  protected $groupByResultsType = 'Google_Service_SecurityCommandCenter_GroupResult';
  protected $groupByResultsDataType = 'array';
  public $nextPageToken;
  public $readTime;
  public $totalSize;

  /**
   * @param Google_Service_SecurityCommandCenter_GroupResult
   */
  public function setGroupByResults($groupByResults)
  {
    $this->groupByResults = $groupByResults;
  }
  /**
   * @return Google_Service_SecurityCommandCenter_GroupResult
   */
  public function getGroupByResults()
  {
    return $this->groupByResults;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setReadTime($readTime)
  {
    $this->readTime = $readTime;
  }
  public function getReadTime()
  {
    return $this->readTime;
  }
  public function setTotalSize($totalSize)
  {
    $this->totalSize = $totalSize;
  }
  public function getTotalSize()
  {
    return $this->totalSize;
  }
}
