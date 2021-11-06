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

namespace Google\Service\Gmail;

class ListHistoryResponse extends \Google\Collection
{
  protected $collection_key = 'history';
  protected $historyType = History::class;
  protected $historyDataType = 'array';
  public $historyId;
  public $nextPageToken;

  /**
   * @param History[]
   */
  public function setHistory($history)
  {
    $this->history = $history;
  }
  /**
   * @return History[]
   */
  public function getHistory()
  {
    return $this->history;
  }
  public function setHistoryId($historyId)
  {
    $this->historyId = $historyId;
  }
  public function getHistoryId()
  {
    return $this->historyId;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ListHistoryResponse::class, 'Google_Service_Gmail_ListHistoryResponse');
